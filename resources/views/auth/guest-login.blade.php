<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Login | Yameker</title>

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


<body class="preload-wrapper">
    <!-- RTL -->
    <a href="javascript:void(0);" id="toggle-rtl" class="tf-btn animate-hover-btn btn-fill">RTL</a>
    <!-- /RTL  -->
    <!-- preload -->
    <div class="preload preload-container">
        <div class="preload-logo">
            <div class="spinner"></div>
        </div>
    </div>
    <!-- /preload -->
    <div id="wrapper">
        <!-- header -->
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
                                    <a href="{{route('shop')}}" class="item-link">Products<i class="icon icon-arrow-down"></i></a>
                                    
                                </li>

                                <li class="menu-item">
                                    <a href="about.html" class="item-link">About Us</a>
                                    
                                </li>


                                <li class="menu-item">
                                    <a href="contact.html" class="item-link">Contact Us</a>
                                    
                                </li>

                                
                                <li class="menu-item">
                                    <a href="faq.html" class="item-link">Account</a>
                                    
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
                                @if(auth()->check())
                                    {{-- User is logged in --}}
                                    <div class="dropdown">
                                        <a href="#" class="nav-icon-item dropdown-toggle" data-bs-toggle="dropdown">
                                            <i class="icon icon-account"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="">My Profile</a></li>
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

                            <li class="nav-wishlist"><a href="wishlist.html" class="nav-icon-item"><i
                                        class="icon icon-heart"></i><span class="count-box">0</span></a></li>
                            <li class="nav-cart"><a href="#shoppingCart" data-bs-toggle="modal" class="nav-icon-item"><i
                                        class="icon icon-bag"></i><span class="count-box">0</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- /header -->

        <!-- page-title -->
        <div class="tf-page-title style-2">
            <div class="container-full">
                <div class="heading text-center">Sign in first or create account</div>
            </div>
        </div>
        <!-- /page-title -->

        <section class="flat-spacing-10">
            <div class="container">
                <div class="tf-grid-layout lg-col-2 tf-login-wrap">
                    <div class="tf-login-form">
                        <div id="recover">
                            <h5 class="mb_24">Reset your password</h5>
                            <p class="mb_30">We will send you an email to reset your password</p>
                            <div>
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
                                <form class="" id="login-form" action="{{route('password.reset')}}" method="POST" accept-charset="utf-8"
                                    data-mailchimp="true">
                                @csrf
                                    <div class="tf-field style-1 mb_15">
                                        <input class="tf-field-input tf-input" placeholder="" type="email"
                                            id="property3" name="email">
                                        <label class="tf-field-label fw-4 text_black-2" for="property3">Email *</label>
                                    </div>
                                    <div class="mb_20">
                                        <a href="#login" class="tf-btn btn-line">Cancel</a>
                                    </div>
                                    <div class="">
                                        <button type="submit"
                                            class="tf-btn w-100 radius-3 btn-fill animate-hover-btn justify-content-center">Reset
                                            password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="login">
                            <h5 class="mb_36">Log in</h5>
                            <div>
                                <form class="" action="{{ route('login') }}" method="POST" accept-charset="utf-8">
                                @csrf
                                    <input type="hidden" name="from_page" value="guest">
                                    @if(session('login_modal_error'))
                                        <div class="alert alert-danger">
                                            {{ session('login_modal_error') }}
                                        </div>
                                    @endif

                                    <div class="tf-field style-1 mb_15">
                                        <input class="tf-field-input tf-input" placeholder="" type="email"
                                            id="property3" name="email">
                                        <label class="tf-field-label fw-4 text_black-2" for="property3">Email *</label>
                                    </div>
                                    <div class="tf-field style-1 mb_30">
                                        <input class="tf-field-input tf-input" placeholder="" type="password"
                                            id="property4" name="password">
                                        <label class="tf-field-label fw-4 text_black-2" for="property4">Password
                                            *</label>
                                    </div>
                                    <div class="mb_20">
                                        <a href="#recover" class="tf-btn btn-line">Forgot your password?</a>
                                    </div>
                                    <div class="text-center my-3">
                                        <a href="{{ route('google.login') }}" class="btn btn-outline-danger w-100">
                                            <i class="fab fa-google me-2"></i> Sign in with Google
                                        </a>
                                    </div>
                                    <div class="">
                                        <button type="submit"
                                            class="tf-btn w-100 radius-3 btn-fill animate-hover-btn justify-content-center">Log
                                            in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tf-login-content">
                        <h5 class="mb_36">I'm new here</h5>
                        <p class="mb_20">Sign up for early Sale access plus tailored new arrivals, trends and
                            promotions. To opt out, click unsubscribe in our emails.</p>
                        <a href="{{route('guest.register')}}" class="tf-btn btn-line">Register<i
                                class="icon icon-arrow1-top-left"></i></a>
                    </div>
                </div>
            </div>
        </section>


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
                                        <a href="{{route('privacy.policy')}}" class="footer-menu_item">Privacy Policy</a>
                                    </li>
                                    
                                    <li>
                                        <a href="shipping-delivery.html" class="footer-menu_item">Shipping</a>
                                    </li>
                                    <li>
                                        <a href="{{route('terms.condition')}}" class="footer-menu_item">Terms &amp;
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
            @auth
                <a href="{{ route('account') }}">
                    <div class="toolbar-icon">
                        <i class="icon-account"></i>
                    </div>
                    <div class="toolbar-label">Account</div>
                </a>
            @endauth
        
            @guest
                <a href="#login" data-bs-toggle="modal">
                    <div class="toolbar-icon">
                        <i class="icon-account"></i>
                    </div>
                    <div class="toolbar-label">Account</div>
                </a>
            @endguest
        </div>

        <div class="toolbar-item">
            <a href="{{route('wishlist')}}">
                <div class="toolbar-icon">
                    <i class="icon-heart"></i>
                    <div class="toolbar-count">{{ $globalWishlistCount ?? 0 }}</div>
                </div>
                <div class="toolbar-label">Wishlist</div>
            </a>
        </div>
        <div class="toolbar-item">
            <a href="{{route('view.cart')}}">
                <div class="toolbar-icon">
                    <i class="icon-bag"></i>
                    <div class="toolbar-count">{{ $globalCartCount ?? 0 }}</div>
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
                        <a href="{{route('home')}}" class=" mb-menu-link current" 
                            aria-expanded="true" aria-controls="dropdown-menu-one">
                            <span>Home</span>
                            <span class="btn-open-sub d-none"></span>
                        </a>
                    </li>
                    
                    <li class="nav-mb-item">
                        <a href="{{route('shop')}}" class=" mb-menu-link current" 
                            aria-expanded="true" aria-controls="dropdown-menu-three">
                            <span>Products</span>
                           
                        </a>
                    </li>
                   
                    <li class="nav-mb-item">
                        @guest
                            <!-- For Guests: Show Login -->
                            <a href="#login" class="mb-menu-link mobile-login" data-bs-toggle="modal">
                                <span>Login</span>
                            </a>
                        @endguest
                    
                        @auth
                            <!-- For Logged-in Users: Show Account Dropdown -->
                            <a href="#dropdown-menu-four" class="collapsed mb-menu-link current" data-bs-toggle="collapse"
                                aria-expanded="false" aria-controls="dropdown-menu-four">
                                <span>Account</span>
                                <span class="btn-open-sub"></span>
                            </a>
                            <div id="dropdown-menu-four" class="collapse">
                                <ul class="sub-nav-menu" id="sub-menu-navigation2">
                                    <li><a href="{{ route('account') }}" class="sub-nav-link">My Profile</a></li>
                                    <li><a href="{{ route('order') }}" class="sub-nav-link">My Orders</a></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endauth
                    </li>



                    <li class="nav-mb-item ">
                        <a href="#dropdown-menu-four" class=" mb-menu-link current" 
                            aria-expanded="true" aria-controls="dropdown-menu-four">
                            <span>About Us</span>
                            <span class="btn-open-sub d-none"></span>
                        </a>
                    </li>
                    <li class="nav-mb-item Contact Us">
                        <a href="#dropdown-menu-five" class=" mb-menu-link current" 
                            aria-expanded="true" aria-controls="dropdown-menu-five">
                            <span>Contact Us</span>
                            <span class="btn-open-sub d-none"></span>
                        </a>
                    </li>
                    
                    
                </ul>
                <div class="mb-other-content ">
                    <ul class="mb-info">
                        <li>Address: Dubai, <br> UAE</li>
                        
                        <li>Phone: <b>(212) 555-1234</b></li>
                    </ul>
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
                    <form class="tf-mini-search-frm" action="{{route('search')}}" method="GET">
                        <fieldset class="text">
                            <input type="text" name="query" placeholder="Search products..." value="{{ request('query') }}" required>
                        </fieldset>
                        <button type="submit"><i class="icon-search"></i></button>
                    </form>
                </div>
            </header>
            <div class="canvas-body p-0">
                <div class="tf-search-content">
                    <div class="tf-cart-hide-has-results">
                        
                        <div class="tf-col-content">
                            <div class="tf-search-content-title fw-5">Need some inspiration?</div>
                            <div class="tf-search-hidden-inner">
                                @php
                                    use App\Models\Product;
                                
                                    $latestProducts = Product::oldest()->take(3)->get();
                                @endphp
                                
                                @foreach($latestProducts as $product)
                                    <div class="tf-loop-item">
                                        <div class="image">
                                            <a href="{{ route('product.details', $product->product_id) }}">
                                                <img class="img-product ls-is-cached lazyloaded" 
                                         data-src="{{ asset('assets/img/' . $product->image) }}" 
                                         src="{{ asset('assets/img/' . $product->image) }}" alt="image-product">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <a href="{{ route('product.details', $product->product_id) }}">{{ $product->name }}</a>
                                            <div class="tf-product-info-price">
                                                <div class="price-on-sale fw-6">AED{{ $product->price }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
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
                <a href="{{route('shop')}}" class="tf-btn fw-5 btn-line">View all collection<i
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
                             @if ($errors->has('email') || $errors->has('password'))
                        <div class="alert alert-danger">
                            {{ $errors->first('email') ?: $errors->first('password') }}
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

                    <form class="" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div>
                            <p>Sign up for early Sale access plus tailored new arrivals, trends and promotions. To opt
                                out, click unsubscribe in our emails</p>
                        </div>
                        <div class="tf-field style-1">
                            <input class="tf-field-input tf-input" placeholder=" " type="email" name="email" value="{{ old('email') }}">
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
                        
                         @if ($errors->any() && session('open_modal') === 'register')
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
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

    
    @if(session('open_modal'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let modalId = "{{ session('open_modal') }}";
            let modalElement = document.getElementById(modalId);
    
            if (modalElement) {
                let modal = new bootstrap.Modal(modalElement);
                modal.show();
            }
        });
    </script>
    @endif
    
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
     <!-- Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

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
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.category-link').forEach(slide => {
                slide.addEventListener('click', function() {
                    window.location.href = this.dataset.url;
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
    document.addEventListener('DOMContentLoaded', function () {
        const loginTrigger = document.querySelector('.mobile-login');
        loginTrigger?.addEventListener('click', function () {
            const expandedCollapse = document.querySelector('.collapse.show');
            if (expandedCollapse) {
                const bsCollapse = bootstrap.Collapse.getInstance(expandedCollapse);
                if (bsCollapse) {
                    bsCollapse.hide();
                }
            }
        });
    });
</script>





</body>

</html>
