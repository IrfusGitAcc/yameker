<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Shipments | Yameker</title>

    <link rel="icon" href="{{asset('assets/img/mini_logo.png')}}" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap1.min.css')}}" />
    <!-- themefy CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendors/themefy_icon/themify-icons.css')}}" />
    <!-- select2 CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendors/niceselect/css/nice-select.css')}}" />
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendors/owl_carousel/css/owl.carousel.css')}}" />
    <!-- gijgo css -->
    <link rel="stylesheet" href="{{asset('assets/vendors/gijgo/gijgo.min.css')}}" />
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendors/font_awesome/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendors/tagsinput/tagsinput.css')}}" />

    
     <!-- scrollabe  -->
     <link rel="stylesheet" href="{{asset('assets/vendors/scroll/scrollable.css')}}" />
    <!-- datatable CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendors/datatable/css/jquery.dataTables.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendors/datatable/css/responsive.dataTables.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendors/datatable/css/buttons.dataTables.min.css')}}" />
    <!-- text editor css -->
    <link rel="stylesheet" href="{{asset('assets/vendors/text_editor/summernote-bs4.css')}}" />
    <!-- morris css -->
    <link rel="stylesheet" href="{{asset('assets/vendors/morris/morris.css')}}">
    <!-- metarial icon css -->
   
    <!-- menu css  -->
    <link rel="stylesheet" href="{{asset('assets/css/metisMenu.css')}}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style1.css')}}" />
   
</head>
<body class="crm_body_bg">


<!-- main content part here -->
 
 <!-- sidebar  -->
<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
        <a class="large_logo" href="{{route('home')}}"><img src="{{asset('assets/img/logo.png')}}" alt=""></a>
        <a class="small_logo" href="{{route('home')}}"><img src="assets/img/mini_logo.png" alt=""></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class="">
            <a class="" href="{{route('index')}}" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('assets/img/menu-icon/dashboard.svg') }}" alt="">
                </div>
                <div class="nav_title">
                    <span>Dashboard</span>
                </div>
            </a>
            
        </li>
        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
              <div class="nav_icon_small">
                <img src="assets/img/menu-icon/4.svg" alt="">
            </div>
            <div class="nav_title">
                <span>Admins</span>
            </div>
            </a>
            <ul>
              <li><a href="{{route('users')}}">Admin List</a></li>
            </ul>
        </li>
        
        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
              <div class="nav_icon_small">
                <img src="assets/img/menu-icon/5.svg" alt="">
            </div>
            <div class="nav_title">
                <span>Customers</span>
            </div>
            </a>
            <ul>
              <li><a href="{{route('app.users')}}">User List</a></li>
              <li><a href="{{route('customers.list')}}">Customers List</a></li>
            </ul>
        </li>
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="assets/img/menu-icon/9.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>Categories</span>
                </div>
            </a>
            <ul>
                <li><a href="{{route('categories')}}">Category Lists</a></li>
                <li><a href="{{route('category.page')}}">Add New category</a></li>
                <li><a href="{{route('sub.category')}}">SubCategory List</a></li>
            </ul>
        </li>
        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
            <div class="nav_icon_small">
                <img src="assets/img/menu-icon/13.svg" alt="">
            </div>
            <div class="nav_title">
                <span>Products</span>
            </div>
            </a>
            <ul>
              <li><a href="{{route('products')}}">Products</a></li>
              
              <li><a href="{{route('admin.cart')}}">Cart</a></li>
              
            </ul>
        </li>
        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
            <div class="nav_icon_small">
                <img src="assets/img/menu-icon/13.svg" alt="">
            </div>
            <div class="nav_title">
                <span>Orders</span>
            </div>
            </a>
            <ul>
              
              <li><a href="{{route('admin.orders')}}">Orders</a></li>
            </ul>
        </li>
        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
            <div class="nav_icon_small">
                <img src="assets/img/menu-icon/13.svg" alt="">
            </div>
            <div class="nav_title">
                <span>shipping</span>
            </div>
            </a>
            <ul>
              <li><a href="{{route('shipments')}}">Shipments</a></li>
            </ul>
        </li>
        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
            <div class="nav_icon_small">
                <img src="assets/img/menu-icon/13.svg" alt="">
            </div>
            <div class="nav_title">
                <span>Reports</span>
            </div>
            </a>
            <ul>
              <li><a href="{{route('sales.report')}}">Sales Report</a></li>
            </ul>
        </li>
    </ul>
