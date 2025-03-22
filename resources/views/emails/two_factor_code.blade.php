<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Two-Factor Authentication Code</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .email-header h1 {
            color: #333333;
        }
        .email-body {
            font-size: 16px;
            color: #555555;
            line-height: 1.6;
        }
        .email-code {
            display: block;
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
            text-align: center;
            margin: 20px 0;
        }
        .email-footer {
            text-align: center;
            font-size: 14px;
            color: #999999;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Sakila Movies</h1>
        </div>
        <div class="email-body">
            <p>Hello,</p>
            <p>You are receiving this email because you requested to log in to your account with two-factor authentication enabled. Use the code below to complete your login:</p>
            <span class="email-code">{{ $code }}</span>
            <p>If you did not request this, please ignore this email or contact support if you have concerns.</p>
            <p>Thank you,<br>The Sakila Movies Team</p>
        </div>
        <div class="email-footer">
            <p>&copy; {{ date('Y') }} Sakila Movies. All rights reserved.</p>
        </div>
    </div>
</body>
</html>