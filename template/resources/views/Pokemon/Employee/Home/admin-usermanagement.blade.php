@extends('layouts.simple.master')
@section('title', 'Date Time Picker')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3><b>User Management</b></h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Accounts</li>
<li class="breadcrumb-item active">User Management</li>
@endsection

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
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
        }

        .search-bar {
            display: flex;
            gap: 10px;
        }

        .search-bar input {
            width: 450px;
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

        .filter-button {
            padding: 10px 15px;
            background-color: #2196f3;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
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
            width: 500px;
            margin: 10% auto;
            padding: 20px;
            border-radius: 10px;
            position: relative;
        }

        .modal-content h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .modal-content form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .modal-content input, .modal-content select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .modal-content button {
            padding: 10px 15px;
            background-color: #9d4edd;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .modal-content button:hover {
            background-color: #560bad;
        }

        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background: none;
            border: none;
            font-size: 20px;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="toolbar">
            <div class="search-bar">
                <input type="text" id="search" placeholder="Search...">
                <button id="searchButton">Search</button>
            </div>
            <button class="filter-button" id="filterButton">Filter</button>
        </div>
        <table id="userTable">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Account Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Crimson Dimagiba</td>
                    <td>crimson@gmail.com</td>
                    <td>Manager</td>
                    <td><button class="edit-button">Edit</button></td>
                </tr>
                <tr>
                    <td>Gian Pablo</td>
                    <td>gian2323@gmail.com</td>
                    <td>Receptionist</td>
                    <td><button class="edit-button">Edit</button></td>
                </tr>
            </tbody>
        </table>
        
        <!-- add account button tapos nakafloat na fill in infos -->
        <button class="add-button" id="addAccountButton">Add Account</button>
    </div>
    <div class="modal" id="accountModal">
        <div class="modal-content">
            <button class="close-button" id="closeModalButton">&times;</button>
            <h2>Create an Account</h2>
            <form id="createAccountForm">
                <input type="text" id="EMP_FName" placeholder="First Name" required>
                <input type="text" id="EMP_LName" placeholder="Last Name" required>
                <input type="email" id="EMP_Email" placeholder="Email" required>
                <input type="password" id="password" placeholder="Password" required>
                <input type="password" id="confirmPassword" placeholder="Confirm Password" required>
                <select id="accountType" required>
                    <option value="" disabled selected>Select Account Type</option>
                    <option value="Manager">Manager</option>
                    <option value="Receptionist">Receptionist</option>
                </select>
                <button type="submit">Create Account</button>
            </form>
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

@endsection

@section('script')
<script src="{{asset('assets/js/datepicker/date-time-picker/moment.min.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-time-picker/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-time-picker/datetimepicker.custom.js')}}"></script>

<script> 
document.getElementById('createAccountForm').addEventListener('submit', (e) => {
    e.preventDefault();

    // Get form values
    const EMP_Fname = document.getElementById('EMP_FName').value;  // Corrected ID
    const EMP_Lname = document.getElementById('EMP_LName').value;  // Corrected ID
    const email = document.getElementById('EMP_Email').value;
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
    const fullName = `${EMP_Fname} ${EMP_Lname}`.trim();

    // Insert new cells
    const cell1 = newRow.insertCell(0); // Full Name
    const cell2 = newRow.insertCell(1); // Email
    const cell3 = newRow.insertCell(2); // Account Type
    const cell4 = newRow.insertCell(3); // Actions

    // Insert the data
    cell1.textContent = fullName;
    cell2.textContent = email;
    cell3.textContent = accountType;

    // Create and append the edit button
    const editButton = document.createElement('button');
    editButton.classList.add('edit-button');
    editButton.textContent = 'Edit';
    cell4.appendChild(editButton);

    // Clear form inputs
    document.getElementById('createAccountForm').reset();

    // Close the modal
    accountModal.style.display = 'none';
});


</script>
@endsection