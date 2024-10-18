<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logo1.png') }}">
    <title>@yield('title')</title>

    <!-- TailwindCSS for styling -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>

    <!-- Icons and other assets -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- External CSS -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/contacts/contact-1/assets/css/contact-1.css" />

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Custom CSS for alignment -->
</head>

<body class="bg-gray-100">
    <!-- Navigation Bar -->
    <nav class="bg-green-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Left Side Logo and Name -->
                <div class="flex items-center">
                    <div class="flex-shrink-0 mr-2">
                        <img src="{{ asset('images/logo1.png') }}" alt="Logo" class="h-10 w-10 rounded-full logo">
                    </div>
                    <div class="text-white font-bold text-lg">
                        UPNAVIGATOR
                    </div>
                </div>
                <!-- Add other navigation items here if needed -->
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-6">
        <div class="max-w-9xl mx-auto px-4 sm:px-6 lg:px-8 bg-white rounded-lg shadow-md">
            @yield('contents') <!-- Ensure this matches child views -->
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-green-700 py-3 mt-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <p class="text-white">&copy; 2024 PHINMAP. All rights reserved.</p>
            <div class="flex items-center space-x-4">
                <a href="#" class="text-gray-300 hover:text-white">Privacy Policy</a>
                <span class="text-gray-300">|</span>
                <a href="#" class="text-gray-300 hover:text-white">Terms of Service</a>
            </div>
        </div>
    </footer>
</body>

</html>
