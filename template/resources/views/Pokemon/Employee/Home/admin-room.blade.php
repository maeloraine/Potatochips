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
        flex-direction: column;
        gap: 10px;
        margin-bottom: 20px;
        padding: 10px;
        border-radius: 5px;
    }

    .search-bar {
        display: flex;
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

    .category-buttons {
        display: flex;
        gap: 10px;
        margin-top: 10px;
        background-color: white;
        padding: 10px;
        border-radius: 5px;
    }

    .filter-button {
        padding: 10px 15px; /* Adjust padding to control button size */
        background-color: #2196f3;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 150px; /* Set a fixed width for all buttons */
        height: 40px; /* Set a fixed height for all buttons */
        font-size: 16px; /* Adjust font size */
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background-color 0.3s ease; /* Smooth hover effect */
    }

    .filter-button.active {
        background-color: #1976d2;
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

    @media (max-width: 768px) {
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
        justify-content: center;
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
            <input type="text" id="search" placeholder="Search...">
            <button id="searchButton">Search</button>
        </div>
    </div>
    <div class="category-buttons">
        <button class="filter-button active" id="cottageButton">Cottage</button>
        <button class="filter-button" id="kuboButton">Kubo</button>
        <button class="filter-button" id="triangleCabinButton">Triangle Cabin</button>
        <button class="add-button" id="addRoomButton">Add Room</button>
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
                <!-- Example rows -->
                <tr>
                    <td>101</td>
                    <td>Cottage</td>
                    <td>$100</td>
                    <td>Available</td>
                    <td><button class="edit-button">Edit</button></td>
                </tr>
                <tr>
                    <td>102</td>
                    <td>Kubo</td>
                    <td>$80</td>
                    <td>Occupied</td>
                    <td><button class="edit-button">Edit</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal for adding a room -->
<div class="modal" id="roomModal">
    <div class="modal-content">
        <button class="close-button" id="closeModalButton">&times;</button>
        <h2>Add a Room</h2>
        <form id="createRoomForm">
            <label> Room No <input type="text" id="roomNo" placeholder="Room Number" required></label>
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
@endsection

@section('script')
<script>
    const addRoomButton = document.getElementById('addRoomButton');
    const roomModal = document.getElementById('roomModal');
    const closeModalButton = document.getElementById('closeModalButton');
    const createRoomButton = document.getElementById('createRoom');
    const cottageButton = document.getElementById('cottageButton');
    const kuboButton = document.getElementById('kuboButton');
    const triangleCabinButton = document.getElementById('triangleCabinButton');

    let selectedCategory = 'Cottage'; // Default category

    // Set the selected category when a category button is clicked
    cottageButton.addEventListener('click', () => {
        selectedCategory = 'Cottage';
        updateTable();
        setActiveButton(cottageButton);
    });

    kuboButton.addEventListener('click', () => {
        selectedCategory = 'Kubo';
        updateTable();
        setActiveButton(kuboButton);
    });

    triangleCabinButton.addEventListener('click', () => {
        selectedCategory = 'Triangle Cabin';
        updateTable();
        setActiveButton(triangleCabinButton);
    });

    // Open modal
    addRoomButton.addEventListener('click', () => {
        roomModal.style.display = 'block';
    });

    // Close modal
    closeModalButton.addEventListener('click', () => {
        roomModal.style.display = 'none';
    });

    // Close modal on clicking outside
    window.addEventListener('click', (e) => {
        if (e.target === roomModal) {
            roomModal.style.display = 'none';
        }
    });

    // Add Room functionality
    createRoomButton.addEventListener('click', () => {
        // Get form values
        const roomNo = document.getElementById('roomNo').value;
        const roomRate = document.getElementById('roomRate').value;
        const roomStatus = document.getElementById('roomStatus').value;

        // Validate inputs
        if (!roomNo || !roomRate || !roomStatus) {
            alert('Please fill in all the fields.');
            return;
        }

        // Add the new room to the table
        const roomTable = document.getElementById('roomTable').getElementsByTagName('tbody')[0];
        const newRow = roomTable.insertRow();

        // Insert new cells
        const cell1 = newRow.insertCell(0); // Room No
        const cell2 = newRow.insertCell(1); // Room Type
        const cell3 = newRow.insertCell(2); // Room Rate
        const cell4 = newRow.insertCell(3); // Room Status
        const cell5 = newRow.insertCell(4); // Actions

        // Insert the data
        cell1.textContent = roomNo;
        cell2.textContent = selectedCategory; // Use the selected category
        cell3.textContent = `$${roomRate}`;
        cell4.textContent = roomStatus;

        // Create and append edit button
        const editButton = document.createElement('button');
        editButton.classList.add('edit-button');
        editButton.textContent = 'Edit';
        cell5.appendChild(editButton);

        // Clear form inputs
        document.getElementById('createRoomForm').reset();

        // Close the modal
        roomModal.style.display = 'none';

        alert('Room Added Successfully!');
    });

    // Function to update the table based on the selected category
    function updateTable() {
        const roomTable = document.getElementById('roomTable').getElementsByTagName('tbody')[0];
        const rows = roomTable.getElementsByTagName('tr');

        for (let i = 0; i < rows.length; i++) {
            const row = rows[i];
            const roomTypeCell = row.getElementsByTagName('td')[1];
            if (roomTypeCell && roomTypeCell.textContent === selectedCategory) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    }

    // Function to set the active button
    function setActiveButton(button) {
        document.querySelectorAll('.filter-button').forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');
    }
</script>
@endsection