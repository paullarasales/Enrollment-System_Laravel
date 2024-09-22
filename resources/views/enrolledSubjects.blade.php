<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enrolled Subjects</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333333;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #dddddd;
        }
        th {
            background-color: #007bff;
            color: #ffffff;
        }
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        button {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 30px;
            text-align: center;
        }
        button:hover {
            background-color: #0056b3;
        }
        p {
            text-align: center;
            margin-top: 20px;
            color: #555555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Enrolled Subjects</h1>

        @if($enrolledSubjects->isEmpty())
            <p>You are not enrolled in any subjects.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Year Level</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($enrolledSubjects as $enrollment)
                        <tr>
                            <td>{{ $enrollment->subject ? $enrollment->subject->code : 'N/A' }}</td>
                            <td>{{ $enrollment->subject ? $enrollment->subject->subject_name : 'N/A' }}</td>
                            <td>{{ $enrollment->subject ? $enrollment->subject->year_level : 'N/A'}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <button onclick="location.href='{{ route('enrollment.dashboard') }}'">Back to Dashboard</button>
    </div>
</body>
</html>
