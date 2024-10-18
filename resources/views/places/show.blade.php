@extends('layouts.app')

@section('title', 'Show Page')

@section('contents')
<h1 class="font-bold text-2xl ml-3">Department Details</h1>
<hr />
<div class="border-b border-gray-900/10 pb-12">
    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Department</label>
            <div class="mt-2">
                {{ $place->place }}
            </div>
        </div>

        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Building</label>
            <div class="mt-2">
                {{ $place->location }}
            </div>
        </div>

        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Place Photo</label>
            <div class="mt-2">
                <!-- Change $places to $place -->
                <img src="{{ asset($place->photo) }}" alt="Place Photo" style="width: 200px; height: auto;">
            </div>
        </div>

        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Description</label>
            <div class="mt-2">
                {{ $place->description }}
            </div>
        </div>
    </div>
</div>
@endsection
