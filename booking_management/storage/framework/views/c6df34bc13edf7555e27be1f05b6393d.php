<div class="sidebar-wrapper" sidebar-layout="stroke-svg">
    <div>
        <!-- Logo -->
        <div class="logo-wrapper"><a href="<?php echo e(route('customer.index')); ?>"><img class="img-fluid for-light"
            src="<?php echo e(asset('assets/images/logo/JensonLogo.png')); ?>" alt=""><img class="img-fluid for-dark"
            src="<?php echo e(asset('assets/images/logo/JensonLogo.png')); ?>" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"></i></div>
        </div>

        <!-- Logo Icon -->
        <div class="logo-icon-wrapper">
            <a href="#">
            </a>
        </div>

        <!-- Sidebar Links -->
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <!-- Back Button -->
                    <li class="back-btn">
                        <a href="<?php echo e(route('customer.index')); ?>">
                            <img class="img-fluid" src="<?php echo e(asset('assets/images/logo/logo-icon.png')); ?>" alt="Logo Icon">
                        </a>
                        <div class="mobile-back text-end">
                            <span>Back</span>
                            <i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                        </div>
                    </li>

                    <!-- General Section -->
                    <li class="sidebar-main-title">
                        <div>
                            <h6>General</h6>
                        </div>
                    </li>

                    <!-- Book Now -->
                    <li class="sidebar-list">
                        <i class="fa fa-thumb-tack"></i>
                        <a class="sidebar-link sidebar-title" href="<?php echo e(route('customer.index')); ?>">
                            <svg class="stroke-icon">
                                <use href="<?php echo e(asset('assets/svg/icon-sprite.svg#stroke-calendar')); ?>"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="<?php echo e(asset('assets/svg/icon-sprite.svg#fill-calender')); ?>"></use>
                            </svg>
                            <span>Book Now</span>
                        </a>
                    </li>

                    <!-- My Bookings -->
                    <li class="sidebar-list">
                        <i class="fa fa-thumb-tack"></i>
                        <a class="sidebar-link sidebar-title" href="<?php echo e(route('customer-reservations')); ?>">
                            <svg class="stroke-icon">
                                <use href="<?php echo e(asset('assets/svg/icon-sprite.svg#stroke-task')); ?>"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="<?php echo e(asset('assets/svg/icon-sprite.svg#fill-task')); ?>"></use>
                            </svg>
                            <span>My Bookings</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div><?php /**PATH C:\Users\Carl\OneDrive - Polytechnic University of the Philippines\Documents\WEB DEV AUTH\Potatochips\booking_management\resources\views/Pokemon/Customer/Home/customer-sidebar.blade.php ENDPATH**/ ?>