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

        /* Delete button styles */
        .delete-button {
            padding: 5px 10px;
            background-color: #dc3545; /* Red color for delete */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .delete-button:hover {
            background-color: #c82333; /* Darker red on hover */
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
        max-width: 800px; /* Reduced width */
        width: 90%;
        margin: auto;
        top: 120px;
    }

    .modal-form-container {
        display: flex;
        gap: 50px;
        justify-content: space-between;
    }

    .modal-left, .modal-right {
        display: flex;
        flex-direction: column;
        width: 48%; /* Each side takes 48% of width */
    }

    .modal-content label {
        display: flex;
        flex-direction: column;
        font-size: 14px;
        font-weight: bold;
        color: white;
    }

    .modal-content input, .modal-content select {
        width: 100%;
        padding: 8px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 14px;
    }

    .modal-content button {
            padding: 10px;
            background-color: #800080;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            align-self: center;
            justify-content: center;
        }

    .modal-content button:hover {
        background-color: #dc3545;
    }

    #bookNowButton {
        display: block;
        margin: 20px auto; /* Centers the button horizontally */
        padding: 10px 20px;
        background-color: #800080;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }


    #bookNowButton:hover {
        background-color: #4caf50;
    }

    @media screen and (max-width: 768px) {
        .modal-form-container {
            flex-direction: column; /* Stack form fields in mobile view */
        }

        .modal-left, .modal-right {
            width: 100%;
        }
    }

    .close-button {
        position: absolute;
        top: 10px;
        right: 10px;
        width: 40px;
        height: 40px;
        display: flex;
        justify-content: center; /* Centers horizontally */
        align-items: center; /* Centers vertically */
        background-color: #ff4d4d;
        border: none;
        border-radius: 50%;
        font-size: 20px;
        font-weight: bold;
        color: white;
        cursor: pointer;
        line-height: 0; /* Ensures text is centered inside */
        text-align: center; /* Extra alignment for safety */
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
                        <th>Booking Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->GuestFirstName }} {{ $booking->GuestLastName }}</td> <!-- Guest Name -->
                            <td>{{ $booking->Room_Number }}</td>                                  <!-- Room No -->
                            <td>{{ $booking->check_in_date }}</td>                                <!-- Check-In Date -->
                            <td>{{ $booking->check_in_time }}</td>                                <!-- Check-In Time -->
                            <td>{{ $booking->check_out_date }}</td>                               <!-- Check-Out Date -->
                            <td>{{ $booking->check_out_time }}</td>                               <!-- Check-Out Time -->
                            <td>{{ ucfirst($booking->booking_status) }}</td>            <!-- Booking Status -->   
                            <td>
                                <button class="edit-button">Edit</button>
                                <button class="delete-button">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <button class="add-button" id="addBookingButton">Add Booking</button>
    </div>

    <!-- Booking Form Modal -->
    <div class="modal" id="bookingModal">
        <div class="modal-content">
            <button class="close-button" id="closeBookingModal">&times;</button>
            <h2 style="text-align:center;">Booking Information</h2>
            <form action="{{ route('booking.store') }}" method="POST">
                @csrf
                <div class="modal-form-container">
                    <!-- Left Side (Guest Details) -->
                    <div class="modal-left">
                        <label>
                            First Name
                            <input type="text" name="firstName" required maxlength="50">
                        </label>
                        <label>
                            Last Name
                            <input type="text" name="lastName" required maxlength="25">
                        </label>
                        <label>
                            Gender
                            <select name="gender" required>
                                <option value="" selected disabled>Select gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Rather Not Say">Rather Not Say</option>
                            </select>
                        </label>
                        <label>
                            Birthdate
                            <input type="date" name="birthdate" id="birthdate" required>
                            <small class="text-danger" id="age-error" style="display: none;">
                                The primary guest must be at least 18 years old to confirm your booking.
                            </small>
                        </label>
                        <label>
                            Email
                            <input type="email" name="email" required>
                        </label>
                        <label>
                            Phone
                            <input type="tel" name="phone" required pattern="\d{11}">
                        </label>
                        <label>
                            Address
                            <input type="text" name="address" required>
                        </label>
                        <label>
                            Special Requests
                            <input type="text" name="specialRequests">
                        </label>
                    </div>

                    <!-- Right Side (Booking Details) -->
                    <div class="modal-right">
                        <label>
                            Room No.
                            <select name="room_id" required>
                                <option value="" selected disabled>Select Room</option>
                                @foreach ($availableRooms as $room)
                                    <option value="{{ $room->room_id }}">{{ $room->Room_Number }} - {{ $room->Room_Type }}</option>
                                @endforeach
                            </select>
                        </label>
                        <label>
                            Check-In Date
                            <input type="date" name="check_in_date" id="checkInDate" required>
                        </label>
                        <label>
                            Check-Out Date
                            <input type="date" name="check_out_date" id="checkOutDate" required readonly>
                        </label>
                        <label>
                            Check-In Time
                            <select name="check_in_time" id="checkInTime" required>
                                <option value="" selected disabled>Select check-in time</option>
                                <option value="08:00">8:00 AM</option>
                                <option value="19:00">7:00 PM</option>
                            </select>
                        </label>
                        <label>
                            Check-Out Time
                            <input type="time" name="check_out_time" id="checkOutTime" required readonly>
                        </label>
                        <label>
                            Adults
                            <input type="number" name="adults" min="1" value="1" required>
                        </label>
                        <label>
                            Children
                            <input type="number" name="children" min="0" value="0" required>
                        </label>
                        <label>
                            Booking Status
                            <select name="booking_status" required>
                                <option value="reserved" selected>Reserved</option>
                                <option value="checked_in">Checked-in</option>
                                <option value="checked_out">Checked-out</option>
                            </select>
                        </label>
                    </div>
                </div>
                <button type="submit" id="bookNowButton">Book Now</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
