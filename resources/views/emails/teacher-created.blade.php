<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account - Login Credentials</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f4f5;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #3b82f6;
            padding: 15px;
            border-radius: 8px 8px 0 0;
            text-align: center;
            color: #ffffff;
            font-weight: bold;
        }

        .content {
            padding: 20px;
            text-align: left;
        }

        .button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #3b82f6;
            color: #ffffff;
            border-radius: 6px;
            text-align: center;
            text-decoration: none;
            font-weight: 600;
        }

        .footer {
            text-align: center;
            color: #a1a1aa;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            {{ config('app.name') }}
        </div>

        <!-- Content -->
        <div class="content">
            <h2 class="text-2xl font-semibold text-gray-800">Welcome, {{ $teacher->name }}!</h2>
            <p class="text-gray-600 mt-4">You have been added as a teacher at {{ config('app.name') }}.</p>

            <p class="text-gray-600 mt-4">Here are your login credentials:</p>
            <ul class="list-disc pl-6 text-gray-600">
                <li><strong>Email:</strong> {{ $teacher->email }}</li>
                <li><strong>Password:</strong> {{ $password }}</li>
            </ul>

            <p class="text-gray-600 mt-4">You can log in using the button below:</p>
            <a href="{{ config('app.url') }}" class="button">Login</a>

            <p class="text-gray-600 mt-4">If you have any questions, feel free to contact us.</p>

            <p class="text-gray-600 mt-4">Best regards,<br>{{ config('app.name') }} Team</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </div>
</body>

</html>
