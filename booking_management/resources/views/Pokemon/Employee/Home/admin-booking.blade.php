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
                        <th>Booking Status</th>
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
                        <td>Reserved</td>
                        <td><button class="edit-button">Edit</button></td>
                    </tr>
                    <tr>
                        <td>Jane Smith</td>
                        <td>102</td>
                        <td>2025-01-11</td>
                        <td>15:00</td>
                        <td>2025-01-16</td>
                        <td>11:00</td>
                        <td>Checked In</td>

                        <td><button class="edit-button">Edit</button></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <button class="add-button" id="addBookingButton">Add Booking</button>
</div>

<div class="overlay" id="overlay">
    <!-- Booking Form Modal -->
    <div class="modal" id="bookingModal">
        <div class="modal-content">
            <button class="close-button" id="closeBookingModal">&times;</button>
            <h2>Booking Information</h2>
            <form id="bookingForm">
                <div class="row">
                    <label>
                        Room No.
                        <select id="roomNo" required>
                            <option value="" selected disabled>Select Room</option>
                            @foreach($availableRooms as $room)
                                <option value="{{ $room->Room_Number }}">
                                    {{ $room->Room_Number }} - {{ $room->Room_Type }}
                                </option>
                            @endforeach
                        </select>
                    </label>
                    <label>
                        Booking Status
                        <select id="bookingStatus" required>
                            <option value="checkedIn" selected>Checked-in</option>
                            <option value="checkedOut">Checked-out</option>
                        </select>
                    </label>
                </div>
                <div class="row">
                    <label>
                        Check-In Date
                        <input type="date" id="checkInDate" required>
                    </label>
                </div>
                <div class="row">
                    <label>
                        Check-In Time
                        <select id="checkInTime" required>
                            <option selected disabled>Select check-in time</option>
                            <option value="08:00">8:00 AM</option>
                            <option value="19:00">7:00 PM</option>
                        </select>
                    </label>
                    <label>
                        Check-Out Time
                        <input type="time" id="checkOutTime" readonly>
                    </label>
                </div>
                <div class="row">
                    <label>
                        Check-Out Date
                        <input type="date" id="checkOutDate" required readonly>
                    </label>
                </div>
                <div class="row">
                    <label>
                        Adults
                        <input type="number" id="numAdults" min="1" value="1" required>
                    </label>
                    <label>
                        Children (under 12)
                        <input type="number" id="numChildren" min="0" value="0" required>
                    </label>
                </div>
                <button type="button" id="nextButton">Next</button>
            </form>
        </div>
    </div>

    <!-- Guest Information Modal -->
    <div class="modal" id="guestModal">
        <div class="modal-content">
            <button class="close-button" id="closeGuestModal">&times;</button>
            <h2>Guest Information</h2>
            <form id="guestForm">
                <div class="row">
                    <label>
                        First Name
                        <input type="text" id="firstName" required maxlength="50">
                    </label>
                    <label>
                        Last Name
                        <input type="text" id="lastName" required maxlength="25">
                    </label>
                </div>
                <div class="row">
                    <label>
                        Gender
                        <select id="gender" required>
                            <option value="" selected disabled>Select gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Rather Not Say">Rather Not Say</option>
                        </select>
                    </label>
                    <label>
                        Birthdate
                        <input type="date" id="birthdate" required>
                        <small class="text-danger" id="age-error" style="display: none;">The primary guest must be at least 18 years old to confirm your booking.</small>
                    </label>
                </div>
                <div class="row">
                    <label>
                        Email
                        <input type="email" id="email" required>
                    </label>
                    <label>
                        Phone
                        <input type="tel" id="phone" required>
                    </label>
                </div>
                <div class="row">
                    <label>
                        Address
                        <input type="text" id="address" required>
                    </label>
                </div>
                <div class="row">
                    <label>
                        Special Requests
                        <textarea id="specialRequests"></textarea>
                    </label>
                </div>
                <button type="submit" id="bookNowButton">Book Now</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/datepicker/date-time-picker/moment.min.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-time-picker/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-time-picker/datetimepicker.custom.js')}}"></script>
