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
            background-color: #edede9;
            border-color: #3d5a80;
            color: black;
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

        <button class="generate-invoice-button" id="generateInvoiceButton">Add Billing</button>
    </div>

    <!-- edit Billing  modal  -->
<div class="overlay" id="editBillingOverlay">
    <div class="modal" id="editBillingModal">
        <div class="modal-content">
            <button class="close-button" id="closeEditBillingModal">&times;</button>
            <h2>Edit Billing</h2>
            <form id="editBillingForm">
                <div class="row">
                <label>Guest Name <input type="text" id="editGuestName" placeholder="Guest Name" required></label>
                <label>Invoice Number <input type="text" id="editInvoiceNumber" placeholder="Invoice Number" required></label>
                <label>Date Issued <input type="date" id="editDateIssued" required></label>
                <label>Due Date <input type="date" id="editDueDate" required></label>
                <label>Payment Status
                    <select id="editPaymentStatus" required>
                        <option value="Paid">Paid</option>
                        <option value="Pending">Pending</option>
                    </select>
                </label>
            </form>
            <button type="submit" id="saveChangesButton">Save Changes</button>
        </div>
        </div>
    </div>
</div>

    <!-- Modal for Generating Invoice -->
    <div class="modal" id="invoiceModal">
        <div class="modal-content">
            <button class="close-button" id="closeModalButton">&times;</button>
            <h2>Add Billing</h2>
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
            <button type="submit" id="createInvoiceButton">Add Billing</button>
        </div>
    </div>
@endsection

