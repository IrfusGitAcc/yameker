<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Product Details|Yameker</title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- font -->
    <link rel="stylesheet" href="{{asset('files/fonts/fonts.css')}}">
    <link rel="stylesheet" href="{{asset('files/fonts/font-icons.css')}}">
    <link rel="stylesheet" href="{{asset('files/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('files/css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('files/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('files/css/styles.css')}}" />

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{asset('files/images/logo/mini_logo.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('files/images/logo/mini_logo.png')}}">

</head>
<script>
    const isLoggedIn = "{{ auth()->check() ? 'true' : 'false' }}";
    const viewCartUrl = "{{ route('view.cart') }}";
    const guestLoginUrl = "{{ route('guest.login') }}";
</script>

<body class="preload-wrapper">
    <!-- RTL -->
    
    <!-- /RTL  -->
    <!-- preload -->
    <div class="preload preload-container">
        <div class="preload-logo">
            <div class="spinner"></div>
        </div>
    </div>
    <!-- /preload -->
    <div id="wrapper">

        <!-- Header -->
        <header id="header" class="header-default">
            <div class="px_15 lg-px_40">
                <div class="row wrapper-header align-items-center">
                    <div class="col-md-4 col-3 tf-lg-hidden">
                        <a href="#mobileMenu" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 16"
                                fill="none">
                                <path
                                    d="M2.00056 2.28571H16.8577C17.1608 2.28571 17.4515 2.16531 17.6658 1.95098C17.8802 1.73665 18.0006 1.44596 18.0006 1.14286C18.0006 0.839753 17.8802 0.549063 17.6658 0.334735C17.4515 0.120408 17.1608 0 16.8577 0H2.00056C1.69745 0 1.40676 0.120408 1.19244 0.334735C0.978109 0.549063 0.857702 0.839753 0.857702 1.14286C0.857702 1.44596 0.978109 1.73665 1.19244 1.95098C1.40676 2.16531 1.69745 2.28571 2.00056 2.28571ZM0.857702 8C0.857702 7.6969 0.978109 7.40621 1.19244 7.19188C1.40676 6.97755 1.69745 6.85714 2.00056 6.85714H22.572C22.8751 6.85714 23.1658 6.97755 23.3801 7.19188C23.5944 7.40621 23.7148 7.6969 23.7148 8C23.7148 8.30311 23.5944 8.59379 23.3801 8.80812C23.1658 9.02245 22.8751 9.14286 22.572 9.14286H2.00056C1.69745 9.14286 1.40676 9.02245 1.19244 8.80812C0.978109 8.59379 0.857702 8.30311 0.857702 8ZM0.857702 14.8571C0.857702 14.554 0.978109 14.2633 1.19244 14.049C1.40676 13.8347 1.69745 13.7143 2.00056 13.7143H12.2863C12.5894 13.7143 12.8801 13.8347 13.0944 14.049C13.3087 14.2633 13.4291 14.554 13.4291 14.8571C13.4291 15.1602 13.3087 15.4509 13.0944 15.6653C12.8801 15.8796 12.5894 16 12.2863 16H2.00056C1.69745 16 1.40676 15.8796 1.19244 15.6653C0.978109 15.4509 0.857702 15.1602 0.857702 14.8571Z"
                                    fill="currentColor"></path>
                            </svg>
                        </a>
                    </div>
                    <div class="col-xl-3 col-md-4 col-6">
                        <a href="index.html" class="logo-header">
                            <img src="{{asset('files/images/logo/logo.png')}}" alt="logo" class="logo">
                        </a>
                    </div>
                    <div class="col-xl-6 tf-md-hidden">
                        <nav class="box-navigation text-center">
                            <ul class="box-nav-ul d-flex align-items-center justify-content-center gap-30">
                                <li class="menu-item">
                                    <a href="{{route('home')}}" class="item-link">Home</a>
                                    
                                </li>
                                <li class="menu-item">
                                    <a href="{{route('shop')}}" class="item-link">Products</a>
                                    
                                </li>

                                <li class="menu-item">
                                    <a href="{{route('about.us')}}" class="item-link">About Us</a>
                                    
                                </li>


                                <li class="menu-item">
                                    <a href="{{route('contact.us')}}" class="item-link">Contact Us</a>
                                    
                                </li>

                                
                                <li class="menu-item position-relative">
                                    <a href="#" class="item-link">Account<i class="icon icon-arrow-down"></i></a>
                                    <div class="sub-menu submenu-default">
                                        <ul class="menu-list">
                                            @guest
                                                <li>
                                                    <a href="#login" data-bs-toggle="modal" class="menu-link-text link text_black-2">Login</a>
                                                </li>
                                                <li>
                                                    <a href="#register" data-bs-toggle="modal" class="menu-link-text link text_black-2">Register</a>
                                                </li>
                                            @endguest
                                            @auth
                                                <li><a href="{{route('account')}}" class="menu-link-text link text_black-2">My account</a></li>
                                                <li><a href="{{route('order')}}"class="menu-link-text link text_black-2">My Orders</a></li>
                                                <li><a href="{{route('wishlist')}}"class="menu-link-text link text_black-2">Wishlist</a></li>
                                                <li><a href="{{route('view.cart')}}" class="menu-link-text link text_black-2">Cart</a></li>
                                            @endauth
                                        </ul>
                                    </div>
                                </li>

                            </ul>
                        </nav>
                    </div>
                    <div class="col-xl-3 col-md-4 col-3">
                        <ul class="nav-icon d-flex justify-content-end align-items-center gap-20">
                            <li class="nav-search"><a href="#canvasSearch" data-bs-toggle="offcanvas"
                                    aria-controls="offcanvasLeft" class="nav-icon-item"><i
                                        class="icon icon-search"></i></a></li>
                            <li class="nav-account"> 
                                @auth
                                    {{-- User is logged in --}}
                                    <div class="dropdown">
                                        <a href="#" class="nav-icon-item dropdown-toggle" data-bs-toggle="dropdown">
                                            <i class="icon icon-account"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{route('account')}}">My Profile</a></li>
                                             <li><a class="dropdown-item" href="{{route('order')}}">My Orders</a></li>
                                            <li>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item">Logout</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                @else
                                    {{-- Guest (not logged in) --}}
                                    <a href="#login" data-bs-toggle="modal" class="nav-icon-item">
                                        <i class="icon icon-account"></i>
                                    </a>
                                @endauth
                            </li>

                            <li class="nav-wishlist">
                                <a href="{{ route('wishlist') }}" class="nav-icon-item">
                                    <i class="icon icon-heart"></i>
                                    <span class="count-box" id="wishlist-count">{{ $globalWishlistCount ?? 0 }}</span>
                                </a>
                            </li>
                            
                            <li class="nav-cart">
                                <a href="#shoppingCart" data-bs-toggle="modal" class="nav-icon-item">
                                    <i class="icon icon-bag"></i>
                                    <span class="count-box" id="cart-count">{{ $globalCartCount ?? 0 }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- /Header -->
        <!-- breadcrumb -->
        <div class="tf-breadcrumb">
            <div class="container">
                <div class="tf-breadcrumb-wrap d-flex justify-content-between flex-wrap align-items-center">
                    <div class="tf-breadcrumb-list">
                        <a href="route('home')}}" class="text">Home</a>
                        <i class="icon icon-arrow-right"></i>
                        <a href="{{route('shop')}}" class="text">Products</a>
                        <i class="icon icon-arrow-right"></i>
                        <span class="text">{{$product->name}}</span>
                    </div>
                    <div class="tf-breadcrumb-prev-next">
                        <a href="#" class="tf-breadcrumb-prev hover-tooltip center">
                            <i class="icon icon-arrow-left"></i>
                            <!-- <span class="tooltip">Cotton jersey top</span> -->
                        </a>
                        <a href="#" class="tf-breadcrumb-back hover-tooltip center">
                            <i class="icon icon-shop"></i>
                            <!-- <span class="tooltip">Back to Women</span> -->
                        </a>
                        <a href="#" class="tf-breadcrumb-next hover-tooltip center">
                            <i class="icon icon-arrow-right"></i>
                            <!-- <span class="tooltip">Cotton jersey top</span> -->
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /breadcrumb -->
        <!-- default -->
        <section class="flat-spacing-4 pt_0">
            <div class="tf-main-product section-image-zoom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="tf-product-media-wrap sticky-top">
                                <div class="thumbs-slider">
                                    <!-- Thumbnails -->
                                    <div dir="ltr" class="swiper tf-product-media-thumbs other-image-zoom" data-direction="vertical">
                                        <div class="swiper-wrapper stagger-wrap">
                                            <div class="swiper-slide stagger-item" data-color="{{ $product->color ?? 'default' }}">
                                                <div class="item">
                                                    <img class="lazyload"
                                                         data-src="{{ asset('assets/img/' . $product->image) }}"
                                                         src="{{ asset('assets/img/' . $product->image) }}"
                                                         alt="img-product">
                                                </div>
                                            </div>
                                            @foreach(json_decode($product->gallery_images) as $galleryImage)
                                                <div class="swiper-slide stagger-item" data-color="{{ $product->color ?? 'default' }}">
                                                    <div class="item">
                                                        <img class="lazyload"
                                                             data-src="{{ asset('assets/img/gallery/' . $galleryImage) }}"
                                                             src="{{ asset('assets/img/gallery/' . $galleryImage) }}"
                                                             alt="img-product">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                
                                    <!-- Main Gallery -->
                                    <div dir="ltr" class="swiper tf-product-media-main" id="gallery-swiper-started">
                                        <div class="swiper-wrapper">
                                            <!-- Main Image -->
                                            <div class="swiper-slide" data-color="{{ $product->color ?? 'default' }}">
                                                <a href="{{ asset('assets/img/' . $product->image) }}" target="_blank" class="item"
                                                   data-pswp-width="770px" data-pswp-height="1075px">
                                                    <img class="tf-image-zoom lazyload"
                                                        data-zoom="{{ asset('assets/img/' . $product->image) }}"
                                                        data-src="{{ asset('assets/img/' . $product->image) }}"
                                                        src="{{ asset('assets/img/' . $product->image) }}"
                                                        alt="">
                                                </a>
                                            </div>
                                
                                            <!-- Gallery Images -->
                                            @foreach(json_decode($product->gallery_images) as $galleryImage)
                                                <div class="swiper-slide" data-color="{{ $product->color ?? 'default' }}">
                                                    <a href="{{ asset('assets/img/gallery/' . $galleryImage) }}" target="_blank" class="item"
                                                       data-pswp-width="770px" data-pswp-height="1075px">
                                                        <img class="tf-image-zoom lazyload"
                                                             data-zoom="{{ asset('assets/img/gallery/' . $galleryImage) }}"
                                                             data-src="{{ asset('assets/img/gallery/' . $galleryImage) }}"
                                                             src="{{ asset('assets/img/gallery/' . $galleryImage) }}"
                                                             alt="">
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="swiper-button-next button-style-arrow thumbs-next"></div>
                                        <div class="swiper-button-prev button-style-arrow thumbs-prev"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="tf-product-info-wrap position-relative">
                                <div class="tf-zoom-main"></div>
                                <div class="tf-product-info-list other-image-zoom">
                                    <div class="tf-product-info-title">
                                        <h5>{{ $product->name}}</h5>
                                    </div>
                                    <div class="tf-product-info-badges">
                                        
                                    </div>
                                    <div class="tf-product-info-price">
                                        <div class="price-on-sale">AED{{ $product->price }}</div>
                                       <div class="compare-at-price">AED{{$product->sale_price}}</div>
                                        <!--<div class="badges-on-sale"><span>20</span>% OFF</div>-->
                                    </div>
                                    @php
                                        $availableSizes = json_decode($product->size, true) ?? [];
                                        $availableSizes = array_filter($availableSizes); // remove empty/null values
                                    
                                        $defaultSize = $availableSizes[0] ?? null;
                                    
                                        $sizeShortForms = [
                                            'small' => 'S',
                                            'medium' => 'M',
                                            'large' => 'L',
                                            'extra large' => 'XL',
                                            'extra_large' => 'XL',
                                            'extra small' => 'XS',
                                            'extra_small' => 'XS',
                                        ];
                                    
                                        // Normalized short form function
                                        $getShortForm = function ($size) use ($sizeShortForms) {
                                            $normalized = strtolower(trim($size));
                                            return $sizeShortForms[$normalized] ?? $size;
                                        };
                                    @endphp
                                    
                                    @if (!empty($availableSizes))
                                        <div class="tf-product-info-variant-picker">
                                            <div class="variant-picker-item">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="variant-picker-label">
                                                        Size:
                                                        <span class="fw-6 variant-picker-label-value">{{ $getShortForm($defaultSize) }}</span>
                                                    </div>
                                                </div>
                                    
                                                <div class="variant-picker-values">
                                                    @foreach ($availableSizes as $index => $size)
                                                        @php
                                                            $inputId = 'values-' . strtolower(preg_replace('/\s+/', '-', $size));
                                                        @endphp
                                                        <input type="radio" name="size1" id="{{ $inputId }}" value="{{ $size }}" {{ $index === 0 ? 'checked' : '' }}>
                                                        <label class="style-text size-btn" for="{{ $inputId }}" data-value="{{ $size }}">
                                                            <p>{{ $getShortForm($size) }}</p>
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @php
                                        $colors = json_decode($product->colors, true) ?? [];
                                        $colors = array_filter(array_map('trim', $colors));
                                    
                                        function getColorStyle($name) {
                                            $safeName = strtolower(trim($name));
                                            $validCssColors = ['white', 'black', 'red', 'green', 'blue', 'silver', 'tan', 'gray', 'beige', 'yellow', 'pink', 'orange', 'purple', 'brown'];
                                            return in_array($safeName, $validCssColors)
                                                ? $safeName
                                                : '#' . substr(md5($name), 0, 6); // Fallback: generate consistent hex
                                        }
                                    @endphp
                                    
                                    @if (!empty($colors))
                                        <div class="tf-product-info-variant-picker">
                                            <div class="variant-picker-item">
                                                <div class="variant-picker-label">
                                                    Color:
                                                    <span class="fw-6 variant-picker-label-value value-currentColor">{{ $colors[0] ?? '' }}</span>
                                                </div>
                                    
                                                <div class="variant-picker-values">
                                                    @foreach ($colors as $index => $color)
                                                        @php
                                                            $inputId = 'values-' . \Illuminate\Support\Str::slug($color);
                                                            $bgColor = getColorStyle($color);
                                                        @endphp
                                                        <input type="radio" id="{{ $inputId }}" name="color1" value="{{ $color }}" {{ $index === 0 ? 'checked' : '' }}>
                                                        <label class="hover-tooltip radius-60 color-btn" for="{{ $inputId }}"
                                                               data-color="{{ $color }}" data-value="{{ $color }}">
                                                            <span class="btn-checkbox background-color: {{ $bgColor }}"></span>
                                                            <span class="tooltip">{{ $color }}</span>
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif


                                    <div class="tf-product-info-quantity">
                                        <div class="quantity-title fw-6">Quantity</div>
                                        <div class="wg-quantity">
                                            <span class="btn-quantity btn-decrease">-</span>
                                            <input type="text" name="quantity" min="1" class="quantity-product" value="1" >

                                            <span class="btn-quantity btn-increase">+</span>
                                        </div>
                                    </div>
                                    
                                    <div class="tf-product-info-buy-button">
                                        <form>
                                            <div class="button-row d-flex gap-2 align-items-center"> <!-- Flex container -->
                                                <!-- Add to Cart Button -->
                                                <button type="button"
                                                    class="tf-btn btn-fill justify-content-center fw-6 fs-16 animate-hover-btn btn-add-to-cart flex-grow-1"
                                                    data-product-id="{{ $product->product_id }}">
                                                    <span>Add to cart - </span>
                                                    <span class="tf-qty-price total-price" data-price="{{ number_format($product->price, 2, '.', '') }}">
                                                        {{ number_format($product->price, 2, '.', '') }}
                                                    </span>
                                                </button>
                                    
                                                <!-- Wishlist Button -->
                                                <button type="button"
                                                    class="tf-product-btn-wishlist hover-tooltip box-icon bg_white wishlist wishlist-add btn-icon-action d-flex align-items-center justify-content-center"
                                                    data-product-id="{{ $product->product_id }}">
                                                    
                                                    @if (in_array($product->product_id, $wishlist))
                                                        <span class="icon icon-delete"></span>
                                                        <span class="tooltip">Remove from Wishlist</span>
                                                    @else
                                                        <span class="icon icon-heart"></span>
                                                        <span class="tooltip">Add to Wishlist</span>
                                                    @endif
                                                </button>
                                            </div>
                                            <div class="w-100 mt-3">
                                                <button type="button" id="CheckoutBtn"
                                                    class="btns-full w-100 buy-now-btn"
                                                    data-product-id="{{ $product->product_id }}"
                                                    data-size="{{ $defaultSize }}">Buy Now 
                                                    <img src="images/payments/paypal.png" alt="">
                                                </button>

                                                <button type="button" class="payment-more-option w-100">
                                                    More payment options
                                                </button>
                                            </div>
                                            
                                        </form>
                                    </div>

                                    <div class="tf-product-info-extra-link">
                                        <a href="#compare_color" data-bs-toggle="modal" class="tf-product-extra-icon">
                                            <div class="icon">
                                                <img src="images/item/compare.svg" alt="">
                                            </div>
                                            <div class="text fw-6">Compare color</div>
                                        </a>
                                        <a href="#ask_question" data-bs-toggle="modal" class="tf-product-extra-icon">
                                            <div class="icon">
                                                <i class="icon-question"></i>
                                            </div>
                                            <div class="text fw-6">Ask a question</div>
                                        </a>
                                        <a href="#delivery_return" data-bs-toggle="modal" class="tf-product-extra-icon">
                                            <div class="icon">
                                                <svg class="d-inline-block" xmlns="http://www.w3.org/2000/svg"
                                                    width="22" height="18" viewBox="0 0 22 18" fill="currentColor">
                                                    <path
                                                        d="M21.7872 10.4724C21.7872 9.73685 21.5432 9.00864 21.1002 8.4217L18.7221 5.27043C18.2421 4.63481 17.4804 4.25532 16.684 4.25532H14.9787V2.54885C14.9787 1.14111 13.8334 0 12.4255 0H9.95745V1.69779H12.4255C12.8948 1.69779 13.2766 2.07962 13.2766 2.54885V14.5957H8.15145C7.80021 13.6052 6.85421 12.8936 5.74468 12.8936C4.63515 12.8936 3.68915 13.6052 3.33792 14.5957H2.55319C2.08396 14.5957 1.70213 14.2139 1.70213 13.7447V2.54885C1.70213 2.07962 2.08396 1.69779 2.55319 1.69779H9.95745V0H2.55319C1.14528 0 0 1.14111 0 2.54885V13.7447C0 15.1526 1.14528 16.2979 2.55319 16.2979H3.33792C3.68915 17.2884 4.63515 18 5.74468 18C6.85421 18 7.80021 17.2884 8.15145 16.2979H13.423C13.7742 17.2884 14.7202 18 15.8297 18C16.9393 18 17.8853 17.2884 18.2365 16.2979H21.7872V10.4724ZM16.684 5.95745C16.9494 5.95745 17.2034 6.08396 17.3634 6.29574L19.5166 9.14894H14.9787V5.95745H16.684ZM5.74468 16.2979C5.27545 16.2979 4.89362 15.916 4.89362 15.4468C4.89362 14.9776 5.27545 14.5957 5.74468 14.5957C6.21392 14.5957 6.59575 14.9776 6.59575 15.4468C6.59575 15.916 6.21392 16.2979 5.74468 16.2979ZM15.8298 16.2979C15.3606 16.2979 14.9787 15.916 14.9787 15.4468C14.9787 14.9776 15.3606 14.5957 15.8298 14.5957C16.299 14.5957 16.6809 14.9776 16.6809 15.4468C16.6809 15.916 16.299 16.2979 15.8298 16.2979ZM18.2366 14.5957C17.8853 13.6052 16.9393 12.8936 15.8298 12.8936C15.5398 12.8935 15.252 12.943 14.9787 13.04V10.8511H20.0851V14.5957H18.2366Z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="text fw-6">Delivery & Return</div>
                                        </a>
                                        <a href="#share_social" data-bs-toggle="modal" class="tf-product-extra-icon">
                                            <div class="icon">
                                                <i class="icon-share"></i>
                                            </div>
                                            <div class="text fw-6">Share</div>
                                        </a>
                                    </div>
                                    <div class="tf-product-info-delivery-return">
                                        <div class="row">
                                            <div class="col-xl-6 col-12">
                                                <div class="tf-product-delivery">
                                                    <div class="icon">
                                                        <i class="icon-delivery-time"></i>
                                                    </div>
                                                    <p>Estimate delivery times: <span class="fw-7">12-26 days</span>
                                                        (International), <span class="fw-7">3-6 days</span> (United
                                                        States).</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-12">
                                                <div class="tf-product-delivery mb-0">
                                                    <div class="icon">
                                                        <i class="icon-return-order"></i>
                                                    </div>
                                                    <p>Return within <span class="fw-7">30 days</span> of purchase.
                                                        Duties & taxes are non-refundable.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tf-product-info-trust-seal">
                                        <div class="tf-product-trust-mess">
                                            <i class="icon-safe"></i>
                                            <p class="fw-6">Guarantee Safe <br> Checkout</p>
                                        </div>
                                        <div class="tf-payment">
                                            <img src="images/payments/visa.png" alt="">
                                            <img src="images/payments/img-1.png" alt="">
                                            <img src="images/payments/img-2.png" alt="">
                                            <img src="images/payments/img-3.png" alt="">
                                            <img src="images/payments/img-4.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </section>
        <!-- /default -->
         <!-- tabs -->
        <section class="flat-spacing-17 pt_0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="widget-tabs style-has-border">
                            <ul class="widget-menu-tab">
                                <li class="item-title active">
                                    <span class="inner">Description</span>
                                </li>
                                <li class="item-title">
                                    <span class="inner">Additional Information</span>
                                </li>
                                
                            </ul>
                            <div class="widget-content-tab">
                                <div class="widget-content-inner active">
                                    <div class="">
                                        <p class="mb_30">
                                            {{$product->description}}
                                        </p>
                                        
                                    </div>
                                </div>
                                <div class="widget-content-inner">
                                    <table class="tf-pr-attrs">
                                        <tbody>
                                            {{-- Color row --}}
                                            @if (!empty($colors))
                                            <tr class="tf-attr-pa-color">
                                                <th class="tf-attr-label">Color</th>
                                                <td class="tf-attr-value">
                                                    <p>{{ implode(', ', $colors) }}</p>
                                                </td>
                                            </tr>
                                            @endif
                                            
                                            {{-- Size row --}}
                                            @if (!empty($availableSizes))
                                            <tr class="tf-attr-pa-size">
                                                <th class="tf-attr-label">Size</th>
                                                <td class="tf-attr-value">
                                                    <p>
                                                        @foreach ($availableSizes as $index => $size)
                                                            {{ $getShortForm($size) }}@if ($index < count($availableSizes) - 1), @endif
                                                        @endforeach
                                                    </p>
                                                </td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /tabs -->
        <section class="flat-spacing-1 pt_0">
            <div class="container">
                <div class="flat-title">
                    <span class="title">People Also Bought</span>
                </div>
                <div class="hover-sw-nav hover-sw-2">
                    <div dir="ltr" class="swiper tf-sw-product-sell wrap-sw-over" data-preview="4" data-tablet="3"
                        data-mobile="2" data-space-lg="30" data-space-md="15" data-pagination="2" data-pagination-md="3"
                        data-pagination-lg="3">
                        <div class="swiper-wrapper">
                            @foreach ($products as $product)
                              
                                @php
                                    $sizes = json_decode($product->size, true) ?? [];
                                    $galleryImages = json_decode($product->gallery_images, true) ?? [];
                                    $mainImage = asset('assets/img/' . $product->image);
                                    $hoverImage = isset($galleryImages[0]) ? asset('assets/img/gallery/' . $galleryImages[0]) : $mainImage;
                                @endphp
                    
                                <div class="swiper-slide" lazy="true">
                                    <div class="card-product">
                                        <div class="card-product-wrapper">
                                            <a href="{{ route('product.details', $product->product_id) }}" class="product-img">
                                                <img class="lazyload img-product" data-src="{{ $mainImage }}" src="{{ $mainImage }}" alt="image-product">
                                                <img class="lazyload img-hover" data-src="{{ $hoverImage }}" src="{{ $hoverImage }}" alt="image-product">
                                            </a>
                                            <div class="list-product-btn">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quickAddModal-{{ $product->product_id }}" class="box-icon bg_white quick-add tf-btn-loading">
                                                    <span class="icon icon-bag"></span>
                                                    <span class="tooltip">Quick Add</span>
                                                </a>
                                                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                                    <span class="icon icon-heart"></span>
                                                    <span class="tooltip">Add to Wishlist</span>
                                                    <span class="icon icon-delete"></span>
                                                </a>
                                                <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
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
                    
                                            <div class="size-list">
                                                @foreach ($sizes as $size)
                                                    <span>{{ $size }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                    
                                        <div class="card-product-info">
                                            <a href="{{ route('product.details', $product->product_id) }}" class="title link">
                                                {{ $product->name }}
                                            </a>
                                            <span class="price">AED{{ number_format($product->price, 2) }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="nav-sw nav-next-slider nav-next-product box-icon w_46 round"><span
                            class="icon icon-arrow-left"></span></div>
                    <div class="nav-sw nav-prev-slider nav-prev-product box-icon w_46 round"><span
                            class="icon icon-arrow-right"></span></div>
                    <div class="sw-dots style-2 sw-pagination-product justify-content-center"></div>
                </div>
                @foreach ($products as $product)
                    @include('frontend.partials.quick_add_modal', ['product' => $product])
                @endforeach
            </div>
        </section>
        <!-- /product -->
         <!--/footer-->
         <footer id="footer" class="footer background-black">
            <div class="footer-wrap wow fadeIn" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s; animation-name: fadeIn;">
                <div class="footer-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-3 col-md-6 col-12">
                                <div class="footer-infor">
                                    <div class="footer-logo">
                                        <a href="index.html">
                                            <img src="images/logo/logowhite.png" alt="" style="width: 50%;">
                                        </a>
                                    </div>
                                    <ul>
                                        <li>
                                            <p>Address: Dubai, UAE</p>
                                        </li>
                                        
                                        <li>
                                            <p>Phone: <a href="#">(212) 555-1234</a></p>
                                        </li>
                                    </ul>
                                    <a href="contact-1.html" class="tf-btn btn-line">Get direction<i class="icon icon-arrow1-top-left"></i></a>
                                    <ul class="tf-social-icon d-flex gap-10 style-white">
                                        <li><a href="#" class="box-icon w_34 round social-facebook social-line"><i class="icon fs-14 icon-fb"></i></a></li>
                                        <li><a href="#" class="box-icon w_34 round social-twiter social-line"><i class="icon fs-12 icon-Icon-x"></i></a></li>
                                        <li><a href="#" class="box-icon w_34 round social-instagram social-line"><i class="icon fs-14 icon-instagram"></i></a></li>
                                        <li><a href="#" class="box-icon w_34 round social-tiktok social-line"><i class="icon fs-14 icon-tiktok"></i></a></li>
                                        <li><a href="#" class="box-icon w_34 round social-pinterest social-line"><i class="icon fs-14 icon-pinterest-1"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-12 footer-col-block">
                                <div class="footer-heading footer-heading-desktop">
                                    <h6>Help</h6>
                                </div>
                                <div class="footer-heading footer-heading-moblie">
                                    <h6>Help</h6>
                                </div>
                                <ul class="footer-menu-list tf-collapse-content">
                                    <li>
                                        <a href="privacy-policy.html" class="footer-menu_item">Privacy Policy</a>
                                    </li>
                                    <li>
                                        <a href="delivery-return.html" class="footer-menu_item"> Returns + Exchanges
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shipping-delivery.html" class="footer-menu_item">Shipping</a>
                                    </li>
                                    <li>
                                        <a href="terms-conditions.html" class="footer-menu_item">Terms &amp;
                                            Conditions</a>
                                    </li>
                                    <li>
                                        <a href="faq-1.html" class="footer-menu_item">FAQ’s</a>
                                    </li>
                                    <li>
                                        <a href="compare.html" class="footer-menu_item">Compare</a>
                                    </li>
                                    <li>
                                        <a href="wishlist.html" class="footer-menu_item">My Wishlist</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xl-3 col-md-6 col-12 footer-col-block">
                                <div class="footer-heading footer-heading-desktop">
                                    <h6>About us</h6>
                                </div>
                                <div class="footer-heading footer-heading-moblie">
                                    <h6>About us</h6>
                                </div>
                                <ul class="footer-menu-list tf-collapse-content">
                                    <li>
                                        <a href="about-us.html" class="footer-menu_item">Our Story</a>
                                    </li>
                                    <li>
                                        <a href="our-store.html" class="footer-menu_item">Visit Our Store</a>
                                    </li>
                                    <li>
                                        <a href="contact-1.html" class="footer-menu_item">Contact Us</a>
                                    </li>
                                    <li>
                                        <a href="login.html" class="footer-menu_item">Account</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xl-3 col-md-6 col-12">
                                <div class="footer-newsletter footer-col-block">
                                    <div class="footer-heading footer-heading-desktop">
                                        <h6>Sign Up for Email</h6>
                                    </div>
                                    <div class="footer-heading footer-heading-moblie">
                                        <h6>Sign Up for Email</h6>
                                    </div>
                                    <div class="tf-collapse-content">
                                        <div class="footer-menu_item">Sign up to get first dibs on new arrivals, sales,
                                            exclusive content, events and more!</div>
                                        <form class="form-newsletter" id="subscribe-form" action="#" method="post" accept-charset="utf-8" data-mailchimp="true">
                                            <div id="subscribe-content">
                                                <fieldset class="email">
                                                    <input type="email" name="email-form" id="subscribe-email" placeholder="Enter your email...." tabindex="0" aria-required="true">
                                                </fieldset>
                                                <div class="button-submit">
                                                    <button id="subscribe-button" class="tf-btn btn-sm radius-3 btn-fill btn-icon animate-hover-btn" type="button">Subscribe<i class="icon icon-arrow1-top-left"></i></button>
                                                </div>
                                            </div>
                                            <div id="subscribe-msg"></div>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="footer-bottom-wrap d-flex gap-20 flex-wrap justify-content-between align-items-center">
                                    <div class="footer-menu_item">© 2025 Yameker. All Rights Reserved.</div>
                                    <div class="tf-payment">
                                        <img src="images/payments/visa.png" alt="">
                                        <img src="images/payments/img-1.png" alt="">
                                        <img src="images/payments/img-2.png" alt="">
                                        <img src="images/payments/img-3.png" alt="">
                                        <img src="images/payments/img-4.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /Footer -->
         

    <!-- gotop -->
    <button id="goTop">
        <span class="border-progress"></span>
        <span class="icon icon-arrow-up"></span>
    </button>
    <!-- /gotop -->

    <!-- toolbar-bottom -->
    <div class="tf-toolbar-bottom type-1150">
        <div class="toolbar-item">
            <a href="#toolbarShopmb" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft">
                <div class="toolbar-icon">
                    <i class="icon-shop"></i>
                </div>
                <div class="toolbar-label">Shop</div>
            </a>
        </div>

        <div class="toolbar-item">
            <a href="#canvasSearch" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft">
                <div class="toolbar-icon">
                    <i class="icon-search"></i>
                </div>
                <div class="toolbar-label">Search</div>
            </a>
        </div>
        <div class="toolbar-item">
            <a href="#login" data-bs-toggle="modal">
                <div class="toolbar-icon">
                    <i class="icon-account"></i>
                </div>
                <div class="toolbar-label">Account</div>
            </a>
        </div>
        <div class="toolbar-item">
            <a href="wishlist.html">
                <div class="toolbar-icon">
                    <i class="icon-heart"></i>
                    <div class="toolbar-count">0</div>
                </div>
                <div class="toolbar-label">Wishlist</div>
            </a>
        </div>
        <div class="toolbar-item">
            <a href="#shoppingCart" data-bs-toggle="modal">
                <div class="toolbar-icon">
                    <i class="icon-bag"></i>
                    <div class="toolbar-count">1</div>
                </div>
                <div class="toolbar-label">Cart</div>
            </a>
        </div>
    </div>
    <!-- /toolbar-bottom -->

    <!-- modalDemo -->
    <div class="modal fade modalDemo" id="modalDemo">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="header">
                    <h5 class="demo-title">Ultimate HTML Theme</h5>
                    <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                </div>
                <div class="mega-menu">
                    <div class="row-demo">
                        <div class="demo-item">
                            <a href="index.html">
                                <div class="demo-image position-relative">
                                    <img class="lazyload" data-src="files/images/demo/home-01.jpg"
                                        src="files/images/demo/home-01.jpg" alt="home-01">
                                    <div class="demo-label">
                                        <span class="demo-new">New</span>
                                        <span>Trend</span>
                                    </div>
                                </div>
                                <span class="demo-name">Home Fashion 01</span>
                            </a>
                        </div>
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /modalDemo -->

    <!-- mobile menu -->
    <div class="offcanvas offcanvas-start canvas-mb" id="mobileMenu">
        <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
        <div class="mb-canvas-content">
            <div class="mb-body">
                <ul class="nav-ul-mb" id="wrapper-menu-navigation">
                    <li class="nav-mb-item">
                        <a href="#dropdown-menu-one" class="collapsed mb-menu-link current" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="dropdown-menu-one">
                            <span>Home</span>
                            <span class="btn-open-sub d-none"></span>
                        </a>
                        <div id="dropdown-menu-one d-none" class="collapse">
                            <ul class="sub-nav-menu">
                                <li><a href="index.html" class="sub-nav-link">Home Fashion 01</a></li>
                                
                            </ul>
                        </div>

                    </li>
                    
                    <li class="nav-mb-item">
                        <a href="#dropdown-menu-three" class="collapsed mb-menu-link current" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="dropdown-menu-three">
                            <span>Products</span>
                            <span class="btn-open-sub "></span>
                        </a>
                        
                    </li>
                    <li class="nav-mb-item ">
                        <a href="#dropdown-menu-four" class="collapsed mb-menu-link current" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="dropdown-menu-four">
                            <span>About Us</span>
                            <span class="btn-open-sub d-none"></span>
                        </a>
                        <div id="dropdown-menu-four" class="collapse">
                            <ul class="sub-nav-menu" id="sub-menu-navigation2">
                                <li><a href="about-us.html" class="sub-nav-link">About us</a></li>
                                <li><a href="brands.html" class="sub-nav-link line-clamp">Brands<div class="demo-label">
                                            <span class="demo-new">New</span>
                                        </div></a></li>
                                <li><a href="brands-v2.html" class="sub-nav-link">Brands V2</a></li>
                                
                                
                            </ul>
                        </div>

                    </li>
                    <li class="nav-mb-item Contact Us">
                        <a href="#dropdown-menu-five" class="collapsed mb-menu-link current" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="dropdown-menu-five">
                            <span>Contact Us</span>
                            <span class="btn-open-sub d-none"></span>
                        </a>
                        <div id="dropdown-menu-five" class="collapse">
                            <ul class="sub-nav-menu">
                                <li><a href="blog-grid.html" class="sub-nav-link">Grid layout</a></li>
                                
                            </ul>
                        </div>

                    </li>
                    <li class="nav-mb-item Contact Us">
                        <a href="#dropdown-menu-five" class="collapsed mb-menu-link current" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="dropdown-menu-five">
                            <span>Account</span>
                            <span class="btn-open-sub d-none"></span>
                        </a>
                        <div id="dropdown-menu-five" class="collapse">
                            <ul class="sub-nav-menu">
                                <li><a href="blog-grid.html" class="sub-nav-link">Grid layout</a></li>
                                
                            </ul>
                        </div>

                    </li>
                </ul>
                <div class="mb-other-content ">
                    <ul class="mb-info">
                        <li>Address: Dubai, <br> UAE</li>
                        <li>Email: <b>info@fashionshop.com</b></li>
                        <li>Phone: <b>(212) 555-1234</b></li>
                    </ul>
                </div>
            </div>
            <div class="mb-bottom">
                <a href="login.html" class="site-nav-icon"><i class="icon icon-account"></i>Login</a>
                <div class="bottom-bar-language">
                    <div class="tf-currencies">
                        <select class="image-select center style-default type-currencies d-none">
                            <option data-thumbnail="images/country/fr.svg">EUR € | France</option>
                            <option data-thumbnail="images/country/de.svg">EUR € | Germany</option>
                            <option selected data-thumbnail="images/country/us.svg">USD AED | United States</option>
                            <option data-thumbnail="images/country/vn.svg">VND ₫ | Vietnam</option>
                        </select>
                    </div>
                    <div class="tf-languages">
                        <select class="image-select center style-default type-languages">
                            <option>English</option>
                            <option>العربية</option>
                            <option>简体中文</option>
                            <option>اردو</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /mobile menu -->



    <!-- canvasSearch -->
    <div class="offcanvas offcanvas-end canvas-search" id="canvasSearch">
        <div class="canvas-wrapper">
            <header class="tf-search-head">
                <div class="title fw-5">
                    Search our site
                    <div class="close">
                        <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
                    </div>
                </div>
                <div class="tf-search-sticky">
                    <form class="tf-mini-search-frm">
                        <fieldset class="text">
                            <input type="text" placeholder="Search" class="" name="text" tabindex="0" value=""
                                aria-required="true" required="">
                        </fieldset>
                        <button class="" type="submit"><i class="icon-search"></i></button>
                    </form>
                </div>
            </header>
            <div class="canvas-body p-0">
                <div class="tf-search-content">
                    <div class="tf-cart-hide-has-results">
                        
                        <div class="tf-col-content">
                            <div class="tf-search-content-title fw-5">Need some inspiration?</div>
                            <div class="tf-search-hidden-inner">
                                <div class="tf-loop-item">
                                    <div class="image">
                                        <a href="product-detail.html">
                                            <img src="files/images/products/white-3.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <a href="product-detail.html">Leather handBag</a>
                                        <div class="tf-product-info-price">
                                            <div class="compare-at-price">AED10.00</div>
                                            <div class="price-on-sale fw-6">AED8.00</div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /canvasSearch -->

    <!-- toolbarShopmb -->
    <div class="offcanvas offcanvas-start canvas-mb toolbar-shop-mobile" id="toolbarShopmb">
        <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
        <div class="mb-canvas-content">
            <div class="mb-body">
                <ul class="nav-ul-mb" id="wrapper-menu-navigation">
                    @foreach ($categories as $category)
                        <li class="nav-mb-item">
                            <a href="{{ route('showby.category', $category->category_id) }}" class="tf-category-link mb-menu-link">
                                <div class="image">
                                    <img src="{{ asset('assets/img/category/' . $category->category_image) }}" alt="{{ $category->category_name }}">
                                </div>
                                <span>{{ $category->category_name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="mb-bottom">
                <a href="shop-default.html" class="tf-btn fw-5 btn-line">View all collection<i
                        class="icon icon-arrow1-top-left"></i></a>
            </div>
        </div>
    </div>
    <!-- /toolbarShopmb -->

    <!-- modal login -->
    <div class="modal modalCentered fade form-sign-in modal-part-content" id="login">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="header">
                    <div class="demo-title">Log in</div>
                    <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                </div>
                <div class="tf-login-form">
                    <form class="" action="{{ route('login') }}" method="POST" accept-charset="utf-8">
                        @csrf
                            @if(session('login_modal_error'))
                                <div class="alert alert-danger">
                                    {{ session('login_modal_error') }}
                                </div>
                            @endif

                        <div class="tf-field style-1">
                            <input class="tf-field-input tf-input" placeholder=" " type="email" name="email">
                            <label class="tf-field-label" for="">Email *</label>
                        </div>
                        <div class="tf-field style-1">
                            <input class="tf-field-input tf-input" placeholder=" " type="password" name="password">
                            <label class="tf-field-label" for="">Password *</label>
                        </div>
                        <div>
                            <a href="#forgotPassword" data-bs-toggle="modal" class="btn-link link">Forgot your
                                password?</a>
                        </div>
                        <div class="text-center my-3">
                            <a href="{{ route('google.login') }}" class="btn btn-outline-danger w-100">
                                <i class="fab fa-google me-2"></i> Sign in with Google
                            </a>
                        </div>

                        <div class="bottom">
                            <div class="w-100">
                                <button type="submit"
                                    class="tf-btn btn-fill animate-hover-btn radius-3 w-100 justify-content-center"><span>Log
                                        in</span></button>
                            </div>
                            <div class="w-100">
                                <a href="#register" data-bs-toggle="modal" class="btn-link fw-6 w-100 link">
                                    New customer? Create your account
                                    <i class="icon icon-arrow1-top-left"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modalCentered fade form-sign-in modal-part-content" id="forgotPassword">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="header">
                    <div class="demo-title">Reset your password</div>
                    <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                </div>
                <div class="tf-login-form">
                    <form class="" method="POST" action="{{ route('password.reset') }}">
                        @csrf
                        <div>
                            <p>Sign up for early Sale access plus tailored new arrivals, trends and promotions. To opt
                                out, click unsubscribe in our emails</p>
                        </div>
                        <div class="tf-field style-1">
                            <input class="tf-field-input tf-input" placeholder=" " type="email" name="email">
                            <label class="tf-field-label" for="">Email *</label>
                        </div>
                        <div>
                            <a href="#login" data-bs-toggle="modal" class="btn-link link">Cancel</a>
                        </div>
                        <div class="bottom">
                            <div class="w-100">
                                <button type="submit"
                                    class="tf-btn btn-fill animate-hover-btn radius-3 w-100 justify-content-center"><span>Reset
                                        password</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modalCentered fade form-sign-in modal-part-content" id="register">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="header">
                    <div class="demo-title">Register</div>
                    <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                </div>
                <div class="tf-login-form">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="tf-field style-1">
                            <input class="tf-field-input tf-input" placeholder=" " type="text" name="first_name" required>
                            <label class="tf-field-label" for="">First name</label>
                        </div>
                        <div class="tf-field style-1">
                            <input class="tf-field-input tf-input" placeholder=" " type="text" name="last_name" required>
                            <label class="tf-field-label" for="">Last name</label>
                        </div>
                        <div class="tf-field style-1">
                            <input class="tf-field-input tf-input" placeholder=" " type="email" name="email" required>
                            <label class="tf-field-label" for="">Email *</label>
                        </div>
                        <div class="tf-field style-1">
                            <input class="tf-field-input tf-input" placeholder=" " type="text" name="phone" required>
                            <label class="tf-field-label" for="phone">Phone </label>
                        </div>
                        <div class="tf-field style-1">
                            <input class="tf-field-input tf-input" placeholder=" " type="password" name="password" required>
                            <label class="tf-field-label" for="">Password *</label>
                        </div>
                        <div class="bottom">
                            <div class="w-100">
                                <button type="submit" class="tf-btn btn-fill animate-hover-btn radius-3 w-100 justify-content-center">
                                    <span>Register</span>
                                </button>
                            </div>
                            <div class="w-100">
                                <a href="#login" data-bs-toggle="modal" class="btn-link fw-6 w-100 link">
                                    Already have an account? Log in here
                                    <i class="icon icon-arrow1-top-left"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /modal login -->

    <!-- shoppingCart -->
    <div class="modal fullRight fade modal-shopping-cart" id="shoppingCart">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="header">
                    <div class="title fw-5">Shopping cart</div>
                    <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                </div>
                <div class="wrap">
                @include('frontend.partials.cart-modal-content', ['carts' => $carts ?? collect()])
            </div>
            </div>
        </div>
    </div>
    <!-- /shoppingCart -->
    <!-- modal compare -->
    <div class="offcanvas offcanvas-bottom canvas-compare" id="compare">
        <div class="canvas-wrapper">
            <header class="canvas-header">
                <div class="close-popup">
                    <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
                </div>
            </header>
            <div class="canvas-body">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="tf-compare-list">
                                <div class="tf-compare-head">
                                    <div class="title">Compare Products</div>
                                </div>
                                <div class="tf-compare-offcanvas">
                                    <div class="tf-compare-item">
                                        <div class="position-relative">
                                            <div class="icon">
                                                <i class="icon-close"></i>
                                            </div>
                                            <a href="product-detail.html">
                                                <img class="radius-3" src="files/images/products/orange-1.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="tf-compare-item">
                                        <div class="position-relative">
                                            <div class="icon">
                                                <i class="icon-close"></i>
                                            </div>
                                            <a href="product-detail.html">
                                                <img class="radius-3" src="files/images/products/pink-1.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-compare-buttons">
                                    <div class="tf-compare-buttons-wrap">
                                        <a href="compare.html"
                                            class="tf-btn radius-3 btn-fill justify-content-center fw-6 fs-14 flex-grow-1 animate-hover-btn ">Compare</a>
                                        <div class="tf-compapre-button-clear-all link">
                                            Clear All
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /modal compare -->

    
    <!-- modal quick_view -->
    <div class="modal fade modalDemo" id="">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="header">
                    <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                </div>
                <div class="wrap">
                    <div class="tf-product-media-wrap">
                        <div dir="ltr" class="swiper tf-single-slide">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="item">
                                        <img src="files/images/products/orange-1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="item">
                                        <img src="files/images/products/pink-1.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-next button-style-arrow single-slide-prev"></div>
                            <div class="swiper-button-prev button-style-arrow single-slide-next"></div>
                        </div>
                    </div>
                    <div class="tf-product-info-wrap position-relative">
                        <div class="tf-product-info-list">
                            <div class="tf-product-info-title">
                                <h5><a class="link" href="product-detail.html">Ribbed Tank Top</a></h5>
                            </div>
                            <div class="tf-product-info-badges">
                                <div class="badges text-uppercase">Best seller</div>
                                <div class="product-status-content">
                                    <i class="icon-lightning"></i>
                                    <p class="fw-6">Selling fast! 48 people have this in their carts.</p>
                                </div>
                            </div>
                            <div class="tf-product-info-price">
                                <div class="price">AED18.00</div>
                            </div>
                            <div class="tf-product-description">
                                <p>Nunc arcu faucibus a et lorem eu a mauris adipiscing conubia ac aptent ligula
                                    facilisis a auctor habitant parturient a a.Interdum fermentum.</p>
                            </div>
                            <div class="tf-product-info-variant-picker">
                                <div class="variant-picker-item">
                                    <div class="variant-picker-label">
                                        Color: <span class="fw-6 variant-picker-label-value">Orange</span>
                                    </div>
                                    <div class="variant-picker-values">
                                        <input id="values-orange-1" type="radio" name="color-1" checked>
                                        <label class="hover-tooltip radius-60" for="values-orange-1"
                                            data-value="Orange">
                                            <span class="btn-checkbox bg-color-orange"></span>
                                            <span class="tooltip">Orange</span>
                                        </label>
                                        <input id="values-black-1" type="radio" name="color-1">
                                        <label class=" hover-tooltip radius-60" for="values-black-1" data-value="Black">
                                            <span class="btn-checkbox bg-color-black"></span>
                                            <span class="tooltip">Black</span>
                                        </label>
                                        <input id="values-white-1" type="radio" name="color-1">
                                        <label class="hover-tooltip radius-60" for="values-white-1" data-value="White">
                                            <span class="btn-checkbox bg-color-white"></span>
                                            <span class="tooltip">White</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="variant-picker-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="variant-picker-label">
                                            Size: <span class="fw-6 variant-picker-label-value">S</span>
                                        </div>
                                        <div class="find-size btn-choose-size fw-6">Find your size</div>
                                    </div>
                                    <div class="variant-picker-values">
                                        <input type="radio" name="size-1" id="values-s-1" checked>
                                        <label class="style-text" for="values-s-1" data-value="S">
                                            <p>S</p>
                                        </label>
                                        <input type="radio" name="size-1" id="values-m-1">
                                        <label class="style-text" for="values-m-1" data-value="M">
                                            <p>M</p>
                                        </label>
                                        <input type="radio" name="size-1" id="values-l-1">
                                        <label class="style-text" for="values-l-1" data-value="L">
                                            <p>L</p>
                                        </label>
                                        <input type="radio" name="size-1" id="values-xl-1">
                                        <label class="style-text" for="values-xl-1" data-value="XL">
                                            <p>XL</p>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="tf-product-info-quantity">
                                <div class="quantity-title fw-6">Quantity</div>
                                <div class="wg-quantity">
                                    <span class="btn-quantity minus-btn">-</span>
                                    <input type="text" name="number" value="1">
                                    <span class="btn-quantity plus-btn">+</span>
                                </div>
                            </div>
                            <div class="tf-product-info-buy-button">
                                <form class="">
                                    <a href="javascript:void(0);"
                                        class="tf-btn btn-fill justify-content-center fw-6 fs-16 flex-grow-1 animate-hover-btn btn-add-to-cart"><span>Add
                                            to cart -&nbsp;</span><span class="tf-qty-price">AED8.00</span></a>
                                    <a href="javascript:void(0);"
                                        class="tf-product-btn-wishlist hover-tooltip box-icon bg_white wishlist btn-icon-action">
                                        <span class="icon icon-heart"></span>
                                        <span class="tooltip">Add to Wishlist</span>
                                        <span class="icon icon-delete"></span>
                                    </a>
                                    <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                        class="tf-product-btn-wishlist hover-tooltip box-icon bg_white compare btn-icon-action">
                                        <span class="icon icon-compare"></span>
                                        <span class="tooltip">Add to Compare</span>
                                        <span class="icon icon-check"></span>
                                    </a>
                                    <div class="w-100">
                                        <a href="#" class="btns-full">Buy with <img src="files/images/payments/paypal.png"
                                                alt=""></a>
                                        <a href="#" class="payment-more-option">More payment options</a>
                                    </div>
                                </form>
                            </div>
                            <div>
                                <a href="product-detail.html" class="tf-btn fw-6 btn-line">View full details<i
                                        class="icon icon-arrow1-top-left"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /modal quick_view -->

    <!-- modal find_size -->
    <div class="modal fade modalDemo tf-product-modal" id="find_size">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="header">
                    <div class="demo-title">Size chart</div>
                    <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                </div>
                <div class="tf-rte">
                    <div class="tf-table-res-df">
                        <h6>Size guide</h6>
                        <table class="tf-sizeguide-table">
                            <thead>
                                <tr>
                                    <th>Size</th>
                                    <th>US</th>
                                    <th>Bust</th>
                                    <th>Waist</th>
                                    <th>Low Hip</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>XS</td>
                                    <td>2</td>
                                    <td>32</td>
                                    <td>24 - 25</td>
                                    <td>33 - 34</td>
                                </tr>
                                <tr>
                                    <td>S</td>
                                    <td>4</td>
                                    <td>34 - 35</td>
                                    <td>26 - 27</td>
                                    <td>35 - 26</td>
                                </tr>
                                <tr>
                                    <td>M</td>
                                    <td>6</td>
                                    <td>36 - 37</td>
                                    <td>28 - 29</td>
                                    <td>38 - 40</td>
                                </tr>
                                <tr>
                                    <td>L</td>
                                    <td>8</td>
                                    <td>38 - 29</td>
                                    <td>30 - 31</td>
                                    <td>42 - 44</td>
                                </tr>
                                <tr>
                                    <td>XL</td>
                                    <td>10</td>
                                    <td>40 - 41</td>
                                    <td>32 - 33</td>
                                    <td>45 - 47</td>
                                </tr>
                                <tr>
                                    <td>XXL</td>
                                    <td>12</td>
                                    <td>42 - 43</td>
                                    <td>34 - 35</td>
                                    <td>48 - 50</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tf-page-size-chart-content">
                        <div>
                            <h6>Measuring Tips</h6>
                            <div class="title">Bust</div>
                            <p>Measure around the fullest part of your bust.</p>
                            <div class="title">Waist</div>
                            <p>Measure around the narrowest part of your torso.</p>
                            <div class="title">Low Hip</div>
                            <p class="mb-0">With your feet together measure around the fullest part of your hips/rear.
                            </p>
                        </div>
                        <div>
                            <img class="sizechart lazyload" data-src="files/images/shop/products/size_chart2.jpg"
                                src="files/images/shop/products/size_chart2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /modal find_size -->

    <!-- auto popup  
    <div class="modal modalCentered fade auto-popup modal-newleter d-none">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-top">
                    <img class="lazyload" data-src="files/images/item/banner-newleter.jpg"
                        src="files/images/item/banner-newleter.jpg" alt="home-01">
                    <span class="icon icon-close btn-hide-popup" data-bs-dismiss="modal"></span>
                </div>
                <div class="modal-bottom">
                    <h4 class="text-center">Don’t mis out</h4>
                    <h6 class="text-center">Be the first one to get the new product at early bird prices.</h6>
                    <form id="subscribe-form" action="#" class="form-newsletter" method="post" accept-charset="utf-8"
                        data-mailchimp="true">
                        <div id="subscribe-content">
                            <input type="email" name="email-form" id="subscribe-email" placeholder="Email *">
                            <button type="button" id="subscribe-button"
                                class="tf-btn btn-fill radius-3 animate-hover-btn w-100 justify-content-center">Keep me
                                updated</button>
                        </div>
                        <div id="subscribe-msg"></div>
                    </form>
                    <div class="text-center">
                        <a href="#" data-bs-dismiss="modal" class="tf-btn btn-line fw-6 btn-hide-popup">Not
                            interested</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
     /auto popup  -->


    <!-- Javascript -->
    <script type="text/javascript"src="{{asset('files/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript"src="{{asset('files/js/jquery.min.js')}}"></script>
    <script type="text/javascript"src="{{asset('files/js/swiper-bundle.min.js')}}"></script>
    <script type="text/javascript"src="{{asset('files/js/carousel.js')}}"></script>
    <script type="text/javascript"src="{{asset('files/js/bootstrap-select.min.js')}}"></script>
    <script type="text/javascript"src="{{asset('files/js/lazysize.min.js')}}"></script>
    <script type="text/javascript"src="{{asset('files/js/count-down.js')}}"></script>
    <script type="text/javascript"src="{{asset('files/js/wow.min.js')}}"></script>
    <script type="text/javascript"src="{{asset('files/js/multiple-modal.js')}}"></script>
    <script type="text/javascript"src="{{asset('files/js/main.js')}}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Thumbnail swiper
        var thumbsSwiper = new Swiper('.tf-product-media-thumbs', {
            spaceBetween: 10,
            slidesPerView: 6,
            direction: 'vertical', // Default vertical
            observer: true,
            observeParents: true,
            breakpoints: {
                0: { direction: 'horizontal' },
                335: { direction: 'horizontal' },
                546: { direction: 'horizontal' },
                768: { direction: 'horizontal' },
                992: { direction: 'horizontal' },
                1024: { direction: 'horizontal' },
                1149: { direction: 'vertical' },
                1200: { direction: 'vertical' },
                1300: { direction: 'vertical' },
                1400: { direction: 'vertical' },
                1600: { direction: 'vertical' },
            }
        });
    
        // Main gallery swiper (only one init!)
        var gallerySwiper = new Swiper('#gallery-swiper-started', {
            spaceBetween: 10,
            slidesPerView: 1,
            observer: true,
            observeParents: true,
            loop: true,
            lazy: {
                loadPrevNext: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            thumbs: {
                swiper: thumbsSwiper // ✅ still linked
            }
        });
    });

</script>
<script>
    $(document).ready(function () {
        $('.btn-add-to-cart').on('click', function (e) {
            e.preventDefault();
    
            let productId = $(this).data('product-id');
            let quantity = $('.quantity-product').val();
            let size = $('input[name="size1"]:checked').val();
    
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
                    if (response.success) {
                        // Replace modal content
                        $('#shoppingCart .wrap').html(response.html);
                        // Show the modal
                        $('#shoppingCart').modal('show');
                    }
                },
                error: function (xhr) {
                    alert('Something went wrong');
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

<script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.wishlist-add').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    const productId = this.dataset.productId;
                    fetch(`/wishlist-store`, {
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
                            this.innerHTML = `
                                <span class="icon icon-delete" style="display:block;"></span>
                                <span class="tooltip">Remove from Wishlist</span>`;
                        } else {
                            this.innerHTML = `
                                <span class="icon icon-heart" style="display:block;"></span>
                                <span class="tooltip">Add to Wishlist</span>`;
                        }

                        const countBox = document.querySelector('.nav-wishlist .count-box');
                            if (countBox) {
                                countBox.textContent = data.count;
                            }
                        });
                });
            });
        });
    </script>

<script>
    document.querySelectorAll('.buy-now-btn').forEach(function (button) {
        button.addEventListener('click', function () {
            const productId = this.getAttribute('data-product-id');
             // Fix: correctly select quantity input
            const quantity = document.querySelector('input[name="quantity"]')?.value || 1;

            // Fix: get checked size radio input
            const size = document.querySelector('input[name="size1"]:checked')?.value || '';


            const isLoggedIn = "{{ auth()->check() ? 'true' : 'false' }}";
            if (!productId) {
                alert('Product ID is missing.');
                return;
            }

            if (!isLoggedIn) {
                window.location.href = "{{ route('guest.login') }}";
            } else {
                const checkoutUrl = `{{ route('checkout') }}?buy_now=1&product_id=${productId}&quantity=${quantity}&size=${size}`;
                window.location.href = checkoutUrl;
            }
        });
    });
</script>


<script>
    $(document).ready(function () {
        function updateTotalPrice() {
            const unitPrice = parseFloat($('.total-price').data('price'));
            const quantity = parseInt($('.quantity-product').val()) || 1;

            if (quantity === 1) {
                $('.total-price').text('AED ' + unitPrice.toFixed(2));
            } else {
                const total = (unitPrice * quantity).toFixed(2);
                $('.total-price').text('AED ' + total);
            }
        }

        $('.btn-increase').on('click', function (e) {
            e.preventDefault();
            const input = $(this).closest('.wg-quantity').find('input.quantity-product');
            let val = parseInt(input.val()) || 1;
            
            updateTotalPrice();
        });

        $('.btn-decrease').on('click', function (e) {
            e.preventDefault();
            const input = $(this).closest('.wg-quantity').find('input.quantity-product');
            let val = parseInt(input.val()) || 1;
            if (val > 1) {
                
                updateTotalPrice();
            }
        });

        $('.quantity-product').on('input', function () {
            this.value = this.value.replace(/[^0-9]/g, '');
            if (this.value === '' || parseInt(this.value) < 1) {
                this.value = 1;
            }
            updateTotalPrice();
        });

        updateTotalPrice();
    });
</script>


  
</body>

</html>