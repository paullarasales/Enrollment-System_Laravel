<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enrolled Subjects</title>
</head>
<body>
    <h1>Currently Enrolled Subjects</h1>

    @if($enrolledSubjects->isEmpty())
        <p>You are not enrolled in any subjects.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($enrolledSubjects as $enrollment)
                    <tr>
                        <td>{{ $enrollment->subject ? $enrollment->subject->subject_code : 'N/A' }}</td>
                        <td>{{ $enrollment->subject ? $enrollment->subject->subject_name : 'N/A' }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    @endif

    <button onclick="location.href='{{ route('enrollment.dashboard') }}'">Back to Dashboard</button>
</body>
</html>
