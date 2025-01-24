<!DOCTYPE html>
<html>
<head>
    <title>Email Verification</title>
</head>
<body>
    <h1>Welcome, {{ $user->CU_FName }}!</h1>
    <p>Thank you for registering. Please click the link below to verify your email address:</p>
    <a href="{{ $url }}">Verify Email</a>
</body>
</html>
