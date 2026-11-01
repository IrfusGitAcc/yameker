<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use TelrGateway\TelrManager;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Customer;

class PaymentController extends Controller
{
    

    public function processPayment(Request $request)
    {
        $telr = new TelrManager();
         
        $billing = [
            'first_name' => $request->shipping_first_name ?? $request->first_name,
            'sur_name'   => $request->shipping_last_name ?? $request->last_name,
            'address_1'  => $request->shipping_address ?? $request->address,
            'city'       => $request->shipping_city ?? $request->city,
            'country'    => 'AE', // ISO code for UAE
            'email'      => $request->shipping_email ?? $request->email,
        ];
        return $telr
            ->pay(rand(1000,9999), $request->amount, 'Test Purchase', $billing, 'AED')
            ->redirect();
    }

    public function paymentSuccess(Request $request){
        $transaction = (new TelrManager)->handleTransactionResponse($request);
        $categories = Category::all();
        $customerId = session('customer_id');
        $customer = Customer::find($customerId);

        if (!$customer) {
            return redirect()->route('checkout')->with('error', 'Customer not found.');
        }
        $shippingAddress = Customer::where('user_id', Auth::id())
                    ->where('type', 'shipping')
                    ->latest()
                    ->first(); 
        
        $isBuyNow = session('is_buy_now');
        $order = null;
    
        if ($isBuyNow) {
            $buyNowData = session('buy_now_data');
    
            if (!$buyNowData || !isset($buyNowData['product_id'])) {
                return redirect()->route('checkout')->with('error', 'Invalid session data. Please try again.');
            }
    
            $product = Product::find($buyNowData['product_id']);
            $quantity = $buyNowData['quantity'];
            $size = $buyNowData['size'];
    
            // ✅ Now place the order (finally, after success)
            $order = $this->placeOrder($customer, true, null, [
                'product' => $product,
                'quantity' => $quantity,
                'size' => $size,
            ],$shippingAddress);

        } else {
            // Get active cart items
            $cartItems = Cart::where('status', 'active')
                ->where(function ($q) {
                    Auth::check()
                        ? $q->where('user_id', Auth::id())
                        : $q->whereNull('user_id')->where('session_id', session()->getId());
                })
                ->get();
    
            if ($cartItems->isEmpty()) {
                return redirect()->route('checkout')->with('error', 'Cart is empty.');
            }
    
            // ✅ Place cart order now
            $order = $this->placeOrder($customer, false, $cartItems, null, $shippingAddress);
        }
    
        // ✅ Mark cart as checked out
        Cart::where(function ($q) {
            Auth::check()
                ? $q->where('user_id', Auth::id())
                : $q->whereNull('user_id')->where('session_id', session()->getId());
        })
        ->where('status', 'active')
        ->update(['status' => 'checked_out']);
    
        // ✅ Set payment info
        $order->payment_status = 'paid';
        $order->status = 'processing';
        $order->save();
    
        // ✅ Optional: clear session vars
        session()->forget([
            'buy_now_data',
            'is_buy_now',
            'buy_now_product_id',
            'buy_now_quantity',
            'buy_now_size',
            'order_id', // if still present
        ]);
    
        return view('frontend.payment-success', compact('transaction', 'categories', 'order','customer', 'shippingAddress'));
    }
    
    public function placeOrder($customer, $isBuyNow, $cartItems = null, $buyNowItem = null, $shippingAddress = null ){

        return DB::transaction(function () use ($customer, $isBuyNow, $cartItems, $buyNowItem, $shippingAddress) {
    
            $order = new Order();
            $order->user_id          = Auth::id();
            $order->session_id       = session()->getId();
            $order->order_number     = 'YMKR-ORD-' . strtoupper(Str::random(10));
            $order->billing_address_id  = $customer->customer_id;
            $order->shipping_address_id = $shippingAddress?->customer_id ?? $customer->customer_id;
            $order->payment_status   = 'unpaid';
            $order->status           = 'processing';
            $order->placed_at        = now();
            $order->payment_method   = 'tlr';
    
            if ($isBuyNow) {
                $product  = $buyNowItem['product'];
                $quantity = (int) $buyNowItem['quantity'];
                $unit     = (float) $product->price;
                $subtotal = $quantity * $unit;
            } else {
                // Ensure $cartItems is loaded and each item has quantity & price
                $subtotal = $cartItems->sum(fn($ci) => (int)$ci->quantity * (float)$ci->price);
            }
    
            // Shipping rule
            $shipping = $subtotal >= 150 ? 0.0 : 15.0;
    
            // Persist order header
            $order->subtotal      = round($subtotal, 2);
            $order->shipping_cost = round($shipping, 2);
            $order->total_amount  = round($subtotal + $shipping, 2);
            $order->save();
    
            // Persist items
            if ($isBuyNow) {
                OrderItem::create([
                    'order_id'   => $order->order_id,
                    'product_id' => $product->product_id,
                    'quantity'   => $quantity,
                    'price'      => $unit,             // unit price snapshot
                    'size'       => $buyNowItem['size'] ?? null,
                ]);
            } else {
                foreach ($cartItems as $ci) {
                    OrderItem::create([
                        'order_id'   => $order->order_id,
                        'product_id' => $ci->product_id,
                        'quantity'   => (int) $ci->quantity,
                        'price'      => (float) $ci->price, // unit price snapshot
                        'size'       => $ci->size,
                    ]);
                }
            }
    
            session(['order_id' => $order->order_id]);
            return $order;
        });
    }

    public function paymentCancel(Request $request)
    {
        $transaction = (new TelrManager)->handleTransactionResponse($request);
        $categories = Category::all();
        return view('frontend.payment-cancel', compact('transaction','categories'));
    }

    public function paymentDeclined(Request $request)
    {
        $transaction = (new TelrManager)->handleTransactionResponse($request);
        $categories = Category::all();
        return view('frontend.payment-fail', compact('transaction','categories'));
    }
}
