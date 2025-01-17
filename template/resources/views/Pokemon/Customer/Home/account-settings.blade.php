@extends('layouts.simple.cust-master')

@section('breadcrumb-items')
    <li class="breadcrumb-item">Account Settings</li>
@endsection

@section('style')

@endsection

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h3>Account</h3>
        </div>
        <div class="card-body">
          <form id="accountForm">
            <!-- Login Email Section -->
            <div class="form-group mb-4">
              <h5>Account Settings</h5>
              <div class="d-flex align-items-center">
                <div class="flex-grow-1">
                  <label for="loginEmail">Login Email</label>
                  <input type="email" class="form-control" id="loginEmail" value="nari**akl@gmail.com" readonly>
                </div>
                <button type="button" class="btn btn-link ml-3 align-self-center" data-toggle="modal" data-target="#changeLoginEmailModal">Change Login Email</button>
              </div>
            </div>

            <!-- Password Section -->
            <div class="form-group mb-4">
              <div class="d-flex align-items-center">
                <div class="flex-grow-1">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" value="*****" readonly>
                </div>
                <button type="button" class="btn btn-link ml-3 align-self-center" data-toggle="modal" data-target="#custChangePasswordModal">Change Password</button>
              </div>
            </div>
            <hr>

            <!-- Basic Info Section -->
            <div class="form-group mb-4">
              <div class="d-flex justify-content-between align-items-center">
                <h5>Basic Info</h5>
                <button type="button" id="editBasicInfoBtn" class="btn btn-primary">Edit</button>
              </div>
              <div class="row mt-3">
                <div class="col-md-6">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Full name" value="M** L*** D*** Torre" readonly>
                </div>
                <div class="col-md-6">
                  <label for="mobileNo">Mobile Number</label>
                  <input type="text" class="form-control" id="mobileNo" placeholder="Add mobile number" readonly>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-6">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" placeholder="Email address" value="nari**akl@gmail.com" readonly>
                </div>
                <div class="col-md-6">
                  <label for="birthdate">Date of Birth</label>
                  <input type="date" class="form-control" id="birthdate" readonly>
                </div>
              </div>
            </div>

            <!-- Save Changes and Cancel Buttons (Initially Hidden) -->
            <div class="form-group mb-0 d-flex justify-content-end" id="actionButtons">
            <button type="button" id="cancelEditBtn" class="btn btn-secondary" style="display: none; margin-right: 10px;">Cancel</button>
              <button type="submit" id="saveChangesBtn" class="btn btn-success" style="display: none;">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Include the modal -->
@include('Pokemon.Customer.Home.change-login-email')
@include('Pokemon.Customer.Home.customer-change-password')

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Include Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  $(document).ready(function () {
    // Show Save Changes and Cancel buttons, make fields editable
    $('#editBasicInfoBtn').click(function () {
      // Make fields editable
      $('#name, #mobileNo, #birthdate').removeAttr('readonly');

      // Hide Edit button
      $('#editBasicInfoBtn').hide();

      // Show Save Changes and Cancel buttons
      $('#cancelEditBtn').show();
      $('#saveChangesBtn').show();
    });

    // Cancel Edit: Revert changes and hide Save Changes and Cancel buttons
    $('#cancelEditBtn').click(function () {
      // Make fields readonly again
      $('#name, #mobileNo, #birthdate').attr('readonly', true);

      // Show Edit button
      $('#editBasicInfoBtn').show();

      // Hide Save Changes and Cancel buttons
      $('#cancelEditBtn').hide();
      $('#saveChangesBtn').hide();
    });

    // Save Changes: Update and hide Save Changes and Cancel buttons
    $('#saveChangesBtn').click(function () {
      // UPDATE DB
      //==============SAMPLE CODE=============//

      // Make fields readonly again
      $('#name, #mobileNo, #birthdate').attr('readonly', true);

      // Show Edit button
      $('#editBasicInfoBtn').show();

      // Hide Save Changes and Cancel buttons
      $('#cancelEditBtn').hide();
      $('#saveChangesBtn').hide();
    });

    // Close modal when X button is clicked
    $('#changeLoginEmailModal .close').click(function () {
      $('#changeLoginEmailModal').modal('hide');
    });
  });
</script>
@endsection