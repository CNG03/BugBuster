<!-- resources/views/emails/verify-email.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Email Verification - Bug Buster</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: #ffffff;
            margin: 50px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #eeeeee;
        }
        .header img {
            width: 100px;
            margin-bottom: 10px;
        }
        .header h1 {
            font-size: 24px;
            color: #333333;
            margin: 0;
        }
        .content {
            padding: 20px;
        }
        .content p {
            font-size: 16px;
            color: #666666;
            line-height: 1.5;
        }
        .content a {
            display: inline-block;
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 14px;
            color: #aaaaaa;
            border-top: 1px solid #eeeeee;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img style="width: 100px;" src="https://avatars.githubusercontent.com/u/169900096?s=400&u=5c0728545c82a0b9342c04e52730dccb6cc4c6b0&v=4" alt="Bug Buster Logo">
            <h1>Verify Your Email</h1>
        </div>
        <div class="content">
            <p>Dear User,</p>
            <p>Thank you for registering with Bug Buster. To complete your registration, please verify your email address by clicking the link below:</p>
            <a href="{{ route('verify.email', ['token' => $token]) }}">Verify Email</a>
            <p>If you did not create an account, please disregard this email.</p>
            <p>Best regards,</p>
            <p>The Bug Buster Team</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 Bug Buster. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
