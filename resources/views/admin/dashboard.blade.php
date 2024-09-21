<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        } 
        body {
            height: 100vh;
            width: 100%;
            font-family: 'Courier New', Courier, monospace;
        }
        .dashboard {
            height: 100%;
            width: 100%;
            display: flex;
            align-items: center;
            flex-direction: column;
        }
        .top {
            height: 13%;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .logout-btn {
            border: 0;
            outline: none;
            background: none;
        }
        .content {
            height: 70%;
            width: 70%;
            display: flex;
            align-items: center;
            justify-content: space-around;
        }
        .manage-students, .enrolled-students, .manage-subjects {
            height: 20%;
            width: 20%;
        }

        .manage-students, .enrolled-students, .manage-subjects a {
            text-decoration: none;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <!--Top -->
        <div class="top">
            <h1>Welcome Back Admin</h1>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>

        <!--Content --> 
        <div class="content">
            <div class="manage-students">
                <a href="{{ route('admin.manageStudents') }}">Manage Students</a>
            </div>
            <div class="enrolled-students">
                <a href="{{ route('admin.enrolledStudents') }}">Enrolled Students</a>
            </div>
            <div class="manage-subjects">
                <a href="{{ route('admin.manageSubjects') }}">Manage Subjects</a>
            </div>
        </div>
    </div>
</body>
</html>