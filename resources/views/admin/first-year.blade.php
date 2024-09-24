<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enrolled Students</title>
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
