<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, {{ auth('students')->user()->first_name }}</h1>
    <form action="{{ route('student.logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
    <p>What would you like to do?</p>
    <button onclick="location.href='{{ route('enrollment.index') }}'">Proceed to Enrollment</button>
    <button onclick="location.href='{{ route('enrollment.currentSubjects') }}'">Check Current Subjects</button>
</body>
</html>
