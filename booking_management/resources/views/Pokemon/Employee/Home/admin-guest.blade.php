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
<div class="container">
    <div class="toolbar">
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Search...">
                <button id="searchButton">Search</button>
        </div>
        <div class="button-group">
                <button class="filter-button" id="filterButton">Filter</button>
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
                                    <td><button class="edit-button" onclick="openEditModal(this)">Edit</button></td>
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
                                    <td><button class="edit-button" onclick="openEditModal(this)">Edit</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="add-button" id="addGuestButton">Add Guest</button>
            </div>
        </div>

    <!-- guest modal  -->
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

    <!-- edit guest modal -->
    <div class="modal" id="editGuestModal">
    <div class="modal-content">
        <button class="close-button" id="closeEditModalButton">&times;</button>
        <h2>Edit Guest</h2>
        <form id="editGuestForm">
            <label>Last Name 
                <input type="text" id="editLastName" required>
            </label>
            <label>First Name 
                <input type="text" id="editFirstName" required>
            </label>
            <label>Middle Name
                <input type="text" id="editMiddleName">
            </label>
            <label>Gender 
                <select id="editGender" required>
                    <option value="" disabled selected>Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Rather Not Say">Rather Not Say</option>
                </select>
            </label>
            <label>Birth Date
                <input type="date" id="editBirthdate" required>
            </label>
            <label>Email
                <input type="email" id="editEmail" required>
            </label>
            <label>Contact Number 
                <input type="text" id="editContactNumber" required>
            </label>
            <label>Special Request
                <input type="text" id="editSpecialRequest">
            </label>
        </form>
        <button id="saveGuest">Save Changes</button>
    </div>
</div>

@endsection

@section('script')
<script src="{{asset('assets/js/datepicker/date-time-picker/moment.min.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-time-picker/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-time-picker/datetimepicker.custom.js')}}"></script>
<script>
document.addEventListener("DOMContentLoaded", () => {
    const addGuestButton = document.getElementById("addGuestButton");
    const guestModal = document.getElementById("guestModal");
    const closeModalButton = document.getElementById("closeModalButton");
    const addGuestForm = document.getElementById("addGuestForm");
    const addGuestSubmitButton = document.getElementById("addGuest");
    const guestTableBody = document.querySelector("#guestTable tbody");
    const editGuestModal = document.getElementById("editGuestModal");
    const closeEditModalButton = document.getElementById("closeEditModalButton");
    const saveGuestButton = document.getElementById("saveGuest");
    const searchButton = document.getElementById("searchButton");
    const searchInput = document.getElementById("searchInput");

    let selectedRow = null; // Store row for editing

    // Open Add Guest Modal
    addGuestButton.addEventListener("click", () => {
        guestModal.style.display = "block";
    });

    // Close Add Guest Modal
    closeModalButton.addEventListener("click", () => {
        guestModal.style.display = "none";
        addGuestForm.reset();
    });

    // Close modals when clicking outside
    window.addEventListener("click", (e) => {
        if (e.target === guestModal) {
            guestModal.style.display = "none";
        }
        if (e.target === editGuestModal) {
            editGuestModal.style.display = "none";
        }
    });

    // Open Edit Modal
    function openEditModal(row) {
        selectedRow = row;

        // Pre-fill form with existing data
        document.getElementById("editLastName").value = row.cells[0].textContent;
        document.getElementById("editFirstName").value = row.cells[1].textContent;
        document.getElementById("editMiddleName").value = row.cells[2].textContent;
        document.getElementById("editGender").value = row.cells[3].textContent;
        document.getElementById("editBirthdate").value = row.cells[4].textContent;
        document.getElementById("editEmail").value = row.cells[5].textContent;
        document.getElementById("editContactNumber").value = row.cells[6].textContent;
        document.getElementById("editSpecialRequest").value = row.cells[7].textContent;

        // Show modal
        editGuestModal.style.display = "block";
    }

    // Close Edit Modal
    closeEditModalButton.addEventListener("click", () => {
        editGuestModal.style.display = "none";
    });

    // Save Edited Guest
    saveGuestButton.addEventListener("click", (e) => {
        e.preventDefault();
        if (!selectedRow) return;

        // Update row with new values
        selectedRow.cells[0].textContent = document.getElementById("editLastName").value;
        selectedRow.cells[1].textContent = document.getElementById("editFirstName").value;
        selectedRow.cells[2].textContent = document.getElementById("editMiddleName").value;
        selectedRow.cells[3].textContent = document.getElementById("editGender").value;
        selectedRow.cells[4].textContent = document.getElementById("editBirthdate").value;
        selectedRow.cells[5].textContent = document.getElementById("editEmail").value;
        selectedRow.cells[6].textContent = document.getElementById("editContactNumber").value;
        selectedRow.cells[7].textContent = document.getElementById("editSpecialRequest").value;

        // Close modal
        editGuestModal.style.display = "none";
    });

    // Search Guests
    function searchItems() {
        const filter = searchInput.value.toLowerCase();
        document.querySelectorAll("#guestTable tbody tr").forEach((row) => {
            const lastName = row.cells[0].textContent.toLowerCase();
            const firstName = row.cells[1].textContent.toLowerCase();
            const fullName = `${firstName} ${lastName}`;

            row.style.display = fullName.includes(filter) ? "" : "none";
        });
    }
    searchButton.addEventListener("click", searchItems);

    // Double-click to show Full Name
    guestTableBody.addEventListener("dblclick", (e) => {
        const row = e.target.closest("tr");
        if (row) {
            const lastName = row.cells[0].textContent.trim();
            const firstName = row.cells[1].textContent.trim();
            const middleName = row.cells[2].textContent.trim();
            alert(`Full Name: ${firstName} ${middleName} ${lastName}`);
        }
    });

    // Add New Guest
    addGuestSubmitButton.addEventListener("click", (e) => {
        e.preventDefault();

        // Get form values
        const lastName = document.getElementById("lastName").value.trim();
        const firstName = document.getElementById("firstName").value.trim();
        const middleName = document.getElementById("middleName").value.trim();
        const gender = document.getElementById("gender").value;
        const birthdate = document.getElementById("birthdate").value;
        const email = document.getElementById("email").value.trim();
        const contactNumber = document.getElementById("contactNumber").value.trim();
        const specialRequest = document.getElementById("specialRequest").value.trim();

        // Validate inputs
        let errors = [];
        if (!lastName || lastName.length > 25) errors.push("Last Name must be 1-25 characters.");
        if (!firstName || firstName.length > 50) errors.push("First Name must be 1-50 characters.");
        if (middleName.length > 25) errors.push("Middle Name must not exceed 25 characters.");
        if (!gender) errors.push("Gender is required.");
        if (!birthdate) {
            errors.push("Birth Date is required.");
        } else {
            const age = new Date().getFullYear() - new Date(birthdate).getFullYear();
            if (age < 18) errors.push("Guest must be 18 or above.");
        }
        if (!/^\d{11}$/.test(contactNumber)) errors.push("Contact number must be exactly 11 digits.");
        if (!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/.test(email)) errors.push("Invalid email format.");
        if (specialRequest.length > 100) errors.push("Special request cannot exceed 100 characters.");

        if (errors.length > 0) {
            alert(errors.join("\n"));
            return;
        }

        // Add new row to the table
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

        // Close modal and reset form
        guestModal.style.display = "none";
        addGuestForm.reset();
    });

    // Event delegation for Edit Button
    guestTableBody.addEventListener("click", (e) => {
        if (e.target.classList.contains("edit-button")) {
            openEditModal(e.target.closest("tr"));
        }
    });
});
</script>
@endsection
