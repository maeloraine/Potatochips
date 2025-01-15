@extends('layouts.simple.master')
@section('title', 'Booking Management')

@section('css')
@endsection

@section('style')
<style>
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
        height: 300px;
    }
</style>
@endsection

@section('breadcrumb-title')
<h3><b>Booking Management</b></h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">General</li>
<li class="breadcrumb-item active">Booking Management</li>
@endsection

@section('content')
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

        <!-- Analytics Section -->
        <div class="charts">
            <div class="chart-container">
                <canvas id="dailyBookingsChart"></canvas>
            </div>
            <div class="chart-container">
                <canvas id="roomOccupancyChart"></canvas>
            </div>
            <div class="chart-container">
                <canvas id="paymentStatusChart"></canvas>
            </div>
        </div>

        <!-- Booking Management Table -->
        <div class="table-container">
            <h2>Booking Management</h2>
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
@endsection

@section('script')
<script src="{{asset('assets/js/datepicker/date-time-picker/moment.min.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-time-picker/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-time-picker/datetimepicker.custom.js')}}"></script>
<script>
    // Daily Bookings Chart
    const dailyBookingsCtx = document.getElementById('dailyBookingsChart').getContext('2d');
    new Chart(dailyBookingsCtx, {
        type: 'line',
        data: {
            labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
            datasets: [{
                label: 'Daily Bookings',
                data: [10, 15, 20, 25, 30, 35, 40],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2
            }]
        },
        options: { responsive: true }
    });

    // Room Occupancy Chart
    const roomOccupancyCtx = document.getElementById('roomOccupancyChart').getContext('2d');
    new Chart(roomOccupancyCtx, {
        type: 'doughnut',
        data: {
            labels: ['Occupied', 'Available'],
            datasets: [{
                data: [60, 40],
                backgroundColor: ['#ff6384', '#36a2eb']
            }]
        },
        options: { responsive: true }
    });

    // Payment Status Chart
    const paymentStatusCtx = document.getElementById('paymentStatusChart').getContext('2d');
    new Chart(paymentStatusCtx, {
        type: 'bar',
        data: {
            labels: ['Paid', 'Pending', 'Overdue'],
            datasets: [{
                label: 'Payments',
                data: [30, 15, 5],
                backgroundColor: ['#4caf50', '#ff9800', '#f44336']
            }]
        },
        options: { responsive: true }
    });
</script>
</script>
@endsection
