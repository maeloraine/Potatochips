<div class="modal fade" id="customerSignUpModal" tabindex="-1" aria-labelledby="customerSignUpModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="customerSignUpModalLabel">Create Account</h5>
        <!-- X button with data-dismiss attribute -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="theme-form" id="signupForm">
          <p>Enter your personal details to create account</p>
          <div class="form-group">
            <label class="col-form-label pt-0">Your Name</label>
            <div class="row g-2">
              <div class="col-6">
                <input class="form-control" type="text" required="" placeholder="First name" maxlength="50">
              </div>
              <div class="col-6">
                <input class="form-control" type="text" required="" placeholder="Last name" maxlength="25">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-form-label">Birthdate</label>
            <input class="form-control" type="date" name="birthdate" id="birthdate" required="">
          </div>
          <div class="form-group">
            <label class="col-form-label">Email Address</label>
            <input class="form-control" type="email" required="" placeholder="Test@gmail.com">
          </div>
          <div class="form-group">
            <label class="col-form-label">Password</label>
            <input class="form-control" type="password" name="login[password]" required="" placeholder="*********">
          </div>
          <div id="ageError" class="text-danger mb-3" style="display: none;">
            You must be at least 18 years old to create an account.
          </div>
          <div class="form-group mb-0">
            <button class="btn btn-primary btn-block" type="submit">Create Account</button>
          </div>
          <p class="mt-4 mb-0">Already have an account?<a class="ms-2 sign-in-link" href="#">Sign in</a></p>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript for Age Validation and Modal Close -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('signupForm');
    const ageError = document.getElementById('ageError');

    form.addEventListener('submit', function (e) {
      e.preventDefault(); // Prevent form submission

      // Get birthdate value
      const birthdateInput = document.getElementById('birthdate');
      if (!birthdateInput.value) {
        alert('Please enter your birthdate.');
        return;
      }

      const birthdate = new Date(birthdateInput.value); // Convert birthdate value to Date object
      const today = new Date(); // Get current date

      let age = today.getFullYear() - birthdate.getFullYear(); // Compute age
      const monthDifference = today.getMonth() - birthdate.getMonth(); // Check if birthday has passed this year

      // Adjust age if birthday hasn't occurred yet this year
      if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthdate.getDate())) {
        age--;
      }

      // Check if age is less than 18
      if (age < 18) {
        ageError.style.display = 'block'; // Show error message
        return; // Stop form submission
      } else {
        ageError.style.display = 'none'; // Hide error message
      }

      // If age is 18 or older, submit the form
      alert('Account created successfully!');
      // Uncomment the line below to actually submit the form
      // form.submit();
    });

    // Close modal when X button is clicked
    document.querySelector('#customerSignUpModal .close').addEventListener('click', function () {
      $('#customerSignUpModal').modal('hide'); // Use Bootstrap's modal method
    });
  });
</script>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Include Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>