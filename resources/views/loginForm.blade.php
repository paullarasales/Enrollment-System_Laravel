<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .login-container h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333333;
        }
        .login-container label {
            display: block;
            margin-bottom: 8px;
            color: #333333;
        }
        .login-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .login-container button:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Student Login</h1>
        <form action="{{ route('student.login')}}" method="POST">
            @csrf
            <label for="student_number">School ID</label>
            <input type="text" name="student_number" id="student_number" required placeholder="Enter your school ID">

            <label for="password">Password</label>
            <input type="password" name="password" id="password" required placeholder="Enter your password">

            <button type="submit">Login</button>
        </form>

        @if (session('error'))
            <p class="error-message">{{ session('error') }}</p>
        @endif
    </div>
</body>
</html>
