<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic Management</title>
    @vite('resources/css/app.css')

    <!-- SweetAlert Library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="text-xl font-bold text-blue-600">
                <a href="{{ route('clinics.index') }}">Clinic Management</a>
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

    <!-- Show SweetAlert on Success -->
    @if(session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: "Success!",
                    text: "{{ session('success') }}",
                    icon: "success",
                    confirmButtonText: "OK"
                });
            });
        </script>
    @endif
</body>
</html>
