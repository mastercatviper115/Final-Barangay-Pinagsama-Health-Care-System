<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Appointment Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 5px;
        }
        .header {
            text-align: center;
            padding: 10px 0;
        }
        .header h1 {
            margin: 0;
            color: #007bff;
        }
        .content {
            padding: 20px 0;
        }
        .content p {
            margin: 10px 0;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            color: #000;
            background-color: #ccc;
            text-decoration: none;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        .footer {
            text-align: center;
            padding: 10px 0;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Appointment Notification</h1>
        </div>
        <div class="content">
            <p> Dear Approver: {{ $approver_name }},</p>
            <p>{{ $body }}</p>
            <p>Patient Name: {{ $user_name }}</p>
            <p>Patient Email: {{ $user_email }}</p>
            <p><strong>Type:</strong> {{ $type }}</p>
            <p><strong>Date:</strong> {{ $date }}</p>
            <p><a href="{{ $actionurl }}" class="btn">{{ $actiontext }}</a></p>
            <p>If the button above does not work, please copy and paste the following link into your browser:</p>
            <p><a href="{{ $actionurl }}">{{ $actionurl }}</a></p>
        </div>
        <div class="footer">
            <p>Thank you,</p>
            <p>{{ config('app.name') }}</p>
        </div>
    </div>
</body>
</html>
