@foreach($products as $product)
    @php
        $mainImage = asset('assets/img/' . $product->image);
        $galleryImages = json_decode($product->gallery_images, true) ?? [];
        $hoverImage = !empty($galleryImages[0])
            ? asset('assets/img/gallery/' . $galleryImages[0])
            : $mainImage;
    @endphp

    @include('frontend.partials.quick_add_modal', ['product' => $product])

    <div class="card-product grid" data-availability="In stock" data-brand="Ecomus">
        <div class="card-product-wrapper">
            <a href="{{ route('product.details', encrypt($product->product_id)) }}" class="product-img">
                <img class="lazyload img-product" src="{{ $mainImage }}" alt="image-product">
                <img class="lazyload img-hover" src="{{ $hoverImage }}" alt="image-product">
            </a>
            <div class="list-product-btn">
                <a href="#" data-bs-toggle="modal" data-bs-target="#quickAddModal-{{ $product->product_id }}" class="box-icon bg_white quick-add tf-btn-loading">
                    <span class="icon icon-bag"></span>
                    <span class="tooltip">Quick Add</span>
                </a>
                <a href="javascript:void(0);" class="box-icon bg_white wishlist wishlist-add btn-icon-action" data-product-id="{{ $product->product_id }}">
                    @if (in_array($product->product_id, $wishlist))
                        <span class="icon icon-delete"></span>
                        <span class="tooltip">Remove from Wishlist</span>
                    @else
                        <span class="icon icon-heart"></span>
                        <span class="tooltip">Add to Wishlist</span>
                    @endif
                </a>
            </div>
        </div>
        <div class="card-product-info">
            <a href="{{ route('product.details', encrypt($product->product_id)) }}" class="title link">{{ $product->name }}</a>
            <span class="price current-price">
                <img src="{{ asset('files/images/logo/dirham_logo.png') }}" alt="AED" class="currency-logo">
                  {{ $product->price }}
            </span>
        </div>
    </div>
@endforeach

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('click', function (e) {
        if (e.target.closest('.wishlist-add')) {
            const btn = e.target.closest('.wishlist-add');
            const productId = btn.dataset.productId;

            fetch(`{{ url('/wishlist-store') }}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ product_id: productId })
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'added') {
                    btn.innerHTML = `
                        <span class="icon icon-delete" style="display:block;"></span>
                        <span class="tooltip">Remove from Wishlist</span>`;
                } else {
                    btn.innerHTML = `
                        <span class="icon icon-heart" style="display:block;"></span>
                        <span class="tooltip">Add to Wishlist</span>`;
                }

                const countBox = document.querySelector('.nav-wishlist .count-box');
                if (countBox) {
                    countBox.textContent = data.count;
                }
            });
        }
    });
</script>
