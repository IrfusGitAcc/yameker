<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title>View Cart | Yameker</title>

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

<body class="preload-wrapper popup-loader">

    <!-- preload -->
    <div class="preload preload-container">
        <div class="preload-logo">
            <div class="spinner"></div>
        </div>
    </div>
    <!-- /preload -->
    <div id="wrapper">
        <!-- Top Bar -->
        <div class="tf-top-bar bg_white line">
            <div class="px_15 lg-px_40">
                <div class="tf-top-bar_wrap grid-3 gap-30 align-items-center">
                    <ul class="tf-top-bar_item tf-social-icon d-flex gap-10">
                        <li><a href="#" class="box-icon w_28 round social-facebook bg_line"><i
                                    class="icon fs-12 icon-fb"></i></a></li>
                        <li><a href="#" class="box-icon w_28 round social-twiter bg_line"><i
                                    class="icon fs-10 icon-Icon-x"></i></a></li>
                        <li><a href="#" class="box-icon w_28 round social-instagram bg_line"><i
                                    class="icon fs-12 icon-instagram"></i></a></li>
                        <li><a href="#" class="box-icon w_28 round social-tiktok bg_line"><i
                                    class="icon fs-12 icon-tiktok"></i></a></li>
                        <li><a href="#" class="box-icon w_28 round social-pinterest bg_line"><i
                                    class="icon fs-12 icon-pinterest-1"></i></a></li>
                    </ul>
                    <div class="text-center overflow-hidden">
                        <div dir="ltr" class="swiper tf-sw-top_bar" data-preview="1" data-space="0" data-loop="true"
                            data-speed="1000" data-delay="2000">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <p class="top-bar-text fw-5">Spring Fashion Sale <a href="index.html"
                                            title="all collection" class="tf-btn btn-line">Shop now<i
                                                class="icon icon-arrow1-top-left"></i></a></p>
                                </div>
                                <div class="swiper-slide">
                                    <p class="top-bar-text fw-5">Summer sale discount off 70%</p>
                                </div>
                                <div class="swiper-slide">
                                    <p class="top-bar-text fw-5">Time to refresh your wardrobe.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="top-bar-language tf-cur justify-content-end">
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
        <!-- /Top Bar -->
        <!-- Header -->
        <header id="header" class="header-default header-absolute">
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
                            <img src="files/images/logo/logo.png" alt="logo" class="logo">
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
                                <a href="{{route('view.cart')}}" data-bs-toggle="modal" class="nav-icon-item">
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

         <!-- page-cart -->
        <section class="flat-spacing-11">
            <div class="container">
                @if($cartItems->isEmpty())
                    <div class="tf-page-cart text-center mt_140 mb_200">
                        <h5 class="mb_24">Your cart is empty</h5>
                        <p class="mb_24">You may check out all the available products and buy some in the shop</p>
                        <a href="{{route('shop')}}" class="tf-btn btn-sm radius-3 btn-fill btn-icon animate-hover-btn">Return to shop<i class="icon icon-arrow1-top-left"></i></a>
                    </div>
                @else
                    <div class="tf-page-cart-wrap">
                        <div class="tf-page-cart-item">
                            <form>
                                <table class="tf-table-page-cart">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cartItems as $cart)
                                            <tr class="tf-cart-item file-delete" data-cart-id="{{ $cart->cart_id }}">
                                                <td class="tf-cart-item_product">
                                                    <a href="{{ route('product.details', $cart->product->slug ?? '#') }}" class="img-box">
                                                        <img src="{{ asset('assets/img/' . $cart->product->image) }}" alt="img-product">
                                                    </a>
                                                    <div class="cart-info">
                                                        <a href="{{ route('product.details', $cart->product->slug ?? '#') }}" class="cart-title link">
                                                            {{ $cart->product->name }}
                                                        </a>
                                                        <div class="cart-meta-variant">{{ ucfirst($cart->product->color ?? '-') }} / {{ strtoupper($cart->size ?? '-') }}</div>
                                                        <span class="remove-cart link remove" data-cart-id="{{ $cart->cart_id }}">Remove</span>
                                                    </div>
                                                </td>
                                            
                                                <td class="tf-cart-item_price tf-variant-item-price" cart-data-title="Price">
                                                    <div class="cart-price price" data-price="{{ $cart->price }}">AED{{ number_format($cart->price, 2) }}</div>
                                                    
                                                </td>
                                            
                                                <!--<td class="tf-cart-item_quantity" cart-data-title="Quantity">
                                                    <div class="cart-quantity">
                                                        <div class="wg-quantity">
                                                            <span class="btn-quantity btndecrease" data-cart-id="{{ $cart->cart_id }}">-</span>
                                                            <input type="text" class="quantity-input" data-cart-id="{{ $cart->cart_id }}" name="number" value="{{ $cart->quantity }}">
                                                            <span class="btn-quantity btnincrease" data-cart-id="{{ $cart->cart_id }}">+</span>
                                                        </div>
                                                    </div>
                                                </td>-->
                                                <td class="tf-cart-item_quantity" cart-data-title="Quantity">
                                                    <div class="cart-quantity">
                                                        <div class="wg-quantity">
                                                            <span class="btn-quantity btndecrease" data-cart-id="{{ $cart->cart_id }}">
                                                                <svg class="d-inline-block" width="9" height="1"
                                                                    viewBox="0 0 9 1" fill="currentColor">
                                                                    <path
                                                                        d="M9 1H5.14286H3.85714H0V1.50201e-05H3.85714L5.14286 0L9 1.50201e-05V1Z">
                                                                    </path>
                                                                </svg>
                                                            </span>
                                                          
                                                            <input type="text" name="number" value="{{ $cart->quantity }}" class="quantity-input" data-cart-id="{{ $cart->cart_id }}" data-price="{{ $cart->price }}">
                                                            
                                                            <span class="btn-quantity btnincrease" data-cart-id="{{ $cart->cart_id }}">
                                                                <svg class="d-inline-block" width="9" height="9"
                                                                    viewBox="0 0 9 9" fill="currentColor">
                                                                    <path
                                                                        d="M9 5.14286H5.14286V9H3.85714V5.14286H0V3.85714H3.85714V0H5.14286V3.85714H9V5.14286Z">
                                                                    </path>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                            
                                                <td class="tf-cart-item_total tf-variant-item-total" cart-data-title="Total">
                                                    <div class="cart-total price">AED{{ number_format($cart->price * $cart->quantity, 2) }}</div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                            </form>
                        </div>
                        <div class="tf-page-cart-footer">
                            <div class="tf-cart-footer-inner">
                                <div class="tf-free-shipping-bar">
                                    <div class="tf-progress-bar">
                                        <span style="width: 50%;">
                                            <div class="progress-car">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="14"
                                                    viewBox="0 0 21 14" fill="currentColor">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M0 0.875C0 0.391751 0.391751 0 0.875 0H13.5625C14.0457 0 14.4375 0.391751 14.4375 0.875V3.0625H17.3125C17.5867 3.0625 17.845 3.19101 18.0104 3.40969L20.8229 7.12844C20.9378 7.2804 21 7.46572 21 7.65625V11.375C21 11.8582 20.6082 12.25 20.125 12.25H17.7881C17.4278 13.2695 16.4554 14 15.3125 14C14.1696 14 13.1972 13.2695 12.8369 12.25H7.72563C7.36527 13.2695 6.39293 14 5.25 14C4.10706 14 3.13473 13.2695 2.77437 12.25H0.875C0.391751 12.25 0 11.8582 0 11.375V0.875ZM2.77437 10.5C3.13473 9.48047 4.10706 8.75 5.25 8.75C6.39293 8.75 7.36527 9.48046 7.72563 10.5H12.6875V1.75H1.75V10.5H2.77437ZM14.4375 8.89937V4.8125H16.8772L19.25 7.94987V10.5H17.7881C17.4278 9.48046 16.4554 8.75 15.3125 8.75C15.0057 8.75 14.7112 8.80264 14.4375 8.89937ZM5.25 10.5C4.76676 10.5 4.375 10.8918 4.375 11.375C4.375 11.8582 4.76676 12.25 5.25 12.25C5.73323 12.25 6.125 11.8582 6.125 11.375C6.125 10.8918 5.73323 10.5 5.25 10.5ZM15.3125 10.5C14.8293 10.5 14.4375 10.8918 14.4375 11.375C14.4375 11.8582 14.8293 12.25 15.3125 12.25C15.7957 12.25 16.1875 11.8582 16.1875 11.375C16.1875 10.8918 15.7957 10.5 15.3125 10.5Z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </span>
                                    </div>
                                    <div class="tf-progress-msg">
                                        Buy <span class="price fw-6">$75.00</span> more to enjoy <span class="fw-6">Free
                                            Shipping</span>
                                    </div>
                                </div>
                                <div class="tf-page-cart-checkout">
                                    <div class="shipping-calculator">
                                        <summary
                                            class="accordion-shipping-header d-flex justify-content-between align-items-center collapsed"
                                            data-bs-target="#shipping" data-bs-toggle="collapse" aria-controls="shipping">
                                            <h3 class="shipping-calculator-title">Estimate Shipping</h3>
                                            <span class="shipping-calculator_accordion-icon"></span>
                                        </summary>
                                        <div class="collapse" id="shipping">
                                            <div class="accordion-shipping-content">
                                                <fieldset class="field">
                                                    <label class="label">Country</label>
                                                   
                                                </fieldset>
                                                <fieldset class="field">
                                                    <label class="label">Zip code</label>
                                                    <input type="text" name="text" placeholder="">
                                                </fieldset>
                                                <button
                                                    class="tf-btn btn-fill animate-hover-btn radius-3 justify-content-center">
                                                    <span>Estimate</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-checkbox">
                                        <input type="checkbox" class="tf-check" id="cart-gift-checkbox">
                                        <label for="cart-gift-checkbox" class="fw-4">
                                            <span>Do you want a gift wrap?</span> Only <span class="fw-5">$5.00</span>
                                        </label>
                                    </div>
                                    <div class="tf-cart-totals-discounts">
                                        <h3>Subtotal</h3>
                                        <span class="total-value">AED{{ number_format($subtotal, 2) }}</span>
                                    </div>
                                    <p class="tf-cart-tax">
                                        Taxes and <a href="shipping-delivery.html">shipping</a> calculated at checkout
                                    </p>
                                    <div class="cart-checkbox">
                                        <input type="checkbox" class="tf-check" id="check-agree">
                                        <label for="check-agree" class="fw-4">
                                            I agree with the <a href="{{route('terms.condition')}}">terms and conditions</a>
                                        </label>
                                    </div>
                                    <div class="cart-checkout-btn">
                                        <a href="{{route('checkout')}}"
                                            class="tf-btn w-100 btn-fill animate-hover-btn radius-3 justify-content-center">
                                            <span>Check out</span>
                                        </a>
                                    </div>
                                    <div class="tf-page-cart_imgtrust">
                                        <p class="text-center fw-6">Guarantee Safe Checkout</p>
                                        <div class="cart-list-social">
                                            <div class="payment-item">
                                                <svg viewBox="0 0 38 24" xmlns="http://www.w3.org/2000/svg" role="img"
                                                    width="38" height="24" aria-labelledby="pi-visa">
                                                    <title id="pi-visa">Visa</title>
                                                    <path opacity=".07"
                                                        d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z">
                                                    </path>
                                                    <path fill="#fff"
                                                        d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32">
                                                    </path>
                                                    <path
                                                        d="M28.3 10.1H28c-.4 1-.7 1.5-1 3h1.9c-.3-1.5-.3-2.2-.6-3zm2.9 5.9h-1.7c-.1 0-.1 0-.2-.1l-.2-.9-.1-.2h-2.4c-.1 0-.2 0-.2.2l-.3.9c0 .1-.1.1-.1.1h-2.1l.2-.5L27 8.7c0-.5.3-.7.8-.7h1.5c.1 0 .2 0 .2.2l1.4 6.5c.1.4.2.7.2 1.1.1.1.1.1.1.2zm-13.4-.3l.4-1.8c.1 0 .2.1.2.1.7.3 1.4.5 2.1.4.2 0 .5-.1.7-.2.5-.2.5-.7.1-1.1-.2-.2-.5-.3-.8-.5-.4-.2-.8-.4-1.1-.7-1.2-1-.8-2.4-.1-3.1.6-.4.9-.8 1.7-.8 1.2 0 2.5 0 3.1.2h.1c-.1.6-.2 1.1-.4 1.7-.5-.2-1-.4-1.5-.4-.3 0-.6 0-.9.1-.2 0-.3.1-.4.2-.2.2-.2.5 0 .7l.5.4c.4.2.8.4 1.1.6.5.3 1 .8 1.1 1.4.2.9-.1 1.7-.9 2.3-.5.4-.7.6-1.4.6-1.4 0-2.5.1-3.4-.2-.1.2-.1.2-.2.1zm-3.5.3c.1-.7.1-.7.2-1 .5-2.2 1-4.5 1.4-6.7.1-.2.1-.3.3-.3H18c-.2 1.2-.4 2.1-.7 3.2-.3 1.5-.6 3-1 4.5 0 .2-.1.2-.3.2M5 8.2c0-.1.2-.2.3-.2h3.4c.5 0 .9.3 1 .8l.9 4.4c0 .1 0 .1.1.2 0-.1.1-.1.1-.1l2.1-5.1c-.1-.1 0-.2.1-.2h2.1c0 .1 0 .1-.1.2l-3.1 7.3c-.1.2-.1.3-.2.4-.1.1-.3 0-.5 0H9.7c-.1 0-.2 0-.2-.2L7.9 9.5c-.2-.2-.5-.5-.9-.6-.6-.3-1.7-.5-1.9-.5L5 8.2z"
                                                        fill="#142688"></path>
                                                </svg>
                                            </div>
                                            <div class="payment-item">
                                                <svg viewBox="0 0 38 24" xmlns="http://www.w3.org/2000/svg" width="38"
                                                    height="24" role="img" aria-labelledby="pi-paypal">
                                                    <title id="pi-paypal">PayPal</title>
                                                    <path opacity=".07"
                                                        d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z">
                                                    </path>
                                                    <path fill="#fff"
                                                        d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32">
                                                    </path>
                                                    <path fill="#003087"
                                                        d="M23.9 8.3c.2-1 0-1.7-.6-2.3-.6-.7-1.7-1-3.1-1h-4.1c-.3 0-.5.2-.6.5L14 15.6c0 .2.1.4.3.4H17l.4-3.4 1.8-2.2 4.7-2.1z">
                                                    </path>
                                                    <path fill="#3086C8"
                                                        d="M23.9 8.3l-.2.2c-.5 2.8-2.2 3.8-4.6 3.8H18c-.3 0-.5.2-.6.5l-.6 3.9-.2 1c0 .2.1.4.3.4H19c.3 0 .5-.2.5-.4v-.1l.4-2.4v-.1c0-.2.3-.4.5-.4h.3c2.1 0 3.7-.8 4.1-3.2.2-1 .1-1.8-.4-2.4-.1-.5-.3-.7-.5-.8z">
                                                    </path>
                                                    <path fill="#012169"
                                                        d="M23.3 8.1c-.1-.1-.2-.1-.3-.1-.1 0-.2 0-.3-.1-.3-.1-.7-.1-1.1-.1h-3c-.1 0-.2 0-.2.1-.2.1-.3.2-.3.4l-.7 4.4v.1c0-.3.3-.5.6-.5h1.3c2.5 0 4.1-1 4.6-3.8v-.2c-.1-.1-.3-.2-.5-.2h-.1z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="payment-item">
                                                <svg viewBox="0 0 38 24" xmlns="http://www.w3.org/2000/svg" role="img"
                                                    width="38" height="24" aria-labelledby="pi-master">
                                                    <title id="pi-master">Mastercard</title>
                                                    <path opacity=".07"
                                                        d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z">
                                                    </path>
                                                    <path fill="#fff"
                                                        d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32">
                                                    </path>
                                                    <circle fill="#EB001B" cx="15" cy="12" r="7"></circle>
                                                    <circle fill="#F79E1B" cx="23" cy="12" r="7"></circle>
                                                    <path fill="#FF5F00"
                                                        d="M22 12c0-2.4-1.2-4.5-3-5.7-1.8 1.3-3 3.4-3 5.7s1.2 4.5 3 5.7c1.8-1.2 3-3.3 3-5.7z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="payment-item">
                                                <svg xmlns="http://www.w3.org/2000/svg" role="img"
                                                    aria-labelledby="pi-american_express" viewBox="0 0 38 24" width="38"
                                                    height="24">
                                                    <title id="pi-american_express">American Express</title>
                                                    <path fill="#000"
                                                        d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3Z"
                                                        opacity=".07"></path>
                                                    <path fill="#006FCF"
                                                        d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32Z">
                                                    </path>
                                                    <path fill="#FFF"
                                                        d="M22.012 19.936v-8.421L37 11.528v2.326l-1.732 1.852L37 17.573v2.375h-2.766l-1.47-1.622-1.46 1.628-9.292-.02Z">
                                                    </path>
                                                    <path fill="#006FCF"
                                                        d="M23.013 19.012v-6.57h5.572v1.513h-3.768v1.028h3.678v1.488h-3.678v1.01h3.768v1.531h-5.572Z">
                                                    </path>
                                                    <path fill="#006FCF"
                                                        d="m28.557 19.012 3.083-3.289-3.083-3.282h2.386l1.884 2.083 1.89-2.082H37v.051l-3.017 3.23L37 18.92v.093h-2.307l-1.917-2.103-1.898 2.104h-2.321Z">
                                                    </path>
                                                    <path fill="#FFF"
                                                        d="M22.71 4.04h3.614l1.269 2.881V4.04h4.46l.77 2.159.771-2.159H37v8.421H19l3.71-8.421Z">
                                                    </path>
                                                    <path fill="#006FCF"
                                                        d="m23.395 4.955-2.916 6.566h2l.55-1.315h2.98l.55 1.315h2.05l-2.904-6.566h-2.31Zm.25 3.777.875-2.09.873 2.09h-1.748Z">
                                                    </path>
                                                    <path fill="#006FCF"
                                                        d="M28.581 11.52V4.953l2.811.01L32.84 9l1.456-4.046H37v6.565l-1.74.016v-4.51l-1.644 4.494h-1.59L30.35 7.01v4.51h-1.768Z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="payment-item">
                                                <svg xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 38 24"
                                                    width="38" height="24" aria-labelledby="pi-amazon">
                                                    <title id="pi-amazon">Amazon</title>
                                                    <path
                                                        d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z"
                                                        fill="#000" fill-rule="nonzero" opacity=".07"></path>
                                                    <path
                                                        d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32"
                                                        fill="#FFF" fill-rule="nonzero"></path>
                                                    <path
                                                        d="M25.26 16.23c-1.697 1.48-4.157 2.27-6.275 2.27-2.97 0-5.644-1.3-7.666-3.463-.16-.17-.018-.402.173-.27 2.183 1.504 4.882 2.408 7.67 2.408 1.88 0 3.95-.46 5.85-1.416.288-.145.53.222.248.47v.001zm.706-.957c-.216-.328-1.434-.155-1.98-.078-.167.024-.193-.148-.043-.27.97-.81 2.562-.576 2.748-.305.187.272-.047 2.16-.96 3.063-.14.138-.272.064-.21-.12.205-.604.664-1.96.446-2.29h-.001z"
                                                        fill="#F90" fill-rule="nonzero"></path>
                                                    <path
                                                        d="M21.814 15.291c-.574-.498-.676-.73-.993-1.205-.947 1.012-1.618 1.315-2.85 1.315-1.453 0-2.587-.938-2.587-2.818 0-1.467.762-2.467 1.844-2.955.94-.433 2.25-.51 3.25-.628v-.235c0-.43.033-.94-.208-1.31-.212-.333-.616-.47-.97-.47-.66 0-1.25.353-1.392 1.085-.03.163-.144.323-.3.33l-1.677-.187c-.14-.033-.296-.153-.257-.38.386-2.125 2.223-2.766 3.867-2.766.84 0 1.94.234 2.604.9.842.82.762 1.918.762 3.11v2.818c0 .847.335 1.22.65 1.676.113.164.138.36-.003.482-.353.308-.98.88-1.326 1.2a.367.367 0 0 1-.414.038zm-1.659-2.533c.34-.626.323-1.214.323-1.918v-.392c-1.25 0-2.57.28-2.57 1.82 0 .782.386 1.31 1.05 1.31.487 0 .922-.312 1.197-.82z"
                                                        fill="#221F1F"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
    
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
        <!-- page-cart -->

        <!-- products -->
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

        <!-- Footer -->
        <footer id="footer" class="footer background-black">
            <div class="footer-wrap wow fadeIn" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s; animation-name: fadeIn;">
                <div class="footer-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-3 col-md-6 col-12">
                                <div class="footer-infor">
                                    <div class="footer-logo">
                                        <a href="index.html">
                                            <img src="files/images/logo/logowhite.png" alt="" style="width: 50%;">
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
                                        <img src="files/images/payments/visa.png" alt="">
                                        <img src="files/images/payments/img-1.png" alt="">
                                        <img src="files/images/payments/img-2.png" alt="">
                                        <img src="files/images/payments/img-3.png" alt="">
                                        <img src="files/images/payments/img-4.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /Footer -->

    </div>

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
                        </a>
                        
                    </li>
                    
                    <li class="nav-mb-item">
                        <a href="#dropdown-menu-three" class="collapsed mb-menu-link current" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="dropdown-menu-three">
                            <span>Products</span>
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
                    </li>
                    <li class="nav-mb-item Contact Us">
                        <a href="#dropdown-menu-five" class="collapsed mb-menu-link current" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="dropdown-menu-five">
                            <span>Account</span>
                            <span class="btn-open-sub d-none"></span>
                        </a>
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
                   @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if ($errors->has('email'))
                        <div class="alert alert-danger">
                            {{ $errors->first('email') }}
                        </div>
                    @endif

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

    @if (session('showLoginModal'))
        <script>
            window.onload = function () {
                const loginModal = new bootstrap.Modal(document.getElementById('login')); // or $('#login').modal('show') for jQuery
                loginModal.show();
            };
        </script>
    @endif
    @if(session('show_login_modal'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                let loginModal = new bootstrap.Modal(document.getElementById('login'));
                loginModal.show();
            });
        </script>
    @endif
    @if (session('status') || $errors->has('email'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                let forgotModal = new bootstrap.Modal(document.getElementById('forgotPassword'));
                forgotModal.show();
            });
        </script>
    @endif