</nav>
 <!--/ sidebar  -->


<section class="main_content dashboard_part large_header_bg">
        <!-- menu  -->
    <div class="container-fluid g-0">
        <div class="row">
            <div class="col-lg-12 p-0 ">
                <div class="header_iner d-flex justify-content-between align-items-center">
                    <div class="sidebar_icon d-lg-none">
                        <i class="ti-menu"></i>
                    </div>
                    <div class="line_icon open_miniSide d-none d-lg-block">
                        <img src="img/line_img.png" alt="">
                    </div>
                    
                    <div class="header_right d-flex justify-content-between align-items-center">
                       
                        <div class="profile_info">
                            <img src="img/client_img.png" alt="#">
                            <div class="profile_info_iner">
                                <div class="profile_author_name">
                                    <p>hi yameker Admin</p>
                                    
                                </div>
                                <div class="profile_info_details">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <input type="submit" class="btn_1" name="submit" value="Log Out">
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ menu  -->
     <div class="main_content_iner overly_inner ">
        <div class="container-fluid p-0 ">
            <!-- page title  -->
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                        <div class="page_title_left d-flex align-items-center">
                            <h3 class="f_s_25 f_w_700 dark_text mr_30">Shipments</h3>
                            <ol class="breadcrumb page_bradcam mb-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Shipment</li>
                            </ol>
                        </div>
                        <div class="page_title_right">
                            
                        </div>
                    </div>
                </div>
            </div>
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
                                    <h4>Start Shipments </h4>
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
                                @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <div class="QA_table mb_30 table-responsive">
                                    <table class="table  table-hover lms_table_active">
                                        <thead>
                                            <tr>
                                                <th style="width: 30px;"><input type="checkbox" id="select-all"></th>
                                                <th style="width: 40px;">Sl No</th>
                                                <th style="width: 70px;">Order Id</th>
                                                <th style="width: 100px;">Tracking</th>
                                                <th style="width: 100px;">Eco-Awb</th>
                                                <th style="width: 100px;">Status</th>
                                                <th style="width: 70px;">Payload</th>
                                                <th style="width: 70px;">Response</th>
                                                <th style="width: 100px;">Create Shipment</th>
                                                <th style="width: 100px;">Date</th>
                                                <th style="width: 90px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $index => $order)
                                                @php
                                                    $shipment = $order->shipment; // Assuming hasOne('Shipment') relation on Order model
                                                @endphp
                                                <tr>
                                                    <td><input type="checkbox" class="admin-checkbox" value="{{ $order->id }}"></td>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $order->order_number }}</td>
                                                    <td>
                                                        @if ($shipment && $shipment->tracking_number)
                                                            <span class="text-success">{{ $shipment->tracking_number }}</span>
                                                        @else
                                                            <span class="text-muted">Not generated</span>
                                                        @endif
                                                    </td> <!-- tracking -->
                                                    <td>
                                                        @if ($shipment && $shipment->eco_awb)
                                                            <a href="{{ $shipment->eco_awb }}" target="_blank" class="btn btn-sm btn-primary">AWB</a>
                                                        @else
                                                            <span class="text-muted">Not generated</span>
                                                        @endif
                                                    </td><!-- eco_awb -->
                                                    <td>
                                                        @php
                                                            $shipmentStatus = $order->shipment->status ?? 'Not Created';
                                                    
                                                            $shipmentStatusClass = match($shipmentStatus) {
                                                                'created' => 'bg-primary text-white',
                                                                'delivered' => 'bg-success text-white',
                                                                'failed' => 'bg-danger text-white',
                                                                'in_transit' => 'bg-warning text-dark',
                                                                default => 'bg-secondary text-white'
                                                            };
                                                        @endphp
                                                    
                                                        <span class="badge {{ $shipmentStatusClass }}">{{ ucfirst($shipmentStatus) }}</span>
                                                    </td>

                                                    <td>
                                                        @if ($shipment && $shipment->api_payload)
                                                            <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal"
                                                                data-bs-target="#payloadModal-{{ $order->order_id }}">View Payload</button>
                                                        @else
                                                            <span class="text-muted">No Payload</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($shipment && $shipment->api_response)
                                                            <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
                                                                data-bs-target="#responseModal-{{ $order->order_id }}">View Response</button>
                                                        @else
                                                            <span class="text-muted">No Response</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button type="button" 
                                                                class="btn-ship" 
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#shipmentModal-{{ $order->order_id }}"
                                                                data-order='@json($order)'
                                                                data-customer='@json($order->shippingAddress)'
                                                                data-items='@json($order->items)'>
                                                            Create Shipment
                                                        </button>
                                                    </td>

                                                    <td>{{ \Carbon\Carbon::parse($order->created_at)->format('F j, Y') }}</td>
                                                    <td></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title -->
            
        </div>
    </div>

    <!-- footer part -->
    <div class="footer_part">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer_iner text-center">
                        <p>2020 © Influence - Designed by <a href="#"> <i class="ti-heart"></i> </a><a href="#"> Dashboard</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</section>
