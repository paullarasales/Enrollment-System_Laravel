<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Students</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
        }
        h1, h2 {
            color: #333;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .back-btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
        }
        .back-btn:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        td {
            background-color: #f9f9f9;
        }
        .actions a, .actions button {
            padding: 5px 10px;
            margin-right: 5px;
            border-radius: 4px;
            text-decoration: none;
        }
        .edit-btn {
            background-color: #28a745;
            color: #fff;
        }
        .delete-btn {
            background-color: #dc3545;
            color: #fff;
        }
        .edit-btn:hover {
            background-color: #218838;
        }
        .delete-btn:hover {
            background-color: #c82333;
        }
        form {
            margin-top: 20px;
        }
        form label {
            display: block;
            margin-bottom: 5px;
        }
        form input, form select {
            padding: 10px;
            width: 100%;
            margin-bottom: 20px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }
        form button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Manage Students</h1>
        <a href="{{ route('admin.dashboard') }}" class="back-btn">Back to Dashboard</a>
    </div>

    <h2>List of Students</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Student Number</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Status</th>
                <th>Year Level</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->student_number }}</td>
                    <td>{{ $student->first_name }}</td>
                    <td>{{ $student->middle_name}}</td>
                    <td>{{ $student->last_name}}</td>
                    <td>{{ $student->status}}</td>
                    <td>Grade {{ $student->year_level}}</td>
                    <td class="actions">
                        <a href="{{ route('student.edit', $student->id) }}" class="edit-btn">Edit</a>
                        <form action="{{ route('student.delete', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Add a New Student</h2>
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <label for="student_number">Student Number:</label>
        <input type="text" name="student_number" id="student_number" required>

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name" required>

        <label for="middle_name">Middle Name:</label>
        <input type="text" name="middle_name" id="middle_name" required>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>

        <label for="section_id">Section:</label>
        <select name="section_id" id="section_id" required>
            @foreach($sections as $section)
                <option value="{{ $section->id }}">{{ $section->section }}</option>
            @endforeach
        </select>

        <button type="submit">Add Student</button>
    </form>

</body>
</html>
