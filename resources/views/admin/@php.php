@php
    $statusClass = match($cart->status) {
        'active'       => 'bg-success text-white',     // green
        'abandoned'    => 'bg-danger text-white',      // red
        'checked_out'  => 'bg-warning text-dark',      // orange
        default        => 'bg-secondary text-white'    // fallback
    };
@endphp

<td>
    <a href="#" class="status_btn badge {{ $statusClass }}">
        {{ ucfirst($cart->status) }}
    </a>
</td>
use App\Models\Order;
use Illuminate\Http\Request;

public function cancel(Request $request, $id)
{
    $order = Order::findOrFail($id);

    if ($order->status === 'cancelled') {
        return back()->with('error', 'Order is already cancelled.');
    }

    // Optionally check if it's already shipped or completed
    if (in_array($order->status, ['shipped', 'delivered'])) {
        return back()->with('error', 'Cannot cancel a completed order.');
    }

    $order->status = 'cancelled';
    $order->cancelled_at = now(); // optional: add a field if needed
    $order->save();

    return back()->with('success', 'Order cancelled successfully.');
}
    <form action="{{ route('admin.orders.cancel', $order->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this order?');">
    @csrf
    <button type="submit" class="btn btn-danger btn-sm">Cancel Order</button>
    </form>





            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <style>
                .table td,
                .table th {
                    padding: 0.5rem;
                    vertical-align: middle;
                }
                
                .badge {
                    padding: 0.4em 0.6em;
                    font-size: 0.75rem;
                    border-radius: 0.4rem;
                }

            </style>
            <div class="row">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30 pt-4">
                        <div class="white_card_body">
                            <div class="QA_section">
                                <div class="white_box_tittle list_header">
                                    <h4>User Orders Listing </h4>
                                    <div class="box_right d-flex lms_block">
                                        <div class="serach_field_2">
                                            <div class="search_inner">
                                                <form active="#">
                                                    <div class="search_field">
                                                        <input type="text" placeholder="Search content here...">
                                                    </div>
                                                    <button type="submit"> <i class="ti-search"></i> </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div>
                                            
                                        </div>
                                    </div>
                                </div>
        
                                <div class="QA_table mb_30 table-responsive">
                                    <table class="table  table-hover ">
                                        <thead>
                                            <tr>
                                                <th style="width: 30px;"><input type="checkbox" id="select-all"></th>
                                                <th style="width: 40px;">Sl No</th>
                                                <th style="width: 70px;">Order No</th>
                                                <th style="width: 100px;">Customer</th>
                                                <th style="width: 150px;">Shipping Address</th>
                                                <th style="width: 70px;">Amount</th>
                                                <th style="width: 70px;">Payment</th>
                                                <th style="width: 100px;">Pay Status</th>
                                                <th style="width: 100px;">Order Status</th>
                                                <th style="width: 100px;">Date</th>
                                                <th style="width: 90px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $index => $order)
                                                <tr>
                                                    <td><input type="checkbox" class="admin-checkbox" value="{{ $order->order_id }}"></td>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $order->order_number }}</td>
                                                    <td>
                                                        <div class="text-truncate" style="max-width: 180px;">
                                                            <strong>{{ $order->shippingAddress->first_name }} {{ $order->shippingAddress->last_name }}</strong><br>
                                                            {{ $order->shippingAddress->email }}<br>
                                                            {{ $order->shippingAddress->phone }}
                                                        </div>
                                                    </td>
                                                    <td class="text-truncate" style="max-width: 200px;">
                                                        {{ $order->shippingAddress->address }}
                                                    </td>
                                                    <td>₹{{ $order->total_amount }}</td>
                                                    <td>{{ ucfirst($order->payment_method) }}</td>
                                
                                                    @php
                                                        $paymentStatusClass = match($order->payment_status) {
                                                            'paid' => 'bg-success text-white',
                                                            'failed' => 'bg-danger text-white',
                                                            'unpaid' => 'bg-warning text-dark',
                                                            'refunded' => 'bg-secondary text-white',
                                                            default => 'bg-light text-dark'
                                                        };
                                
                                                        $orderStatusClass = match($order->status) {
                                                            'delivered' => 'bg-success text-white',
                                                            'pending' => 'bg-danger text-white',
                                                            'shipped' => 'bg-warning text-dark',
                                                            'processing' => 'bg-secondary text-white',
                                                            default => 'bg-light text-dark'
                                                        };
                                                    @endphp
                                
                                                    <td><span class="badge {{ $paymentStatusClass }}">{{ ucfirst($order->payment_status) }}</span></td>
                                                    <td><span class="badge {{ $orderStatusClass }}">{{ ucfirst($order->status) }}</span></td>
                                
                                                    <td>{{ \Carbon\Carbon::parse($order->placed_at)->format('F j, Y') }}</td>
                                
                                                    <td>
                                                        <div class="d-flex justify-content-center gap-1">
                                                            <a href="{{ route('admin.orders.show', $order->order_id) }}" class="btn btn-sm btn-primary">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                            <form action="{{ route('admin.orders.cancel', $order->order_id) }}" method="POST" onsubmit="return confirm('Cancel this order?');">
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-danger" title="Cancel">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>


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
                ->where('size', $size)
                ->where('user_id', $userId)
                ->where('status', 'active')
                ->first();
        } else {
            $existingCart = Cart::where('product_id', $productId)
                ->where('size', $size)
                ->where('session_id', $sessionId)
                ->whereNull('user_id')
                ->where('status', 'active')
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
    

    public function store(Request $request){
        $request->validate([
            'product_id' => 'required|exists:products,product_id',
            'quantity'   => 'required|integer|min:1',
            'size'       => 'nullable|string',
        ]);
    
        $cart = new Cart();
        $cart->user_id    = Auth::check() ? Auth::id() : null;
        $cart->session_id = session()->getId();
        $cart->product_id = $request->product_id;
        $cart->quantity   = $request->quantity;
        $cart->price      = Product::find($request->product_id)->price;
        $cart->status     = 'active';
        $cart->size       = $request->size ?? null;
        $cart->save();
    
        // Fetch updated cart items
        $carts = Auth::check()
            ? Cart::where('user_id', Auth::id())->where('status', 'active')->get()
            : Cart::where('session_id', session()->getId())->whereNull('user_id')->where('status', 'active')->get();
    
         $carts = Auth::check()
        ? Cart::where('user_id', Auth::id())->where('status', 'active')->get()
        : Cart::where('session_id', session()->getId())->whereNull('user_id')->where('status', 'active')->get();

        // Check if it's an AJAX request
        if ($request->ajax()) {
            $cartHtml = view('frontend.partials.cart-modal-content', compact('carts'))->render();
            return response()->json(['success' => true, 'html' => $cartHtml]);
        }

        // For normal (non-AJAX) requests, just redirect to cart
        return redirect()->route('view.cart')->with('success', 'Item added to cart');
    }


    public function appUserStore(Request $request){

        Log::info('Register Input:', $request->all());
    
        try {
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name'  => 'required|string|max:255',
                'email'      => 'required|string|email|max:255|unique:appusers,email',
                'password'   => 'required|string|min:8',
            ]);
    
            $user = AppUser::create([
                'name'     => $request->first_name . ' ' . $request->last_name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
            ]);
    
            Auth::login($user);
    
            // ✅ MIGRATE guest cart to this new user
            Cart::where('session_id', session()->getId())
                ->whereNull('user_id')
                ->where('status', 'active')
                ->update([
                    'user_id' => $user->id,
                    'session_id' => null, // optional
                ]);
    
            // ✅ Redirect conditionally
            if ($request->from_page === 'guest') {
                return redirect()->route('guest.login')->with('message', 'Registered successfully. Please log in.');
            }
    
            return redirect('/')->with('showLoginModal', true);
    
        } catch (\Exception $e) {
            Log::error('User creation failed: ' . $e->getMessage());
            return back()->withErrors(['register' => 'Something went wrong while creating your account.']);
        }
    }

    public function appUserLogin(Request $request){

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $user = AppUser::where('email', $request->email)->first();
    
        if (!$user) {
            return back()->with('login_modal_error', 'User not found.');
        }
    
        if (!Hash::check($request->password, $user->password)) {
            return back()->with('login_modal_error', 'Password mismatch.');
        }
    
        // ✅ Migrate guest cart to logged-in user
        Cart::where('session_id', $request->session()->getId())
            ->whereNull('user_id')
            ->where('status', 'active')
            ->update([
                'user_id' => $user->user_id,
                'session_id' => null,
            ]);
    
        Auth::login($user);
        $request->session()->regenerate();
    
        // ✅ Redirect to cart page if coming from guest
        if ($request->from_page === 'guest') {
            return redirect()->route('cart.index'); // 👈 Update to your actual cart route name
        }
    
        return redirect()->intended('/');
    }
    
    $cartItems = Cart::where('status', 'active')
    ->where(function ($q) {
        if (Auth::check()) {
            $q->where('user_id', Auth::id());
        } else {
            $q->where('session_id', session()->getId());
        }
    })
    ->get();

    // ✅ Store buy-now data for post-payment order placement
    session([
        'is_buy_now' => true,
        'buy_now_data' => [
            'product_id' => $product->product_id,
            'quantity' => $quantity,
            'size' => $size,
        ],
    ]);


    public function paymentSuccess(Request $request){
        $transaction = (new TelrManager)->handleTransactionResponse($request);
        $categories = Category::all();
        $customerId = session('customer_id');
        $customer = Customer::find($customerId);
    
        if (!$customer) {
            return redirect()->route('checkout')->with('error', 'Customer not found.');
        }
    
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
            ]);
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
            $order = $this->placeOrder($customer, false, $cartItems);
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
    
        return view('frontend.payment-success', compact('transaction', 'categories', 'order'));
    }
    

     public function salesReport(){
         
        $categories = Category::all();
        $products = Product::all();
        
        $orders = [];

        if ($request->has('generate')) {
            $query = Order::with('orderItems.product', 'customer')->where('status', 'paid');
    
            if ($request->category_id) {
                $query->whereHas('orderItems.product.category', function ($q) use ($request) {
                    $q->where('category_id', $request->category_id);
                });
            }
    
            if ($request->product_id) {
                $query->whereHas('orderItems', function ($q) use ($request) {
                    $q->where('product_id', $request->product_id);
                });
            }
    
            if ($request->start_date) {
                $query->whereDate('created_at', '>=', $request->start_date);
            }
    
            if ($request->end_date) {
                $query->whereDate('created_at', '<=', $request->end_date);
            }
    
            $orders = $query->get();
        }
    
        return view('admin.reports.custom', compact('categories', 'products', 'orders'));

    }

    
            <div class="row">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30 pt-4">
                        <div class="white_card_body">
                            <div class="QA_section">
                                <div class="white_box_tittle list_header">
                                    <h4>📋 Custom Sales Report</h4>
                                    <div class="box_right d-flex lms_block">
                                        <div>
                                            <a href="{{ route('admin.custom.report') }}" class="btn_1">Reset Filters</a>
                                        </div>
                                    </div>
                                </div>
            
                                <form method="GET" action="{{ route('admin.custom.report') }}" class="row g-3 mb-4">
                                    <div class="col-md-3">
                                        <label>Category</label>
                                        <select name="category_id" class="form-select">
                                            <option value="">All Categories</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Product</label>
                                        <select name="product_id" class="form-select">
                                            <option value="">All Products</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}" {{ request('product_id') == $product->id ? 'selected' : '' }}>
                                                    {{ $product->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Start Date</label>
                                        <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                                    </div>
                                    <div class="col-md-2">
                                        <label>End Date</label>
                                        <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                                    </div>
                                    <div class="col-md-2 d-flex align-items-end">
                                        <button type="submit" name="generate" class="btn_1 w-100">Generate</button>
                                    </div>
                                </form>
            
                                <div class="QA_table mb_30">
                                    @if(count($orders))
                                        <h5>🧾 Report Results ({{ count($orders) }} Orders)</h5>
                                        <div class="table-responsive">
                                            <table class="table lms_table_active">
                                                <thead>
                                                    <tr>
                                                        <th>#Order ID</th>
                                                        <th>Customer</th>
                                                        <th>Product(s)</th>
                                                        <th>Total</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orders as $order)
                                                        <tr>
                                                            <td>{{ $order->id }}</td>
                                                            <td>{{ $order->customer->first_name ?? 'Guest' }} {{ $order->customer->last_name ?? '' }}</td>
                                                            <td>
                                                                @foreach($order->orderItems as $item)
                                                                    <div>{{ $item->product->name ?? 'N/A' }} x {{ $item->quantity }}</div>
                                                                @endforeach
                                                            </td>
                                                            <td>₹{{ number_format($order->total, 2) }}</td>
                                                            <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @elseif(request()->has('generate'))
                                        <div class="alert alert-warning mt-3">No orders found for selected criteria.</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    $cartItem = Cart::findOrFail($cartId);
    $cartItem->delete();

    if (request()->ajax()) {
        $userId = auth()->id();
        $sessionId = session()->getId();

        $carts = \App\Models\Cart::where(function($query) use ($userId, $sessionId) {
            if ($userId) {
                $query->where('user_id', $userId);
            } else {
                $query->where('session_id', $sessionId);
            }
        })->get();

        $subtotal = $carts->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        return response()->json([
            'success' => true,
            'message' => 'Item removed from cart',
            'subtotal' => $subtotal
        ]);
    } else {
        return redirect()->back()->with('success', 'Cart item deleted successfully');
    }

<script>
    $(document).ready(function () {
        $('.tf-mini-cart-remove').on('click', function () {
            const cartId = $(this).data('id');
            const csrfToken = $('meta[name="csrf-token"]').attr('content');
            const item = $(this).closest('.tf-mini-cart-item');
    
            fetch(`{{ url('/cart-remove-modal') }}/${cartId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(async response => {
                const contentType = response.headers.get('content-type');
                if (contentType && contentType.includes('application/json')) {
                    const data = await response.json();
                    if (data.success) {
                        item.remove();
                        const subtotalElement = $('.tf-totals-total-value');
                        if (subtotalElement.length) {
                            subtotalElement.text('AED' + parseFloat(data.subtotal).toFixed(2));
                        }
            
                        if (parseFloat(data.subtotal) === 0) {
                            $('.tf-mini-cart-items').html('<p class="text-center">Your cart is currently empty.</p>');
                        }
                    } else {
                        alert('Cart remove failed.');
                    }
                } else {
                    console.error("Expected JSON, got:", await response.text());
                    alert("Something went wrong. Check console.");
                }
            })
            .catch(error => {
                console.error("Cart remove failed:", error);
            });
        });
    });
</script>
  