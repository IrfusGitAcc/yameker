<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Wishlist;
class CartController extends Controller
{

    public function viewCart(){
        $products   = Product::all();
        $categories = Category::all();

        if (Auth::check()) {
        // Logged in user
            $cartItems = Cart::where('user_id', Auth::id())->where('status', 'active')->get();
        } else {
            // Guest user
            $sessionId = session()->getId();
            $cartItems = Cart::where('session_id', $sessionId)->whereNull('user_id')->where('status', 'active')->get();
        }
        $subtotal = $cartItems->sum(function($item) {
            return $item->price * $item->quantity;
        });
        return view('frontend.view-cart',compact('products','categories','cartItems','subtotal'));
    }

    public function store(Request $request){

        $request->validate([
            'product_id' => 'required|exists:products,product_id',
            'quantity'   => 'required|integer|min:1',
            'size'       => 'nullable|string',
        ]);
    
        $userId = Auth::id();
        $sessionId = session()->getId();
        $productId = $request->product_id;
        $size = $request->size;
    
        // Check for existing cart item
        if ($userId) {
            $existingCart = Cart::where('product_id', $productId)
                ->where('user_id', $userId)
                ->where('status', 'active')
                ->where(function ($query) use ($size) {
                    $query->where('size', $size)->orWhere(function($q) use ($size) {
                        $q->whereNull('size')->whereRaw('? IS NULL', [$size]);
                    });
                })
                ->first();
        } else {
            $existingCart = Cart::where('product_id', $productId)
                ->where('session_id', $sessionId)
                ->whereNull('user_id')
                ->where('status', 'active')
                ->where(function ($query) use ($size) {
                    $query->where('size', $size)->orWhere(function($q) use ($size) {
                        $q->whereNull('size')->whereRaw('? IS NULL', [$size]);
                    });
                })
                ->first();
        }

        if ($existingCart) {
            // Update quantity if item already exists
            $existingCart->quantity += $request->quantity;
            $existingCart->save();
        } else {
            // Create new cart item
            $cart = new Cart();
            $cart->user_id = $userId;
            $cart->session_id = $userId ? null : $sessionId;
            $cart->product_id = $productId;
            $cart->quantity = $request->quantity;
            $cart->price = Product::find($productId)->price;
            $cart->status = 'active';
            $cart->size = $size;
            $cart->save();
        }
    
        // Fetch updated cart items
        $carts = $userId
            ? Cart::where('user_id', $userId)->where('status', 'active')->get()
            : Cart::where('session_id', $sessionId)->whereNull('user_id')->where('status', 'active')->get();
    
        if ($request->ajax()) {
            $cartHtml = view('frontend.partials.cart-modal-content', compact('carts'))->render();
            return response()->json(['success' => true, 'html' => $cartHtml]);
        }
    
        return redirect()->route('view.cart')->with('success', 'Item added to cart');
    }
    public function destroy($cartId){
        
       $cartItem = Cart::findOrFail($cartId);
       $cartItem->delete();

        if (request()->ajax()) {
          // For AJAX requests
          return response()->json(['success' => true, 'message' => 'Item removed from cart']);
        } else {
          // For admin panel or form-based delete
          return redirect()->back()->with('success', 'Cart item deleted successfully');
        }
    }
   


    public function wishlist(){
        $categories = Category::all();
        if (Auth::check()) {
            $userId = Auth::id();
            $wishlists = Wishlist::where('user_id', $userId)->with('product')->get();
            $carts = Cart::where('user_id', $userId)->where('status', 'active')->get();
        } else {
            $sessionId = session()->getId();
            $wishlists = Wishlist::where('session_id', $sessionId)->with('product')->get();
            $carts = Cart::where('session_id', $sessionId)
                         ->whereNull('user_id')
                         ->where('status', 'active')->get();
        }
        
        return view('frontend.wishlist',compact('categories','carts','wishlists'));
    }

    public function wishlistStore(Request $request){
        $userId = Auth::id();
        $sessionId = Session::getId();
        $productId = $request->product_id;
    
        $query = Wishlist::where('product_id', $productId)
               ->when($userId, function ($q) use ($userId) {
            return $q->where('user_id', $userId);
        })
              ->when(!$userId, function ($q) use ($sessionId) {
            return $q->where('session_id', $sessionId);
        });
    
        $existing = $query->first();
    
        if ($existing) {
            $existing->delete();
            return response()->json(['status' => 'removed']);
        }
    
        Wishlist::create([
            'product_id' => $productId,
            'user_id' => $userId,
            'session_id' => $userId ? null : $sessionId,
        ]);
        
        
        
        $count = Wishlist::when(Auth::check(), function ($q) {
            return $q->where('user_id', Auth::id());
        }, function ($q) {
            return $q->where('session_id', Session::getId());
        })->count();
    
        return response()->json(['status' => 'added','count'=> $count]);
    }
    public function wishlistRemove(Request $request){

        $request->validate([
            'wishlist_id' => 'required|exists:wishlists,wishlist_id',
        ]);
    
        Wishlist::where('wishlist_id', $request->wishlist_id)->delete();
    
        return response()->json(['success' => true]);
    }
    
    public function adminCartList(){
        
        $carts = Cart::with(['user', 'product'])->get();
        
        Cart::whereNull('user_id') // guest users
            ->where('status', '!=', 'checked_out')
            ->where('created_at', '<=', now()->subDay())
            ->update(['status' => 'abandoned']);
        
        return view('admin.cart-list',compact('carts'));
    }
    public function liveSearchCart(Request $request){
        $query = $request->input('query');

        $carts = Cart::with(['product', 'user'])
            ->whereHas('product', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%");
            })
            ->orWhereHas('user', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                  ->orWhere('email', 'LIKE', "%{$query}%");
            })
            ->orWhere('size', 'LIKE', "%{$query}%")
            ->orWhere('status', 'LIKE', "%{$query}%")
            ->get();
    
        return view('admin.partials.cart_table_rows', compact('carts'));
    }

   
    public function update(Request $request){

        try {
            $validated = $request->validate([
                'cart_id' => 'required|integer|exists:carts,cart_id',
                'quantity' => 'required|integer|min:1|max:100'
            ]);
    
            $cart = Cart::where('cart_id', $validated['cart_id'])
                ->where(function($query) {
                    if (Auth::check()) {
                        $query->where('user_id', Auth::id());
                    } else {
                        $query->where('session_id', Session::getId());
                    }
                })
                ->firstOrFail();
    
            $cart->update(['quantity' => $validated['quantity']]);
    
            return response()->json([
                'success' => true,
                'item_total' => number_format($cart->price * $cart->quantity, 2),
                'subtotal' => number_format($this->calculateCurrentSubtotal(), 2),
                'quantity' => $cart->quantity
            ]);
    
        } catch (\Exception $e) {
            Log::error('Cart update error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    private function calculateCurrentSubtotal(){
        
        return Cart::query()
        ->where(function($query) {
            if (Auth::check()) {
                $query->where('user_id', Auth::id());
            } else {
                $query->where('session_id', Session::getId());
            }
        })
        ->sum(DB::raw('price * quantity'));
    }
        

}


