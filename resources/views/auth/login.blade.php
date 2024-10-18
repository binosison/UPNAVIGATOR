<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>

    <style>
        .bg-image {
            background-image: url('storage/images/phinma.jpg'); /* Correct path to the image */
            background-size: cover;
            background-position: center;
        }

        body, html {
            height: 100%;
            margin: 0;
            overflow: hidden; /* Prevent scrolling */
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.8); /* Light background for the form */
            border-radius: 15px; /* Rounded corners */
            padding: 2rem; /* Padding around the form */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Shadow for depth */
            width: 90%; /* Full width on small screens */
            max-width: 400px; /* Limit max width */
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="bg-light py-2 px-8 flex justify-between items-center">
        <a href="#" class="flex items-center">
            <img src="{{ asset('images/logo1.png') }}" alt="Logo" class="h-10">
            <span class="ml-4 text-lg font-bold text-gray-700">UPNAVIGATOR</span>
        </a>
        <!-- Add more items here if needed, such as links or a button -->
    </nav>

    <!-- Login Section -->
    <section class="bg-gray-50 dark:bg-gray-900 bg-image min-h-screen flex items-center justify-center">
       <div class="form-container">
            <h1 class="text-xl font-bold text-center mb-6">LOGIN</h1>
            <form class="space-y-4" method="post" action="{{ route('login') }}">
                @csrf
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email:</label>
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter email" required="">
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password:</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                </div>
                <div class="flex justify-between items-center">
                    <a href="#" class="text-sm text-primary-600 hover:underline">Forgot password?</a>
                </div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-green-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-500">Sign in</button>
            </form>
            <div class="text-sm font-light text-gray-500 dark:text-gray-400 text-center mt-4">
                Need an account? <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
            </div>
        </div>
    </section>

</body>

</html>
