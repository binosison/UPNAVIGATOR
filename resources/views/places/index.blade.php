@extends('layouts.app')

@section('title', 'Department List')

@section('contents')
<div>
    <h1 class="font-bold text-2xl ml-3">Department List</h1>
    <a href="{{ route('admin/places/create') }}" class="text-white float-right bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Add Dept</a>
    <hr />
    @if(Session::has('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Id</th>
                <th scope="col" class="px-6 py-3">Department</th>
                <th scope="col" class="px-6 py-3">Building</th>
                <th scope="col" class="px-6 py-3">Photo</th>
                <th scope="col" class="px-6 py-3">Description</th>
                <th scope="col" class="px-6 py-3">Map</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($places->count() > 0)
            @foreach($places as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td>{{ $item->id }}</td>
                <td>{{ $item->place }}</td>
                <td>{{ $item->location }}</td>
                <td>
                    <img src="{{ $item->photo }}" width="100px">
                </td>
                <td>{{ $item->description }}</td>
                
               <!--Map link-->
                <td>
                    @if($item->map_link)
                    <a href="{{ $item->map_link }}" target="_blank" class="text-blue-500 underline">View Map</a>
                    @else
                    <span class="text-gray-500">No map available</span>
                    @endif
                </td>
                 <!--Map link-->

                <td class="flex items-center px-6 py-4 space-x-3">
                <a href="{{ route('admin/places/show', $item->id) }}" class="text-blue-800">Detail </a>  
                        <a href="{{ route('admin/places/edit', $item->id)}}" class="text-green-800 pl-2">Edit </a>  
                        <form action="{{ route('admin/places/destroy', $item->id) }}" method="POST" onsubmit="return confirm('Delete?')" class="float-right text-red-900">
                            @csrf
                            @method('DELETE')
                            <button>Delete</button>
                        </form>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="5">No places found</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
