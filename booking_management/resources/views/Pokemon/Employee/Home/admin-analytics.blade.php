@extends('layouts.simple.master')
@section('title', 'Date Time Picker')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3><b>Analytics</b></h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">General</li>
<li class="breadcrumb-item active">Analytics</li>
@endsection

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container my-5">
        <!-- Available Rooms Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h3>Available Rooms</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <ul class="list-unstyled">
                            <li><strong>Cottage:</strong> <span id="available-cottage">10</span></li>
                            <li><strong>Function Hall:</strong> <span id="available-function-hall">2</span></li>
                            <li><strong>Tent:</strong> <span id="available-tent">15</span></li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <canvas id="availableRoomsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Dashboard Section -->
        <div class="row">
            <!-- Analytics Charts Section -->
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3>Analytics Charts</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <canvas id="lineChart"></canvas>
                            </div>
                            <div class="col-md-6 mb-4">
                                <canvas id="radarChart"></canvas>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <canvas id="doughnutChart"></canvas>
                            </div>
                            <div class="col-md-6 mb-4">
                                <canvas id="polarAreaChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Guest Demographics Section -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3>Guest Demographics</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <canvas id="ageGroupChart"></canvas>
                            </div>
                            <div class="col-md-12 mb-4">
                                <canvas id="genderChart"></canvas>
                            </div>
                            <div class="col-md-12 mb-4">
                                <canvas id="nationalityChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Marketing Trends Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h3>Marketing Trends</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <canvas id="socialMediaChart"></canvas>
                    </div>
                    <div class="col-md-6 mb-4">
                        <canvas id="bookingSourceChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Available Rooms Chart
        const availableRoomsCtx = document.getElementById('availableRoomsChart').getContext('2d');
        new Chart(availableRoomsCtx, {
            type: 'pie',
            data: {
                labels: ['Cottage', 'Function Hall', 'Tent'],
                datasets: [{
                    data: [10, 2, 15],
                    backgroundColor: ['rgba(255, 99, 132, 0.5)', 'rgba(54, 162, 235, 0.5)', 'rgba(255, 206, 86, 0.5)'],
                    borderWidth: 1
                }]
            }
        });

        // Line Chart
        const lineCtx = document.getElementById('lineChart').getContext('2d');
        new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: ['July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [{
                    label: 'Monthly Bookings',
                    data: [65, 59, 80, 81, 56, 75],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2,
                    fill: true
                }]
            }
        });

        // Radar Chart
        const radarCtx = document.getElementById('radarChart').getContext('2d');
        new Chart(radarCtx, {
            type: 'radar',
            data: {
                labels: ['Cottage', 'Function Hall', 'Tent'],
                datasets: [{
                    label: 'Average Usage',
                    data: [70, 30, 90],
                    backgroundColor: 'rgba(153, 102, 255, 0.4)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            }
        });

        // Doughnut Chart
        const doughnutCtx = document.getElementById('doughnutChart').getContext('2d');
        new Chart(doughnutCtx, {
            type: 'doughnut',
            data: {
                labels: ['Cottage', 'Function Hall', 'Tent'],
                datasets: [{
                    data: [300, 50, 100],
                    backgroundColor: ['rgba(255, 99, 132, 0.5)', 'rgba(54, 162, 235, 0.5)', 'rgba(255, 206, 86, 0.5)'],
                    hoverOffset: 4
                }]
            }
        });

        // Polar Area Chart
        const polarAreaCtx = document.getElementById('polarAreaChart').getContext('2d');
        new Chart(polarAreaCtx, {
            type: 'polarArea',
            data: {
                labels: ['Weekend', 'Weekday', 'Holiday'],
                datasets: [{
                    data: [120, 80, 50],
                    backgroundColor: ['rgba(255, 206, 86, 0.5)', 'rgba(75, 192, 192, 0.5)', 'rgba(153, 102, 255, 0.5)'],
                    hoverOffset: 4
                }]
            }
        });

        // Age Group Chart
        const ageGroupCtx = document.getElementById('ageGroupChart').getContext('2d');
        new Chart(ageGroupCtx, {
            type: 'bar',
            data: {
                labels: ['18-25', '26-35', '36-45', '46-60', '60+'],
                datasets: [{
                    label: 'Guests by Age Group',
                    data: [50, 100, 75, 40, 10],
                    backgroundColor: 'rgba(54, 162, 235, 0.5)'
                }]
            }
        });

        // Gender Chart
        const genderCtx = document.getElementById('genderChart').getContext('2d');
        new Chart(genderCtx, {
            type: 'pie',
            data: {
                labels: ['Male', 'Female', 'Other'],
                datasets: [{
                    data: [120, 100, 10],
                    backgroundColor: ['rgba(255, 99, 132, 0.5)', 'rgba(54, 162, 235, 0.5)', 'rgba(153, 102, 255, 0.5)']
                }]
            }
        });
        // Nationality Chart
        new Chart(document.getElementById('nationalityChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: ['American', 'Filipino', 'Chinese', 'Japanese', 'Others'],
                datasets: [{
                    label: 'Nationalities',
                    data: [40, 120, 30, 20, 10],
                    backgroundColor: 'rgba(255, 159, 64, 0.5)'
                }]
            }
        });

        // Social Media Chart
        const socialMediaCtx = document.getElementById('socialMediaChart').getContext('2d');
        new Chart(socialMediaCtx, {
            type: 'bar',
            data: {
                labels: ['Facebook', 'Instagram', 'Twitter', 'LinkedIn'],
                datasets: [{
                    label: 'Leads',
                    data: [100, 80, 40, 20],
                    backgroundColor: 'rgba(255, 159, 64, 0.5)'
                }]
            }
        });

        // Booking Source Chart
        const bookingSourceCtx = document.getElementById('bookingSourceChart').getContext('2d');
        new Chart(bookingSourceCtx, {
            type: 'doughnut',
            data: {
                labels: ['Website', 'Mobile App', 'Third Party'],
                datasets: [{
                    data: [200, 100, 50],
                    backgroundColor: ['rgba(75, 192, 192, 0.5)', 'rgba(255, 206, 86, 0.5)', 'rgba(255, 99, 132, 0.5)']
                }]
            }
        });
    </script>
@endsection

@section('script')
<script src="{{asset('assets/js/datepicker/date-time-picker/moment.min.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-time-picker/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-time-picker/datetimepicker.custom.js')}}"></script>

@endsection