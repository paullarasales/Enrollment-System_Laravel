<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f9;
            display: flex;
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            height: 100vh;
            padding: 20px;
        }
        .sidebar h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .sidebar a {
            display: block;
            color: #ccc;
            text-decoration: none;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 10px;
            transition: background-color 0.3s;
        }
        .sidebar a:hover {
            background-color: #495057;
            color: white;
        }
        .main {
            flex: 1;
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 28px;
            color: #333;
        }
        .logout-btn {
            padding: 8px 16px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .logout-btn:hover {
            background-color: #c82333;
        }
        .content {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .content h2 {
            margin-bottom: 20px;
        }
        .card {
            margin: 10px 0;
        }
        .card a {
            display: block;
            padding: 15px;
            text-decoration: none;
            color: #007bff;
            background-color: #f8f9fa;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .card a:hover {
            background-color: #e2e6ea;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="{{ route('admin.manageStudents') }}">Manage Students</a>
        <a href="{{ route('admin.enrolledStudents') }}">Enrolled Students</a>
        <a href="{{ route('admin.manageSubjects') }}">Manage Subjects</a>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    </div>
    <div class="main">
        <div class="header">
            <h1>Welcome Back, Admin</h1>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
        <div class="content">
            <h2>Quick Actions</h2>
            <div class="card">
                <a href="{{ route('admin.manageStudents') }}">Manage Students</a>
            </div>
            <div class="card">
                <a href="{{ route('admin.enrolledStudents') }}">View Enrolled Students</a>
            </div>
            <div class="card">
                <a href="{{ route('admin.manageSubjects') }}">Manage Subjects</a>
            </div>
        </div>
    </div>
</body>
</html>
