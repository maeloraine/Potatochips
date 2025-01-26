@extends('layouts.simple.master')
@section('title', 'Ecommerce')

@section('css')
    
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
@endsection

@section('breadcrumb-title')
    <h3>Dashboard</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row size-column">
            <div class="col-xxl-10 col-md-12 box-col-8 grid-ed-12">
                <div class="row">
                    <div class="col-xxl-5 col-md-7 box-col-7">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card o-hidden">
                                    <div class="card-body"><span class="f-w-500 f-light">Total Bookings</span>
                                        <h4 class="mb-3 mt-1 f-w-500 mb-0 f-22"><span class="counter">102
                                            </span><span class="f-light f-14 f-w-400 ms-1">This month</span></h4><a
                                            class="purchase-btn btn btn-primary btn-hover-effect f-w-500" href="{{ route('booking') }}">Book a Customer</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card small-widget">
                                    <div class="card-body primary"> <span class="f-light">New Bookings Today</span>
                                        <div class="d-flex align-items-end gap-1">
                                            <h4>21</h4><span class="font-primary f-12 f-w-500">
                                        </div>
                                        <div class="bg-gradient">
                                            <svg class="stroke-icon svg-fill">
                                                <use href="{{ asset('assets/svg/icon-sprite.svg#new-order') }}"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card small-widget">
                                    <div class="card-body warning"><span class="f-light">Guests Today</span>
                                        <div class="d-flex align-items-end gap-1">
                                            <h4>2,908</h4><span class="font-warning f-12 f-w-500">
                                        </div>
                                        <div class="bg-gradient">
                                            <svg class="stroke-icon svg-fill">
                                                <use href="{{ asset('assets/svg/icon-sprite.svg#customers') }}"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card small-widget">
                                    <div class="card-body secondary"><span class="f-light">Available Rooms (All Types)</span>
                                        <div class="d-flex align-items-end gap-1">
                                            <h4>389</h4><span class="font-secondary f-12 f-w-500">
                                        </div>
                                        <div class="bg-gradient">
                                            <svg class="stroke-icon svg-fill">
                                                <use href="{{ asset('assets/svg/icon-sprite.svg#sale') }}"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card small-widget">
                                    <div class="card-body success"><span class="f-light">Pending Payments</span>
                                        <div class="d-flex align-items-end gap-1">
                                            <h4>5</h4><span class="font-success f-12 f-w-500">
                                        </div>
                                        <div class="bg-gradient">
                                            <svg class="stroke-icon svg-fill">
                                                <use href="{{ asset('assets/svg/icon-sprite.svg#profit') }}"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-5 col-sm-6 box-col-5">
                        <div class="appointment">
                            <div class="card">
                                <div class="card-header card-no-border">
                                    <div class="header-top">
                                        <h5 class="m-0">Current Guests</h5>
                                        <div class="card-header-right-icon">
                                            <div class="dropdown icon-dropdown">
                                                <button class="btn dropdown-toggle" id="dropdownMenuButton" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="icon-more-alt"></i></button>
                                                <div class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="dropdownMenuButton"><a class="dropdown-item"
                                                        href="#">Today</a><a class="dropdown-item"
                                                        href="#">Tomorrow</a><a class="dropdown-item"
                                                        href="#">Yesterday</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="appointment-table customer-table table-responsive">
                                        <table class="table table-bordernone">
                                            <tbody>
                                                <tr>
                                                    <td><img class="img-fluid img-40 rounded-circle me-2"
                                                            src="{{ asset('assets/images/dashboard/user/1.jpg') }}" alt="user"></td>
                                                    <td class="img-content-box"><a class="f-w-500"
                                                            href="{{ route('user-profile')}}">Jane Cooper</a><span
                                                            class="f-light">alma.lawson@gmail.com</span></td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-sm-6 box-col-6">
                        <div class="card">
                            <div class="card-header card-no-border">
                                <div class="header-top">
                                    <h5 class="m-0">Order this month</h5>
                                    <div class="card-header-right-icon">
                                        <div class="dropdown icon-dropdown">
                                            <button class="btn dropdown-toggle" id="orderButton" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="icon-more-alt"></i></button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orderButton"><a
                                                    class="dropdown-item" href="#">Today</a><a
                                                    class="dropdown-item" href="#">Tomorrow</a><a
                                                    class="dropdown-item" href="#">Yesterday</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="light-card balance-card d-inline-block">
                                    <h4 class="mb-0">$12,000 <span class="f-light f-14">(15,080 To Goal)</span></h4>
                                </div>
                                <div class="order-wrapper">
                                    <div id="order-goal"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6 box-col-6">
                        <div class="card">
                            <div class="card-header card-no-border">
                                <h5>Monthly Profits</h5><span class="f-light f-w-500 f-14">(Total profit growth of
                                    30%)</span>
                            </div>
                            <div class="card-body pt-0">
                                <div class="monthly-profit">
                                    <div id="profitmonthly"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-9 box-col-12">
                        <div class="card">
                            <div class="card-header card-no-border">
                                <h5>Order Overview</h5>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row m-0 overall-card overview-card">
                                    <div class="col-xl-9 col-md-8 col-sm-7 p-0 box-col-7">
                                        <div class="chart-right">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="card-body p-0">
                                                        <ul class="balance-data">
                                                            <li><span class="circle bg-secondary"></span><span
                                                                    class="f-light ms-1">Refunds</span></li>
                                                            <li><span class="circle bg-primary"> </span><span
                                                                    class="f-light ms-1">Earning</span></li>
                                                            <li><span class="circle bg-success"> </span><span
                                                                    class="f-light ms-1">Order</span></li>
                                                        </ul>
                                                        <div class="current-sale-container order-container">
                                                            <div class="overview-wrapper" id="orderoverview"></div>
                                                            <div class="back-bar-container">
                                                                <div id="order-bar"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-5 p-0 box-col-5">
                                        <div class="row g-sm-3 g-2">
                                            <div class="col-md-12">
                                                <div class="light-card balance-card widget-hover">
                                                    <div class="svg-box">
                                                        <svg class="svg-fill">
                                                            <use href="{{ asset('assets/svg/icon-sprite.svg#orders') }}"></use>
                                                        </svg>
                                                    </div>
                                                    <div> <span class="f-light">Orders</span>
                                                        <h6 class="mt-1 mb-0">10,098 </h6>
                                                    </div>
                                                    <div class="ms-auto text-end">
                                                        <div class="dropdown icon-dropdown">
                                                            <button class="btn dropdown-toggle" id="orderdropdown"
                                                                type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false"><i
                                                                    class="icon-more-alt"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-end"
                                                                aria-labelledby="orderdropdown"><a class="dropdown-item"
                                                                    href="#">Today</a><a class="dropdown-item"
                                                                    href="#">Tomorrow</a><a class="dropdown-item"
                                                                    href="#">Yesterday </a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="light-card balance-card widget-hover">
                                                    <div class="svg-box">
                                                        <svg class="svg-fill">
                                                            <use href="{{ asset('assets/svg/icon-sprite.svg#expense') }}"></use>
                                                        </svg>
                                                    </div>
                                                    <div> <span class="f-light">Earning</span>
                                                        <h6 class="mt-1 mb-0">$12,678</h6>
                                                    </div>
                                                    <div class="ms-auto text-end">
                                                        <div class="dropdown icon-dropdown">
                                                            <button class="btn dropdown-toggle" id="earningdropdown"
                                                                type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false"><i
                                                                    class="icon-more-alt"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-end"
                                                                aria-labelledby="earningdropdown"><a class="dropdown-item"
                                                                    href="#">Today</a><a class="dropdown-item"
                                                                    href="#">Tomorrow</a><a class="dropdown-item"
                                                                    href="#">Yesterday </a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="light-card balance-card widget-hover">
                                                    <div class="svg-box">
                                                        <svg class="svg-fill">
                                                            <use href="{{ asset('assets/svg/icon-sprite.svg#doller-return') }}"></use>
                                                        </svg>
                                                    </div>
                                                    <div> <span class="f-light">Refunds</span>
                                                        <h6 class="mt-1 mb-0">3,001</h6>
                                                    </div>
                                                    <div class="ms-auto text-end">
                                                        <div class="dropdown icon-dropdown">
                                                            <button class="btn dropdown-toggle" id="incomedropdown"
                                                                type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false"><i
                                                                    class="icon-more-alt"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-end"
                                                                aria-labelledby="incomedropdown"><a class="dropdown-item"
                                                                    href="#">Today</a><a class="dropdown-item"
                                                                    href="#">Tomorrow</a><a class="dropdown-item"
                                                                    href="#">Yesterday</a></div>
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
                    
            <div class="col-xxl-2 col-xl-3 col-md-4 grid-ed-none box-col-4e d-xxl-block d-none">
                <div class="card">
                    <div class="card-header card-no-border">
                        <h5>Top Categories</h5>
                    </div>
                    <div class="card-body pt-0">
                        <ul class="categories-list">
                            <li class="d-flex">
                                <div class="bg-light"> <img src="{{ asset('assets/images/dashboard-2/category/1.png') }}"
                                        alt="vector burger"></div>
                                <div>
                                    <h6 class="mb-0"><a href="{{ route('product')}}">Food & Drinks</a></h6><span
                                        class="f-light f-12 f-w-500">(12,200)</span>
                                </div>
                            </li>
                            <li class="d-flex">
                                <div class="bg-light"> <img src="{{ asset('assets/images/dashboard-2/category/2.png') }}"
                                        alt="vector furniture"></div>
                                <div>
                                    <h6 class="mb-0"><a href="{{ route('product')}}">Furniture</a></h6><span
                                        class="f-light f-12 f-w-500">(7,510)</span>
                                </div>
                            </li>
                            <li class="d-flex">
                                <div class="bg-light"> <img src="{{ asset('assets/images/dashboard-2/category/3.png') }}"
                                        alt="vector grocery box"></div>
                                <div>
                                    <h6 class="mb-0"><a href="{{ route('product')}}">Grocery</a></h6><span
                                        class="f-light f-12 f-w-500">(15,475)</span>
                                </div>
                            </li>
                            <li class="d-flex">
                                <div class="bg-light"> <img src="{{ asset('assets/images/dashboard-2/category/4.png') }}"
                                        alt="vector game remote"></div>
                                <div>
                                    <h6 class="mb-0"><a href="{{ route('product')}}">Electronics</a></h6><span
                                        class="f-light f-12 f-w-500">(27,840)</span>
                                </div>
                            </li>
                            <li class="d-flex">
                                <div class="bg-light"> <img src="{{ asset('assets/images/dashboard-2/category/5.png') }}"
                                        alt="vector toys"></div>
                                <div>
                                    <h6 class="mb-0"><a href="{{ route('product')}}">Toys & Games</a></h6><span
                                        class="f-light f-12 f-w-500">(8,788)</span>
                                </div>
                            </li>
                            <li class="d-flex">
                                <div class="bg-light"> <img src="{{ asset('assets/images/dashboard-2/category/6.png') }}"
                                        alt="vector monitor"></div>
                                <div>
                                    <h6 class="mb-0"><a href="{{ route('product')}}">Desktop</a></h6><span
                                        class="f-light f-12 f-w-500">(10,673)</span>
                                </div>
                            </li>
                            <li class="d-flex">
                                <div class="bg-light"> <img src="{{ asset('assets/images/dashboard-2/category/7.png') }}"
                                        alt="vector mobile"></div>
                                <div>
                                    <h6 class="mb-0"><a href="{{ route('product')}}">Mobile & Accessories</a></h6><span
                                        class="f-light f-12 f-w-500">(5,129) </span>
                                </div>
                            </li>
                        </ul>
                        <div class="recent-activity notification">
                            <h5>Recent Activity</h5>
                            <ul>
                                <li class="d-flex">
                                    <div class="activity-dot-primary"></div>
                                    <div class="w-100 ms-3">
                                        <p class="d-flex justify-content-between mb-2"><span
                                                class="date-content light-background">8th March, 2022 </span></p>
                                        <h6>Added Bew Items<span class="dot-notification"></span></h6><span
                                            class="f-light">Quisque a consequat ante sit amet magna...</span>
                                        <div class="recent-images">
                                            <ul>
                                                <li>
                                                    <div class="recent-img-wrap"><img
                                                            src="{{ asset('assets/images/dashboard-2/product/1.png') }}"
                                                            alt="chair"></div>
                                                </li>
                                                <li>
                                                    <div class="recent-img-wrap"><img
                                                            src="{{ asset('assets/images/dashboard-2/product/2.png') }}"
                                                            alt="chair"></div>
                                                </li>
                                                <li>
                                                    <div class="recent-img-wrap"><img
                                                            src="{{ asset('assets/images/dashboard-2/product/3.png') }}"
                                                            alt="men t-shirt"></div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex">
                                    <div class="activity-dot-warning"></div>
                                    <div class="w-100 ms-3">
                                        <p class="d-flex justify-content-between mb-2"><span
                                                class="date-content light-background">2nd Sep, Today</span></p>
                                        <h6>Anamika Comments this Poducts<span class="dot-notification"></span></h6>
                                        <span>Quisque a consequat ante sit amet magna...</span>
                                    </div>
                                </li>
                                <li class="d-flex">
                                    <div class="activity-dot-secondary"></div>
                                    <div class="w-100 ms-3">
                                        <p class="d-flex justify-content-between mb-2"><span
                                                class="date-content light-background">3nd Sep, 2022</span></p>
                                        <h6>Jacksion Purchase <span class="dot-notification"></span></h6><span>Quisque a
                                            consequat ante sit amet magna...</span>
                                    </div>
                                </li>
                                <li class="d-flex">
                                    <div class="activity-dot-success"></div>
                                    <div class="w-100 ms-3">
                                        <p class="d-flex justify-content-between mb-2"><span
                                                class="date-content light-background">2nd Sep, Today</span></p>
                                        <h6>Anamika Comments this Poducts<span class="dot-notification"></span></h6>
                                        <span>Quisque a consequat ante sit amet magna...</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('assets/js/counter/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/counter/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/counter/counter-custom.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/dashboard_2.js') }}"></script>
    <script src="{{ asset('assets/js/animation/wow/wow.min.js') }}"></script>
@endsection