@section('script')
<script src="{{asset('assets/js/datepicker/date-time-picker/moment.min.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-time-picker/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-time-picker/datetimepicker.custom.js')}}"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const generateInvoiceButton = document.getElementById('generateInvoiceButton');
    const invoiceModal = document.getElementById('invoiceModal');
    const closeModalButton = document.getElementById('closeModalButton');
    const createInvoiceButton = document.getElementById('createInvoiceButton');
    const editBillingOverlay = document.getElementById('editBillingOverlay');
    const editBillingModal = document.getElementById('editBillingModal');
    const closeEditBillingModal = document.getElementById('closeEditBillingModal');
    const saveChangesButton = document.getElementById('saveChangesButton');
    const filterDropdown = document.getElementById('filterDropdown');
    const billingTableBody = document.querySelector("#billingTable tbody");
    let selectedRow = null;

    // **Validation Function**
    function validateBillingForm(form) {
        let errors = [];

        const guestName = form.querySelector("#guestName, #editGuestName").value.trim();
        const invoiceNumber = form.querySelector("#invoiceNumber, #editInvoiceNumber").value.trim();
        const dateIssued = form.querySelector("#dateIssued, #editDateIssued").value;
        const dueDate = form.querySelector("#dueDate, #editDueDate").value;
        const paymentStatus = form.querySelector("#paymentStatus, #editPaymentStatus").value;

        // Guest Name validation
        if (!guestName || guestName.length < 3) {
            errors.push("Guest Name must be at least 3 characters long.");
        }

        // Invoice Number validation
        if (!invoiceNumber || invoiceNumber.length < 3) {
            errors.push("Invoice Number must be at least 3 characters long.");
        }

        // Date validations
        if (!dateIssued || !dueDate) {
            errors.push("Issued Date and Due Date are required.");
        } else {
            const issuedDateObj = new Date(dateIssued);
            const dueDateObj = new Date(dueDate);
            if (dueDateObj <= issuedDateObj) {
                errors.push("Due Date must be later than Issued Date.");
            }
        }

        // Payment Status validation
        if (!paymentStatus) {
            errors.push("Payment Status is required.");
        }

        return errors;
    }

    // **Show Validation Errors**
    function showErrors(errors) {
        if (errors.length > 0) {
            alert(errors.join("\n"));
            return false;
        }
        return true;
    }

    // **Open Edit Billing Modal**
    function openEditBillingModal(row) {
        selectedRow = row;
        const cells = selectedRow.getElementsByTagName('td');

        document.getElementById('editGuestName').value = cells[0].textContent;
        document.getElementById('editInvoiceNumber').value = cells[1].textContent;
        document.getElementById('editDateIssued').value = cells[2].textContent;
        document.getElementById('editDueDate').value = cells[3].textContent;
        document.getElementById('editPaymentStatus').value = cells[4].textContent;

        editBillingModal.style.display = 'block';
        editBillingOverlay.style.display = 'block';
    }

    // **Attach Edit Button Listeners**
    function attachEditButtonListeners() {
        document.querySelectorAll('.edit-button').forEach((button) => {
            button.removeEventListener('click', editButtonHandler);
            button.addEventListener('click', editButtonHandler);
        });
    }

    // **Edit Button Handler**
    function editButtonHandler(event) {
        const row = event.target.closest('tr');
        openEditBillingModal(row);
    }

    // **Open Add Billing Modal**
    generateInvoiceButton.addEventListener('click', () => {
        invoiceModal.style.display = 'block';
    });

    // **Close Add Billing Modal**
    closeModalButton.addEventListener('click', () => {
        invoiceModal.style.display = 'none';
    });

    // **Close Edit Billing Modal**
    closeEditBillingModal.addEventListener('click', () => {
        editBillingModal.style.display = 'none';
        editBillingOverlay.style.display = 'none';
    });

    // **Add Billing Submission**
    createInvoiceButton.addEventListener('click', (e) => {
        e.preventDefault();
        const errors = validateBillingForm(invoiceModal);
        if (!showErrors(errors)) return;

        const guestName = document.getElementById('guestName').value.trim();
        const invoiceNumber = document.getElementById('invoiceNumber').value.trim();
        const dateIssued = document.getElementById('dateIssued').value;
        const dueDate = document.getElementById('dueDate').value;
        const paymentStatus = document.getElementById('paymentStatus').value;

        const newRow = billingTableBody.insertRow();
        newRow.innerHTML = `
            <td>${guestName}</td>
            <td>${invoiceNumber}</td>
            <td>${dateIssued}</td>
            <td>${dueDate}</td>
            <td class="payment-status">${paymentStatus}</td>
            <td><button class="edit-button">Edit</button></td>
        `;

        newRow.querySelector(".edit-button").addEventListener("click", function () {
            openEditBillingModal(newRow);
        });

        invoiceModal.style.display = 'none';
        document.getElementById('invoiceForm').reset();
        alert('Billing Added Successfully!');
    });

    // **Save Edited Billing**
    saveChangesButton.addEventListener('click', (e) => {
        e.preventDefault();
        const errors = validateBillingForm(editBillingModal);
        if (!showErrors(errors)) return;

        if (selectedRow) {
            selectedRow.cells[0].textContent = document.getElementById('editGuestName').value.trim();
            selectedRow.cells[1].textContent = document.getElementById('editInvoiceNumber').value.trim();
            selectedRow.cells[2].textContent = document.getElementById('editDateIssued').value;
            selectedRow.cells[3].textContent = document.getElementById('editDueDate').value;
            selectedRow.cells[4].textContent = document.getElementById('editPaymentStatus').value;

            editBillingModal.style.display = 'none';
            editBillingOverlay.style.display = 'none';
            alert('Billing Updated Successfully!');
        }
    });

    // **Filter Functionality**
    filterDropdown.addEventListener('change', () => {
        const filterValue = filterDropdown.value.toLowerCase();
        document.querySelectorAll('#billingTable tbody tr').forEach(row => {
            const paymentStatus = row.querySelector('.payment-status').textContent.toLowerCase();
            row.style.display = (filterValue === 'all' || paymentStatus === filterValue) ? '' : 'none';
        });
    });

    // **Attach event listeners to edit buttons**
    attachEditButtonListeners();
});

    </script>
@endsection