@extends('layouts.authentication.master')
@section('title', 'Login')

@section('css')
@endsection

@section('style')
<style>
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
               <div class="login-main">
                  <form class="theme-form">
                     <h4>Sign In</h4>
                     <p style="text-align: center;">Enter your email & password to login</p>
                     <div class="form-group">
                        <label class="col-form-label">Email Address</label>
                        <input class="form-control" type="email" required="" placeholder="Test@gmail.com">
                     </div>
                     <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input class="form-control" type="password" name="login[password]" required="" placeholder="*********">
                        <!-- <div class="show-hide"><span class="show">                         </span></div> -->
                     </div>
                     <div class="form-group mb-0">
                        <div class="checkbox p-0">
                           <input id="checkbox1" type="checkbox">
                           <label class="text-muted" for="checkbox1">Remember password</label>
                        </div>
                        <a class="link" href="{{ route('customer-forgot-password') }}">Forgot password?</a>
                        <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                     </div>
                     <h6 class="text-muted mt-4 or">Or Sign in with</h6>
                     <div class="social mt-4">
                        <div class="btn-showcase"><a class="btn btn-light" href="https://www.linkedin.com/login" target="_blank"><i class="txt-linkedin" data-feather="linkedin"></i> LinkedIn </a><a class="btn btn-light" href="https://twitter.com/login?lang=en" target="_blank"><i class="txt-twitter" data-feather="twitter"></i>twitter</a><a class="btn btn-light" href="https://www.facebook.com/" target="_blank"><i class="txt-fb" data-feather="facebook"></i>facebook</a></div>
                     </div>
                     <p class="mt-4 mb-0">Don't have account?<a class="ms-2" href="{{  route('customer-sign-up') }}">Create Account</a></p>
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
      const form = document.querySelector('.theme-form');
      
      form.addEventListener('submit', function (event) {
         event.preventDefault(); // Prevent default form submission behavior

         // Retrieve form input values
         const email = form.querySelector('input[type="email"]').value.trim();
         const password = form.querySelector('input[type="password"]').value.trim();

         // Validate email and password
         if (email === 'guest@gmail.com' && password === 'guest') {
            // Redirect to customer-booking route
            window.location.href = "{{ route('customer-booking' , ['role' => 'customer']) }}";
         } else {
            // Show an error message
            alert('Invalid email or password. Please try again.');
         }
      });
   });
</script>
@endsection