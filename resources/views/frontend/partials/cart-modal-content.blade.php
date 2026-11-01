 
 
 
 <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head> 
                <div class="wrap">
                    <div class="tf-mini-cart-threshold">
                       
                        <div class="tf-progress-msg">
                            Buy <span class="price fw-6">AED150.00</span> more to enjoy <span class="fw-6">Free
                                Shipping</span>
                        </div>
                    </div>
                    <div class="tf-mini-cart-wrap">
                        <div class="tf-mini-cart-main">
                            <div class="tf-mini-cart-sroll">
                                <div class="tf-mini-cart-items">
                                    @forelse ($carts as $cart)
                                        <div class="tf-mini-cart-item">
                                            <div class="tf-mini-cart-image">
                                                <a href="{{ route('product.details', $cart->product->product_id) }}">
                                                    <img src="{{ asset('assets/img/' . $cart->product->image) }}" alt="{{ $cart->product->name }}">
                                                </a>
                                            </div>
                                            <div class="tf-mini-cart-info">
                                                <a class="title link" href="{{ route('product.details', $cart->product->product_id) }}">
                                                    {{ $cart->product->name }}
                                                </a>
                                
                                                @if($cart->size)
                                                    <div class="meta-variant">Size: {{ $cart->size }}</div>
                                                @endif
                                
                                                <div class="price fw-6">AED{{ number_format($cart->price, 2) }}</div>
                                                
                                                <div class="item-total fw-6 d-none" data-cart-id="{{ $cart->cart_id }}">
                                                    AED{{ number_format($cart->price * $cart->quantity, 2) }}
                                                </div>
                                                
                                
                                                <div class="tf-mini-cart-btns">
                                                    <div class="wg-quantity small">
                                                        <span class="btn-quantity minus-btn" data-id="{{ $cart->cart_id }}">-</span>
                                                        <input type="text" name="quantity" value="{{ $cart->quantity }}" readonly>
                                                        <span class="btn-quantity plus-btn" data-id="{{ $cart->cart_id }}">+</span>
                                                    </div>
                                                    <div class="tf-mini-cart-remove" data-id="{{ $cart->cart_id }}" style="cursor: pointer;" title="Remove item">
                                                         <span class="icon icon-delete" style="display:block;"></span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                         <div class="tf-page-cart text-center mt_73 mb_151">
                                            <h5 class="mb_24">Your cart is empty</h5>
                                             <p class="mb_24">You may check out all the available products and buy some in the shop</p>
                                             <a href="{{route('shop')}}" class="tf-btn btn-sm radius-3 btn-fill btn-icon animate-hover-btn">Return to shop<i class="icon icon-arrow1-top-left"></i></a>
                                        </div> 
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="tf-mini-cart-bottom">
                                
                            <div class="tf-mini-cart-bottom-wrap">
                                <div class="tf-cart-totals-discounts">
                                    <div class="tf-cart-total">Subtotal</div>
                                    <div class="tf-totals-total-value fw-6 subtotal-display">
                                        AED{{ number_format($carts->sum(function($cart) { return $cart->price * $cart->quantity; }), 2) }}
                                    </div>                      
                                </div>
                                <div class="tf-cart-tax">Taxes and <a href="#">shipping</a> calculated at checkout</div>
                                <div class="tf-mini-cart-line"></div>
                                <div class="tf-cart-checkbox">
                                    <div class="tf-checkbox-wrapp">
                                        <input class="" type="checkbox" id="CartDrawer-Form_agree"
                                            name="agree_checkbox">
                                        <div>
                                            <i class="icon-check"></i>
                                        </div>
                                    </div>
                                    <label for="CartDrawer-Form_agree">
                                        I agree with the
                                        <a href="{{route('terms.condition')}}" title="Terms of Service">terms and conditions</a>
                                    </label>
                                </div>
                                <div class="tf-mini-cart-view-checkout">
                                    <a href="{{  route('view.cart')  }}"
                                        class="tf-btn btn-outline radius-3 link w-100 justify-content-center">View
                                        cart</a>
                                    <a href="{{ auth()->check() ? route('checkout') : route('guest.login') }}"
                                        class="tf-btn btn-fill animate-hover-btn radius-3 w-100 justify-content-center"><span>Check
                                            out</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

           
<script>
    $(document).on('click', '.tf-mini-cart-remove', function () {
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
                        $('.tf-mini-cart-items').html(`
                            <div class="tf-page-cart text-center mt_73 mb_151">
                                <h5 class="mb_24">Your cart is empty</h5>
                                <p class="mb_24">You may check out all the available products and buy some in the shop</p>
                                <a href="{{ route('shop') }}" class="tf-btn btn-sm radius-3 btn-fill btn-icon animate-hover-btn">
                                   Return to shop<i class="icon icon-arrow1-top-left"></i>
                                </a>
                            </div>
                        `);
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
</script>
<script>
    $(document).ready(function() {
        
        $('.btn-quantity').click(function() {
            const cartId = $(this).data('id');
            const isPlusBtn = $(this).hasClass('plus-btn');
            const input = $(this).siblings('input[name="quantity"]');
            let quantity = parseInt(input.val());
            
            // Update quantity
            if (isPlusBtn && quantity < 100) {
                quantity++;
            } else if (!isPlusBtn && quantity > 1) {
                quantity--;
            } else {
                return; // Don't proceed if at min/max
            }
            
            // Send AJAX request
            $.ajax({
                url: '/cart/update',
                method: 'POST',
                data: {
                    cart_id: cartId,
                    quantity: quantity,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        // Update input value
                        input.val(response.quantity);
                        
                        // Update item total (make sure you have this element in your HTML)
                        $(`.item-total[data-cart-id="${cartId}"]`).text('AED' + response.item_total);
                        
                        // Update subtotal
                        $('.subtotal-display').text('AED' + response.subtotal);
                        
                        // Optional: Show success message
                        // alert('Cart updated successfully!');
                    } else {
                        alert('Error: ' + (response.message || 'Failed to update cart'));
                    }
                },
                error: function(xhr) {
                    let errorMsg = 'An error occurred while updating the cart.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMsg = xhr.responseJSON.message;
                    }
                    alert(errorMsg);
                    console.error('Error details:', xhr.responseText);
                }
            });
        });
    });
</script>         