<!--<script>
    $(document).ready(function () {

        function updateSubtotal() {
            let subtotal = 0;
            $('.tf-cart-item').each(function () {
                let price = parseFloat($(this).find('.cart-price').data('price'));
                let qty = parseInt($(this).find('.quantity-input').val()) || 1;
                subtotal += price * qty;
            });
            $('.total-value').text('AED ' + subtotal.toFixed(2));
        }

        // Prevent multiple event attachments
        $(document).off('click', '.btnincrease').on('click', '.btnincrease', function () {
            let $input = $(this).siblings('.quantity-input');
            let currentQty = parseInt($input.val()) || 1;

            currentQty += 1;
            $input.val(currentQty).trigger('change'); // trigger change to recalc total
        });

        $(document).off('click', '.btndecrease').on('click', '.btndecrease', function () {
            let $input = $(this).siblings('.quantity-input');
            let currentQty = parseInt($input.val()) || 1;

            if (currentQty > 1) {
                currentQty -= 1;
                $input.val(currentQty).trigger('change');
            }
        });

        // Central logic to update line total and subtotal
        $(document).off('change', '.quantity-input').on('change', '.quantity-input', function () {
            let $row = $(this).closest('.tf-cart-item');
            let qty = parseInt($(this).val()) || 1;
            $(this).val(qty); // prevent NaN

            let unitPrice = parseFloat($row.find('.cart-price').data('price'));
            let newTotal = (unitPrice * qty).toFixed(2);
            $row.find('.cart-total').text('AED' + newTotal);

            updateSubtotal();
        });

        updateSubtotal();
    });
