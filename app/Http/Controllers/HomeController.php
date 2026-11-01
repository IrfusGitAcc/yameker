<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Customer;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{
    public function home(){
        $products   = Product::all();
        $categories = Category::all();
        if (Auth::check()) {
            // Logged-in user
            $carts = Cart::where('user_id', Auth::id())
                         ->where('status', 'active')
                         ->get();
        } else {
            // Guest user
            $sessionId = session()->getId();
            $carts = Cart::where('session_id', $sessionId)
                         ->whereNull('user_id')
                         ->where('status', 'active')
                         ->get();
        }
        
        $sessionId = Session::getId();
        $userId = Auth::id();
        
        $wishlist = DB::table('wishlists')
             ->when($userId, function ($q) use ($userId) {
            return $q->where('user_id', $userId);
        })
             ->when(!$userId, function ($q) use ($sessionId) {
            return $q->where('session_id', $sessionId);
        })
            ->pluck('product_id')
            ->toArray();

        return view('frontend.index',compact('products','categories','carts','wishlist'));
    }

    public function showByCategory($catId){
        $products   = Product::where('category_id', $catId)->get();
        $categories = Category::all();
        return view('frontend.category-details',compact('products','categories'));

    }

    public function productDetails($productId){

        $product    = Product::findOrFail($productId);
        $products   = Product::latest()->take(10)->get();
        $categories = Category::all();
         if (Auth::check()) {
            // Logged-in user
            $carts = Cart::where('user_id', Auth::id())
                         ->where('status', 'active')
                         ->get();
        } else {
            // Guest user
            $sessionId = session()->getId();
            $carts = Cart::where('session_id', $sessionId)
                         ->whereNull('user_id')
                         ->where('status', 'active')
                         ->get();
        }
        
        $sessionId = Session::getId();
        $userId = Auth::id();
        
        $wishlist = DB::table('wishlists')
             ->when($userId, function ($q) use ($userId) {
            return $q->where('user_id', $userId);
        })
             ->when(!$userId, function ($q) use ($sessionId) {
            return $q->where('session_id', $sessionId);
        })
            ->pluck('product_id')
            ->toArray();
        return view('frontend.product-details',compact('product','products','categories','carts','wishlist'));

    }

    public function termsAndCondition(){
        $categories = Category::all();
        return view('frontend.terms-and-conditions',compact('categories'));
    }

    public function privacyPolicy(){
        $categories = Category::all();
        return view('frontend.privacy-policy',compact('categories'));
    }
    
    public function checkout(Request $request){
        
        $categories = Category::all();
        $country = DB::table('country')->first();
        $emirates = DB::table('emirates')
                    ->where('country_code', 'AE')
                    ->orderBy('emirate_name')
                    ->get();
    
        $isBuyNow = false;
        $buyNowItem = null;
        $cartItems = collect(); // Default empty collection
    
        // Determine if user or guest has a saved billing record
        if (Auth::check()) {
            $billing = Customer::where('user_id', Auth::id())->where('type', 'billing')->latest()->first();
            $shippingAddress = Customer::where('user_id', Auth::id())->where('type', 'shipping')->latest()->first();
        } else {
            $billing = Customer::where('session_id', session()->getId())->where('type', 'billing')->latest()->first();
            $shippingAddress = Customer::where('session_id', session()->getId())->where('type', 'shipping')->latest()->first();
        }

        // Still keep session customer_id for later use
        if ($billing) {
            session(['customer_id' => $billing->customer_id]);
        }
    
        // Handle Buy Now flow
        if ($request->has('buy_now') && $request->has('product_id')) {
            $product = Product::findOrFail($request->product_id);
    
            $quantity = $request->quantity ?? 1;
            $size = $request->size ?? null;
    
            session([
                'is_buy_now' => true,
                'buy_now_product_id' => $product->product_id,
                'buy_now_quantity' => $quantity,
                'buy_now_size' => $size,
            ]);
    
            $buyNowItem = (object)[
                'product' => $product,
                'quantity' => $quantity,
                'size' => $size,
                'price' => $product->price,
            ];
    
            $isBuyNow = true;
        } 
        // Else, handle standard cart flow
        else {
            if (Auth::check()) {
                $cartItems = Cart::where('user_id', Auth::id())
                                ->where('status', 'active')
                                ->get();
            } else {
                $cartItems = Cart::where('session_id', session()->getId())
                                ->whereNull('user_id')
                                ->where('status', 'active')
                                ->get();
            }
        }
    
        return view('frontend.checkout', [
            'categories' => $categories,
            'country' => $country,
            'emirates' => $emirates,
            'isBuyNow' => $isBuyNow,
            'buyNowItem' => $buyNowItem,
            'cartItems' => $cartItems,
            'billing' => $billing,
            'shippingAddress' => $shippingAddress,
        ]);
    }
    
    public function myAccount(){

        $categories = Category::all();
        $country = DB::table('country')->first();
        $emirates = DB::table('emirates')->where('country_code', 'AE')->orderBy('emirate_name')->get();

        if (Auth::check()) {
            $billing = Customer::where('user_id', Auth::id())->where('type', 'billing')->latest()->first();
            $shippingAddress = Customer::where('user_id', Auth::id())->where('type', 'shipping')->latest()->first();
        } else {
            $billing = Customer::where('session_id', session()->getId())->where('type', 'billing')->latest()->first();
            $shippingAddress = Customer::where('session_id', session()->getId())->where('type', 'shipping')->latest()->first();
        }

        if ($billing) {
            session(['customer_id' => $billing->customer_id]);
        }

        return view('account.my-account', compact('categories', 'billing', 'shippingAddress', 'country', 'emirates'));
    }

    public function myOrder(){
        $categories = Category::all();
        $user = Auth::user(); // assuming AppUser is the authenticated model
        
    
        if (!$user) {
           return redirect()->route('login')->with('error', 'Please login to view your orders.');
        }
        $orders = Order::with(['items.product']) // eager load items and their products
            ->where('user_id', $user->user_id)
            ->where('payment_status', 'paid')
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('account.my-orders',compact('orders','categories'));
    }

    public function aboutYameker(){

        $categories = Category::all();
        return view('frontend.about-us',compact('categories'));
    }
    public function contactYameker(){

        $categories = Category::all();
        return view('frontend.contact-us',compact('categories'));
    }


    public function searchResult(Request $request){
        
        $categories = Category::all();
        $query = trim($request->input('query'));
        $sessionId = Session::getId();
        $userId = Auth::id();
    
        $products = Product::where(function ($q) use ($query) {
            $q->where('name', 'like', '%' . $query . '%')
              ->orWhere('description', 'like', '%' . $query . '%')
              ->orWhere('tags', 'like', '%' . $query . '%')
              ->orWhere('colors', 'like', '%' . $query . '%')
              ->orWhere('size', 'like', '%' . $query . '%')
              ->orWhereHas('category', function ($subQ) use ($query) {
                  $subQ->where('category_name', 'like', '%' . $query . '%');
              })
              ->orWhereHas('subcategory', function ($subQ) use ($query) {
                  $subQ->where('subcategory_name', 'like', '%' . $query . '%');
              });
        })
        ->latest()
        ->get();
    
        // Wishlist items
        $wishlist = DB::table('wishlists')
            ->when($userId, function ($q) use ($userId) {
                return $q->where('user_id', $userId);
            })
            ->when(!$userId, function ($q) use ($sessionId) {
                return $q->where('session_id', $sessionId);
            })
            ->pluck('product_id')
            ->toArray();
    
        return view('frontend.search-results', compact('products', 'query', 'categories', 'wishlist'));
    }

}












