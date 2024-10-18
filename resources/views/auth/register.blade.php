<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sign Up</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>

    <style>
        .bg-image {
            background-image: url('storage/images/phinma.jpg');
            background-size: cover;
            background-position: center;
        }

        body, html {
            height: 100%;
            margin: 0;
            overflow: hidden;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 400px;
        }
    </style>
</head>

<body>
    <nav class="bg-light py-2 px-8 flex justify-between items-center">
        <a href="#" class="flex items-center">
            <img src="{{ asset('images/logo1.png') }}" alt="Logo" class="h-10">
            <span class="ml-4 text-lg font-bold text-gray-700">UPNAVIGATOR</span>
        </a>
    </nav>

    <section class="bg-gray-50 dark:bg-gray-900 bg-image min-h-screen flex items-center justify-center">
        <div class="form-container">
            <h1 class="text-xl font-bold text-center mb-6">SIGN UP</h1>

            <!-- Display errors if any -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="space-y-4" method="post" action="{{ route('register.save') }}">
                @csrf
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name:</label>
                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" placeholder="Enter name" required>
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email:</label>
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" placeholder="Enter email" required>
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password:</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" required>
                </div>
                <div>
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" required>
                </div>
                <button type="submit" class="w-full text-white bg-green-500 hover:bg-green-400 rounded-lg p-2">Create an account</button>
            </form>

            <div class="text-sm font-light text-gray-500 dark:text-gray-400 text-center mt-4">
                Already have an account? <a href="{{ route('login') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Log in</a>
            </div>
        </div>
    </section>
</body>

</html>
