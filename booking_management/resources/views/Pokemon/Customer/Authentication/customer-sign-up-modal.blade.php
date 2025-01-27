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
        <form class="theme-form" id="signupForm" method="POST" action="{{route('register')}}"  >
          @csrf
          @method('post')
          <p>Enter your personal details to create account</p>
          <div class="form-group">
            <label class="col-form-label pt-0">Your Name</label>
            <div class="row g-2">
              <div class="col-6">
                <input class="form-control" type="text" name="CU_FName" required="" placeholder="First name" maxlength="50">
              </div>
              <div class="col-6">
                <input class="form-control" type="text" name="CU_LName" required="" placeholder="Last name" maxlength="25">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-form-label">Birthdate</label>
            <input class="form-control" type="date" name="CU_Birthdate" id="birthdate" required>
            <!-- Age error message -->
            <div id="ageError" class="text-danger mb-3" style="display: none;">
              You must be at least 18 years old to create an account.
            </div>
          </div>
          <div class="form-group">
            <label class="col-form-label">Email Address</label>
            <input class="form-control" type="email" name="email" required="" placeholder="Test@gmail.com">
          </div>
          <div class="form-group">
            <label class="col-form-label">Password</label>  
            <input class="form-control" type="password" name="password" required="" placeholder="*********" minlength="8">
              <!-- Password error message -->
              <div id="passwordError" class="text-danger mt-2" style="display: none;">
                The password must be at least 8 characters.
              </div>
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


<script>
  // Function para maclose ang modal
  document.addEventListener('DOMContentLoaded', function () {
      // Close modal when X button is clicked
      document.querySelector('#customerSignUpModal .close').addEventListener('click', function () {
      $('#customerSignUpModal').modal('hide');
    });
  });

  document.getElementById('signupForm').addEventListener('submit', function (event) {
    // Get form inputs
    const birthdateInput = document.getElementById('birthdate');
    const passwordInput = document.getElementById('password');
    const ageError = document.getElementById('ageError');
    const passwordError = document.getElementById('passwordError');

    // Hide previous error messages
    ageError.style.display = 'none';
    passwordError.style.display = 'none';

    let valid = true;

    // Validate age
    const birthdate = new Date(birthdateInput.value);
    const today = new Date();
    const age = today.getFullYear() - birthdate.getFullYear();
    const isBirthdayPassedThisYear = 
      today.getMonth() > birthdate.getMonth() || 
      (today.getMonth() === birthdate.getMonth() && today.getDate() >= birthdate.getDate());

    if (!birthdateInput.value) {
        ageError.style.display = 'none';
        valid = false;
      }

    // Adjust age if the user hasn't had their birthday this year
    const calculatedAge = isBirthdayPassedThisYear ? age : age - 1;

    if (calculatedAge < 18) {
      ageError.style.display = 'block';
      valid = false;
    }

    // Prevent form submission if validation fails
    if (!valid) {
      event.preventDefault();
    }
  });
</script>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Include Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>