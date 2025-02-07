<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients List</title>
</head>
<body>
    <h1>Patients in Clinic: {{ $clinic->name }}</h1>
    <a href="{{ route('patients.create', $clinic->id) }}">Add New Patient</a>
    
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patients as $patient)
                <tr>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->email }}</td>
                    <td>{{ $patient->phone }}</td>
                    <td>
                        <a href="{{ route('patients.show', [$clinic->id, $patient->id]) }}">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
