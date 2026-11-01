<?php
require_once('vendor/autoload.php');

$client = new \GuzzleHttp\Client();

$response = $client->request('POST', 'https://secure.telr.com/gateway/order.json', [
  'body' => '{"method":"check","store":1234,"authkey":"mykey1234","order":{"ref":"3B84FA85ADA9CF8124FB1DE4F2AF6182FA5F7A826C54A72DCE89078312E32ABC"}}',
  'headers' => [
    'Content-Type' => 'application/json',
    'accept' => 'application/json',
  ],
]);

echo $response->getBody();

/*code for the integration of payments*/

/*json */
{
  "method": "create",
  "store": 1234,
  "authkey": "mykey1234",
  "framed": 0,
  "order": {
    "cartid": "1234",
    "test": "1",
    "amount": "10.50",
    "currency": "AED",
    "description": "My purchase"
  },
  "return": {
    "authorised": "https://www.mysite.com/authorised",
    "declined": "https://www.mysite.com/declined",
    "cancelled": "https://www.mysite.com/cancelled"
  }
}

Store ID: 32644 - YAMMEKER FOR IMITATION JEWELLERY TRADING
Store name:	YAMMEKER FOR IMITATION JEWELLERY TRADING
Email address:	yamekeruae@gmail.com
Store URL:	http://yameker.ae/
Customer support URL:	
Currencies
Test mode:	AED
Live mode:	AED

Store ID	32644
Authentication Key	p897~FTMfx-FprzN

 public function telrPayment()
{
    $telrData = [
        "method" => "create",
        "store" => env("TELR_STORE_ID"),
        "authkey" => env("TELR_AUTH_KEY"),
        "framed" => 0,
        "order" => [
            "cartid" => Str::random(10),
            "test" => "1", // Change to "0" in production
            "amount" => session('grand_total'), // Set from confirmPayment
            "currency" => "AED",
            "description" => "Purchase on MySite"
        ],
        "return" => [
            "authorised" => route("telr.success"),
            "declined" => route("telr.declined"),
            "cancelled" => route("telr.cancelled")
        ]
    ];

    $client = new \GuzzleHttp\Client();
    $response = $client->post('https://secure.telr.com/gateway/order.json', [
        'headers' => ['Content-Type' => 'application/json'],
        'body' => json_encode($telrData)
    ]);

    $body = json_decode($response->getBody(), true);

    if (isset($body['order']['url'])) {
        return redirect($body['order']['url']);
    }

    return back()->with('error', 'Telr payment initialization failed.');
}
Date 	12 Jun 2025 11:24
Source 	Payment Page (V2)
Description 	Connection from unauthorised IP (103.175.88.84)
Additional details
ivp_store 	32644
*ivp_authkey 	****************
ivp_test 	-- not set --
ivp_currency 	-- not set --
ivp_amount 	-- not set --
ivp_cart 	-- not set --
ivp_desc 	-- not set --
ivp_trantype 	-- not set --
ivp_framed 	0
ivp_lang 	-- not set --
return_auth 	-- not set --
return_decl 	-- not set --
return_can 	-- not set --
ivp_update_url 	-- not set --
bill_title 	-- not set --
bill_fname 	-- not set --
bill_sname 	-- not set --
bill_addr1 	-- not set --
bill_addr2 	-- not set --
bill_addr3 	-- not set --
bill_city 	-- not set --
bill_region 	-- not set --
bill_country 	-- not set --
bill_zip 	-- not set --
bill_phone 	-- not set --
bill_email 	-- not set --
bill_custref 	-- not set --
Connection Details
HTTP Referer 	-- not set --
Content Type 	application/json
User Agent 	GuzzleHttp/7
IP Address 	103.175.88.84
Trace 	4001/1949434/684a80c2
[2025-06-12 07:31:59] local.INFO: Telr Request Data: {"ivp_method":"create","ivp_store":"****","ivp_authkey":"*************","ivp_cart":"VJI51QPKU2RS","ivp_amount":"1294.42","ivp_currency":"AED","ivp_test":"1","ivp_desc":"Purchase on MySite","ivp_trantype":"sale","ivp_framed":0,"return_auth":"http://localhost/payment/success","return_decl":"http://localhost/payment/declined","return_can":"http://localhost/payment/cancel","bill_fname":"admin","bill_sname":"sub","bill_addr1":"wwwwwwwwwwwwww","bill_city":"hghghj","bill_region":"127","bill_country":"1225","bill_email":"admin@abc","bill_phone":"123456789"} 
3 – Handle Telr’s return (authorised / declined / cancelled)
php
Copy
Edit
    public function success(Request $request)
    {
        // Telr sends ?orderid=XXXXXXXX
        $ref = $request->query('orderid');

        // 1. Double‑check the payment with “check”
        $check = Http::post('https://secure.telr.com/gateway/order.json', [
            "method"  => "check",
            "store"   => env('TELR_STORE_ID'),
            "authkey" => env('TELR_AUTH_KEY'),
            "order"   => ["ref" => $ref],
        ])->json();

        // 2. If authorised (status code 3 = paid)
        $status = $check['order']['status']['code'] ?? 0;
        $cartId = $check['order']['cartid'] ?? null;

        $order = Order::where('order_number', $cartId)->firstOrFail();

        if ($status == 3) {               // authorised
            $order->update([
                'payment_status' => 'paid',
                'status'         => 'processing',
                'payment_method' => 'telr',
            ]);
            // optional: email confirmation, clear cart, etc.
            return view('payments.success', compact('order'));
        }

        // Anything else = failed
        return redirect()->route('payment.telr.declined')
                         ->with('error','Payment not authorised.');
    }

    public function declined()  { return view('payments.declined');  }
    public function cancelled() { return view('payments.cancelled'); }
}
Telr’s docs: hosted‑page create parameters & status codes 
docs.telr.com
docs.telr.com

