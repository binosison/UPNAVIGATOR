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

    <!-- Google Fonts for modern typography -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- TailwindCSS for styling -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>

    <!-- Icons and other assets -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- External CSS -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css" />

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <!-- Popper.js and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom CSS for enhanced aesthetics -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7f6;
        }

        a {
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .logo {
            vertical-align: middle;
        }

        .profile-dropdown {
            position: absolute;
            top: 50px;
            right: 0;
            z-index: 20;
        }

        /* Navigation Styling */
        nav {
            background-color: #1b4332;
        }

        nav a {
            color: #d3dce6;
            font-weight: 500;
        }

        nav a:hover {
            color: #f4f7f6;
            transform: translateY(-2px);
        }

        .logo {
            border: 2px solid white;
        }

        /* Footer Styling */
        footer {
            background-color: #1b4332;
            padding: 20px;
            color: #f4f7f6;
            text-align: center;
            font-weight: 500;
        }

        footer p, footer a {
            color: white;
        }

        footer a:hover {
            color: lightgray;
            transform: scale(1.05);
        }

        /* Custom Button Hover */
        .hover-effect:hover {
            background-color: #40916c;
            color: white;
        }

        /* Dropdown for Departments */
        .dropdown-item:hover {
            background-color: #d8f3dc;
            color: #1b4332;
        }

        /* Smooth transitions */
        * {
            transition: all 0.3s ease;
        }

        /* Ensure footer stays at the bottom */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
            padding-bottom: 30px;
        }

        .img-fluid {
    max-width: 80%; /* Adjusts image width */
    height: auto; /* Maintains aspect ratio */
    margin: 0 auto; /* Centers the image */
}

.card {
    transition: transform 0.3s, box-shadow 0.3s;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
}

    </style>
</head>

<body class="bg-gray-100">
    <!-- Navigation Bar -->
    <nav class="bg-green-600 py-3 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
        <!-- Left Side Logo and Name -->
        <div class="flex items-center">
            <img src="{{ asset('images/logo1.png') }}" alt="Logo" class="h-12 w-12 rounded-full logo">
            <div class="text-white font-bold text-xl ml-3">CAMPUS MAP</div>
        </div>

        <!-- Navigation Links -->
        <div class="hidden md:flex space-x-6 items-center">
            <a href="{{ url('/') }}" class="hover-effect px-3 py-2 rounded-md text-white">Home</a>
            <a href="{{ url('about') }}" class="hover-effect px-3 py-2 rounded-md text-white">About</a>
            <a href="{{ url('contact') }}" class="hover-effect px-3 py-2 rounded-md text-white">Queries</a>

            <!-- Dropdown for Departments -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="hover-effect px-3 py-2 rounded-md flex items-center text-white">
                    Departments
                    <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 10l5 5 5-5H7z" />
                    </svg>
                </button>
                <div x-show="open" @click.away="open = false" class="absolute z-20 mt-1 w-48 bg-white rounded-md shadow-md">
                    <a href="{{ url('cite') }}" class="block px-4 py-2 text-sm dropdown-item text-green-800">CITE/COL</a>
                    <a href="{{ url('riverside') }}" class="block px-4 py-2 text-sm dropdown-item text-green-800">CAHS</a>
                    <a href="{{ url('cma') }}" class="block px-4 py-2 text-sm dropdown-item text-green-800">CMA</a>
                    <a href="{{ url('ccje') }}" class="block px-4 py-2 text-sm dropdown-item text-green-800">CCJE</a>
                    <a href="{{ url('cea') }}" class="block px-4 py-2 text-sm dropdown-item text-green-800">CEA/CELA</a>
                </div>
            </div>
           <!-- <a href="#" class="hover-effect px-3 py-2 rounded-md text-white">Facilities</a> -->
        </div>

        <!-- Right Side Profile -->
<div class="hidden md:block">
    <div class="ml-4 flex items-center">
        @if (Route::has('login'))
        @auth
        <!-- Profile Dropdown -->
        <div x-data="{ show: false }" x-on:click.away="show = false" class="relative">
            <button x-on:click="show = !show" class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm">
                <img class="h-8 w-8 rounded-full" src="{{ asset('images/icon.png') }}" alt="Profile">
            </button>
            <div x-show="show" class="profile-dropdown bg-white ring-1 ring-black ring-opacity-5 mt-2 rounded-md shadow-lg">
                <a href="{{ url('/profile') }}" class="block px-4 py-2 text-sm dropdown-item">Your Profile</a>
                <a href="{{ url('/logout') }}" class="block px-4 py-2 text-sm dropdown-item">Sign out</a>
            </div>
        </div>
        @else
        <!-- Login and Register Buttons -->
        <a href="{{ route('login') }}" class="text-white bg-green-600 hover:bg-green-700 border border-transparent hover:border-green-600 transition-all duration-300 px-6 py-2 rounded-full shadow-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">Log in</a>
        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="ml-4 text-white bg-green-600 hover:bg-green-700 border border-transparent hover:border-green-600 transition-all duration-300 px-6 py-2 rounded-full shadow-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">Register</a>
        @endif
        @endauth
        @endif
    </div>
</div>

</nav>


    <!-- Main Content -->
    <main class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 bg-white rounded-lg shadow-lg">
            @yield('contents')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-green-700 py-2">
        <div class="max-w-5xl mx-auto flex justify-center items-center">
            <p>&copy; 2024 UPNAVIGATOR. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
