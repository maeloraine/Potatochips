<div class="sidebar-wrapper" sidebar-layout="stroke-svg">
    <div>
        <div class="logo-wrapper"><a href="{{ route('index') }}"><img class="img-fluid for-light"
                    src="{{ asset('assets/images/logo/jenson-logo.png') }}" alt=""><img class="img-fluid for-dark"
                    src="{{ asset('assets/images/logo/jenson-logo.png') }}" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="{{ route('index') }}"><img class="img-fluid"
                    src="{{ asset('assets/images/logo/logo-icon.png') }}" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"><a href="{{ route('index') }}"><img class="img-fluid"
                                src="{{ asset('assets/images/logo/logo-icon.png') }}" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6 class="lan-1">General</h6>
                        </div>
                    </li>
                    <!-- Dashboard -->
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i>
                        <label class="badge badge-light-primary"></label><a class="sidebar-link sidebar-title"
                            href="{{ route('employee-dashboard') }}">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
                            </svg><span>My Reservations</span></a>
                        <!-- <ul class="sidebar-submenu">
                            <li><a class="lan-4" href="{{ route('index') }}">Default</a></li>
                            <li><a class="lan-5" href="{{ route('dashboard-02') }}">Ecommerce</a></li>
                            <li><a href="{{ route('dashboard-03') }}">Online course</a></li>
                            <li><a href="{{ route('dashboard-04') }}">Crypto</a></li>
                            <li><a href="{{ route('dashboard-05') }}">Social</a></li>
                        </ul> -->
                    </li>
                    <!-- Guest Information -->
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title"
                            href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-user') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-user') }}"></use>
                            </svg><span>Guest Information</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('user-profile') }}">Users Profile</a></li>
                            <li><a href="{{ route('edit-profile') }}">Users Edit</a></li>
                            <li><a href="{{ route('user-cards') }}">Users Cards</a></li>
                        </ul>
                    </li>
                    <!-- Booking Information -->
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a
                            class="sidebar-link sidebar-title link-nav" href="{{ route('calendar-basic') }}">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-calendar') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-calender') }}"></use>
                            </svg><span>Booking Information</span></a>
                    </li>
                    <!-- Billing -->
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title"
                            href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-task') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-task') }}"></use>
                            </svg><span>Billing</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('product') }}">Product</a></li>
                            <li><a href="{{ route('product-page') }}">Product page</a></li>
                            <li><a href="{{ route('list-products') }}">Product list</a></li>
                            <li><a href="{{ route('payment-details') }}">Payment Details</a></li>
                            <li><a href="{{ route('order-history') }}">Order History</a></li>
                            <li><a href="{{ route('invoice-template') }}">Invoice</a></li>
                            <li><a href="{{ route('cart') }}">Cart</a></li>
                            <li><a href="{{ route('list-wish') }}">Wishlist</a></li>
                            <li><a href="{{ route('checkout') }}">Checkout</a></li>
                            <li><a href="{{ route('pricing') }}">Pricing </a></li>
                        </ul>
                    </li>
                    <!-- <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title"
                            href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-widget') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-widget') }}"></use>
                            </svg><span class="lan-6">Widgets</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('general-widget') }}">General</a></li>
                            <li><a href="{{ route('chart-widget') }}">Chart</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title"
                            href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-layout') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-layout') }}"></use>
                            </svg><span class="lan-7">Page layout</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('box-layout') }}">Boxed</a></li>
                            <li><a href="{{ route('layout-rtl') }}">RTL</a></li>
                            <li><a href="{{ route('layout-dark') }}">Dark Layout</a></li>
                            <li><a href="{{ route('hide-on-scroll') }}">Hide Nav Scroll</a></li>
                            <li><a href="{{ route('footer-light') }}">Footer Light</a></li>
                            <li><a href="{{ route('footer-dark') }}">Footer Dark</a></li>
                            <li><a href="{{ route('footer-fixed') }}">Footer Fixed</a></li>
                        </ul>
                    </li> -->
                    <!-- Reports and Analytics -->
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title"
                            href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-charts') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-charts') }}"></use>
                            </svg><span>Reports and Analytics</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('echarts') }}">Echarts</a></li>
                            <li><a href="{{ route('chart-apex') }}">Apex Chart</a></li>
                            <li><a href="{{ route('chart-google') }}">Google Chart</a></li>
                            <li><a href="{{ route('chart-sparkline') }}">Sparkline chart</a></li>
                            <li><a href="{{ route('chart-flot') }}">Flot Chart</a></li>
                            <li><a href="{{ route('chart-knob') }}">Knob Chart</a></li>
                            <li><a href="{{ route('chart-morris') }}">Morris Chart</a></li>
                            <li><a href="{{ route('chartjs') }}">Chatjs Chart</a></li>
                            <li><a href="{{ route('chartist') }}">Chartist Chart</a></li>
                            <li><a href="{{ route('chart-peity') }}">Peity Chart</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Accounts</h6>
                        </div>
                    </li>
                    <!-- User Management -->
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a
                            class="sidebar-link sidebar-title link-nav" href="{{ route('usermanagement') }}">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-calendar') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-calender') }}"></use>
                            </svg><span>User Management</span></a>
                    </li>


                    <!-- <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-learning') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-learning') }}"></use>
                            </svg><span>User Management</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('learning-list-view') }}">Learning List</a></li>
                            <li><a href="{{ route('learning-detailed') }}">Detailed Course</a></li>
                        </ul>
                    </li> -->
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</>
