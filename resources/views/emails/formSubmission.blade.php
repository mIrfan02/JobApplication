<!DOCTYPE html>
<html>
<head>
    <title>Form Submission Confirmation</title>
</head>
<body>
    <h1>Form Submission Confirmation</h1>
    <p>Thank you for submitting the form. Here are your login details:</p>
    
    <p>Password: {{ $emailData['password'] }}</p>
    <p>Login Route: <a href="{{ $emailData['loginRoute'] }}">{{ $emailData['loginRoute'] }}</a></p>
    
    <p>Please keep your password secure and click on the login route to access your dashboard.</p>
    
    <p>Regards,</p>
    <p>Your Application Team</p>
</body>
</html>