Example PHP “check” and “create” calls similar to above 
dev.to

Open‑source Laravel wrapper (optional alternative to raw Guzzle) 
github.com

  $('#billingForm').on('submit', function (e) {
    e.preventDefault();
    let form = $(this);

    $.ajax({
        type: "POST",
        url: form.attr('action'),
        data: form.serialize(),
        success: function (response) {
            if (response.success) {
                // Better: reload to reflect saved session & hide form
                location.reload();
            }
        },
        error: function (xhr) {
            console.error(xhr.responseText);
        }
    });
});
public function saveAddress(Request $request){
        
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

    // Find existing or create new
    $customer = Customer::where('user_id', Auth::id())
        ->orWhere('session_id', session()->getId())
        ->latest()
        ->first();

    if (!$customer) {
        $customer = new Customer();
        $customer->user_id = Auth::id(); // for logged in user
        $customer->session_id = session()->getId(); // for guest
    }

    // Fill/update billing info
    $customer->first_name = $validated['first-name'];
    $customer->last_name = $validated['last-name'];
    $customer->country = $validated['country'];
    $customer->state = $validated['state'];
    $customer->city = $validated['city'];
    $customer->address = $validated['address'];
    $customer->phone = $validated['phone'];
    $customer->email = $validated['email'];
    
    $customer->save();

    // Store customer_id in session
    session([
        'customer_id' => $customer->customer_id,
        'is_buy_now' => $request->has('buy_now'),
        'buy_now_product_id' => $request->input('product_id'),
        'buy_now_quantity' => $request->input('quantity'),
        'buy_now_size' => $request->input('size'),
    ]);
    Log::info('Billing Request:', $request->all());


    return response()->json(['success' => true]);
}


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const quantityInput = document.querySelector(".quantity-product");
        const btnIncrease = document.querySelector(".btn-increase");
        const btnDecrease = document.querySelector(".btn-decrease");
        const totalPriceElement = document.querySelector(".total-price");

        // Make sure we get only the number from data-price
        const basePrice = parseFloat(totalPriceElement.getAttribute("data-price"));

        function sanitizeQuantity() {
            let qty = parseInt(quantityInput.value);
            if (isNaN(qty) || qty < 1) qty = 1;
            quantityInput.value = qty; // reset if invalid
            return qty;
        }

        function updateTotalPrice() {
            const qty = sanitizeQuantity();
            const total = (qty * basePrice).toFixed(2);
            totalPriceElement.textContent = "AED " + total;
        }

        btnIncrease.addEventListener("click", () => {
            quantityInput.value = sanitizeQuantity() + 1;
            updateTotalPrice();
        });

        btnDecrease.addEventListener("click", () => {
            quantityInput.value = Math.max(1, sanitizeQuantity() - 1);
            updateTotalPrice();
        });

        quantityInput.addEventListener("input", updateTotalPrice);

        // Initialize total price on load
        updateTotalPrice();
    });
