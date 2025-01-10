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
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Account Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>adminUser</td>
                    <td>******</td>
                    <td>Admin</td>
                    <td><button class="edit-button">Edit</button></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>manager123</td>
                    <td>******</td>
                    <td>Manager</td>
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
                <input type="text" id="username" placeholder="Username" required>
                <input type="password" id="password" placeholder="Password" required>
                <input type="password" id="confirmPassword" placeholder="Confirm Password" required>
                <select id="accountType" required>
                    <option value="" disabled selected>Select Account Type</option>
                    <option value="Admin">Admin</option>
                    <option value="Manager">Manager</option>
                    <option value="User">User</option>
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
@endsection