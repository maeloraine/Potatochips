@extends('layouts.simple.master')
@section('title', 'Date Time Picker')

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
            width: 100%;
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
            justify-content: space-between;
            align-items: center;
            margin-bottom: 5px;
            align-items: center; 
            gap: 10px; 
            padding: 10px;
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

        .search-bar button:hover {
            background-color: #45a049;
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
            top: 195px;
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

        #createAccount {
            width: 200px;
            align-items: center;
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
        .modal-content {
            position: relative;
            display: flex;
            flex-direction: column;
            gap: 15px;
            padding: 20px;
            background-color: #edede9;
            color: black;
            border-color: #3d5a80;
            border-width: 2px;
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
            background-color: #0096c7;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            align-self: center;
        }

        .modal-content button:hover {
            background-color: #1d3557;
        }

        @media screen and (max-width: 768px) {
            .modal-content form {
                flex-direction: column;
            }

            .modal-content label {
                flex: 1 1 100%;
            }
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
    </style>
@endsection

@section('breadcrumb-title')
<h3><b>Room Management</b></h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Rooms</li>
<li class="breadcrumb-item active">Room Management</li>
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
            <table id="roomTable">
                <thead>
                    <tr>
                        <th>Room No</th>
                        <th>Room Type</th>
                        <th>Room Rate</th>
                        <th>Room Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>101</td>
                        <td>Tent</td>
                        <td>$50</td>
                        <td>Available</td>
                        <td><button class="edit-button">Edit</button></td>
                    </tr>
                    <tr>
                        <td>102</td>
                        <td>Cottage</td>
                        <td>$100</td>
                        <td>Occupied</td>
                        <td><button class="edit-button">Edit</button></td>
                    </tr>
                </tbody>
            </table>
            </div>
            <button class="add-button" id="addRoomButton">Add Room</button>
        </div>
</div>

<!-- edit Room modal  -->
<div class="overlay" id="editRoomOverlay">
    <div class="modal" id="editRoomModal">
        <div class="modal-content">
            <button class="close-button" id="closeEditRoomModal">&times;</button>
            <h2>Edit Room</h2>
            <form id="editRoomForm">
                <div class="row">
                <label> Room No <input type="text" id="editRoomNo" placeholder="Room Number" required></label>
                <label> Room Type <select id="editRoomType" required>
                    <option value="" disabled selected>Select Room Type</option>
                    <option value="Tent">Tent</option>
                    <option value="Function Hall">Function Hall</option>
                    <option value="Cottage">Cottage</option>
                </select></label>
                <label> Room Rate <input type="editNumber" id="roomRate" placeholder="Room Rate" required></label>
                <label> Room Status <select id="editRoomStatus" required>
                    <option value="" disabled selected>Select Room Status</option>
                    <option value="Available">Available</option>
                    <option value="Occupied">Occupied</option>
                </select></label>
            </form>
            <button type="submit" id="editRoom">Save Changes</button>
        </div>
        </div>
    </div>
</div>

<!-- add room modal -->
    <div class="modal" id="roomModal">
        <div class="modal-content">
            <button class="close-button" id="closeModalButton">&times;</button>
            <h2>Add a Room</h2>
            <form id="createRoomForm">
                <label> Room No <input type="text" id="roomNo" placeholder="Room Number" required></label>
                <label> Room Type <select id="roomType" required>
                    <option value="" disabled selected>Select Room Type</option>
                    <option value="Tent">Tent</option>
                    <option value="Function Hall">Function Hall</option>
                    <option value="Cottage">Cottage</option>
                </select></label>
                <label> Room Rate <input type="number" id="roomRate" placeholder="Room Rate" required></label>
                <label> Room Status <select id="roomStatus" required>
                    <option value="" disabled selected>Select Room Status</option>
                    <option value="Available">Available</option>
                    <option value="Occupied">Occupied</option>
                </select></label>
            </form>
            <button type="submit" id="createRoom">Add Room</button>
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
    const addRoomButton = document.getElementById('addRoomButton');
    const roomModal = document.getElementById('roomModal');
    const closeModalButton = document.getElementById('closeModalButton');
    const createRoomButton = document.getElementById('createRoom');
    const editRoomOverlay = document.getElementById('editRoomOverlay');
    const editRoomModal = document.getElementById('editRoomModal');
    const closeEditRoomModal = document.getElementById('closeEditRoomModal');
    const editRoomButton = document.getElementById('editRoom');
    const roomTableBody = document.querySelector("#roomTable tbody");

    let selectedRow = null; // Store the row being edited

    // Function to validate room input
    function validateRoomForm(form) {
        let errors = [];

        const roomNo = form.querySelector("#roomNo, #editRoomNo").value.trim();
        const roomType = form.querySelector("#roomType, #editRoomType").value;
        const roomRate = form.querySelector("#roomRate").value.trim();
        const roomStatus = form.querySelector("#roomStatus, #editRoomStatus").value;

        // Room No validation (must be numeric and unique)
        if (!roomNo) {
            errors.push("Room Number is required.");
        } else if (!/^\d+$/.test(roomNo)) {
            errors.push("Room Number must be numeric.");
        } else {
            const existingRooms = Array.from(roomTableBody.querySelectorAll("tr td:first-child")).map(td => td.textContent.trim());
            if (existingRooms.includes(roomNo) && !selectedRow) {
                errors.push("Room Number already exists.");
            }
        }

        // Room Type validation
        if (!roomType) errors.push("Room Type is required.");

        // Room Rate validation (must be positive number)
        if (!roomRate) {
            errors.push("Room Rate is required.");
        } else if (!/^\d+(\.\d{1,2})?$/.test(roomRate) || parseFloat(roomRate) <= 0) {
            errors.push("Room Rate must be a positive number.");
        }

        // Room Status validation
        if (!roomStatus) errors.push("Room Status is required.");

        return errors;
    }

    // Function to display validation errors
    function showErrors(errors) {
        if (errors.length > 0) {
            alert(errors.join("\n"));
            return false;
        }
        return true;
    }

    // Open Edit Room Modal
    function openEditRoomModal(row) {
        selectedRow = row;
        const cells = selectedRow.getElementsByTagName('td');

        // Populate modal fields with existing values
        document.getElementById('editRoomNo').value = cells[0].textContent;
        document.getElementById('editRoomType').value = cells[1].textContent;
        document.getElementById('roomRate').value = cells[2].textContent.replace('$', '');
        document.getElementById('editRoomStatus').value = cells[3].textContent;

        // Show the edit modal
        editRoomModal.style.display = 'block';
        editRoomOverlay.style.display = 'block';
    }

    // Open Add Room Modal
    addRoomButton.addEventListener('click', () => {
        roomModal.style.display = 'block';
    });

    // Close Add Room Modal
    closeModalButton.addEventListener('click', () => {
        roomModal.style.display = 'none';
    });

    // Close Edit Room Modal
    closeEditRoomModal.addEventListener('click', () => {
        editRoomModal.style.display = 'none';
        editRoomOverlay.style.display = 'none';
    });

    // Add Room Functionality
    createRoomButton.addEventListener('click', (e) => {
        e.preventDefault();
        const errors = validateRoomForm(roomModal);
        if (!showErrors(errors)) return; // Prevent adding if there are errors

        // Get form values
        const roomNo = document.getElementById('roomNo').value.trim();
        const roomType = document.getElementById('roomType').value;
        const roomRate = document.getElementById('roomRate').value.trim();
        const roomStatus = document.getElementById('roomStatus').value;

        // Add new row to the table
        const newRow = roomTableBody.insertRow();
        newRow.innerHTML = `
            <td>${roomNo}</td>
            <td>${roomType}</td>
            <td>$${roomRate}</td>
            <td>${roomStatus}</td>
            <td><button class="edit-button">Edit</button></td>
        `;

        // Attach event listener to new Edit button
        newRow.querySelector(".edit-button").addEventListener("click", function () {
            openEditRoomModal(newRow);
        });

        // Reset form and close modal
        document.getElementById('createRoomForm').reset();
        roomModal.style.display = 'none';
        alert('Room Added Successfully!');
    });

    // Save Changes in Edit Modal
    editRoomButton.addEventListener('click', (e) => {
        e.preventDefault();
        const errors = validateRoomForm(editRoomModal);
        if (!showErrors(errors)) return; // Prevent saving if there are errors

        if (selectedRow) {
            selectedRow.cells[0].textContent = document.getElementById('editRoomNo').value.trim();
            selectedRow.cells[1].textContent = document.getElementById('editRoomType').value;
            selectedRow.cells[2].textContent = `$${document.getElementById('roomRate').value.trim()}`;
            selectedRow.cells[3].textContent = document.getElementById('editRoomStatus').value;

            // Hide the modal after updating
            editRoomModal.style.display = 'none';
            editRoomOverlay.style.display = 'none';

            alert('Room Updated Successfully!');
        }
    });

    // Restrict Room Number to Numeric Only
    document.querySelectorAll("#roomNo, #editRoomNo").forEach(input => {
        input.addEventListener("keypress", (e) => {
            if (!/\d/.test(e.key)) e.preventDefault();
        });
    });

    // Restrict Room Rate to Positive Numbers Only
    document.querySelectorAll("#roomRate, #editRoomRate").forEach(input => {
        input.addEventListener("input", (e) => {
            e.target.value = e.target.value.replace(/[^0-9.]/g, ''); // Allow numbers and decimals
        });
    });

    // Attach event listeners to existing edit buttons at page load
    document.querySelectorAll('.edit-button').forEach((button) => {
        button.addEventListener('click', function () {
            openEditRoomModal(button.closest('tr'));
        });
    });
});

</script>
@endsection
