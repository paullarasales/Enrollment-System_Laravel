<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enrollment</title>
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
            color: #333333;
            margin-bottom: 20px;
        }

        h2 {
            margin-top: 30px;
            color: #555555;
        }

        label {
            font-size: 16px;
            color: #333333;
            margin-bottom: 10px;
            display: block;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            font-size: 16px;
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

        input[type="checkbox"] {
            width: 20px;
            height: 20px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #28a745;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        }

        button:hover {
            background-color: #218838;
        }

        a {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .disabled-btn {
            background-color: #6c757d;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Year Level: {{ auth('students')->user()->year_level }}</h1>

        <form id="enrollment-form" action="{{ route('enrollment.save') }}" method="POST">
            @csrf 
            <div>
                <label for="section">Select Section:</label>
                <select id="section" name="section_id">
                    @foreach ($sections as $section)
                        <option value="{{ $section->id }}">{{ $section->section }}</option>
                    @endforeach
                </select>
            </div>

            <h2>Subjects for Year {{ auth('students')->user()->year_level }}</h2>

            <table id="subjectsTable">
                <thead>
                    <tr>
                        <th>Select</th>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subjects as $subject)
                        <tr>
                            <td>
                                <input type="checkbox" name="subject_ids[]" value="{{ $subject->id }}"
                                @if(in_array($subject->id, $enrolledSubjects)) checked @endif>
                            </td>
                            <td>{{ $subject->code }}</td>
                            <td>{{ $subject->subject_name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <button type="submit" id="save-btn">Save Enrollment</button>
        </form>
    </div>

    <a href="{{ route('enrollment.dashboard') }}">Go back</a>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const saveBtn = document.getElementById('save-btn');

            async function checkStatus() {
                try {
                    const response = await fetch('/enrollment/status');
                    if (!response.ok) {
                        console.log('Network response was not ok.');
                        return;
                    }

                    const data = await response.json();

                    if (data.status === 'enrolled') {
                        saveBtn.disabled = true;
                        saveBtn.classList.add('disabled-btn');
                    }
                } catch (error) {
                    console.error('Something went wrong', error);
                }
            }

            checkStatus();
        });
    </script>
</body>
</html>
