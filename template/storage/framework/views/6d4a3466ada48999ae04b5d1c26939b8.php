
<?php $__env->startSection('title', 'Calender Basic'); ?>

<?php $__env->startSection('css'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/calendar.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>Calender Basic</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
    <li class="breadcrumb-item active">Calender</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid calendar-basic">
        <div class="card">
            <div class="card-body">
                <div class="row" id="wrap">
                    <div class="col-xxl-3 box-col-12">
                        <div class="md-sidebar mb-3"><a class="btn btn-primary md-sidebar-toggle"
                                href="javascript:void(0)">calendar filter</a>
                            <div class="md-sidebar-aside job-left-aside custom-scrollbar">
                                <div id="external-events">
                                    <h4>Draggable Events</h4>
                                    <div id="external-events-list">
                                        <div class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event">
                                            <div class="fc-event-main"> <i class="fa fa-birthday-cake me-2"></i>Birthday
                                                Party</div>
                                        </div>
                                        <div class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event">
                                            <div class="fc-event-main"> <i class="fa fa-user me-2"></i>Meeting With Team.
                                            </div>
                                        </div>
                                        <div class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event">
                                            <div class="fc-event-main"> <i class="fa fa-plane me-2"></i>Tour & Picnic</div>
                                        </div>
                                        <div class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event">
                                            <div class="fc-event-main"> <i class="fa fa-file-text me-2"></i>Reporting
                                                Schedule</div>
                                        </div>
                                        <div class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event">
                                            <div class="fc-event-main"> <i class="fa fa-briefcase me-2"></i>Lunch & Break
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        <input class="checkbox_animated" id="drop-remove" type="checkbox">
                                        <label for="drop-remove">remove after drop</label>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-9 box-col-12">
                        <div class="calendar-default" id="calendar-container">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/js/calendar/fullcalendar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/calendar/fullcalendar-custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\clari\OneDrive\School\GitHub\Potatochips\template\resources\views/apps/calendar-basic.blade.php ENDPATH**/ ?>