<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e5e8e8;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 10px;
            max-width: 600px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .logo {
            display: block;
            margin: 0 auto;
            padding-bottom: 10px;
        }

        .text {
            color: #333;
            font-size: 16px;
            margin-bottom: 20px;
        }

        .btn-purple {
            background-color: #6f42c1;
            margin-top: 10px;
            color: white;
            border: none;
            padding: 8px 26px;
            font-size: 14px;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }

        .btn-purple:hover {
            background-color: #7c4dff;
        }

        .btn-outline {
            background-color: transparent;
            color: #6f42c1;
            border: none; /* Remove border */
            padding: 10px; /* Remove padding */
            font-size: 14px;
            text-decoration: underline; /* Add underline */
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .btn-outline:hover {
            color: #7c4dff; /* Change color on hover */
        }

        .button-container {
            display: flex;
            align-items: center;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div style="margin-top: 150px;">
        <img src="{{ asset('assets/images/logo/JensonLogo.png') }}" class="logo">
        
    </div>
    
    <div class="container">
        <div class="text">
            Thanks for signing up! Before getting started, please verify your email address by clicking on the link we just sent you. If you didn't receive the email, we can send you another one.
        </div>

        @if (session('status') == 'verification-link-sent')
            <div style="font-size: 12px; color:#28a745;">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <!-- Button Container -->
        <div class="button-container">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn-purple">
                    Resend Verification Email
                </button>
            </form>

            <!-- Add margin-left: auto to push the Log Out button to the right -->
            <form method="POST" action="{{ route('logout') }}" style="margin-left: auto;">
                @csrf
                <button type="submit" class="btn-outline">
                    Log Out
                </button>
            </form>
        </div>
    </div>

    <script>
        function showStatusMessage() {
            document.getElementById('status-message').style.display = 'block';
        }
    </script>
</body>
</html>