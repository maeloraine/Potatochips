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

        .filter-dropdown {
            padding: 10px 15px;
            background-color: #2196f3;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
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

        .generate-invoice-button {
            padding: 10px 15px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: 20px auto;
        }

        .generate-invoice-button:hover {
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
    </style>
@endsection

@section('breadcrumb-title')
<h3><b>Billing Management</b></h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">General</li>
<li class="breadcrumb-item active">Billing Management</li>
@endsection

@section('content')
    <div class="container">
        <div class="toolbar">
            <div class="search-bar">
                <input type="text" id="search" placeholder="Search...">
                <button id="searchButton">Search</button>
            </div>
            <div>
                <select id="filterDropdown" class="filter-dropdown">
                    <option value="all">All</option>
                    <option value="Paid">Paid</option>
                    <option value="Pending">Pending</option>
                </select>
            </div>
        </div>

        <div class="table-container">
            <table id="billingTable">
                <thead>
                    <tr>
                        <th>Guest Name</th>
                        <th>Invoice Number</th>
                        <th>Date Issued</th>
                        <th>Due Date</th>
                        <th>Payment Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John Doe</td>
                        <td>#12345</td>
                        <td>2025-01-01</td>
                        <td>2025-01-10</td>
                        <td class="payment-status">Paid</td>
                        <td>
                            <button class="edit-button">Edit</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Jane Smith</td>
                        <td>#12346</td>
                        <td>2025-01-02</td>
                        <td>2025-01-15</td>
                        <td class="payment-status">Pending</td>
                        <td>
                            <button class="edit-button">Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <button class="generate-invoice-button" id="generateInvoiceButton">Generate Invoice</button>
    </div>

    <!-- Modal for Generating Invoice -->
    <div class="modal" id="invoiceModal">
        <div class="modal-content">
            <button class="close-button" id="closeModalButton">&times;</button>
            <h2>Generate Invoice</h2>
            <form id="invoiceForm">
                <label>Guest Name <input type="text" id="guestName" placeholder="Guest Name" required></label>
                <label>Invoice Number <input type="text" id="invoiceNumber" placeholder="Invoice Number" required></label>
                <label>Date Issued <input type="date" id="dateIssued" required></label>
                <label>Due Date <input type="date" id="dueDate" required></label>
                <label>Payment Status
                    <select id="paymentStatus" required>
                        <option value="Paid">Paid</option>
                        <option value="Pending">Pending</option>
                    </select>
                </label>
            </form>
            <button type="submit" id="createInvoiceButton">Generate Invoice</button>
        </div>
    </div>
@endsection

@section('script')
<script src="{{asset('assets/js/datepicker/date-time-picker/moment.min.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-time-picker/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-time-picker/datetimepicker.custom.js')}}"></script>
<script>
        // Filter functionality
        const filterDropdown = document.getElementById('filterDropdown');
        const tableRows = document.querySelectorAll('#billingTable tbody tr');

        filterDropdown.addEventListener('change', () => {
            const filterValue = filterDropdown.value.toLowerCase();

            tableRows.forEach(row => {
                const paymentStatus = row.querySelector('.payment-status').textContent.toLowerCase();
                if (filterValue === 'all' || paymentStatus === filterValue) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
<script>
            generateInvoiceButton.addEventListener('click', () => {
                invoiceModal.style.display = 'block';
            });
            closeModalButton.addEventListener('click', () => {
                invoiceModal.style.display = 'none';
            });

            window.addEventListener('click', (e) => {
                if (e.target === invoiceModal) {
                    invoiceModal.style.display = 'none';
                }
            });

            document.getElementById('createInvoiceButton').addEventListener('click', () => {

                const guestName = document.getElementById('guestName').value;
                const invoiceNumber = document.getElementById('invoiceNumber').value;
                const dateIssued = document.getElementById('dateIssued').value;
                const dueDate = document.getElementById('dueDate').value;
                const paymentStatus = document.getElementById('paymentStatus').value;

                if (!guestName || !invoiceNumber || !dateIssued || !dueDate || !paymentStatus) {
                    alert('Please fill out all fields before submitting.');
                    return;
                }

                const tableBody = document.querySelector('#billingTable tbody');
                const newRow = tableBody.insertRow();

                const cell1 = newRow.insertCell(0); // Guest Name
                const cell2 = newRow.insertCell(1); // Invoice Number
                const cell3 = newRow.insertCell(2); // Date Issued
                const cell4 = newRow.insertCell(3); // Due Date
                const cell5 = newRow.insertCell(4); // Payment Status
                const cell6 = newRow.insertCell(5); // Actions

                cell1.textContent = guestName;
                cell2.textContent = invoiceNumber;
                cell3.textContent = dateIssued;
                cell4.textContent = dueDate;
                cell5.textContent = paymentStatus;

                const editButton = document.createElement('button');
                editButton.classList.add('edit-button');
                editButton.textContent = 'Edit';
                cell6.appendChild(editButton);

                invoiceModal.style.display = 'none';

                document.getElementById('invoiceForm').reset();
            });

            document.getElementById('invoiceForm').addEventListener('submit', (e) => {
                e.preventDefault();
            });

    </script>
@endsection