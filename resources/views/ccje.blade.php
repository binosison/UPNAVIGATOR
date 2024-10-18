@extends('layouts.user')

@section('title', 'CCJE')

@section('contents')
<section class="py-5 mt-5">
  <div class="container">
    <!-- Title for the section -->
    <h5 class="text-center mb-5" style="font-weight: 700; font-size: 2rem; letter-spacing: 0.05rem; color: #333;">CCJE BUILDING</h5>

    <div class="row text-center">
      <!-- Card for each facility -->
      <div class="col-12 col-sm-6 col-lg-4 mb-4">
        <div class="card border-0 shadow-sm img-animate">
          <div class="image-container">
            <img class="card-img-top img-fluid rounded enlarge-image" src="{{ asset('images/ccje.jpg') }}" alt="MACLAB" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-image="{{ asset('images/maclab.jpg') }}">
          </div>
          <div class="card-body">
            <h3 class="card-title" style="font-weight: 600; font-size: 1.5rem;">CMA</h3>
            
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-lg-4 mb-4">
        <div class="card border-0 shadow-sm img-animate">
          <div class="image-container">
            <img class="card-img-top img-fluid rounded enlarge-image" src="{{ asset('images/ccje1.jpg') }}" alt="PTC RESTROOM" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-image="{{ asset('images/restroom.jpg') }}">
          </div>
          <div class="card-body">
            <h3 class="card-title" style="font-weight: 600; font-size: 1.5rem;">ROOMS</h3>
            
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-lg-4 mb-4">
        <div class="card border-0 shadow-sm img-animate">
          <div class="image-container">
            <img class="card-img-top img-fluid rounded enlarge-image" src="{{ asset('images/ccje2.jpg') }}" alt="FEMALE RESTROOM" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-image="{{ asset('images/r-female.jpg') }}">
          </div>
          <div class="card-body">
            <h3 class="card-title" style="font-weight: 600; font-size: 1.5rem;">ROOMS</h3>
            
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-lg-4 mb-4">
        <div class="card border-0 shadow-sm img-animate">
          <div class="image-container">
            <img class="card-img-top img-fluid rounded enlarge-image" src="{{ asset('images/ccje3.jpg') }}" alt="PTC ROOMS" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-image="{{ asset('images/ptc-3.jpg') }}">
          </div>
          <div class="card-body">
            <h3 class="card-title" style="font-weight: 600; font-size: 1.5rem;">CMA ROOMS</h3>
            
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-lg-4 mb-4">
        <div class="card border-0 shadow-sm img-animate">
          <div class="image-container">
            <img class="card-img-top img-fluid rounded enlarge-image" src="{{ asset('images/ccje4.jpg') }}" alt="CITE OFFICE" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-image="{{ asset('images/office.jpg') }}">
          </div>
          <div class="card-body">
            <h3 class="card-title" style="font-weight: 600; font-size: 1.5rem;">CMA ROOMS</h3>
            
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-lg-4 mb-4">
        <div class="card border-0 shadow-sm img-animate">
          <div class="image-container">
            <img class="card-img-top img-fluid rounded enlarge-image" src="{{ asset('images/ccje5.jpg') }}" alt="PTC ROOMS" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-image="{{ asset('images/ptc-4.jpg') }}">
          </div>
          <div class="card-body">
            <h3 class="card-title" style="font-weight: 600; font-size: 1.5rem;">CMA TAMBAYAN</h3>
            
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-lg-4 mb-4">
        <div class="card border-0 shadow-sm img-animate">
          <div class="image-container">
            <img class="card-img-top img-fluid rounded enlarge-image" src="{{ asset('images/ccje6.jpg') }}" alt="PTC ROOMS" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-image="{{ asset('images/ptc-4.jpg') }}">
          </div>
          <div class="card-body">
            <h3 class="card-title" style="font-weight: 600; font-size: 1.5rem;">CMA 4TH FLOOR</h3>
            
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-lg-4 mb-4">
        <div class="card border-0 shadow-sm img-animate">
          <div class="image-container">
            <img class="card-img-top img-fluid rounded enlarge-image" src="{{ asset('images/ccje7.jpg') }}" alt="PTC ROOMS" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-image="{{ asset('images/ptc-4.jpg') }}">
          </div>
          <div class="card-body">
            <h3 class="card-title" style="font-weight: 600; font-size: 1.5rem;">CMA 4TH FLOOR</h3>
            
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-lg-4 mb-4">
        <div class="card border-0 shadow-sm img-animate">
          <div class="image-container">
            <img class="card-img-top img-fluid rounded enlarge-image" src="{{ asset('images/ccje8.jpg') }}" alt="PTC ROOMS" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-image="{{ asset('images/ptc-4.jpg') }}">
          </div>
          <div class="card-body">
            <h3 class="card-title" style="font-weight: 600; font-size: 1.5rem;">CMA 4TH FLOOR</h3>
            
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-lg-4 mb-4">
        <div class="card border-0 shadow-sm img-animate">
          <div class="image-container">
            <img class="card-img-top img-fluid rounded enlarge-image" src="{{ asset('images/ccje9.jpg') }}" alt="PTC ROOMS" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-image="{{ asset('images/ptc-4.jpg') }}">
          </div>
          <div class="card-body">
            <h3 class="card-title" style="font-weight: 600; font-size: 1.5rem;">CMA 4TH FLOOR</h3>
           
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-lg-4 mb-4">
        <div class="card border-0 shadow-sm img-animate">
          <div class="image-container">
            <img class="card-img-top img-fluid rounded enlarge-image" src="{{ asset('images/ccje10.jpg') }}" alt="PTC ROOMS" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-image="{{ asset('images/ptc-4.jpg') }}">
          </div>
          <div class="card-body">
            <h3 class="card-title" style="font-weight: 600; font-size: 1.5rem;">CMA 4TH FLOOR</h3>
            
          </div>
        </div>
      </div>


    </div>
  </div>
