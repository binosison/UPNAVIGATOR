@extends('layouts.app')

@section('title', 'Show Office')

@section('contents')
<h1 class="font-bold text-2xl ml-3">Office Details</h1>
<hr />
<div class="border-b border-gray-900/10 pb-12">
    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <!-- Department Name -->
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Department</label>
            <div class="mt-2">
                {{ $department->name }}
            </div>
        </div>

        <!-- Department Building -->
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Building</label>
            <div class="mt-2">
                {{ $department->building }}
            </div>
        </div>

        <!-- Department Photo -->
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Department Photo</label>
            <div class="mt-2">
                <img src="{{ $department->photo}}" alt="Department Photo" style="width: 200px; height: auto;">
            </div>
        </div>

        <!-- Department Description -->
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Description</label>
            <div class="mt-2">
                {{ $department->description }}
            </div>
        </div>
        
        <!-- Map Link -->
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Map</label>
            <div class="mt-2">
                @if($department->location)
                <a href="{{ $department->location }}" target="_blank" class="text-blue-500 underline">View Map</a>
                @else
                <span class="text-gray-500">No map available</span>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
