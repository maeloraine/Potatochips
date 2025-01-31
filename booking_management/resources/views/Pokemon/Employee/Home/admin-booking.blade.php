@extends('layouts.simple.master')
@section('title', 'Booking Management')

@section('css')
@endsection

@section('style')
<style>
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

        .checkin-button {
            background-color: #ffd500;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 80px;
            height: 40px;
        }

        .checkin-button:hover {
            background-color: #ffbd00;
        }

        .optionsButton{
            align-items: center; 
            justify-content: center;
            text-align: center;
            padding-top: 30px;
            display: flex;
            gap: 20px;
        }
        .qrCanvas{
            width: 250px; 
            height: 250px;
            border: 2px solid #ccc; 
            border-radius: 10px; 
            display: block;
            margin: 10px auto;
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
    <div class="d-flex justify-content-center">
    <div class="col-xxl-5 col-md-7 box-col-7">
        <div class="row">
            <div class="col-6">
                <div class="card small-widget">
                    <div class="card-body primary" onclick="openCheckInModal()">
                        <span class="f-light">A new guest? Check-In!</span>
                        <div class="d-flex align-items-end gap-1">
                            <h4>Check-In</h4>
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
                    <div class="card-body warning" onclick="openCheckOutModal()">
                        <span class="f-light">A guest leaving? Check-Out!</span>
                        <div class="d-flex align-items-end gap-1">
                            <h4>Check-Out</h4>
                        </div>
                        <div class="bg-gradient">
                            <svg class="stroke-icon svg-fill">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#customers') }}"></use>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- Add this inside the check-in options modal -->
<div class="overlay" id="checkInOverlay">
    <div class="modal-content" id="checkInModal">
        <button class="close-button" onclick="closeCheckInModal()">&times;</button>
        <h2>Check-In Options</h2>
        <div class="optionsButton">
            <button onclick="openManualCheckInModal()" id="manualButton">Manual Check-In</button>
            <button onclick="openQRCheckInModal()">QR Check-In</button>
        </div>
    </div>
</div>
    <!-- Separate overlays for modals -->
        <div class="overlay" id="manualCheckInOverlay">
            <div class="modal-content">
                <button class="close-button" onclick="closeManualCheckInModal()">&times;</button>
                <h2>Manual Check-In</h2>
                <label>Booking Reference:
                    <input type="text" placeholder="Enter Reference" required>
                </label>
                <button>Submit</button>
            </div>
        </div>

        <!-- Add this inside the check-Out options modal -->
<div class="overlay" id="checkOutOverlay">
    <div class="modal-content" id="checkOutModal">
        <button class="close-button" onclick="closeCheckOutModal()">&times;</button>
        <h2>Check-Out Options</h2>
        <div class="optionsButton">
            <button onclick="openManualCheckOutModal()" id="manualButton">Manual Check-Out</button>
            <button onclick="openQRCheckOutModal()">QR Check-Out</button>
        </div>
    </div>
</div>
    <!-- Separate overlays for modals -->
        <div class="overlay" id="manualCheckOutOverlay">
            <div class="modal-content">
                <button class="close-button" onclick="closeManualCheckOutModal()">&times;</button>
                <h2>Manual Check-Out</h2>
                <label>Booking Reference:
                    <input type="text" placeholder="Enter Reference" required>
                </label>
                <button>Submit</button>
            </div>
        </div>

        <div class="overlay" id="qrCheckOutOverlay">
            <div class="modal-content">
                <button class="close-button" onclick="closeQRCheckOutModal()">&times;</button>
                <h2>QR Check-Out</h2>
                <canvas id="qrCanvas" style="background: white;"></canvas>
            </div>
        </div>

        <!-- Separate overlay for adding a booking -->
        <div class="overlay" id="addBookingOverlay">
            <div class="modal" id="bookingModal">
                <div class="modal-content">
                    <button class="close-button" id="closeBookingModal">&times;</button>
                    <h2>Add a Booking</h2>
                    <form id="addBookingForm">
                        <div class="row">
                            <label>
                                Room No.
                                <input type="text" id="roomNo" placeholder="Room No" required>
                            </label>
                            <label>
                                Guest Name
                                <input type="text" id="GuestName" placeholder="Guest Name" required>
                            </label>
                        </div>
                        <div class="row">
                            <label>
                                Check-In Date
                                <input type="date" id="checkInDate" required>
                            </label>
                            <label>
                                Check-In Time
                                <input type="time" id="checkInTime" required>
                            </label>
                        </div>
                        <div class="row">
                            <label>
                                Check-Out Date
                                <input type="date" id="checkOutDate" required>
                            </label>
                            <label>
                                Check-Out Time
                                <input type="time" id="checkOutTime" required>
                            </label>
                        </div>
                        <button type="submit" id="addBooking">Add Booking</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{asset('assets/js/datepicker/date-time-picker/moment.min.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-time-picker/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-time-picker/datetimepicker.custom.js')}}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const addBookingButton = document.getElementById('addBookingButton');
    const bookingModal = document.getElementById('bookingModal');
    const closeBookingModal = document.getElementById('closeBookingModal');
    const addBookingOverlay = document.getElementById('addBookingOverlay');

    // Open Add Booking Modal
    addBookingButton.addEventListener('click', () => {
        bookingModal.style.display = 'block';
        addBookingOverlay.style.display = 'block';
    });

    // Close Add Booking Modal
    closeBookingModal.addEventListener('click', () => {
        bookingModal.style.display = 'none';
        addBookingOverlay.style.display = 'none';
    });

    // Close modal when clicking outside
    addBookingOverlay.addEventListener('click', (e) => {
        if (e.target === addBookingOverlay) {
            bookingModal.style.display = 'none';
            addBookingOverlay.style.display = 'none';
        }
    });

    // Add Booking Form Submission
    document.getElementById('addBookingForm').addEventListener('submit', (e) => {
        e.preventDefault();

        const guestName = document.getElementById('GuestName').value;
        const roomNo = document.getElementById('roomNo').value;
        const checkInDate = document.getElementById('checkInDate').value;
        const checkInTime = document.getElementById('checkInTime').value;
        const checkOutDate = document.getElementById('checkOutDate').value;
        const checkOutTime = document.getElementById('checkOutTime').value;

        const bookingTable = document.getElementById('bookingTable').getElementsByTagName('tbody')[0];
        const newRow = bookingTable.insertRow();

        newRow.insertCell(0).textContent = guestName;
        newRow.insertCell(1).textContent = roomNo;
        newRow.insertCell(2).textContent = checkInDate;
        newRow.insertCell(3).textContent = checkInTime;
        newRow.insertCell(4).textContent = checkOutDate;
        newRow.insertCell(5).textContent = checkOutTime;

        const editButton = document.createElement('button');
        editButton.classList.add('edit-button');
        editButton.textContent = 'Edit';
        newRow.insertCell(6).appendChild(editButton);

        document.getElementById('addBookingForm').reset();

        bookingModal.style.display = 'none';
        addBookingOverlay.style.display = 'none';
    });
});