</section>

<!-- Modal for Enlarged Image -->
<!--<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-0 border-0 shadow-lg">
            <div class="modal-body p-0">
                <img id="modalImage" class="img-fluid rounded-0" src="" alt="Enlarged Image">
            </div>
        </div>
    </div>
</div> -->


<!-- Custom Styling -->
<style>
  .image-container {
    position: relative;
    overflow: hidden;
    border-radius: 15px;
  }

  .card {
    transition: transform 0.3s ease;
  }

  .img-animate:hover {
    transform: scale(1.05); /* Card zoom effect */
  }

  .card-img-top {
    height: 250px; /* Fixed height for images */
    object-fit: cover; /* Crop and fill */
  }

  .card {
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Subtle shadow for depth */
  }

  h3 {
    transition: color 0.3s ease;
  }

  h3:hover {
    color: #28a745; /* Changes text color on hover (green in this case) */
  }

  /* Additional styling for text */
  p {
    line-height: 1.6;
  }

  /* Custom Styling for Modal Image */
.modal-content {
    background-color: #ffffff; /* Clean white background */
    border-radius: 0; /* Flat design */
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.2); /* Subtle shadow for depth */
}

.modal-header {
    border: none; /* No border for a cleaner look */
}

.btn-close {
    background-color: rgba(255, 255, 255, 0.7); /* Semi-transparent close button */
    border: none; /* Remove border */
    border-radius: 50%; /* Circular button */
}

.btn-close:hover {
    background-color: rgba(255, 255, 255, 1); /* Solid background on hover */
}

.modal-body {
    padding: 0; /* Remove padding for full-width image */
}

.img-fluid {
    max-height: 90vh; /* Limit height to keep it within viewport */
    max-width: 100%; /* Prevent overflow */
    object-fit: contain; /* Maintain aspect ratio */
    margin: auto; /* Center image in the modal */
    display: block; /* Block display to center it */
    border-radius: 0; /* No rounded corners for a sleek look */
    transition: transform 0.3s ease; /* Smooth zoom effect on hover */
}

/* Image Hover Effect */
.img-fluid:hover {
    transform: scale(1.05); /* Slightly enlarge on hover for a subtle effect */
}

/* Optional: Add a backdrop blur effect */
.modal {
    backdrop-filter: blur(10px); /* Blur effect for background */
}


  
</style>

<!-- Script for Image Enlargement -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Add click event listeners to all images with class "enlarge-image"
    document.querySelectorAll('.enlarge-image').forEach(function(image) {
      image.addEventListener('click', function() {
        // Get the image URL from the clicked image
        const imageUrl = this.getAttribute('data-bs-image');
        // Set the image source in the modal
        document.getElementById('modalImage').setAttribute('src', imageUrl);
      });
    });
  });
</script>
@endsection
