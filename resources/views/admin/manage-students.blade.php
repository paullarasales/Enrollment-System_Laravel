<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Students</title>
</head>
<body>
    <h1>Manage Students</h1>

    <a href="{{ route('admin.dashboard') }}">Back</a>


    <h2>List of Students</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student Number</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
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
                    <td>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h2>Add a New Student</h2>
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <label for="student_number">Student Number:</label>
        <input type="text" name="student_number" id="student_number" required><br>
    
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name" required><br>
    
        <label for="middle_name">Middle Name:</label>
        <input type="text" name="middle_name" id="middle_name" required><br>
    
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name" required><br>
    
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>
    
        <!-- Dropdown for selecting the section -->
        <label for="section_id">Section:</label>
        <select name="section_id" id="section_id" required>
            @foreach($sections as $section)
                <option value="{{ $section->id }}">{{ $section->section }}</option>
            @endforeach
        </select><br>
    
        <button type="submit">Add Student</button>
    </form>
    
</body>
</html>
