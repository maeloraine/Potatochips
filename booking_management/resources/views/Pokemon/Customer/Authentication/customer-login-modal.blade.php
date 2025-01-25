<style>
    #customerLoginModal .modal-content {
        border-radius: 15px;
    }

    #customerLoginModal .modal-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
    }

    #customerLoginModal .modal-title {
        color: #333;
        text-align: center;
    }

    #customerLoginModal .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    #customerLoginModal .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    /* Add this CSS to align "Remember password" and "Forgot password?" */
    .form-group.mb-0 .checkbox {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .form-group.mb-0 .checkbox label {
        margin-bottom: 0; /* Remove default margin */
    }

    .form-group.mb-0 .link {
        margin-left: auto; /* Push "Forgot password?" to the right */
    }
       /* Error message styling */
       .text-danger {
        color: red;
        font-size: 0.875em;
    }
</style>

<div class="modal fade" id="customerLoginModal" tabindex="-1" aria-labelledby="customerLoginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="customerLoginModalLabel">Log In</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="theme-form" id="loginForm" action="{{ route('customer.login') }}" method="POST"  >
            
            <p>Enter your email & password to login</p>
            @csrf
            <div class="form-group">
                <label class="col-form-label">Email Address</label>
                <input class="form-control" type="email" name="email"  placeholder="xxx@gmail.com" id="email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label class="col-form-label">Password</label>
                <input class="form-control" type="password" name="password" id="password"placeholder="*********">
                @error('CU_Password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-0">
                <div class="checkbox p-0">
                    <input id="checkbox1" type="checkbox" name="remember">
                    <label class="text-muted" for="checkbox1">Remember password</label>
                    <a class="link forgot-password-trigger" href="#">Forgot password?</a>
                </div>
                <p></p>
                <button class="btn btn-primary btn-block" type="submit">Sign in</button>
            </div>
            <p class="mt-4 mb-0">Don't have account? <a class="ms-2" href="{{ route('customer-sign-up') }}">Create Account</a></p>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Close modal when X button is clicked
        document.querySelector('#customerLoginModal .close').addEventListener('click', function () {
            $('#customerLoginModal').modal('hide'); // Use Bootstrap's modal method
        });
    });
</script>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Include Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>