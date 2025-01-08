@extends('layouts.authentication.master')
@section('title', 'Login')

@section('css')
@endsection

@section('style')
<style>
   /* Initially hide the login form */
   #login-form {
      display: none;
      transition: all 0.3s ease-in-out;
   }

   /* Center heading */
   .login-main h4 {
      text-align: center;
   }

    /* Center button */
    .login-main .btn-block {
    display: block;
    margin: 0 auto; /* Center the button horizontally */
  }
</style>
@endsection


@section('content')
<div class="container-fluid p-0">
   <div class="row m-0">
      <div class="col-12 p-0">
         <div class="login-card">
            <div>
               <div>
                  <a class="logo" href="{{ route('index') }}">
                     <img class="img-fluid for-light" src="{{asset('assets/images/logo/login.png')}}" alt="loginpage">
                     <img class="img-fluid for-dark" src="{{asset('assets/images/logo/logo_dark.png')}}" alt="loginpage">
                  </a>
               </div>
               <div class="login-main">
                  <form class="theme-form">
                     <h4>Sign In</h4><br>
                     <!-- Role Selection -->
                     <div class="form-group">
                        <div class="mb-3">
                           <select class="form-select" id="role" required>
                              <option value="" selected disabled>Select your role</option>
                              <option value="receptionist">Receptionist</option>
                              <option value="manager">Manager</option>
                              <option value="admin">Admin</option>
                           </select>
                        </div>                  
                     </div>

                     <!-- Login Form Section -->
                     <div id="login-form">
                        <!-- <p>Enter your email & password to login</p> -->
                        <div class="form-group">
                           <label class="col-form-label">Email Address</label>
                           <input class="form-control" type="email" required placeholder="Test@gmail.com">
                        </div>
                        <div class="form-group">
                           <label class="col-form-label">Password</label>
                           <input class="form-control" type="password" name="login[password]" required placeholder="*********">
                           <div class="show-hide"><span class="show"> </span></div>
                        </div>
                        <div class="form-group mb-0">
                           <div class="checkbox p-0">
                              <input id="checkbox1" type="checkbox">
                              <label class="text-muted" for="checkbox1">Remember password</label>
                           </div>
                           <a class="link" href="{{ route('forgot-password') }}">Forgot password?</a>
                           <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                        </div>
                        <!-- <h6 class="text-muted mt-4 or">Or Sign in with</h6>
                        <div class="social mt-4">
                           <div class="btn-showcase">
                              <a class="btn btn-light" href="https://www.linkedin.com/login" target="_blank">
                                 <i class="txt-linkedin" data-feather="linkedin"></i> LinkedIn 
                              </a>
                              <a class="btn btn-light" href="https://twitter.com/login?lang=en" target="_blank">
                                 <i class="txt-twitter" data-feather="twitter"></i>Twitter
                              </a>
                              <a class="btn btn-light" href="https://www.facebook.com/" target="_blank">
                                 <i class="txt-fb" data-feather="facebook"></i>Facebook
                              </a>
                           </div>
                        </div> -->
                        <!-- <p class="mt-4 mb-0">Don't have account?<a class="ms-2" href="{{ route('sign-up') }}">Create Account</a></p> -->
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('script')
<script>
   document.addEventListener('DOMContentLoaded', function () {
      const roleSelect = document.getElementById('role');
      const loginForm = document.getElementById('login-form');

      roleSelect.addEventListener('change', function () {
         if (this.value) {
            // Show the login form with an animation
            loginForm.style.display = 'block';
         }
      });
   });
</script>
@endsection
