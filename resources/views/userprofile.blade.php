@extends('layouts.user')

@section('title', 'Profile Settings')

@section('contents')
<hr />
<form method="POST" enctype="multipart/form-data" action="{{ route('admin/profile/update') }}" class="max-w-md mx-auto">
    @csrf
    @method('PUT')

    <!-- Name Field -->
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
        <input id="name" name="name" type="text" value="{{ auth()->user()->name }}" class="mt-1 p-2 block w-full border-gray-300 rounded-md" />
    </div>

    <!-- Email Field -->
    <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input id="email" name="email" type="text" value="{{ auth()->user()->email }}" class="mt-1 p-2 block w-full border-gray-300 rounded-md" />
    </div>

    <!-- Current Password Field -->
    <div class="mb-4">
        <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
        <input id="current_password" name="current_password" type="password" class="mt-1 p-2 block w-full border-gray-300 rounded-md" />
    </div>

    <!-- New Password Field -->
    <div class="mb-4">
        <label for="new_password" class="block text-sm font-medium text-gray-700">New Password</label>
        <input id="new_password" name="new_password" type="password" class="mt-1 p-2 block w-full border-gray-300 rounded-md" />
    </div>

    <!-- Confirm New Password Field -->
    <div class="mb-4">
        <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
        <input id="new_password_confirmation" name="new_password_confirmation" type="password" class="mt-1 p-2 block w-full border-gray-300 rounded-md" />
    </div>

    <!-- Save Button -->
    <div>
        <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
            Save Profile
        </button>
    </div>
</form>
@endsection
