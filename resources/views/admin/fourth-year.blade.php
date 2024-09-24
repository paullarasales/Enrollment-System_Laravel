<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enrolled Students</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f9;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        a {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            margin-bottom: 20px;
            display: inline-block;
        }
        a:hover {
            background-color: #0056b3;
        }
        h2 {
            margin-top: 30px;
            color: #444;
        }
        h3 {
            color: #555;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #e9ecef;
        }
        .section-container {
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
    <h1>Enrolled Students of Bachelor of Science in Information Technology</h1>
    <a href="{{ route('admin.dashboard') }}">Back</a>

    @foreach ($sections as $section)
        <h2>Section {{ $section->section }}</h2>

        @if ($section->students->isEmpty())
            <p>No students enrolled in this section.</p>
        @else
            <h3>Enrolled Students</h3>
            <table border="1">
                <thead>
                    <tr>
                        <th>Student Number</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Middle Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($section->students as $student)
                        <tr>
                            <td>{{ $student->student_number }}</td>
                            <td>{{ $student->first_name }}</td>
                            <td>{{ $student->last_name }}</td>
                            <td>{{ $student->middle_name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @endforeach
</body>
</html>
