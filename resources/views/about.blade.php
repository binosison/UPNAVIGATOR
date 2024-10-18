@extends('layouts.user')

@section('title', 'About')

@section('contents')

<section class="py-3 py-md-5 mt-10">
  <link rel="stylesheet" href="{{ asset('css/about.css') }}">

<!-- About 1 - Bootstrap Brain Component -->
<section class="py-3 py-md-5">
  <div class="container">
    <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
      <div class="col-12 col-lg-6 col-xl-5">
        <img class="img-fluid rounded" loading="lazy" src="{{ asset('images/about.jpg') }}" alt="About 1">
      </div>
      <div class="col-12 col-lg-6 col-xl-7">
        <div class="row justify-content-xl-center">
          <div class="col-12 col-xl-11">
            <h2 class="mb-3">Who Are We?</h2>
            <p class="lead fs-4 text-secondary mb-3">Welcome to the PHINMA UPang Campus Map! This tool helps students, faculty, and visitors quickly find departments, buildings, and facilities with detailed directions and information.</p>
            <p class="mb-5">We are a fast-growing company, but we have never lost sight of our core values. We believe in collaboration, innovation, and customer satisfaction. We are always looking for new ways to improve our products and services.</p>
            <div class="row gy-4 gy-md-0 gx-xxl-5X">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
