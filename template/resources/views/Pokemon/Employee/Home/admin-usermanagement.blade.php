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
            justify-content: space-between;
            margin-bottom: 20px;
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
<h3><b>User Management</b></h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Accounts</li>
<li class="breadcrumb-item active">User Management</li>
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

        <table id="userTable">
            <thead>
                <tr>
                    <th>Employee Number</th>
                    <th>Full Name</th>
                    <th>Password</th>
                    <th>Account Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>efdert3</td>
                    <td>Nonstop Vertigo</td>
                    <td>******</td>
                    <td>Manager</td>
                    <td><button class="edit-button">Edit</button></td>
                </tr>
                <tr>
                    <td>ee34123</td>
                    <td>Curled Plot</td>
                    <td>******</td>
                    <td>Receptionist</td>
                    <td><button class="edit-button">Edit</button></td>
                </tr>
            </tbody>
        </table>
</div>

            <div class="table-container">
            <table id="userTable">
                <thead>
                    <tr>
                        <th>Employee Number</th>
                        <th>Full Name</th>
                        <th>Password</th>
                        <th>Account Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>efdert3</td>
                        <td>Nonstop Vertigo</td>
                        <td>******</td>
                        <td>Manager</td>
                        <td><button class="edit-button">Edit</button></td>
                    </tr>
                    <tr>
                        <td>ee34123</td>
                        <td>Curled Plot</td>
                        <td>******</td>
                        <td>Receptionist</td>
                        <td><button class="edit-button">Edit</button></td>
                    </tr>
                </tbody>
            </table>
            </div>

        
        <!-- add account button tapos nakafloat na fill in infos -->
        <button class="add-button" id="addAccountButton">Add Account</button>
    </div>
    <div class="modal" id="accountModal">
        <div class="modal-content">
            <button class="close-button" id="closeModalButton">&times;</button>
            <h2>Create an Account</h2>
            <form id="createAccountForm">

                <input type="text" id="username" placeholder="Employee Number" required>
                <input type="password" id="password" placeholder="Password" required>
                <input type="password" id="confirmPassword" placeholder="Confirm Password" required>
                <select id="accountType" required>
                    <option value="" disabled selected>Select Account Type</option>
                    <option value="Manager">Manager</option>
                    <option value="Receptionist">Receptionist</option>
                </select>
                <button type="submit">Create Account</button>

                <label> Employee Number <input type="text" id="username" placeholder="Employee Number" required></label>
                <label> Password <input type="password" id="password" placeholder="Password" required> </label>
                <label> Account Type <select id="accountType" required>
                    <option value="" disabled selected>Select Account Type</option>
                    <option value="Manager">Manager</option>
                    <option value="Receptionist">Receptionist</option>
                </select></label>
                <label> Confirm password <input type="password" id="confirmPassword" placeholder="Confirm Password" required></label>

            </form>
            <button type="submit" id="createAccount" >Create Account</button>
        </div>
    </div>


    <script>
        const addAccountButton = document.getElementById('addAccountButton');
        const accountModal = document.getElementById('accountModal');
        const closeModalButton = document.getElementById('closeModalButton');
        

        addAccountButton.addEventListener('click', () => {
            accountModal.style.display = 'block';
        });

        closeModalButton.addEventListener('click', () => {
            accountModal.style.display = 'none';
        });

        window.addEventListener('click', (e) => {
            if (e.target === accountModal) {
                accountModal.style.display = 'none';
            }
        });

        document.getElementById('createAccountForm').addEventListener('submit', (e) => {
            e.preventDefault();
            alert('Account Created Successfully!');
            accountModal.style.display = 'none';
        });
    </script>
    </div>
</body>
</html>


</div>

@endsection

@section('script')
<script src="{{asset('assets/js/datepicker/date-time-picker/moment.min.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-time-picker/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-time-picker/datetimepicker.custom.js')}}"></script>


<script> 
document.getElementById('createAccountForm').addEventListener('submit', (e) => {
    e.preventDefault();
    
    // Get form values
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    const accountType = document.getElementById('accountType').value;

    // Basic validation
    if (password !== confirmPassword) {
        alert('Passwords do not match!');
        return;
    }

    // Add the new user to the table
    const userTable = document.getElementById('userTable').getElementsByTagName('tbody')[0];
    const newRow = userTable.insertRow();

    // Insert new cells
    const cell1 = newRow.insertCell(0); // Employee Number
    const cell2 = newRow.insertCell(1); // Full Name
    const cell3 = newRow.insertCell(2); // Password
    const cell4 = newRow.insertCell(3); // Account Type
    const cell5 = newRow.insertCell(4); // Actions

    // Insert the data
    cell1.textContent = username;
    cell2.textContent = "Full Name"; // You can modify to allow input for Full Name if needed
    cell3.textContent = "******"; // Password can be hidden for display purposes
    cell4.textContent = accountType;
    const editButton = document.createElement('button');
    editButton.classList.add('edit-button');
    editButton.textContent = 'Edit';
    cell5.appendChild(editButton);

    // Clear form inputs
    document.getElementById('createAccountForm').reset();

    // Close the modal
    accountModal.style.display = 'none';

});


<script>
    document.getElementById('createAccount').addEventListener('click', () => {
        // Get form values
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        const accountType = document.getElementById('accountType').value;

        // Basic validation
        if (password !== confirmPassword) {
            alert('Passwords do not match!');
            return;
        }

        if (!username || !password || !accountType) {
            alert('All fields are required!');
            return;
        }

        // Add the new user to the table
        const userTable = document.getElementById('userTable').getElementsByTagName('tbody')[0];
        const newRow = userTable.insertRow();

        // Insert new cells
        const cell1 = newRow.insertCell(0); // Employee Number
        const cell2 = newRow.insertCell(1); // Full Name 
        const cell3 = newRow.insertCell(2); // Password
        const cell4 = newRow.insertCell(3); // Account Type
        const cell5 = newRow.insertCell(4); // Actions

        // Insert the data
        cell1.textContent = username;
        cell2.textContent = "Full Name"; // 
        cell3.textContent = "******"; // Hide password
        cell4.textContent = accountType;
        const editButton = document.createElement('button');
        editButton.classList.add('edit-button');
        editButton.textContent = 'Edit';
        cell5.appendChild(editButton);

        // Clear form inputs
        document.getElementById('createAccountForm').reset();

        // Close the modal
        accountModal.style.display = 'none';

        alert('Account Created Successfully!');
    });

    const addAccountButton = document.getElementById('addAccountButton');
    const accountModal = document.getElementById('accountModal');
    const closeModalButton = document.getElementById('closeModalButton');

    addAccountButton.addEventListener('click', () => {
        accountModal.style.display = 'block';
    });

    closeModalButton.addEventListener('click', () => {
        accountModal.style.display = 'none';
    });

    window.addEventListener('click', (e) => {
        if (e.target === accountModal) {
            accountModal.style.display = 'none';
        }
    });

</script>
@endsection