<script src="{{asset('assets/js/datepicker/date-time-picker/moment.min.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-time-picker/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-time-picker/datetimepicker.custom.js')}}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {   
        const bookingModal = document.getElementById('bookingModal');
        const addBookingButton = document.getElementById('addBookingButton');
        const closeBookingModal = document.getElementById('closeBookingModal');
        const bookingForm = document.querySelector('#bookingModal form');


        // const checkInTime = document.getElementById("checkInTime");
        // const checkOutTime = document.getElementById("checkOutTime");

        //========================
        // OPEN & CLOSE MODAL
        //========================
        
        addBookingButton.addEventListener('click', () => {
            bookingModal.style.display = 'block';
            // Set min date for check-in
            document.getElementById('checkInDate').min = new Date().toISOString().split('T')[0];
        });

        closeBookingModal.addEventListener('click', () => {
            bookingModal.style.display = 'none';
        });

        //========================
        // FUNCTION FOR DATES
        //========================
        const checkInDateInput = document.getElementById('checkInDate');
        const checkOutDateInput = document.getElementById('checkOutDate');
        const today = new Date().toISOString().split('T')[0]; //Get the date today
        checkInDateInput.setAttribute('min', today); // Set minimum check-in date

        // Function to check if dates are set
        function areDatesSet() {
            const checkInDate = checkInDateInput.value;
            const checkOutDate = checkOutDateInput.value;
            return checkInDate && checkOutDate; // Returns true if both dates are set
        }

        // Automatically set check-out date to the day after check-in date
        checkInDateInput.addEventListener('change', function () {
            const checkInDate = new Date(checkInDateInput.value); // Get the selected check-in date
            if (checkInDate) {
                const checkOutDate = new Date(checkInDate);
                checkOutDate.setDate(checkOutDate.getDate() + 1); // Add 1 day to the check-in date

                // Format the date as YYYY-MM-DD (required for input[type="date"])
                const formattedCheckOutDate = checkOutDate.toISOString().split('T')[0];

                // Set the check-out date input value
                checkOutDateInput.value = formattedCheckOutDate;
            }
        });

        //========================
        // FUNCTION FOR TIME
        //========================
        document.getElementById("checkInDate").addEventListener("change", calculateCheckOut);
        document.getElementById("checkInTime").addEventListener("change", calculateCheckOut);

        function calculateCheckOut() {
            const checkInDate = document.getElementById("checkInDate").value;
            const checkInTime = document.getElementById("checkInTime").value;

            if (checkInDate && checkInTime) {
                const checkInDateTime = new Date(`${checkInDate}T${checkInTime}`);
                const checkOutDateTime = new Date(checkInDateTime);

                // Set checkout time based on check-in time
                if (checkInTime === "08:00") {
                    checkOutDateTime.setHours(checkInDateTime.getHours() + 22); // 8:00 AM + 22 hours = 6:00 AM next day
                } else if (checkInTime === "19:00") {
                    checkOutDateTime.setHours(checkInDateTime.getHours() + 22); // 7:00 PM + 22 hours = 5:00 PM next day
                }

                // Set checkout time field
                const checkOutTime = checkOutDateTime.toTimeString().split(":").slice(0, 2).join(":");
                
                document.getElementById("checkOutTime").value = checkOutTime;
            }
        }

        //========================
        // FUNCTION FOR BIRTHDATE (AGE VALIDATION)
        //========================

        function calculateAge(birthdate) {
            const today = new Date();
            const birthDate = new Date(birthdate);
            let age = today.getFullYear() - birthDate.getFullYear();
            const monthDifference = today.getMonth() - birthDate.getMonth();

            // Adjust age if the birthday hasn't occurred yet this year
            if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }

            return age;
        }

        //Function to validate age
        function validateAge() {
            const birthdateInput = document.getElementById('birthdate');
            const ageError = document.getElementById('age-error');
            const birthdate = birthdateInput.value;

            if (birthdate) {
                const age = calculateAge(birthdate);
                if (age < 18) {
                    ageError.style.display = 'block'; // Show error message
                    return false; // Guest is under 18
                } else {
                    ageError.style.display = 'none'; // Hide error message
                    return true; // Guest is 18 or older
                }
            }
            return false; // Birthdate is not set
        }

        // Event listener for birthdate input to validate age in real-time
        document.getElementById('birthdate').addEventListener('change', function () {
            validateAge();
        });
    });
</script>
@endsection