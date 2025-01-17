@extends('layouts.simple.master')
@section('title', 'Guest Management')

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
        
        tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
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
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        .modal-content {
            background-color: #023e8a;
            color: white;
            width: 600px;
            margin: 5% auto;
            padding: 20px;
            border-radius: 10px;
            position: relative;
            top: 70px;
        }
        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background: pink;
            border: none;
            font-size: 20px;
            color: white;
            cursor: pointer;
            width: 40px;
            height: 40px;
        }
        .table-container {
            max-height: 400px;
            overflow-y: auto; 
            overflow-x: auto; 
            border: 1px solid #ddd; 
            margin-top: 20px; 
        }
        /* Change the color of the date font */
        .date {
            color: gray; /* Use any color code (e.g., hex, RGB, or color name) */
            font-size: 16px; /* Optional: Adjust the font size */
            font-family: Arial, sans-serif; /* Optional: Set the font family */
        }
        
        .required-field {
            color:red;
            font-size: 16px; /* Optional: Adjust the font size */
            font-family: Arial, sans-serif; /* Optional: Set the font family */
        }

@media 
        (max-width: 768px) {
            .toolbar {
                flex-direction: column;
                align-items: stretch;
            }

            .search-bar {
                display: flex;
                flex-wrap: nowrap;
                gap: 10px;
            }

            .button-group {
                justify-content: flex-end;
            }
        }

        #contactNumber {
            width: 265px;
        }

        #addGuest {
            width: 200px;
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
        }

        .modal-content form {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .modal-content label {
            display: flex;
            flex-direction: column;
            flex: 1 1 calc(50% - 20px);
        }

        .modal-content h2 {
            text-align: center; 
            margin: 0; 
            padding-top: 10px; 
        }
        .modal-content input,
        .modal-content select {
            width: 100%;
            padding: 10px;
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
        }

        .modal-content button:hover {
            background-color: #560bad;
        }

        @media screen and (max-width: 768px) {
            .modal-content form {
                flex-direction: column;
            }

            .modal-content label {
                flex: 1 1 100%;
            }
        }
    </style>
@endsection

@section('breadcrumb-title')
<h3><b>Guest Management</b></h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">General</li>
<li class="breadcrumb-item active">Guest Management</li>
@endsection

@section('content')
        <body>
            <div class="container">
                <div class="toolbar">
                    <div class="search-bar">
                        <input type="text" id="searchInput" placeholder="Search...">
                        <button id="searchButton">Search</button>
                    </div>
                </div>
            </div>
                <div class="table-container">
                        <table id="guestTable">
                            <thead >
                                <tr>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Gender</th>
                                    <th>Birthdate</th>
                                    <th>Email</th>
                                    <th>Contact Number</th>
                                    <th>Special Request</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Doe</td>
                                    <td>John</td>
                                    <td>Agassi</td>
                                    <td>Male</td>
                                    <td>1990-01-01</td>
                                    <td>john.doe@example.com</td>
                                    <td>09214170048</td>
                                    <td>Bed of roses</td>
                                    <td><button class="edit-button">Edit</button></td>
                                </tr>
                                <tr>
                                <td>Doe</td>
                                    <td>James</td>
                                    <td>Agassi</td>
                                    <td>Male</td>
                                    <td>1990-01-01</td>
                                    <td>john.doe@example.com</td>
                                    <td>09214170048</td>
                                    <td>Bed of roses</td>
                                    <td><button class="edit-button">Edit</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
        <button type="button" class="add-button" id="addGuestButton">Add Guest</button>
    </div>
    <div class="modal" id="guestModal">
        <div class="modal-content">
            <button class="close-button" id="closeModalButton">&times;</button>
            <h2>Add a Guest</h2>
            <form id="addGuestForm">
                <label style="display: inline-block;"> Last Name <span style="color: red; font-size:16px; font-weight:bold; margin-left: 5px;">*</span> 
                    <input type="text" id="lastName" placeholder="Last Name" required>
                </label>
                <label style="display: inline-block;"> First Name <span style="color: red; font-size:16px; font-weight:bold;    
                    margin-left: 5px;">*</span> 
                    <input type="text" id="firstName" placeholder="First Name" required></label>
                <label> Middle Name <input type="text" id="middleName" placeholder="Middle Name"></label>
                <label style="display: inline-block;"> Gender <span style="color: red; font-size:16px; font-weight:bold;    
                    margin-left: 5px;">*</span> <select class="date" id="gender" required>
                    <option value="" disabled selected>Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Rather Not Say">Rather Not Say</option>
                </select></label>
                <label style="display: inline-block;"> Birth Date <span style="color: red; font-size:16px; font-weight:bold;    
                    margin-left: 5px;">*</span> 
                    <input class="date" type="date" id="birthdate" placeholder="Birthdate" required>
                </label>
                <label style="display: inline-block;"> Email <span style="color: red; font-size:16px; font-weight:bold;    
                    margin-left: 5px;">*</span> 
                    <input type="email" id="email" placeholder="Email" required>
                </label>
                <label style="display: inline-block;"> Contact Number <span style="color: red; font-size:16px; font-weight:bold;    
                    margin-left: 5px;">*</span> 
                    <input type="text" id="contactNumber" placeholder="Contact Number" required></label>
                <label> Special Request <input type="text" id="specialRequest" placeholder="Special Request"></label>
            </form>
            <button id="addGuest" type="submit">Add Guest</button>
        </div>
    </div>
@endsection

@section('script')
<script src="{{asset('assets/js/datepicker/date-time-picker/moment.min.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-time-picker/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-time-picker/datetimepicker.custom.js')}}"></script>
<script>
    const addGuestButton = document.getElementById('addGuestButton');
    const guestModal = document.getElementById('guestModal');
    const closeModalButton = document.getElementById('closeModalButton');
    const addGuestForm = document.getElementById('addGuestForm');
    const addGuestSubmitButton = document.getElementById('addGuest');
    const guestTableBody = document.querySelector('#guestTable tbody');
    

    // Open modal
    addGuestButton.addEventListener('click', () => {
        guestModal.style.display = 'block';
    });

    // Close modal
    closeModalButton.addEventListener('click', () => {
        guestModal.style.display = 'none';
    });

    // Close modal when clicking outside
    window.addEventListener('click', (e) => {
        if (e.target === guestModal) {
             guestModal.style.display = 'none';
            }
        });
 
    // Function to handle the search
    function searchItems() {
        const searchInput = document.getElementById('searchInput').value.toLowerCase();
        const rows = document.querySelectorAll('#guestTable tbody tr'); // Get table rows

        rows.forEach(row => {
            const cells = row.getElementsByTagName('td'); // Get cells in each row
            let matchFound = false;

            // Combine the text of specific columns (e.g., first name and last name)
            const lastName = cells[0].textContent.toLowerCase(); // Last name is in the first column
            const firstName = cells[1].textContent.toLowerCase(); // First name is in the second column
            const fullName = `${firstName} ${lastName}`; // Combine first and last name

                // Check if the combined text matches the search input
                if (fullName.includes(searchInput)) {
                    matchFound = true;
                }

                // Show or hide the row based on whether a match is found
                if (matchFound) {
                    row.style.display = ''; // Show row
                } else {
                    row.style.display = 'none'; // Hide row
                }
        });
    }

    // Add event listener to the search button
    document.getElementById('searchButton').addEventListener('click', searchItems);



    document.addEventListener('DOMContentLoaded', () => {
        const guestTableBody = document.querySelector('#guestTable tbody');
    
        // Add double-click event listener to table rows
        guestTableBody.addEventListener('dblclick', (e) => {
            // Get the row that was double-clicked
            const row = e.target.closest('tr');
            if (row) {
                // Get the full name from the row cells
                const lastName = row.cells[0].textContent.trim();
                const firstName = row.cells[1].textContent.trim();
                const middleName = row.cells[2].textContent.trim();
                    
                // Create the full name
                const fullName = `${firstName} ${middleName} ${lastName}`.trim();
                    
                // Show the alert with the full name
                alert(`Full Name: ${fullName}`);
            }
        });
    });

   //     // Get the table body
    // const guestTable = document.getElementById('guestTable');

    // // Add double-click event listener to table rows
    // guestTable.addEventListener('dblclick', (e) => {
    //     const row = e.target.closest('tr'); // Get the row that was double-clicked
    //     if (row && row.rowIndex !== 0) { // Exclude the header row
    //         const rowData = [...row.children].map(cell => cell.textContent.trim());
            
    //         // Create query parameters from the row data
    //         const queryParams = new URLSearchParams({
    //             lastName: rowData[0],
    //             firstName: rowData[1],
    //             middleName: rowData[2],
    //             gender: rowData[3],
    //             birthdate: rowData[4],
    //             email: rowData[5],
    //             contactNumber: rowData[6],
    //             specialRequest: rowData[7]
    //         });

    //         // Redirect to another page with query parameters
    //         window.location.href = `/Pokemon/Employee/Home/admin-booking?${queryParams.toString()}`;
    //     }
    // });

    
        // Handle guest addition
    addGuestSubmitButton.addEventListener('click', (e) => {
        e.preventDefault();

        // Get form data
        const lastName = document.getElementById('lastName').value.trim();
        const firstName = document.getElementById('firstName').value.trim();
        const middleName = document.getElementById('middleName').value.trim();
        const gender = document.getElementById('gender').value;
        const birthdate = document.getElementById('birthdate').value;
        const email = document.getElementById('email').value.trim();
        const contactNumber = document.getElementById('contactNumber').value.trim();
        const specialRequest = document.getElementById('specialRequest').value.trim();

        // Validate inputs
        let valid = true;
        let errorMessages = [];

        if (!lastName) {
            valid = false;
            errorMessages.push('Last Name is required.');
        } else if (lastName.length > 25) {
            valid = false;
            errorMessages.push('Last Name must not exceed 25 characters.');
        }

        // Validate First Name
        if (!firstName) {
            valid = false;
            errorMessages.push('First Name is required.');
        } else if (firstName.length > 50) {
            valid = false;
            errorMessages.push('First Name must not exceed 50 characters.');
        }

        // Validate Birthdate
        if (!birthdate) {
            valid = false;
            errorMessages.push('Birth Date is required.');
        } else {
            const age = new Date().getFullYear() - new Date(birthdate).getFullYear();
            if (age < 18) {
                valid = false;
                errorMessages.push('Guest must be 18 or above.');
            }
        }
        // Validate Contact Number
        if (contactNumber.length !== 11 || isNaN(contactNumber)) {
            valid = false;
            errorMessages.push('Contact number must be exactly 11 digits.');
        }

        if (middleName.length > 25) {
            valid = false;
            errorMessages.push('Middle Name must not exceed 25 characters.');
        }

        // Validate Gender
        if (!gender) {
            valid = false;
            errorMessages.push('Gender is required.');
        }

        // Validate Age (must be above 18)
        const age = new Date().getFullYear() - new Date(birthdate).getFullYear();
        if (age < 18) {
            valid = false;
            errorMessages.push('Guest must be 18 or above.');
        }

        // Validate Email
        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (!emailPattern.test(email)) {
            valid = false;
            errorMessages.push('Email must be in a valid format (e.g., example@domain.com).');
        }

        // Validate Special Request length
        if (specialRequest.length > 100) {
            valid = false;
            errorMessages.push('Special request cannot exceed 100 characters.');
        }

        // Display error messages if validation fails
        if (!valid) {
            alert(errorMessages.join('\n'));
            return;
        }

        // If all validations pass, proceed with the form submission (e.g., adding the guest)
        // Add the new guest to the table
        const newRow = guestTableBody.insertRow();
        newRow.innerHTML = `
            <td>${lastName}</td>
            <td>${firstName}</td>
            <td>${middleName}</td>
            <td>${gender}</td>
            <td>${birthdate}</td>
            <td>${email}</td>
            <td>${contactNumber}</td>
            <td>${specialRequest}</td>
            <td><button class="edit-button">Edit</button></td>
        `;

        // Close the modal
        guestModal.style.display = 'none';
    });
</script>
@endsection
