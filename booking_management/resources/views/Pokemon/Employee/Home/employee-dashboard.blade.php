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
        height: 400px; 
    }
    
    .row > .col-md-6,
    .row > .col-md-4 {
        display: flex;
        flex-direction: column;
    }
    body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
        }

        .container {
            width: 98%;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
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
            width: 75px;
            height: 40px;
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

        .modal-content {
            position: relative;
            display: flex;
            flex-direction: column;
            gap: 15px;
            padding: 20px;
            background-color: #023e8a;
            color: white;
            border-radius: 10px;
            max-width: 600px;
            width: 90%;
            margin: auto;
            top: 160px;
        }

        .modal-content h2 {
            text-align: center;
            margin: 0;
            padding-top: 10px;
        }

        .modal-content form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .modal-content label {
            display: flex;
            flex-direction: column;
            font-size: 14px;
            font-weight: bold;
            color: white;
        }

        .modal-content .row {
            display: flex;
            flex-wrap: nowrap;
            gap: 20px;
            justify-content: space-between;
        }

        .modal-content .row label {
            flex: 1; 
        }

        .modal-content input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .modal-content button {
            padding: 10px 20px;
            background-color: #800080;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            align-self: center;
        }

        .modal-content button:hover {
            background-color: #560bad;
        }

        @media screen and (max-width: 768px) {
            .modal-content .row {
                flex-direction: column; 
            }
        }
        .close-button {
                position: absolute;
                top: 10px; 
                right: 10px;
                width: 40px;
                height: 40px;
                display: flex;
                justify-content: center;
                align-items: center;
                background-color: #ff4d4d;
                border: none;
                border-radius: 50%;
                font-size: 20px;
                font-weight: bold;
                color: white;
                cursor: pointer;
            }

            .close-button:hover {
                background-color: #e63939;
            }

        #roomNo {
            width: 260px;
        }
        #GuestName {
            width: 260px;
        }
        #addBooking {
            width: 200px;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none; 
            z-index: 999; 
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
                <h3> Room Bookings</h3>
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
        <div class="toolbar">
            <div class="search-bar">
                <input type="text" id="search" placeholder="Search...">
                <button id="searchButton">Search</button>
            </div>
            <div class="button-group">
                <button class="filter-button" id="filterButton">Filter</button>
            </div>
        </div>
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
    <div class="overlay" id="overlay">
    <div class="modal" id="bookingModal">
    <div class="modal-content">
        <button class="close-button" id="closeModalButton">&times;</button>
        <h2>Add a Booking</h2>
        <form id="addBookingForm">
        <div class="row">
            <label>
                Room No.
                <input type="text" id="roomNo" placeholder="Room No" required>
            </label>
            <label>
                Guest Name
                <input type="text" id="GuestName1" placeholder="Guest Name" required>
            </label>
        </div>
            <div class="row">
                <label>
                    Check-In Date
                    <input type="date" id="checkInDate" placeholder="Check-In Date" required>
                </label>
                <label>
                    Check-In Time
                    <input type="time" id="checkInTime" placeholder="Check-In Time" required>
                </label>
            </div>
            <div class="row">
                <label>
                    Check-Out Date
                    <input type="date" id="checkOutDate" placeholder="Check-Out Date" required>
                </label>
                <label>
                    Check-Out Time
                    <input type="time" id="checkOutTime" placeholder="Check-Out Time" required>
                </label>
            </div>
            <button type="submit" id="addBooking" >Add Booking</button>
            </form>
        </div>
    </div>
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
</div>
@endsection

@section('script')
<script src="{{ asset('assets/js/datepicker/date-time-picker/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/datepicker/date-time-picker/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('assets/js/datepicker/date-time-picker/datetimepicker.custom.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Room Bookings Chart
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
<script>
    const addBookingButton = document.getElementById('addBookingButton');
    const bookingModal = document.getElementById('bookingModal');
    const closeModalButton = document.getElementById('closeModalButton');
    const overlay = document.getElementById('overlay');

    // Open the modal
    addBookingButton.addEventListener('click', () => {
        bookingModal.style.display = 'block';
        overlay.style.display = 'block';
    });

    // Close the modal
    closeModalButton.addEventListener('click', () => {
        bookingModal.style.display = 'none';
        overlay.style.display = 'none';
    });

    // Close the modal when clicking on the overlay
    window.addEventListener('click', (e) => {
        if (e.target === overlay) {
            bookingModal.style.display = 'none';
            overlay.style.display = 'none';
        }
    });

    // Handle the form submission
    document.getElementById('addBookingForm').addEventListener('submit', (e) => {
        e.preventDefault();

        const guestName1 = document.getElementById('GuestName1').value; // Corrected input ID
        const roomNo = document.getElementById('roomNo').value;
        const checkInDate = document.getElementById('checkInDate').value;
        const checkInTime = document.getElementById('checkInTime').value;
        const checkOutDate = document.getElementById('checkOutDate').value;
        const checkOutTime = document.getElementById('checkOutTime').value;

        const bookingTable = document.getElementById('bookingTable').getElementsByTagName('tbody')[0];
        const newRow = bookingTable.insertRow();

        // Populate table cells with input values
        newRow.insertCell(0).textContent = guestName1; // Corrected variable usage
        newRow.insertCell(1).textContent = roomNo;
        newRow.insertCell(2).textContent = checkInDate;
        newRow.insertCell(3).textContent = checkInTime;
        newRow.insertCell(4).textContent = checkOutDate;
        newRow.insertCell(5).textContent = checkOutTime;

        // Add edit button to the new row
        const editButton = document.createElement('button');
        editButton.classList.add('edit-button');
        editButton.textContent = 'Edit';
        newRow.insertCell(6).appendChild(editButton);

        // Reset the form fields
        document.getElementById('addBookingForm').reset();

        // Hide the modal and overlay
        bookingModal.style.display = 'none';
        overlay.style.display = 'none';
    });
</script>
@endsection