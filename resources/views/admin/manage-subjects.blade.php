<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Subjects</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        h1, h2 {
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 20px;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
        }
        input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #218838;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: #fff;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .actions {
            display: flex;
            gap: 10px;
            justify-content: center;
            align-items: center;
        }
        .actions a, .actions form {
            margin: 0;
        }
        .edit-btn, .delete-btn {
            color: white;
            padding: 5px 15px;
            border-radius: 5px;
            text-align: center;
            border: none;
            cursor: pointer;
            font-size: 14px;
            display: inline-block;
        }
        .edit-btn {
            background-color: #ffc107;
        }
        .edit-btn:hover {
            background-color: #e0a800;
        }
        .delete-btn {
            background-color: #dc3545;
        }
        .delete-btn:hover {
            background-color: #c82333;
        }
        /* Additional fix for button styling in forms */
        form button {
            background: none;
            color: inherit;
            border: none;
            padding: 0;
            font: inherit;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Manage Subjects</h1>

    <form action="{{ route('subject.store') }}" method="POST">
        @csrf
        <label for="subject_name">Subject Name:</label>
        <input type="text" name="subject_name" id="subject_name" placeholder="Subject Name" required>

        <label for="year_level">Year Level:</label>
        <input type="number" name="year_level" id="year_level" placeholder="Year Level" required>

        <label for="code">Code:</label>
        <input type="text" name="code" id="code" placeholder="Subject Code" required>

        <button type="submit">Save</button>
    </form>

    <a href="{{ route('admin.dashboard') }}">Go Back</a>

    @foreach(['firstYearSubjects', 'secondYearSubjects', 'thirdYearSubjects', 'fourthYearSubjects'] as $year)
        <h2>{{ ucfirst(explode('Year', $year)[0]) }} Year Subjects</h2>
        <table>
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Subject Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($$year as $subject)
                    <tr>
                        <td>{{ $subject->code }}</td>
                        <td>{{ $subject->subject_name }}</td>
                        <td class="actions">
                            <a href="{{ route('subject.edit', $subject->id) }}" class="edit-btn">Edit</a>
                            <form action="{{ route('subject.delete', $subject->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
</body>
</html>
