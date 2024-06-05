<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password Code</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
        }
        .header img {
            max-width: 150px;
        }
        .content {
            padding: 20px;
            text-align: center;
        }
        .content h1 {
            color: #333;
        }
        .content p {
            font-size: 16px;
            line-height: 1.5;
            color: #555;
        }
        .content .code {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #f1f1f1;
            border-radius: 4px;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #aaa;
        }
        .footer a {
            color: #333;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <img src="https://avatars.githubusercontent.com/u/169900096?s=400&u=5c0728545c82a0b9342c04e52730dccb6cc4c6b0&v=4" style="width: 100px;" alt="Company Logo">
        </div>
        <div class="content">
            <h1>Reset Your Password</h1>
            <p>We received a request to reset your password. Use the code below to reset it. This code is valid for 2 minutes.</p>
            <div class="code">{{ $token }}</div>
            <p>If you did not request a password reset, please ignore this email or contact support if you have questions.</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
            <p>Yên Nghĩa, Hà Đông, Hà Nội, Việt Nam.</p>
            <p><a href="https://yourcompany.com">Visit our website</a></p>
        </div>
    </div>
</body>
</html>
