@extends('layouts.app')

@section('title', 'Contacts')

@section('contents')
<div class="container mx-auto">
    <h1 class="font-bold text-2xl ml-3">User Queries</h1>
    <hr />

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">#</th>
                <th scope="col" class="px-6 py-3">Fullname</th>
                <th scope="col" class="px-6 py-3">Email</th>
                <th scope="col" class="px-6 py-3">Queries</th>
                <th scope="col" class="px-6 py-3">Date</th>
                <th scope="col" class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
        @if($contacts->count() > 0)
        @foreach($contacts as $query)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $query->fullname }}</td>
            <td>{{ $query->email }}</td>
            <td>{{ $query->message }}</td>
            <td>{{ $query->created_at }}</td>
            <td class="w-36">
                <div class="flex space-x-2">
                    <form action="{{ route('admin/contacts/destroy', $query->id) }}" method="POST" onsubmit="return confirm('Delete?')" class="text-red-800">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="6" class="text-center">No queries found</td>
        </tr>
        @endif
        </tbody>
    </table>
</div>
@endsection
