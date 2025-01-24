<div class="modal fade" id="customerSignUpModal" tabindex="-1" aria-labelledby="customerSignUpModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="customerSignUpModalLabel">Create Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="theme-form" id="signupForm" method="POST" action="{{ route('register') }}">
          <p>Enter your personal details to create account</p>
          @csrf
          <div class="form-group">
            <label class="col-form-label pt-0">Full Name</label>
            <input class="form-control" type="text" name="name" required="" placeholder="First name" maxlength="50">
          </div>

          <div class="form-group">
            <label class="col-form-label">Email Address</label>
            <input class="form-control" type="email" name="email" required="" placeholder="Test@gmail.com">
          </div>
          <div class="form-group">
            <label class="col-form-label">Password</label>
            <input class="form-control" type="password" id="password" name="password" required="" placeholder="*********">
          </div>
          <div class="form-group">
            <label class="col-form-label">Confirm Password</label>
            <input class="form-control" type="password" id="confirmPassword" name="password_confirmation" required="" placeholder="*********">
          </div>
          <div id="passwordError" class="text-danger" style="display: none;">Passwords do not match!</div>
          <div class="form-group mb-0">
            <button class="btn btn-primary btn-block" type="submit">Create Account</button>
          </div>
          <p class="mt-4 mb-0">Already have an account?<a class="ms-2 sign-in-link" href="#">Sign in</a></p>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript for Password Confirmation -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('signupForm');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirmPassword');
    const passwordError = document.getElementById('passwordError');

    form.addEventListener('submit', function (e) {
      // e.preventDefault(); // Prevent form submission

      // Validate password match
      if (passwordInput.value !== confirmPasswordInput.value) {
        passwordError.style.display = 'block'; // Show error message
        return; // Stop form submission
      } else {
        passwordError.style.display = 'none'; // Hide error message
      }

      alert('Account created successfully!');
      // Uncomment the line below to actually submit the form
      form.submit();
    });
  });
</script>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Include Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>