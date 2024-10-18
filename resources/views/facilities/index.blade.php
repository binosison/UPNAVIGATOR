@extends('layouts.app')

@section('title', 'Facility List')

@section('contents')
<div>
    <h1 class="font-bold text-2xl ml-3">Facility List</h1>
    <a href="{{ route('admin/facilities/create') }}" class="text-white float-right bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Add Facility</a>
    <hr />
    @if(Session::has('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <table class="w-full text-sm text-left">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">Id</th>
                <th scope="col" class="px-6 py-3">Facility Name</th>
                <<th scope="col" class="px-6 py-3">Building</th>
                <th scope="col" class="px-6 py-3">Photo</th>
                <th scope="col" class="px-6 py-3">Description</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($facilities->count() > 0)
                @foreach($facilities as $item)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->building }}</td>
                        <td>
                            <img src="{{ asset($item->image_path) }}" width="100" alt="{{ $item->name }}">
                        </td>
                        <td>{{ $item->description }}</td>
                        <td class="flex items-center px-6 py-4 space-x-3">
                    <a href="{{ route('admin/facilities/show', $item->id) }}" class="text-blue-800">Detail </a>  
                    <a href="{{ route('admin/facilities/edit', $item->id)}}" class="text-green-800 pl-2">Edit </a>  
                    <form action="{{ route('admin/facilities/destroy', $item->id) }}" method="POST" onsubmit="return confirm('Delete?')" class="float-right text-red-900">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="text-center py-3">No facilities found</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
