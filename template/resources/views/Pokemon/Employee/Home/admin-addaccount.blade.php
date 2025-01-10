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
    <title>Add Account</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 98%;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .toolbar {
            background-color: #0077b6;
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
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

        /* Modal styles */
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
            background-color: #2d6a4f;
            color: white;
            width: 400px;
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
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .modal-content button:hover {
            background-color: #45a049;
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
        <button class="add-button" id="addAccountButton">Add Account</button>
    </div>

    <!-- Modal -->
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
        // JavaScript to toggle modal
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
</body>
</html>

@endsection

@section('script')
<script src="{{asset('assets/js/datepicker/date-time-picker/moment.min.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-time-picker/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-time-picker/datetimepicker.custom.js')}}"></script>
@endsection