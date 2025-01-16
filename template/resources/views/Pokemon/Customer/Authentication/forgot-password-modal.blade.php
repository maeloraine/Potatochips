<div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="forgotPasswordModalLabel">Forgot Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="theme-form">
          <p>Enter your email address to reset your password.</p>
          <div class="form-group">
            <label class="col-form-label">Email Address</label>
            <input class="form-control" type="email" required="" placeholder="Test@gmail.com">
          </div>
          <div class="form-group mb-0">
            <button class="btn btn-primary btn-block" type="submit">Send Verification</button>
          </div>
          <p class="mt-4 mb-0">Remember your password? <a class="ms-2 sign-in-link" href="#">Sign in</a></p>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    // Close modal when X button is clicked
    document.querySelector('#forgotPasswordModal .close').addEventListener('click', function () {
        $('#forgotPasswordModal').modal('hide'); // Use Bootstrap's modal method
    });
</script>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Include Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