</script>-->

<script>
    $(document).ready(function () {
        $('.remove-cart').on('click', function () {
            let cartId = $(this).data('cart-id');
            let row = $(this).closest('.tf-cart-item');

            if (confirm('Are you sure you want to remove this item?')) {
                $.ajax({
                    url: '/cart-remove/' + cartId,
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        if (response.success) {
                            row.remove(); // remove item from view
                        }
                    },
                    error: function (xhr) {
                        console.error('Error:', xhr.responseText);
                        alert('Failed to remove item from cart.');
                    }
                });
            }
        });
    });
</script>

<script>
  $(document).ready(function() {
    // Ensure all quantity inputs start at minimum 1
    $('.quantity-input').each(function() {
        let val = parseInt($(this).val());
        if (isNaN(val) || val < 1) {
            $(this).val(1);
        }
    });

    updateCartTotals(); // Optional fallback updater

    let isUpdating = false;
    let skipManualInput = false;
    let inputTimeout;

    // + Button click handler
    $('.btnincrease').off('click').on('click', function() {
        const input = $(this).closest('.wg-quantity').find('.quantity-input');
        let currentQuantity = parseInt(input.val()) || 1;
        let newQuantity = currentQuantity + 1;

        updateCartItem(input.data('cart-id'), newQuantity);
    });

    // - Button click handler
    $('.btndecrease').off('click').on('click', function() {
        const input = $(this).closest('.wg-quantity').find('.quantity-input');
        let currentQuantity = parseInt(input.val()) || 1;
        let newQuantity = currentQuantity > 1 ? currentQuantity - 1 : 1;

        updateCartItem(input.data('cart-id'), newQuantity);
    });

    // Manual input handler with debounce (guarded)
    $('.quantity-input').off('input').on('input', function() {
        if (skipManualInput) return;

        clearTimeout(inputTimeout);
        const input = $(this);
        inputTimeout = setTimeout(() => {
            let quantity = parseInt(input.val()) || 1;
            updateCartItem(input.data('cart-id'), quantity);
        }, 400); // debounce delay
    });

    // Fallback function (optional - for recalculating subtotal client-side)
    function updateCartTotals() {
        let subtotal = 0;

        $('.tf-cart-item').each(function() {
            const input = $(this).find('.quantity-input');
            const quantity = parseInt(input.val()) || 1;
            const price = parseFloat(input.data('price')) || 0;
            const total = price * quantity;

            $(this).find('.cart-total').text('AED' + total.toFixed(2));
            subtotal += total;
        });

        $('.total-value').text('AED' + subtotal.toFixed(2));
    }

    // Core AJAX update function
    function updateCartItem(cartId, quantity) {
        if (isUpdating) return;
        isUpdating = true;

        // Temporarily block input handler
        skipManualInput = true;

        // Optional: disable buttons during update
        $('.btnincrease, .btndecrease').prop('disabled', true);

        $.ajax({
            url: '/cart/update',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Accept': 'application/json'
            },
            data: {
                cart_id: cartId,
                quantity: quantity
            },
            success: function(response) {
                if (response.success) {
                    const input = $('.quantity-input[data-cart-id="' + cartId + '"]');
                    const row = input.closest('.tf-cart-item');

                    // ✅ Use backend quantity as the source of truth
                    input.val(response.quantity);
                    row.find('.cart-total').text('AED' + response.item_total);
                    $('.total-value').text('AED' + response.subtotal);
                } else {
                    alert(response.message || 'Update failed');
                    updateCartTotals();
                }
            },
            error: function(xhr) {
                let message = 'Error updating cart';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                }
                alert(message);
                updateCartTotals();
            },
            complete: function() {
                isUpdating = false;
                skipManualInput = false;
                $('.btnincrease, .btndecrease').prop('disabled', false);
            }
        });
    }
  });
</script>


</body>
</html>