// Check-In Modal Functions
function openCheckInModal() {
    document.getElementById('checkInOverlay').style.display = 'block';
}

function closeCheckInModal() {
    document.getElementById('checkInOverlay').style.display = 'none';
}

function openManualCheckInModal() {
    closeCheckInModal();
    document.getElementById('manualCheckInOverlay').style.display = 'block';
}

function closeManualCheckInModal() {
    document.getElementById('manualCheckInOverlay').style.display = 'none';
}

function openQRCheckInModal() {
    closeCheckInModal();
    document.getElementById('qrCheckInOverlay').style.display = 'block';
}

function closeQRCheckInModal() {
    document.getElementById('qrCheckInOverlay').style.display = 'none';
}

// Check-Out Modal Functions
function openCheckOutModal() {
    document.getElementById('checkOutOverlay').style.display = 'block';
}

function closeCheckOutModal() {
    document.getElementById('checkOutOverlay').style.display = 'none';
}

function openManualCheckOutModal() {
    closeCheckOutModal();
    document.getElementById('manualCheckOutOverlay').style.display = 'block';
}

function closeManualCheckOutModal() {
    document.getElementById('manualCheckOutOverlay').style.display = 'none';
}

function openQRCheckOutModal() {
    closeCheckOutModal();
    document.getElementById('qrCheckOutOverlay').style.display = 'block';
}

function closeQRCheckOutModal() {
    document.getElementById('qrCheckOutOverlay').style.display = 'none';
}
</script>
@endsection