<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Subject</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        form {
            background-color: #fff;
            border-radius: 8px;
            padding: 30px;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        form h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        label {
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
            font-size: 14px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            color: #333;
            background-color: #f9f9f9;
            transition: border-color 0.3s ease;
        }

        input:focus {
            border-color: #007bff;
            outline: none;
            background-color: #fff;
        }

        button {
            width: 100%;
            padding: 12px 20px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        button:active {
            background-color: #00408b;
        }
    </style>
</head>
<body>
    <form action="{{ route('subject.update', $subject->id) }}" method="POST">
        @csrf
        @method('PUT')

        <h1>Update Subject</h1>

        <label for="subject_name">Subject Name</label>
        <input type="text" name="subject_name" id="subject_name" value="{{ $subject->subject_name }}" required>

        <label for="year_level">Year Level</label>
        <input type="number" name="year_level" id="year_level" value="{{ $subject->year_level }}" required>

        <label for="code">Code</label>
        <input type="text" name="code" id="code" value="{{ $subject->code }}" required>

        <button type="submit">Update Subject</button>
    </form>
</body>
</html>
