<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Patient</title>
</head>
<body>
    <h1>Add a New Patient to Clinic: {{ $clinic->name }}</h1>

    <form action="{{ route('patients.store', $clinic->id) }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" required><br>

        <button type="submit">Save Patient</button>
    </form>

    <a href="{{ route('patients.index', $clinic->id) }}">Back to Patient List</a>
</body>
</html>
