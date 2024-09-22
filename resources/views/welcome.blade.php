<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
        }
        .dashboard-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333333;
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            text-align: center;
            margin-bottom: 20px;
            color: #666666;
            font-size: 18px;
        }
        .buttons {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }
        button {
            flex: 1;
            padding: 10px 20px;
            font-size: 16px;
            color: #ffffff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .logout-btn {
            background-color: #dc3545;
            margin-top: 20px;
        }
        .logout-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1>Welcome, {{ auth('students')->user()->first_name }}</h1>
        <p>What would you like to do?</p>

        <div class="buttons">
            <button onclick="location.href='{{ route('enrollment.index') }}'">Proceed to Enrollment</button>
            <button onclick="location.href='{{ route('enrollment.currentSubjects') }}'">Check Enrolled Subjects</button>
        </div>

        <form action="{{ route('student.logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</body>
</html>
