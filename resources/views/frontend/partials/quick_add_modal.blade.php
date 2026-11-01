<style>
    .size-btn {
       padding: 0.4rem 0.8rem;
       border-radius: 6px;
       cursor: pointer;
    }
    .size-btn.active, .size-btn:hover {
        background-color: #000;
        color: #fff;
    }
.modal-backdrop {
    z-index: 1040 !important;
}



</style>

<div class="modal fade" id="quickAddModal-{{ $product->product_id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            <div class="header d-flex justify-content-end">
                <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
            </div>
            <form action="{{ route('cart.store') }}"class="quick-add-form" method="POST" data-product-id="{{ $product->product_id }}">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                <div class="wrap">
                    <div class="tf-product-info-item d-flex gap-3 mb-3">
                        <div class="image" style="width: 120px;">
                            <img src="{{ asset('assets/img/' . $product->image) }}" alt="" class="img-fluid rounded">
                        </div>
                        <div class="content">
                            <a href="{{ route('product.details', $product->product_id) }}" class="fw-bold fs-5 d-block">{{ $product->title }}</a>
                            <div class="tf-product-info-price d-flex align-items-center gap-2 mt-2">
                                <div class="price-on-sale text-danger fw-bold fs-4">AED{{ $product->price }}</div>
                                @if($product->sale_price)
                                    <div class="compare-at-price text-muted text-decoration-line-through">AED{{ $product->sale_price }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Sizes --}}
                    @php
                        $availableSizes = json_decode($product->size, true) ?? [];
                        $defaultSize = $availableSizes[0] ?? null;
                        $sizeShortForms = ['small'=>'S','medium'=>'M','large'=>'L','extra large'=>'XL','extra_small'=>'XS'];
                        $getShortForm = fn($size) => $sizeShortForms[strtolower(trim($size))] ?? strtoupper($size);
                    @endphp

                    <div class="variant-picker-item mb-3">
                        <div class="variant-picker-label mb-2 fw-6">
                            Size: <span class="variant-picker-label-value">{{ $getShortForm($defaultSize) }}</span>
                        </div>
                        <div class="variant-picker-values d-flex gap-2">
                            @foreach ($availableSizes as $index => $size)
                                @php $inputId = 'size-' . $product->id . '-' . $index; @endphp
                                <input type="radio" name="size" id="{{ $inputId }}" value="{{ $size }}" class="d-none" {{ $index == 0 ? 'checked' : '' }}>
                                <label for="{{ $inputId }}" class="btn btn-outline-dark btn-sm size-btn">{{ $getShortForm($size) }}</label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Quantity --}}
                    <div class="tf-product-info-quantity mb-3">
                        <label class="fw-6 mb-1">Quantity</label>
                        <div class="d-flex align-items-center gap-2">
                            <span class="btn btn-outline-secondary btn-sm minus-btn">-</span>
                            <input type="number" name="quantity" value="1" min="1" class="form-control text-center" style="width: 60px;">
                            <span class="btn btn-outline-secondary btn-sm plus-btn">+</span>
                        </div>
                    </div>

                    {{-- Add to cart --}}
                    <div class="tf-product-info-buy-button mt-4">
                        <button type="submit" id="add-to-cart-btn-{{ $product->product_id }}"  class="btn btn-dark w-100 fw-bold fs-6">
                            Add to Cart - AED{{ $product->price }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add this line BEFORE your script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>

    $(document).off('submit', '.quick-add-form').on('submit', '.quick-add-form', function (e) {
        e.preventDefault();

        let form = $(this);

        // Prevent multiple submissions
        if (form.data('submitting')) return;
        form.data('submitting', true);

        let submitButton = form.find('button[type="submit"]');
        submitButton.prop('disabled', true).text('Adding...');

        let productId = form.data('product-id');
        let quantity = form.find('input[name="quantity"]').val();
        let size = form.find('input[name="size"]:checked').val();

        console.log('Submitting cart for product:', productId);

        $.ajax({
            url: '{{ route("cart.store") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                product_id: productId,
                quantity: quantity,
                size: size
            },
            success: function (response) {
                console.log('isLoggedIn:', isLoggedIn);
                const redirectUrl = isLoggedIn === 'true' ? viewCartUrl : guestLoginUrl;
                if (response.success) {
                   
                    form.find('.tf-product-info-buy-button').html(`
                        <a href="${redirectUrl}" class="btn btn-dark w-100 fw-bold fs-6">
                            Go to Cart
                        </a>
                    `);
                    if (response.cart_count !== undefined) {
                        $('#cart-count').text(response.cart_count);
                    }
                }
            },
            error: function (xhr) {
                alert('Something went wrong');
                console.error(xhr.responseText);
                submitButton.prop('disabled', false).text('Add to Cart');
                form.removeData('submitting');
            }
        });
    });
</script>



