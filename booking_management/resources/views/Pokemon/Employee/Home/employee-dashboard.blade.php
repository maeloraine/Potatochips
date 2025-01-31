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
                            <div class="card" id="roomStatusCardDashboard">
                                <div class="card-header card-no-border">
                                    <div class="header-top">
                                        <h5 class="m-0">Room Status</h5>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="chart-container" style="position: relative; height:250px;">
                                        <canvas id="roomsStatusChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-9 box-col-12">
                        <div class="card">
                            <div class="card-header card-no-border">
                                <h5>Daily Bookings Overview</h5>
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
                                                                    class="f-light ms-1">Cottage</span></li>
                                                            <li><span class="circle bg-primary"> </span><span
                                                                    class="f-light ms-1">Tent</span></li>
                                                            <li><span class="circle bg-success"> </span><span
                                                                    class="f-light ms-1">Function Hall</span></li>
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
                                                            <use href="{{ asset('assets/svg/icon-sprite.svg#fill-board') }}"></use>
                                                        </svg>
                                                    </div>
                                                    <div> <span class="f-light">Cottage</span>
                                                        <h6 class="mt-1 mb-0">34 </h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="light-card balance-card widget-hover">
                                                    <div class="svg-box">
                                                        <svg class="svg-fill">
                                                            <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
                                                        </svg>
                                                    </div>
                                                    <div> <span class="f-light">Function Hall</span>
                                                        <h6 class="mt-1 mb-0">5</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="light-card balance-card widget-hover">
                                                    <div class="svg-box">
                                                        <svg class="svg-fill">
                                                            <use href="{{ asset('assets/svg/icon-sprite.svg#fill-builders') }}"></use>
                                                        </svg>
                                                    </div>
                                                    <div> <span class="f-light">Tent</span>
                                                        <h6 class="mt-1 mb-0">10</h6>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('roomsStatusChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Available Rooms', 'Occupied Rooms'],
                datasets: [{
                    data: [389, 611], 
                    backgroundColor: ['#e1bb80', '#83d0cb'],
                    hoverBackgroundColor: ['#c08552', '#5bc0eb'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom', 
                    },
                    title: {
                        display: true,
                        text: 'Number of Rooms Available and Occupied', 
                        font: {
                            size: 12, 
                        },
                        padding: {
                            top: 10,
                            bottom: 20,
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function (tooltipItem) {
                                return `${tooltipItem.label}: ${tooltipItem.raw} rooms`;
                            }
                        }
                    }
                }
            }
        });
    });
</script>
<script>
    function openCheckInModal() {
        document.getElementById('overlay').style.display = 'block';
        document.getElementById('checkInModal').style.display = 'block';
    }

    function openManualCheckInModal() {
        closeModal();
        document.getElementById('manualCheckInModal').style.display = 'block';
    }

    function openQRCheckInModal() {
        closeModal();
        document.getElementById('qrCheckInModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('overlay').style.display = 'none';
        document.getElementById('checkInModal').style.display = 'none';
        document.getElementById('manualCheckInModal').style.display = 'none';
        document.getElementById('qrCheckInModal').style.display = 'none';
    }

</script>
@endsection