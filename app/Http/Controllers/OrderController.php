<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

use App\Model\AppUser;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;





class OrderController extends Controller
{
    public function saveAddress(Request $request){

        // Step 1: Validate billing fields (required)
        $validated = $request->validate([
            'first-name' => 'required|string|max:255',
            'last-name' => 'required|string|max:255',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);
    
        // Step 2: Save Billing Address
        $billing = new Customer();
        $billing->user_id = Auth::id();
        $billing->session_id = session()->getId();
        $billing->first_name = $validated['first-name'];
        $billing->last_name = $validated['last-name'];
        $billing->country = $validated['country'];
        $billing->state = $validated['state'];
        $billing->city = $validated['city'];
        $billing->address = $validated['address'];
        $billing->phone = $validated['phone'];
        $billing->email = $validated['email'];
        $billing->type = 'billing';
        $billing->save();
    
        // Step 3: Save Shipping Address if "ship_to_different" is checked
        if ($request->has('ship_to_different')) {
            // Optional: validate shipping only if checkbox is checked
            $request->validate([
                'shipping_first_name' => 'required|string|max:255',
                'shipping_last_name' => 'required|string|max:255',
                'shipping_country' => 'required',
                'shipping_state' => 'required',
                'shipping_city' => 'required|string|max:255',
                'shipping_address' => 'required|string|max:255',
                'shipping_phone' => 'required|string|max:20',
                'shipping_email' => 'required|email|max:255',
            ]);
    
            $shipping = new Customer();
            $shipping->user_id = Auth::id();
            $shipping->session_id = session()->getId();
            $shipping->first_name = $request->input('shipping_first_name');
            $shipping->last_name = $request->input('shipping_last_name');
            $shipping->country = $request->input('shipping_country');
            $shipping->state = $request->input('shipping_state');
            $shipping->city = $request->input('shipping_city');
            $shipping->address = $request->input('shipping_address');
            $shipping->phone = $request->input('shipping_phone');
            $shipping->email = $request->input('shipping_email');
            $shipping->type = 'shipping';
            $shipping->save();
        } else {
            $shipping = $billing; // fallback if same as billing
        }
    
        // Step 4: Save session data
        session([
            'customer_id' => $billing->customer_id,
            'shipping_customer_id' => $shipping->customer_id,
            'is_buy_now' => $request->has('buy_now'),
            'buy_now_product_id' => $request->input('product_id'),
            'buy_now_quantity' => $request->input('quantity'),
            'buy_now_size' => $request->input('size'),
        ]);
    
        Log::info('Billing & Shipping Request:', $request->all());
    
        return redirect()->back()->with('success', 'Address saved successfully.');
    }

    public function updateAddress(Request $request){
    
        $validated = $request->validate([
            'first-name' => 'required|string|max:255',
            'last-name' => 'required|string|max:255',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);
    
        $userId = Auth::id();
        $sessionId = session()->getId();
    
        // Update billing
        $billing = Customer::where('user_id', $userId)
            ->where('type', 'billing')
            ->first();
    
        if ($billing) {
            $billing->update([
                'first_name' => $validated['first-name'],
                'last_name' => $validated['last-name'],
                'country' => $validated['country'],
                'state' => $validated['state'],
                'city' => $validated['city'],
                'address' => $validated['address'],
                'phone' => $validated['phone'],
                'email' => $validated['email'],
                'session_id' => $sessionId,
            ]);
        }
    
        // Update shipping if required
        if ($request->input('ship_to_different') == '1') {
            $request->validate([
                'shipping_first_name' => 'required|string|max:255',
                'shipping_last_name' => 'required|string|max:255',
                'shipping_country' => 'required',
                'shipping_state' => 'required',
                'shipping_city' => 'required|string|max:255',
                'shipping_address' => 'required|string|max:255',
                'shipping_phone' => 'required|string|max:20',
                'shipping_email' => 'required|email|max:255',
            ]);
    
            $shipping = Customer::where('user_id', $userId)
                ->where('type', 'shipping')
                ->first();
    
            if ($shipping) {
                $shipping->update([
                    'first_name' => $request->shipping_first_name,
                    'last_name' => $request->shipping_last_name,
                    'country' => $request->shipping_country,
                    'state' => $request->shipping_state,
                    'city' => $request->shipping_city,
                    'address' => $request->shipping_address,
                    'phone' => $request->shipping_phone,
                    'email' => $request->shipping_email,
                    'session_id' => $sessionId,
                ]);
            }
        }
    
        return back()->with('success', 'Address updated successfully.');
    }
    


    public function confirmPayment(){
        
        $categories = Category::all();
        $customerId = session('customer_id');

    
        if (!$customerId) {
           return redirect()->route('checkout')->with('error', 'Session expired. Please re-enter your billing details.');
        }

        $customer = Customer::where('customer_id', $customerId)->first();
        if (!$customer) {
           return redirect()->route('checkout')->with('error', 'Customer not found. Please try again.');
        }

        $shippingCustomerId = session('shipping_customer_id');
        $shippingAddress = null;
        
        if ($shippingCustomerId && $shippingCustomerId != $customerId) {
            $shippingAddress = Customer::find($shippingCustomerId);
        }

        $isBuyNow = session('is_buy_now');

        if ($isBuyNow && (!session('buy_now_product_id') || !session('buy_now_quantity'))) {
           return redirect()->route('checkout')->with('error', 'Invalid product data. Please try again.');
        }

        $shippingCharge = 0;
        $grandTotal = 0;

        if ($isBuyNow) {
            $product = Product::find(session('buy_now_product_id'));
            $quantity = session('buy_now_quantity');
            $total = $product->price * $quantity;
            $size = session('buy_now_size');
            $shippingCharge = $total >= 140 ? 0 : 13;
            $grandTotal = $total + $shippingCharge;
            
            // ✅ Store buy-now data for post-payment order placement
            session([
                'is_buy_now' => true,
                'buy_now_data' => [
                    'product_id' => $product->product_id,
                    'quantity' => $quantity,
                    'size' => $size,
                ],
            ]);
            

            return view('frontend.payment', compact(
                'product',
                'quantity',
                'size',
                'total',
                'shippingCharge',
                'grandTotal',
                'customer',
                'shippingAddress', // NEW: shipping
                'categories'
                
            ));
        } else {
            $cartItems = Cart::where('status', 'active')
            ->where(function ($q) {
                if (Auth::check()) {
                    $q->where('user_id', Auth::id());
                } else {
                    $q->where('session_id', session()->getId());
                }
            })
            ->get();

            $total = $cartItems->sum(function ($item) {
                return $item->quantity * $item->price;
            });

            $shippingCharge = $total >= 150 ? 0 : 13;
            $grandTotal = $total + $shippingCharge;
            
            session(['is_buy_now' => false]);
            
            return view('frontend.payment', compact(
                'cartItems',
                'total',
                'shippingCharge',
                'grandTotal',
                'customer',
                'shippingAddress', // NEW: shipping
                'categories'
                
            ));
        }
    }

    public function adminOrderList(){
        
        $orders = Order::with(['billingAddress','shippingAddress','items'])->orderBy('created_at', 'desc')->get();
        
        return view('admin.order-list',compact('orders'));
    }
    public function liveSearchOrder(Request $request){

        $query = $request->input('query');
    
        $orders = Order::with('shippingAddress')
            ->where(function($q) use ($query) {
                $q->where('order_number', 'LIKE', "%{$query}%")
                  ->orWhere('payment_status', 'LIKE', "%{$query}%")
                  ->orWhere('status', 'LIKE', "%{$query}%")
                  ->orWhereHas('shippingAddress', function($sub) use ($query) {
                      $sub->where('first_name', 'LIKE', "%{$query}%")
                          ->orWhere('last_name', 'LIKE', "%{$query}%")
                          ->orWhere('email', 'LIKE', "%{$query}%")
                          ->orWhere('phone', 'LIKE', "%{$query}%")
                          ->orWhere('address', 'LIKE', "%{$query}%");
                  });
            })
            ->get();
        return view('admin.partials.order_table_rows', compact('orders'));
    }
    
    
    public function cancel(Request $request, $orderId){
        
        $order = Order::findOrFail($orderId);
    
        if ($order->status === 'cancelled') {
            return back()->with('error', 'Order is already cancelled.');
        }
    
        // Optionally check if it's already shipped or completed
        if (in_array($order->status, ['delivered'])) {
            return back()->with('error', 'Cannot cancel a completed order.');
        }
    
        $order->status = 'cancelled';
        $order->cancelled_at = now(); // optional: add a field if needed
        $order->save();
    
        return back()->with('success', 'Order cancelled successfully.');
    }    



    
}
    