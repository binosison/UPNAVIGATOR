@extends('layouts.app')

@section('title', 'Show Facility')

@section('contents')
<h1 class="font-bold text-2xl ml-3">Facility Details</h1>
<hr />
<div class="border-b border-gray-900/10 pb-12">
    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <!-- Facility Name -->
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Facility</label>
            <div class="mt-2">
                {{ $facility->name }}
            </div>
        </div>

        <!-- Facility Building -->
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Building</label>
            <div class="mt-2">
                {{ $facility->building }}
            </div>
        </div>

        <!-- Facility Photo -->
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Facility Photo</label>
            <div class="mt-2">
                <img src="{{ asset('storage/' . $facility->image_path) }}" alt="Facility Photo" style="width: 200px; height: auto;">
            </div>
        </div>

        <!-- Facility Description -->
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Description</label>
            <div class="mt-2">
                {{ $facility->description }}
            </div>
        </div>
        

    </div>
</div>
@endsection