</script>
<script>
    <script>
    $(document).ready(function () {
        function updateTotalPrice() {
            const pricePerUnit = parseFloat($('.total-price').data('price'));
            const quantity = parseInt($('.quantity-product').val()) || 1;
            const total = (pricePerUnit * quantity).toFixed(2);
            $('.total-price').text(total);
        }

        // On increase button
        $('.btn-increase').on('click', function () {
            let input = $(this).siblings('input.quantity-product');
            let value = parseInt(input.val()) || 1;
            input.val(value + 1);
            updateTotalPrice();
        });

        // On decrease button
        $('.btn-decrease').on('click', function () {
            let input = $(this).siblings('input.quantity-product');
            let value = parseInt(input.val()) || 1;
            if (value > 1) input.val(value - 1);
            updateTotalPrice();
        });

        // Also update on manual input
        $('.quantity-product').on('input', function () {
            updateTotalPrice();
        });
    });
</script>




 <section class="flat-spacing-2">
            <div class="container">
                <div class="grid-layout wrapper-shop" data-grid="grid-4">
                    <!-- card product 1 -->
                    @foreach($wishlists as $wishlist)
                        @if ($wishlist->product)
                            <div class="card-product">
                                <div class="card-product-wrapper">
                                    <a href="{{ route('product.details', $wishlist->product->product_id) }}" class="product-img">
                                        <img class="lazyload img-product"
                                             data-src="{{ asset('assets/img/' . $wishlist->product->image) }}"
                                             src="{{ asset('assets/img/' . $wishlist->product->image) }}"
                                             alt="{{ $wishlist->product->name }}">
                                        <img class="lazyload img-hover"
                                             data-src="{{ asset('assets/img/' . $wishlist->product->image)  }}"
                                             src="{{ asset('assets/img/' . $wishlist->product->image ) }}"
                                             alt="{{ $wishlist->product->name }}">
                                    </a>
                        
                                    <div class="list-product-btn type-wishlist">
                                        <a href="javascript:void(0);"
                                           class="box-icon bg_white wishlist-remove"
                                           data-wishlist-id="{{ $wishlist->wishlist_id }}">
                                            <span class="tooltip">Remove Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                    </div>
                        
                                    <div class="list-product-btn">
                                        <a href="#quick_add" data-bs-toggle="modal"
                                           class="box-icon bg_white quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Quick Add</span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas"
                                           aria-controls="offcanvasLeft"
                                           class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal"
                                           class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                        
                                <div class="card-product-info">
                                    <a href="{{ route('product.details', $wishlist->product->slug) }}"
                                       class="title link">{{ $wishlist->product->name }}</a>
                                    <span class="price">₹{{ $wishlist->product->price }}</span>
                        
                                    {{-- Example color swatches --}}
                                    
                                    @if(is_array($product->colors ?? null))
                                        <ul class="list-color-product">
                                            @foreach($product->colors as $color)
                                                <li class="list-color-item color-swatch {{ $loop->first ? 'active' : '' }}">
                                                    <span class="tooltip">{{ ucfirst($color['name']) }}</span>
                                                    <span class="swatch-value {{ $color['class'] }}"></span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        </section>

        /*order attachment with tlr */
        public function telrSuccess(Request $request)
{
    $orderId = session('order_id');
    $order = Order::find($orderId);

    if ($order) {
        $order->payment_status = 'paid';
        $order->save();

        // Clear session data if needed
        session()->forget(['order_id', 'is_buy_now', 'buy_now_product_id', 'buy_now_quantity', 'buy_now_size']);
    }

    return view('frontend.success', compact('order'));
}
/*call order frpm paymentconfirmation*/ 
$order = $this->placeOrder($customer, $isBuyNow, $cartItems, [
    'product' => $product,
    'quantity' => $quantity,
    'size' => session('buy_now_size'),
]);

