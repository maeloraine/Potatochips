<div class="modal fade" id="custChangePasswordModal" tabindex="-1" aria-labelledby="changeLoginEmailModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="custChangePasswordModalLabel">Change Password</h5>
        <!-- X button with data-dismiss attribute -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="theme-form">
          <!-- Old Password -->
          <div class="form-group">
            <label class="col-form-label">Old Password</label>
            <input class="form-control" type="oldCustomerPass" required="" placeholder="Enter your old password">
          </div>
          <!-- New Password -->
          <div class="form-group">
            <label class="col-form-label">New Password</label>
            <input class="form-control" type="newCustomerPass" required="" placeholder="Enter new password">
          </div>
          <!-- Confirm New Password -->
          <div class="form-group">
            <label class="col-form-label">Email Address</label>
            <input class="form-control" type="confirmCustomerPass" required="" placeholder="Re-type new password">
          </div>
          <p></p>
          <div class="form-group mb-0 d-flex justify-content-end">
            <button class="btn btn-success btn-block" type="submit">Confirm</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>