<!-- main content part end -->




<div id="back-top" >
    <a title="Go to Top" href="#">
        <i class="ti-angle-up"></i>
    </a>
</div>

<!-- footer  -->

@foreach ($orders as $order)
    <div class="modal fade" id="shipmentModal-{{ $order->order_id }}" tabindex="-1" aria-labelledby="shipmentModalLabel-{{ $order->order_id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('create.shipment') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="shipmentModalLabel-{{ $order->order_id }}">
                            Create Shipment for Order #{{ $order->order_number }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
    
                    <div class="modal-body">
                            <!-- All your form content here -->
                            <!-- Order Details -->
                             <input type="hidden" name="order_id" value="{{ $order->order_id }}">
                            <input type="hidden" name="0[order_reference]" value="{{ $order->order_number }}">
                            <input type="hidden" name="0[shipment_value]" value="{{ $order->grand_total }}">
                            <input type="hidden" name="0[currency]" value="AED">
                            <input type="hidden" name="0[request_type]" value="1">
                            <input type="hidden" name="0[delivery_attempt_mode]" value="1">
    
                            <!-- Product & Service -->
                            <div class="row mb-2">
                                <div class="col-md-4 mb-2">
                                    <label for="order_reference" class="form-label">Order Reference</label>
                                    <input type="text" id="order_reference" name="0[order_reference]" value="{{ $order->order_number }}" placeholder="Order Reference" class="form-control" required>
                                </div>
                            
                                <div class="col-md-4 mb-2">
                                    <label for="customer_service_type" class="form-label">Customer Service Type</label>
                                    <input type="text" id="customer_service_type" name="0[customer_service_type]" placeholder="Customer Service Type" class="form-control">
                                </div>
                            
                                <div class="col-md-4 mb-2">
                                    <label for="schedule_delivery_date" class="form-label">Schedule Delivery Date</label>
                                    <input type="date" id="schedule_delivery_date" name="0[schedule_delivery_date]" placeholder="Schedule Delivery Date" class="form-control">
                                </div>
                            
                                <div class="col-md-4 mb-2">
                                    <label for="shipment_value" class="form-label">Shipment Value</label>
                                    <input type="number" step="0.01" id="shipment_value" name="0[shipment_value]" placeholder="Shipment Value" class="form-control" value="{{ $order->total_amount }}">
                                </div>
                            
                                <div class="col-md-4 mb-2">
                                    <label for="currency" class="form-label">Currency</label>
                                    <input type="text" id="currency" name="0[currency]" placeholder="Currency" class="form-control" value="AED" required>
                                </div>
                            
                                <div class="col-md-4 mb-2">
                                    <label for="product_type" class="form-label">Product Type</label>
                                    <select name="0[product_type]" id="product_type" class="form-select" required>
                                        <option value="non_document">Non Document</option>
                                        <option value="document">Document</option>
                                    </select>
                                </div>
                            
                                <div class="col-md-4 mb-2">
                                    <label for="request_type" class="form-label">Request Type</label>
                                    <select name="0[request_type]" id="request_type" class="form-select" required>
                                        <option value="1">Shipment Only</option>
                                        <option value="2">Booking Only</option>
                                        <option value="3">Shipment & Booking</option>
                                    </select>
                                </div>
                            
                                <div class="col-md-4 mb-2">
                                    <label for="deliver_attempt_mode" class="form-label">Delivery  Mode</label>
                                    <select name="0[delivery_attempt_mode]" id="deliver_attempt_mode" class="form-select" required>
                                        <option value="1">Direct Delivery Attempt</option>
                                        <option value="2">Scheduled by Consignee</option>
                                    </select>
                                </div>
                            
                                <div class="col-md-4 mb-2">
                                    <label for="service_type" class="form-label">Service Type</label>
                                    <select name="0[service_type]" id="service_type" class="form-select" required>
                                        <option value="normal_delivery">Normal Delivery</option>
                                        <option value="routed_pickup">Routed Pickup</option>
                                        <option value="rts">RTS</option>
                                        <option value="bullet_service">Bullet Service</option>
                                        <option value="sdd">SDD</option>
                                    </select>
                                </div>
                            </div>
    
    
                            <!-- Location -->
                            <div class="row mb-2">
                                <div class="col">
                                    <label>Latitude</label>
                                    <input type="text" name="0[location][lat]" id="lat" class="form-control" value="">
                                </div>
                                <div class="col">
                                    <label>Longitude</label>
                                    <input type="text" name="0[location][lon]" id="lon" class="form-control"value="" >
                                </div>
                            </div>
    
                            <!-- COD -->
                            <div class="row mb-2">
                                <div class="col">
                                    <label>COD Amount</label>
                                    <input type="number" name="0[cod][amount]" value="0" class="form-control" >
                                </div>
                                <div class="col">
                                    <label>COD Payment Mode</label>
                                    <select name="0[cod][payment_mode]" class="form-select" >
                                        <option value="cash_only">Cash Only</option>
                                        <option value="card_only">Card Only</option>
                                        <option value="any">Any</option>
                                    </select>
                                </div>
                            </div>
    
                            <!-- Customs -->
                            <div class="mb-2">
                                <label>Customs Payment Mode</label>
                                <select name="0[customs_payment][payment_mode]" class="form-select">
                                    <option value="DDU">DDU</option>
                                    <option value="DDP">DDP</option>
                                </select>
                            </div>
    
                            <!-- Shipper Info -->
                            <h6>Shipper Details</h6>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="shipper_company_name">Company Name</label>
                                    <input type="text" id="shipper_company_name" name="0[shipper_details][company_name]" value="YourCompany" placeholder="Company Name" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="shipper_sender_name">Sender Name</label>
                                    <input type="text" id="shipper_sender_name" name="0[shipper_details][sender_name]" value="Sender Name" placeholder="Sender Name" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="shipper_address">Address</label>
                                    <input type="text" id="shipper_address" name="0[shipper_details][address]" placeholder="Address" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="shipper_city">City</label>
                                    <input type="text" id="shipper_city" name="0[shipper_details][city]" placeholder="City" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="shipper_country">Country</label>
                                    <input type="text" id="shipper_country" name="0[shipper_details][country]" value="United Arab Emirates" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="shipper_email">Email</label>
                                    <input type="email" id="shipper_email" name="0[shipper_details][email]" placeholder="Email" class="form-control">
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="shipper_mobile_no">Mobile No</label>
                                    <input type="tel" id="shipper_mobile_no" name="0[shipper_details][mobile_no]" class="form-control" placeholder="Mobile No" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="shipper_alt_mobile_no">Alt Mobile No</label>
                                    <input type="tel" id="shipper_alt_mobile_no" name="0[shipper_details][alt_mobile_no]" class="form-control" placeholder="Alt Mobile No">
                                </div>
                            </div>
                            
                            <h6>Consignee Details</h6>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="consignee_company_name">Company Name</label>
                                    <input type="text" id="consignee_company_name" name="0[consignee_details][company_name]" placeholder="Company Name" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="consignee_receiver_name">Receiver Name</label>
                                    <input type="text" id="consignee_receiver_name" name="0[consignee_details][receiver_name]" placeholder="Receiver Name" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="consignee_address">Address</label>
                                    <input type="text" id="consignee_address" name="0[consignee_details][address]" placeholder="Address" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="consignee_city">City</label>
                                    <input type="text" id="consignee_city" name="0[consignee_details][city]" placeholder="City" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="consignee_country">Country</label>
                                    <input type="text" id="consignee_country" name="0[consignee_details][country]" value="United Arab Emirates" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="consignee_email">Email</label>
                                    <input type="email" id="consignee_email" name="0[consignee_details][email]" placeholder="Email" class="form-control">
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="consignee_mobile_no">Mobile No</label>
                                    <input type="tel" id="consignee_mobile_no" name="0[consignee_details][mobile_no]" class="form-control" placeholder="Mobile No" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="consignee_alt_mobile_no">Alt Mobile No</label>
                                    <input type="tel" id="consignee_alt_mobile_no" name="0[consignee_details][alt_mobile_no]" class="form-control" placeholder="Alt Mobile No">
                                </div>
                            </div>
                            
                            <h6>Package Details</h6>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="package_description">Package Description</label>
                                    <input type="text" id="package_description" name="0[package_details][0][description]" class="form-control" placeholder="Package Description" >
                                </div>
                                <div class="col-md-6">
                                    <label for="package_quantity">Quantity</label>
                                    <input type="number" id="package_quantity" name="0[package_details][0][quantity]" class="form-control" placeholder="Quantity" >
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="package_weight">Weight (kg)</label>
                                    <input type="number" id="package_weight" step="0.01" name="0[package_details][0][weight]" class="form-control" placeholder="Weight (kg)" >
                                </div>
                                <div class="col-md-6">
                                    <label for="package_height">Height (cm)</label>
                                    <input type="number" id="package_height" step="0.01" name="0[package_details][0][height]" class="form-control" placeholder="Height (cm)">
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="package_width">Width (cm)</label>
                                    <input type="number" id="package_width" step="0.01" name="0[package_details][0][width]" class="form-control" placeholder="Width (cm)" >
                                </div>
                                <div class="col-md-6">
                                    <label for="package_length">Length (cm)</label>
                                    <input type="number" id="package_length" step="0.01" name="0[package_details][0][length]" class="form-control" placeholder="Length (cm)" >
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="dimension_units">Dimension Units</label>
                                <input type="text" id="dimension_units" name="0[package_details][0][dimension_units]" value="CM" class="form-control" readonly>
                            </div>
                            
                            <h6>Item Details (Optional)</h6>
                            <!-- Inside shipment modal -->
                            <div id="items-wrapper-{{ $order->order_id }}"></div>

                            <!--<div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="item_code">Item Code</label>
                                    <input type="text" id="item_code" name="0[package_details][0][item_details][0][item_code]" class="form-control" placeholder="Item Code">
                                </div>
                                <div class="col-md-6">
                                    <label for="hs_code">HS Code</label>
                                    <input type="text" id="hs_code" name="0[package_details][0][item_details][0][hs_code]" class="form-control" placeholder="HS Code">
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="item_description">Item Description</label>
                                    <input type="text" id="item_description" name="0[package_details][0][item_details][0][description]" class="form-control" placeholder="Item Description">
                                </div>
                                <div class="col-md-6">
                                    <label for="item_quantity">Quantity</label>
                                    <input type="number" id="item_quantity" name="0[package_details][0][item_details][0][quantity]" class="form-control" placeholder="Quantity">
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="serial_number">Serial Number</label>
                                <input type="text" id="serial_number" name="0[package_details][0][item_details][0][serial_number][]" class="form-control" placeholder="Serial Number">
                            </div>-->
    
                    </div>
    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Create Shipment</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @php
        $shipment = $order->shipment;
    @endphp
    <!-- Payload Modal -->
    @if ($shipment && $shipment->api_payload)
        <div class="modal fade" id="payloadModal-{{ $order->order_id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Shipment Payload (Order ID: {{ $order->order_number }})</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <pre>{{ json_encode(json_decode($shipment->api_payload), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}</pre>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Response Modal -->
    @if ($shipment && $shipment->api_response)
        <div class="modal fade" id="responseModal-{{ $order->order_id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">API Response (Order ID: {{ $order->order_number }})</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <pre>{{ json_encode(json_decode($shipment->api_response), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}</pre>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endforeach


<!--modal for create shipment-->



<!-- popper js -->
<script src="{{asset('assets/js/popper1.min.js')}}"></script>
<!-- bootstarp js -->
<!-- jQuery (MUST be before Bootstrap JS) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- sidebar menu  -->
<script src="{{asset('assets/js/metisMenu.js')}}"></script>
<!-- waypoints js -->
<script src="{{asset('assets/vendors/count_up/jquery.waypoints.min.js')}}"></script>
<!-- waypoints js -->
<script src="{{asset('assets/vendors/chartlist/Chart.min.js')}}"></script>
<!-- counterup js -->
<script src="{{asset('assets/vendors/count_up/jquery.counterup.min.js')}}"></script>

<!-- nice select -->
<script src="{{asset('assets/vendors/niceselect/js/jquery.nice-select.min.js')}}"></script>
<!-- owl carousel -->
<script src="{{asset('assets/vendors/owl_carousel/js/owl.carousel.min.js')}}"></script>

<!-- responsive table -->
<script src="{{asset('assets/vendors/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatable/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatable/js/jszip.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/vendors/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatable/js/buttons.print.min.js')}}"></script>



<!-- progressbar js -->
<script src="{{asset('assets/vendors/progressbar/jquery.barfiller.js')}}"></script>
<!-- tag input -->
<script src="{{asset('assets/vendors/tagsinput/tagsinput.js')}}"></script>
<!-- text editor js -->
<script src="{{asset('assets/vendors/text_editor/summernote-bs4.js')}}"></script>
<script src="{{asset('assets/vendors/am_chart/amcharts.js')}}"></script>

<!-- scrollabe  -->
<script src="{{asset('assets/vendors/scroll/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/vendors/scroll/scrollable-custom.js')}}"></script>

<script src="{{asset('assets/js/custom.js')}}"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const buttons = document.querySelectorAll('.btn-ship');

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                const order = JSON.parse(button.getAttribute('data-order'));
                const customer = JSON.parse(button.getAttribute('data-customer'));
                const items = JSON.parse(button.getAttribute('data-items'));

                const orderId = order.order_id;

                // Fill consignee (customer) details
                document.querySelector(`#shipmentModal-${orderId} #consignee_company_name`).value = customer.company_name || '';
                document.querySelector(`#shipmentModal-${orderId} #consignee_receiver_name`).value = customer.first_name || '';
                document.querySelector(`#shipmentModal-${orderId} #consignee_address`).value = customer.address || '';
                document.querySelector(`#shipmentModal-${orderId} #consignee_city`).value = customer.city || '';
                document.querySelector(`#shipmentModal-${orderId} #consignee_email`).value = customer.email || '';
                document.querySelector(`#shipmentModal-${orderId} #consignee_mobile_no`).value = customer.phone || '';
               

                // Populate item fields
                const itemsWrapper = document.querySelector(`#shipmentModal-${orderId} #items-wrapper-${orderId}`);
                itemsWrapper.innerHTML = ''; // Clear previous

                items.forEach((item, index) => {
                    const product = item.product ?? {};
                    const itemHTML = `
                        <div class="item-group border rounded p-3 mb-3">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Item Code</label>
                                    <input type="text" name="0[package_details][0][item_details][${index}][item_code]" class="form-control" value="${product.sku ?? ''}" placeholder="Item Code">
                                </div>
                                <div class="col-md-6">
                                    <label>HS Code</label>
                                    <input type="text" name="0[package_details][0][item_details][${index}][hs_code]" class="form-control" value="${item.hs_code || ''}" placeholder="HS Code">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Item Description</label>
                                    <input type="text" name="0[package_details][0][item_details][${index}][description]" class="form-control" value="${product.name || ''}" placeholder="Item Description">
                                </div>
                                <div class="col-md-6">
                                    <label>Quantity</label>
                                    <input type="number" name="0[package_details][0][item_details][${index}][quantity]" class="form-control" value="${item.qty || 1}" placeholder="Quantity">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Serial Number</label>
                                <input type="text" name="0[package_details][0][item_details][${index}][serial_number][]" class="form-control" placeholder="Serial Number">
                            </div>
                        </div>
                    `;
                    itemsWrapper.insertAdjacentHTML('beforeend', itemHTML);
                });
            });
        });
    });
</script>


</body>
</html>
