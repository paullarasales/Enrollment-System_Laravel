<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enrollment</title>
</head>
<body>
    <form action="{{ route('enrollment.save') }}" method="POST">
        @csrf

        <div>
            <label for="yearLevel">Year Level:</label>
            <input type="text" id="yearLevel" value="1st Year" readonly>
        </div>

        <div>
            <label for="section">Select Section:</label>
            <select id="section" name="section_id">
                @foreach ($sections as $section)
                    <option value="{{ $section->id }}">{{ $section->section }}</option>
                @endforeach
            </select>
        </div>

        <button type="button" id="loadSubjects">Load Subjects</button>

        <table border="1" id="subjectsTable" style="display: none;">
            <thead>
                <tr>
                    <th>Select</th>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                </tr>
            </thead>
            <tbody id="subjectsList"></tbody>
        </table>

        <button type="submit" id="saveEnrollment" style="display: none;">Save Enrollment</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('loadSubjects').addEventListener('click', async function() {
                try {
                    const response = await fetch('/enrollment/first-year');
                    if (!response.ok) {
                        console.log('Network response was not ok.');
                        return;
                    }

                    const data = await response.json();
                    const subjectsList = document.getElementById('subjectsList');
                    subjectsList.innerHTML = '';

                    document.getElementById('subjectsTable').style.display = 'table';

                    data.firstYearSubjects.forEach(subject => {
                        const row = document.createElement('tr');

                        const checkboxCell = document.createElement('td');
                        const checkbox = document.createElement('input');
                        checkbox.type = 'checkbox';
                        checkbox.name = 'subject_ids[]';
                        checkbox.value = subject.id;
                        checkbox.id = `subject-${subject.id}`;
                        checkboxCell.appendChild(checkbox);

                        const subjectCodeCell = document.createElement('td');
                        subjectCodeCell.textContent = subject.subject_code;

                        const subjectNameCell = document.createElement('td');
                        subjectNameCell.textContent = subject.subject_name;

                        row.appendChild(checkboxCell);
                        row.appendChild(subjectCodeCell);
                        row.appendChild(subjectNameCell);
                        subjectsList.appendChild(row);
                    });

                    document.getElementById('saveEnrollment').style.display = 'block';
                } catch (error) {
                    console.error('Something went wrong:', error);
                }
            });
        });
    </script>
</body>
</html>