<script>
    const bookingModal = document.getElementById('bookingModal');
    const guestModal = document.getElementById('guestModal');
    const overlay = document.getElementById('overlay');

    // Open booking modal
    document.getElementById('addBookingButton').addEventListener('click', () => {
        bookingModal.style.display = 'block';
        overlay.style.display = 'block';
        // Set min date for check-in
        document.getElementById('checkInDate').min = new Date().toISOString().split('T')[0];
    });

    // Close modals
    document.querySelectorAll('.close-button').forEach(button => {
        button.addEventListener('click', () => {
            bookingModal.style.display = 'none';
            guestModal.style.display = 'none';
            overlay.style.display = 'none';
        });
    });

    //========================
    // FUNCTION FOR DATES
    // =======================

    const checkInDateInput = document.getElementById('checkInDate');
    const checkOutDateInput = document.getElementById('checkOutDate');
    const today = new Date().toISOString().split('T')[0]; //Get the date today
    checkInDateInput.setAttribute('min', today); // Set minimum date for Check-In (today)

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
    // =======================

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

    // Next button handler
    document.getElementById('nextButton').addEventListener('click', () => {
        if (document.getElementById('bookingForm').checkValidity()) {
            bookingModal.style.display = 'none';
            guestModal.style.display = 'block';
        } else {
            alert('Please fill all required booking fields');
        }
    });

    //===========================================
    // FUNCTION FOR BIRTHDATE (AGE VALIDATION)
    // ==========================================

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

    // Function to validate age
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

    //========================
    // ON SUBMIT
    // =======================
        // Submit guest form
        document.getElementById('bookNowButton').addEventListener('click', function(e) {
        e.preventDefault();
        
        // // Collect all data
        // const bookingData = {
        //     roomNo: document.getElementById('roomNo').value,
        //     checkInDate: document.getElementById('checkInDate').value,
        //     checkInTime: document.getElementById('checkInTime').value,
        //     checkOutDate: document.getElementById('checkOutDate').value,
        //     checkOutTime: document.getElementById('checkOutTime').value,
        //     numAdults: document.getElementById('numAdults').value,
        //     numChildren: document.getElementById('numChildren').value,
        //     guest: {
        //         firstName: document.getElementById('firstName').value,
        //         lastName: document.getElementById('lastName').value,
        //         gender: document.getElementById('gender').value,
        //         birthdate: document.getElementById('birthdate').value,
        //         email: document.getElementById('email').value,
        //         phone: document.getElementById('phone').value,
        //         address: document.getElementById('address').value,
        //         specialRequests: document.getElementById('specialRequests').value
        //     }
        // };

        // // Add to table
        // const tbody = document.querySelector('#bookingTable tbody');
        // const newRow = tbody.insertRow();
        // newRow.innerHTML = `
        //     <td>${bookingData.guest.firstName} ${bookingData.guest.lastName}</td>
        //     <td>${bookingData.roomNo}</td>
        //     <td>${bookingData.checkInDate}</td>
        //     <td>${bookingData.checkInTime}</td>
        //     <td>${bookingData.checkOutDate}</td>
        //     <td>${bookingData.checkOutTime}</td>
        //     <td>Reserved</td>
        //     <td><button class="edit-button">Edit</button></td>
        // `;

        // Reset forms and close modals
        document.getElementById('bookingForm').reset();
        document.getElementById('guestForm').reset();
        guestModal.style.display = 'none';
        overlay.style.display = 'none';
    });

    // Close on overlay click
    window.addEventListener('click', (e) => {
        if (e.target === overlay) {
            bookingModal.style.display = 'none';
            guestModal.style.display = 'none';
            overlay.style.display = 'none';
        }
    });

</script>
@endsection