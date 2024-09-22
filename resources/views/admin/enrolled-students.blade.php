<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enrolled Students</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f9;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 30px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between; /* Align items to the sides */
            align-items: center; /* Center items vertically */
            margin-bottom: 20px;
        }
        .back-btn {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .year-select {
            margin: 0;
        }
        .year-select select {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Enrolled Students</h1>
        <div class="header">
            <a href="{{ route('admin.dashboard') }}" class="back-btn">Back to Dashboard</a>
            <div class="year-select">
                <form action="{{ route('admin.enrolledStudents') }}" method="GET">
                    <select name="year_level" onchange="this.form.submit()">
                        <option value="1" {{ $yearLevel == 1 ? 'selected' : '' }}>First Year</option>
                        <option value="2" {{ $yearLevel == 2 ? 'selected' : '' }}>Second Year</option>
                        <option value="3" {{ $yearLevel == 3 ? 'selected' : '' }}>Third Year</option>
                        <option value="4" {{ $yearLevel == 4 ? 'selected' : '' }}>Fourth Year</option>
                    </select>
                </form>
            </div>
        </div>

        @foreach($sections as $section)
            <h2>Section {{ $section->section }}</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Student Number</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                    </tr>
                </thead>
                <tbody>
                    @if($section->students->isEmpty())
                        <tr>
                            <td colspan="5" style="text-align: center;">No students enrolled in this section.</td>
                        </tr>
                    @else
                        @foreach($section->students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->student_number }}</td>
                                <td>{{ $student->first_name }}</td>
                                <td>{{ $student->middle_name }}</td>
                                <td>{{ $student->last_name }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        @endforeach
    </div>

</body>
</html>
