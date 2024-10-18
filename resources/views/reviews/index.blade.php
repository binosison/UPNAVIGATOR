@extends('layouts.app')

@section('title', 'Reviews')

@section('contents')
<div class="container mx-auto">
    <h1 class="font-bold text-2xl ml-3">User Reviews</h1>
    <hr />

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">#</th>
                <th scope="col" class="px-6 py-3">User ID</th>
                <th scope="col" class="px-6 py-3">Place ID</th>
                <th scope="col" class="px-6 py-3">Review</th>
                <th scope="col" class="px-6 py-3">Date</th>
                <th scope="col" class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
        @if($reviews->count() > 0)
        @foreach($reviews as $comment)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $comment->user_id }}</td>
            <td>{{ $comment->place_id }}</td>
            <td>{{ $comment->content }}</td>
            <td>{{ $comment->created_at }}</td>
            <td class="w-36">
                <div class="flex space-x-2">
        
                    <form action="{{ route('admin/reviews/destroy', $comment->id) }}" method="POST" onsubmit="return confirm('Delete?')" class="text-red-800">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="6" class="text-center">No reviews found</td>
        </tr>
        @endif
        </tbody>
    </table>
</div>
@endsection
