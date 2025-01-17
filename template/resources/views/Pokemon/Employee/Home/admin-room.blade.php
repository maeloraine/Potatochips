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
    const addRoomButton = document.getElementById('addRoomButton');
    const roomModal = document.getElementById('roomModal');
    const closeModalButton = document.getElementById('closeModalButton');
    const createRoomButton = document.getElementById('createRoom');
    

    // Function to handle the search
    function searchItems() {
        const searchInput = document.getElementById('searchInput').value.toLowerCase();
        const rows = document.querySelectorAll('#roomTable tbody tr'); // Get table rows

        rows.forEach(row => {
            const cells = row.getElementsByTagName('td'); // Get cells in each row
            let matchFound = false;

            // Check if any cell text matches the search input
            for (let i = 0; i < cells.length; i++) {
                const cellText = cells[i].textContent.toLowerCase();
                if (cellText.includes(searchInput)) {
                    matchFound = true;
                    break; // Exit loop if a match is found
                }
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
        const roomType = document.getElementById('roomType').value;
        const roomRate = document.getElementById('roomRate').value;
        const roomStatus = document.getElementById('roomStatus').value;

        // Validate inputs
        if (!roomNo || !roomType || !roomRate || !roomStatus) {
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
        cell2.textContent = roomType;
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
</script>
@endsection
