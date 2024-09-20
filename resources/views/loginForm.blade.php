<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <form action="{{ route('student.login')}}" method="POST">
        @csrf
        <label for="student_number">School ID:</label>
        <input type="text" name="student_number" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>

    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif
</body>
</html>
