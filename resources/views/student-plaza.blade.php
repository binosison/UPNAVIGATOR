@extends('layouts.user')

@section('title', 'Student plaza')

@section('contents')
<section class="py-5 mt-5">
  <div class="container">
    <!-- Title for the section -->
    <h5 class="text-center mb-5" style="font-weight: 700; font-size: 2rem; letter-spacing: 0.05rem; color: #333;">STUDENT PLAZA</h5>

    <div class="row text-center">
      <!-- Card for each facility -->
      <div class="col-12 col-sm-6 col-lg-4 mb-4">
        <div class="card border-0 shadow-sm img-animate">
          <div class="image-container">
            <img class="card-img-top img-fluid rounded enlarge-image" src="{{ asset('images/sp.jpg') }}" alt="MACLAB" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-image="{{ asset('images/maclab.jpg') }}">
          </div>
          <div class="card-body">
            <h3 class="card-title" style="font-weight: 600; font-size: 1.5rem;">MACLAB</h3>
            <p class="card-text text-muted" style="font-size: 1rem;">A modern space equipped with Apple computers for design and development projects.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</script>
@endsection
