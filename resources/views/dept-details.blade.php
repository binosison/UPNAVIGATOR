@extends('layouts.dept-layout')

@section('title', 'Dept Details')

@section('contents')
<div class="text-center mt-5">
    <h1 class="font-bold text-2xl ml-5 mt-6">College Department</h1>
    <hr />
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
        @forelse($departments as $department)
        <div class="bg-white rounded-lg shadow-md p-4">
            <img src="{{ asset('storage/' . $department->photo) }}" alt="{{ $department->name }}" class="w-full h-48 object-cover rounded-t-lg cursor-pointer" onclick="enlargeImage('{{ asset('storage/' . $department->photo) }}')" data-toggle="modal" data-target="#imageModal">
            <div class="p-4">
                <h2 class="text-xl font-semibold">{{ $department->name }}</h2>
                <p class="text-gray-700">{{ $department->building }}</p>
                <p class="mt-2">{{ $department->description }}</p>
                <a href="{{ route('departments.show') }}" class="mt-4 block text-center bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md"> View Departments </a>
                
                <form id="reviewForm{{ $department->id }}" method="POST" action="{{ route('reviews.submit') }}" class="mt-4 hidden">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <input type="hidden" name="department_id" value="{{ $department->id }}"> <!-- Changed 'place_id' to 'department_id' -->
                    <textarea name="comment" rows="3" class="form-control mt-2" placeholder="Write your review here..."></textarea>
                    <button type="submit" class="block text-center bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md mt-2">Submit Review</button>
                </form>
            </div>
        </div>
        @empty
        <p>No departments found.</p> <!-- Updated empty message -->
        @endforelse
    </div>
</div>
@endsection
