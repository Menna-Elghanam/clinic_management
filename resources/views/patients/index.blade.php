<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients List</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-4 sm:p-6">
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-4 sm:p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl sm:text-2xl font-bold">Patients in Clinic: {{ $clinic->name }}</h1>
            <a href="{{ route('patients.create', $clinic->id) }}" class="inline-block px-3 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Add New Patient</a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 border-b border-gray-300 text-left">Name</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left">Email</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left">Phone</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patients as $patient)
                        <tr class="hover:bg-gray-100">
                            <td class="py-2 px-4 border-b border-gray-200">{{ $patient->name }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $patient->email }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $patient->phone }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <a href="{{ route('patients.show', [$clinic->id, $patient->id]) }}" class="text-blue-500 hover:underline">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>