@extends('layouts.simple.master')
@section('title', 'Resort Analytics')

@section('css')
@endsection

@section('style')
<style>
    .overview-container {
        height: 120px;
    }
    .chart-container {
        height: 400px; /* Standardize the height for charts */
    }
    .row > .col-md-6,
    .row > .col-md-4 {
        display: flex;
        flex-direction: column;
    }
	/* General Styles */
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 98%;
        margin: 20px auto;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h1, h2 {
        text-align: center;
        color: #333;
    }

    .toolbar {
        background-color: #0077b6;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
        padding: 10px;
        margin-bottom: 20px;
    }

    .search-bar {
        display: flex;
        flex: 1;
        gap: 10px;
    }

    .search-bar input {
        flex: 1;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .search-bar button {
        padding: 10px 15px;
        background-color: #4caf50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .button-group {
        display: flex;
        gap: 10px;
    }

    .filter-button {
        padding: 10px 15px;
        background-color: #2196f3;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .filter-button:hover {
        background-color: #1976d2;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table th, table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    table th {
        background-color: #f2f2f2;
        color: #333;
    }

    .edit-button {
        padding: 5px 10px;
        background-color: #ff9800;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .edit-button:hover {
        background-color: #e68900;
    }

    .add-button {
        padding: 10px 15px;
        background-color: #4caf50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        display: block;
        margin: 20px auto;
    }

    .add-button:hover {
        background-color: #45a049;
    }

    .charts {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 20px;
        margin-top: 20px;
    }

    .chart-container {
        flex: 1 1 calc(33% - 20px);
        min-width: 300px;
        padding: 10px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .chart-container canvas {
        width: 100%;
        height: 200px !important;
    }
	#overview {
		height: 160px;
	}
	#booking {
		height: 380px;
	}
	.chart-container {
		height: 300px; /
	}

	.chart-container.booking-sources {
		height: 280px;
	}

	.chart-container.room-status {
		height: 280px; 
	}


</style>
@endsection

@section('breadcrumb-title')
<h3><b>Dashboard</b></h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
@endsection

@section('content')
    <!-- Overview Section -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card overview-container text-center">
                <div class="card-body">
                    <h6>Total Bookings</h6>
                    <h3><b>1,245</b></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card overview-container text-center">
                <div class="card-body">
                    <h6>Total Rooms</h6>
                    <h3><b>120</b></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card overview-container text-center">
                <div class="card-body">
                    <h6>Occupancy Rate</h6>
                    <h3><b>78%</b></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card overview-container text-center">
                <div class="card-body">
                    <h6>New Guests</h6>
                    <h3><b>245</b></h3>
                </div>
            </div>
        </div>
    </div>
<!-- Second Row - Booking Sources and Room Status -->
<div class="row mb-4" id="secondRow">
    <div class="col-md-8">
        <div class="card chart-container booking-sources" id="booking">
            <div class="card-header">
                <h3> Room Trends</h3>
            </div>
            <div class="card-body">
                <canvas id="bookingSourcesChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card chart-container room-status">
            <div class="card-header">
                <h3>Room Status</h3>
            </div>
            <div class="card-body">
                <canvas id="roomStatusChart"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="container">
        <!-- Toolbar -->
        <div class="toolbar">
            <div class="search-bar">
                <input type="text" id="search" placeholder="Search...">
                <button id="searchButton">Search</button>
            </div>
            <div class="button-group">
                <button class="filter-button" id="filterButton">Filter</button>
            </div>
        </div>

        <!-- Booking Management Table -->
        <div class="table-container">
            <table id="bookingTable">
                <thead>
                    <tr>
                        <th>Guest Name</th>
                        <th>Room No</th>
                        <th>Check-In Date</th>
                        <th>Check-In Time</th>
                        <th>Check-Out Date</th>
                        <th>Check-Out Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John Doe</td>
                        <td>101</td>
                        <td>2025-01-10</td>
                        <td>14:00</td>
                        <td>2025-01-15</td>
                        <td>12:00</td>
                        <td><button class="edit-button">Edit</button></td>
                    </tr>
                    <tr>
                        <td>Jane Smith</td>
                        <td>102</td>
                        <td>2025-01-11</td>
                        <td>15:00</td>
                        <td>2025-01-16</td>
                        <td>11:00</td>
                        <td><button class="edit-button">Edit</button></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <button class="add-button" id="addBookingButton">Add Booking</button>
    </div>
    <!-- Third Row - Occupancy Trends and Income -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card chart-container">
                <div class="card-header">
                    <h3>Occupancy Trends</h3>
                </div>
                <div class="card-body">
                    <canvas id="occupancyTrendsChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card chart-container">
                <div class="card-header">
                    <h3>Income</h3>
                </div>
                <div class="card-body">
                    <canvas id="incomeChart"></canvas>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Booking Sources Chart
    const bookingSourcesCtx = document.getElementById('bookingSourcesChart').getContext('2d');
    new Chart(bookingSourcesCtx, {
        type: 'bar',
        data: {
            labels: ['Cottage', 'Function Hall', 'Tent'],
            datasets: [{
                label: 'Bookings',
                data: [500, 300, 200],
                backgroundColor: ['rgba(75, 192, 192, 0.5)', 'rgba(255, 206, 86, 0.5)', 'rgba(255, 99, 132, 0.5)'],
                borderWidth: 1
            }]
        }
    });

    // Room Status Chart
    const roomStatusCtx = document.getElementById('roomStatusChart').getContext('2d');
    new Chart(roomStatusCtx, {
        type: 'pie',
        data: {
            labels: ['Available', 'Occupied'],
            datasets: [{
                data: [50, 70],
                backgroundColor: ['rgba(54, 162, 235, 0.5)', 'rgba(255, 99, 132, 0.5)'],
                borderWidth: 1
            }]
        }
    });

    // Occupancy Trends Chart
    const occupancyTrendsCtx = document.getElementById('occupancyTrendsChart').getContext('2d');
    new Chart(occupancyTrendsCtx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
            datasets: [{
                label: 'Occupancy (%)',
                data: [65, 70, 75, 80, 78, 82],
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 2,
                fill: true
            }]
        }
    });

    // Income Chart
    const incomeCtx = document.getElementById('incomeChart').getContext('2d');
    new Chart(incomeCtx, {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
            datasets: [{
                label: 'Income (PHP)',
                data: [20000, 25000, 27000, 30000, 28000, 31000],
                backgroundColor: ['rgba(255, 159, 64, 0.5)'],
                borderWidth: 1
            }]
        }
    });
</script>
@endsection

@section('script')
<script src="{{ asset('assets/js/datepicker/date-time-picker/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/datepicker/date-time-picker/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('assets/js/datepicker/date-time-picker/datetimepicker.custom.js') }}"></script>
@endsection
