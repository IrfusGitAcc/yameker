<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Services\EcofreightShippingService;

use App\Models\Shipment;
use App\Models\Order;

class ShipmentController extends Controller
{
    public function viewShipments(){
        $orders = Order::with('shipment')->get();

        return view('admin.shipments',compact('orders'));
    }

    protected $shippingService;

    public function __construct(EcofreightShippingService $shippingService){

        $this->shippingService = $shippingService;
    }

    public function createShipment(Request $request){

        Log::debug('CreateShipment called', $request->all());
    
        // Validate required fields
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,order_id',
            '0.product_type' => 'required',
            '0.service_type' => 'required',
            '0.request_type' => 'required',
            '0.delivery_attempt_mode' => 'required',
            '0.shipper_details.company_name' => 'required',
            '0.shipper_details.sender_name' => 'required',
            '0.shipper_details.address' => 'required',
            '0.shipper_details.city' => 'required',
            '0.shipper_details.country' => 'required',
            '0.shipper_details.mobile_no' => 'required',
        ]);
    
        $order = Order::with(['shippingAddress', 'items'])->findOrFail($validated['order_id']);
        $customer = $order->shippingAddress; // Using shippingAddress relationship
    
        // Build the payload from form data
        $payload = [
            [
                "order_reference" => $request->input('0.order_reference', $order->order_number),
                "customer_service_type" => $request->input('0.customer_service_type', ''),
                "product_type" => $request->input('0.product_type'),
                "service_type" => $request->input('0.service_type'),
                "schedule_delivery_date" => $request->input('0.schedule_delivery_date', ''),
                "shipment_value" => $request->input('0.shipment_value', $order->grand_total),
                "currency" => $request->input('0.currency', 'AED'),
                "request_type" => $request->input('0.request_type', '1'),
                "delivery_attempt_mode" => $request->input('0.delivery_attempt_mode', '1'),
                "location" => [
                    "lat" => $request->input('0.location.lat', '25.276987'),
                    "lon" => $request->input('0.location.lon', '55.296249')
                ],
                "cod" => [
                    "amount" => $order->payment_method === 'COD' ? $order->total_amount : "0",
                    "payment_mode" => $request->input('0.cod.payment_mode', $order->payment_method === 'COD' ? 'cash_only' : 'prepaid')
                ],
                "customs_payment" => [
                    "payment_mode" => $request->input('0.customs_payment.payment_mode', 'DDU')
                ],
                "shipper_details" => [
                    "company_name" => $request->input('0.shipper_details.company_name'),
                    "sender_name" => $request->input('0.shipper_details.sender_name'),
                    "address" => $request->input('0.shipper_details.address'),
                    "city" => $request->input('0.shipper_details.city'),
                    "country" => $request->input('0.shipper_details.country'),
                    "email" => $request->input('0.shipper_details.email', ''),
                    "mobile_no" => $request->input('0.shipper_details.mobile_no'),
                    "alt_mobile_no" => $request->input('0.shipper_details.alt_mobile_no', '')
                ],
                "consignee_details" => [
                    "company_name" => $request->input('0.consignee_details.company_name', $customer->company ?? ''),
                    "receiver_name" => $request->input('0.consignee_details.receiver_name', $customer->name),
                    "email" => $request->input('0.consignee_details.email', $customer->email),
                    "address" => $request->input('0.consignee_details.address', $customer->address),
                    "city" => $request->input('0.consignee_details.city', $customer->city),
                    "country" => $request->input('0.consignee_details.country', 'UAE'),
                    "mobile_no" => $request->input('0.consignee_details.mobile_no', $customer->phone),
                    "alt_mobile_no" => $request->input('0.consignee_details.alt_mobile_no', '')
                ],
                "package_details" => []
            ]
        ];
    
        // Add package details if provided
        if ($request->has('0.package_details.0.description')) {
            $packageDetails = [
                "description" => $request->input('0.package_details.0.description'),
                "quantity" => $request->input('0.package_details.0.quantity', ''),
                "weight" => $request->input('0.package_details.0.weight', ''),
                "height" => $request->input('0.package_details.0.height', ''),
                "width" => $request->input('0.package_details.0.width', ''),
                "length" => $request->input('0.package_details.0.length', ''),
                "dimension_units" => "CM",
                "item_details" => []
            ];
    
            // Add item details if provided
            if ($request->has('0.package_details.0.item_details.0.item_code')) {
                $itemDetails = [
                    "item_code" => $request->input('0.package_details.0.item_details.0.item_code'),
                    "hs_code" => $request->input('0.package_details.0.item_details.0.hs_code', '0000000000'),
                    "description" => $request->input('0.package_details.0.item_details.0.description', ''),
                    "quantity" => $request->input('0.package_details.0.item_details.0.quantity', 1),
                ];
    
                // Add serial numbers if provided
                if ($request->has('0.package_details.0.item_details.0.serial_number')) {
                    $itemDetails["serial_number"] = (array)$request->input('0.package_details.0.item_details.0.serial_number');
                }
    
                $packageDetails["item_details"][] = $itemDetails;
            } elseif ($order->items->isNotEmpty()) {
                // Fallback to order items if no item details provided
                $packageDetails["item_details"] = $order->items->map(function ($item) {
                    return [
                        "item_code" => $item->product_code ?? '',
                        "hs_code" => $item->hs_code ?? '',
                        "description" => $item->product_name,
                        "quantity" => $item->quantity,
                    ];
                })->toArray();
            }
    
            $payload[0]["package_details"][] = $packageDetails;
        }
    
        try {
            $result = $this->shippingService->createShipment($payload);
    
            if (!$result || empty($result['data']['valid_order'])) {
                throw new \Exception('Shipment failed: No valid order returned');
            }
    
            $orderData = $result['data']['valid_order'][0]['data'] ?? null;
    
            if (!$orderData || empty($orderData['tracking_no'])) {
                throw new \Exception('Shipment created but no tracking number returned');
            }
    
            // Save shipment
            $shipment = new Shipment();
            $shipment->order_id = $order->order_id;
            $shipment->api_payload = json_encode($payload, JSON_UNESCAPED_UNICODE);
            $shipment->api_response = json_encode($result, JSON_UNESCAPED_UNICODE);
            $shipment->eco_awb = $orderData['awb_label_print'] ?? null;
            $shipment->tracking_number = $orderData['tracking_no'];
            $shipment->status = 'created';
            $shipment->save();
    
            return redirect()->back()->with([
                'success' => 'Shipment created successfully!',
                'tracking_number' => $orderData['tracking_no'],
                'awb_url' => $orderData['awb_label_print'] ?? null,
            ]);
        } catch (\Exception $e) {
            Log::error('Shipment creation failed', [
                'message' => $e->getMessage(),
                'payload' => $payload,
                'exception' => $e
            ]);
    
            return redirect()->back()
                ->withInput()
                ->with('error', 'Shipment failed: ' . $e->getMessage());
        }
    }

    
}
