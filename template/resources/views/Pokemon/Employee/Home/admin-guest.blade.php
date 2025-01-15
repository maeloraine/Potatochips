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
                        <input type="text" id="search" placeholder="Search...">
                        <button id="searchButton">Search</button>
                    </div>
                    <div class="button-group">
                        <button class="filter-button" id="filterButton">Filter</button>
                </div>
            </div>
                <div class="table-container">
                        <table id="guestTable">
                            <thead>
                                <tr>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Middle Initial</th>
                                    <th>Gender</th>
                                    <th>Birthdate</th>
                                    <th>Age</th>
                                    <th>Nationality</th>
                                    <th>Email</th>
                                    <th>Contact Number</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Doe</td>
                                    <td>John</td>
                                    <td>A</td>
                                    <td>Male</td>
                                    <td>1990-01-01</td>
                                    <td>34</td>
                                    <td>American</td>
                                    <td>john.doe@example.com</td>
                                    <td>+1234567890</td>
                                    <td><button class="edit-button">Edit</button></td>
                                </tr>
                                <tr>
                                    <td>Smith</td>
                                    <td>Jane</td>
                                    <td>B</td>
                                    <td>Female</td>
                                    <td>1995-05-15</td>
                                    <td>29</td>
                                    <td>British</td>
                                    <td>jane.smith@example.com</td>
                                    <td>+9876543210</td>
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
                <label> Last Name <input type="text" id="lastName" placeholder="Last Name" required></label>
                <label> First Name <input type="text" id="firstName" placeholder="First Name" required></label>
                <label> Middle Initial <input type="text" id="middleInitial" placeholder="Middle Initial"></label>
                <label> Gender <select id="gender" required>
                    <option value="" disabled selected>Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Rather Not Say">Rather Not Say</option>
                </select></label>
                <label> Birth Date <input type="date" id="birthdate" placeholder="Birthdate" required></label>
                <label> Age <input type="number" id="age" placeholder="Age" required></label>
                <label> Nationality <input type="text" id="nationality" placeholder="Nationality" required></label>
                <label> Email <input type="email" id="email" placeholder="Email" required></label>
                <label> Contact Number <input type="text" id="contactNumber" placeholder="Contact Number" required></label>
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
        const overlay = document.getElementById('overlay'); 

        addGuestButton.addEventListener('click', () => {
            guestModal.style.display = 'block';
        });

        closeModalButton.addEventListener('click', () => {
            guestModal.style.display = 'none';
        });

        window.addEventListener('click', (e) => {
            if (e.target === guestModal) {
                guestModal.style.display = 'none';
            }
        });

        document.getElementById('addGuest').addEventListener('click', (e) => {
            e.preventDefault(); 

            const lastName = document.getElementById('lastName').value;
            const firstName = document.getElementById('firstName').value;
            const middleInitial = document.getElementById('middleInitial').value;
            const gender = document.getElementById('gender').value;
            const birthdate = document.getElementById('birthdate').value;
            const age = document.getElementById('age').value;
            const nationality = document.getElementById('nationality').value;
            const email = document.getElementById('email').value;
            const contactNumber = document.getElementById('contactNumber').value;

            if (!lastName || !firstName || !gender || !birthdate || !age || !nationality || !email || !contactNumber) {
                alert('Please fill in all required fields.');
                return;
            }

            const guestTable = document.getElementById('guestTable').getElementsByTagName('tbody')[0];
            const newRow = guestTable.insertRow();

            newRow.insertCell(0).textContent = lastName;
            newRow.insertCell(1).textContent = firstName;
            newRow.insertCell(2).textContent = middleInitial;
            newRow.insertCell(3).textContent = gender;
            newRow.insertCell(4).textContent = birthdate;
            newRow.insertCell(5).textContent = age;
            newRow.insertCell(6).textContent = nationality;
            newRow.insertCell(7).textContent = email;
            newRow.insertCell(8).textContent = contactNumber;

            const editButton = document.createElement('button');
            editButton.classList.add('edit-button');
            editButton.textContent = 'Edit';
            newRow.insertCell(9).appendChild(editButton);

            document.getElementById('addGuestForm').reset();

            guestModal.style.display = 'none';
        });
    </script>
@endsection
