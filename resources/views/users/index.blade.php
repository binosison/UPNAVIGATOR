@extends('layouts.app')

@section('title', 'User')

@section('contents')
<div class="container mx-auto">
    <h1 class="font-bold text-2xl ml-3">User Accounts</h1>
    <hr />

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">ID</th>
                <th scope="col" class="px-6 py-3">Name</th>
                <th scope="col" class="px-6 py-3">Email</th>
                <th scope="col" class="px-6 py-3">Type</th>
                <th scope="col" class="px-6 py-3">Created at</th>
                <th scope="col" class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
        @if($users->count() > 0)
        @foreach($users as $account)
        <tr>
            <td>{{ $account->id }}</td>
            <td>{{ $account->name}}</td>
            <td>{{ $account->email }}</td>
            <td>{{ $account->type }}</td>
            <td>{{ $account->created_at }}</td>
            <td class="w-36">
            <form action="{{ route('admin/users/destroy', $account->id) }}" method="POST" onsubmit="return confirm('Delete?')" class="text-red-800">
    @csrf
    @method('DELETE')
    <button>Delete</button>
</form>

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
