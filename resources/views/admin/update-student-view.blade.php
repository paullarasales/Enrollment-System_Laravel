<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Student</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 24px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="password"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="number"]:focus,
        select:focus {
            outline: none;
            border-color: #007bff;
            background-color: #fff;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error-list {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 15px;
        }

        .error-list ul {
            list-style: none;
            padding-left: 0;
        }

        a {
            text-decoration: none;
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Update Student Information</h1>

        @if ($errors->any())
        <div class="error-list">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('student.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="student_number">Student Number:</label>
                <input type="text" name="student_number" id="student_number" value="{{ $student->student_number }}" required>
            </div>

            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" id="first_name" value="{{ $student->first_name }}" required>
            </div>

            <div class="form-group">
                <label for="middle_name">Middle Name:</label>
                <input type="text" name="middle_name" id="middle_name" value="{{ $student->middle_name }}" required>
            </div>

            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" id="last_name" value="{{ $student->last_name }}" required>
            </div>

            <div class="form-group">
                <label for="password">Password (leave blank to keep current password):</label>
                <input type="password" name="password" id="password">
            </div>

            <div class="form-group">
                <label for="section">Section:</label>
                <select name="section_id" id="section_id" required>
                    @foreach ($section as $sec)
                    <option value="{{ $sec->id }}" {{ $student->section_id == $sec->id ? 'selected' : '' }}>{{ $sec->section }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="year_level">Year Level:</label>
                <input type="number" name="year_level" id="year_level" value="{{ $student->year_level }}">
            </div>

            <button type="submit">Update Student</button>
        </form>

        <a href="{{ route('admin.manageStudents') }}">Go back</a>
    </div>
</body>

</html>
