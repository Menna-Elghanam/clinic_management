<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic Management</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="text-xl font-bold text-blue-600">
                Clinic Management
            </div>
            <div class="space-x-4">
                <a 
                    href="{{ route('clinics.index') }}" 
                    class="text-gray-700 hover:text-blue-600 transition duration-300 ease-in-out"
                >
                    Home
                </a>
                <a 
                    href="{{ route('clinics.create') }}" 
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300 ease-in-out"
                >
                    Add Clinic
                </a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-8 flex-grow">
        @yield('content')
    </main>

    <footer class="bg-white shadow-md mt-auto">
        <div class="container mx-auto px-4 py-4 text-center text-gray-600">
            <p>&copy; {{ date('Y') }} Clinic Management System</p>
        </div>
    </footer>
</body>
</html>