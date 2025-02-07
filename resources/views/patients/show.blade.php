<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Details</title>
</head>
<body>
    <h1>Patient Details</h1>

    <p><strong>Name:</strong> {{ $patient->name }}</p>
    <p><strong>Email:</strong> {{ $patient->email }}</p>
    <p><strong>Phone:</strong> {{ $patient->phone }}</p>
    <p><strong>Clinic:</strong> {{ $patient->clinic->name }}</p>

    <a href="{{ route('patients.index', $patient->clinic->id) }}">Back to Patient List</a>
</body>
</html>