162.241.85.99

/*login logout toolbar account */
 <div class="toolbar-item">
            @auth
                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}" class="toolbar-form">
                    @csrf
                    <button type="submit" class="toolbar-button">
                        <div class="toolbar-icon">
                            <i class="icon-account"></i>
                        </div>
                        <div class="toolbar-label1">Logout</div>
                    </button>
                </form>
            @else
                <!-- Login -->
                <a href="#login" data-bs-toggle="modal" class="d-flex flex-column align-items-center justify-content-center w-100 h-100">
                    <div class="toolbar-icon">
                        <i class="icon-account"></i>
                    </div>
                    <div class="toolbar-label">Login</div>
                </a>
            @endauth
        </div>
        <section class="flat-spacing-11">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="wrap-sidebar-account">
                            <ul class="my-account-nav">
                                <li><a href="my-account.html" class="my-account-nav-item ">Dashboard</a></li>
                                <li><a href="my-account-orders.html" class="my-account-nav-item">Orders</a></li>
                                <li><a href="my-account-address.html" class="my-account-nav-item">Address</a></li>
                                <li><a href="my-account-edit.html" class="my-account-nav-item">Account Details</a></li>
                                <li><span class="my-account-nav-item active">Wishlist</span></li>
                                <li><a href="login.html" class="my-account-nav-item">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-9">
                        <div class="my-account-content account-wishlist">
                            <div class="grid-layout wrapper-shop" data-grid="grid-4">
                                <!-- card product 1 -->
                                @foreach($wishlists as $wishlist)
                                    @if ($wishlist->product)
                                        <div class="card-product">
                                            <div class="card-product-wrapper">
                                                <a href="{{ route('product.details', $wishlist->product->product_id) }}" class="product-img">
                                                    <img class="lazyload img-product"
                                                         data-src="{{ asset('public/assets/img/' . $wishlist->product->image) }}"
                                                         src="{{ asset('public/assets/img/' . $wishlist->product->image) }}"
                                                         alt="{{ $wishlist->product->name }}">
                                                    <img class="lazyload img-hover"
                                                         data-src="{{ asset('public/assets/img/' . $wishlist->product->image)  }}"
                                                         src="{{ asset('public/assets/img/' . $wishlist->product->image ) }}"
                                                         alt="{{ $wishlist->product->name }}">
                                                </a>
                                    
                                                <div class="list-product-btn type-wishlist">
                                                    <a href="javascript:void(0);"
                                                       class="box-icon bg_white wishlist-remove"
                                                       data-wishlist-id="{{ $wishlist->wishlist_id }}">
                                                        <span class="tooltip">Remove Wishlist</span>
                                                        <span class="icon icon-delete"></span>
                                                    </a>
                                                </div>
                                    
                                                <div class="list-product-btn">
                                                    <a href="#" data-bs-toggle="modal"  data-bs-target="#quickAddModal-{{ $wishlist->product->product_id }}"  class="box-icon bg_white quick-add tf-btn-loading">
                                                        <span class="icon icon-bag"></span>
                                                        <span class="tooltip">Quick Add</span>
                                                    </a>
                                                    
                                                    <a href="#quick_view" data-bs-toggle="modal"
                                                       class="box-icon bg_white quickview tf-btn-loading">
                                                        <span class="icon icon-view"></span>
                                                        <span class="tooltip">Quick View</span>
                                                    </a>
                                                </div>
                                            </div>
                                    
                                            <div class="card-product-info">
                                                <a href="{{ route('product.details', $wishlist->product->product_id) }}"
                                                   class="title link">{{ $wishlist->product->name }}</a>
                                                <span class="price">AED{{ $wishlist->product->price }}</span>
                                    
                                                {{-- Example color swatches --}}
                                                
                                                @if(is_array($product->colors ?? null))
                                                    <ul class="list-color-product">
                                                        @foreach($product->colors as $color)
                                                            <li class="list-color-item color-swatch {{ $loop->first ? 'active' : '' }}">
                                                                <span class="tooltip">{{ ucfirst($color['name']) }}</span>
                                                                <span class="swatch-value {{ $color['class'] }}"></span>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
         <!-- /Section Product -->
        