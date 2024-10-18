@extends('layouts.user')

@section('title', 'Home')

@section('contents')
<link rel="stylesheet" href="{{ asset('css/departments.css') }}">
<!-- Carousel for images -->
<div id="carouselExampleControls" class="carousel slide">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <a href=" "> <!--for mapping -->
                <img src="{{ asset('images/map.jpg') }}" class="d-block w-100" alt="Campus Map" usemap="#campusmap">
                <div class="overlay">
                    <span class="arrow">&#10132;</span>
                </div>
            </a>
            
            <map name="campusmap">
                <area shape="rect" coords="300,200,400,300" alt="Student Plaza" href="{{ route('student.plaza') }}">
                <area shape="rect" coords="550,250,550,350" alt="PTC Building" href="{{ route('ptc.building') }}">
            </map>
        </div>
    </div>
</div>

<!-- DEPARTMENTS -->
<div class="text-center mt-5">
    <h1 class="font-bold text-3xl ml-5 mt-6">Department Buildings</h1>
    <hr class="mb-5" />
    @forelse($places as $place)
    <div class="container mt-5">
        <div class="row fade-in">
            @if($loop->iteration % 2 == 0)
            <div class="col-md-4">
                <img src="{{ asset($place->photo) }}" alt="{{ $place->place }}" class="department-image rounded-t-lg cursor-pointer" onclick="enlargeImage('{{ asset($place->photo) }}')" data-toggle="modal" data-target="#imageModal">
            </div>
            <div class="col-md-8">
                <div class="bg-white department-card shadow-md p-4">
                    <h2 class="department-title font-semibold text-xl">{{ $place->place }}</h2>
                    <p class="text-gray-700">{{ $place->location }}</p>
                    <p class="mt-2 text-gray-600">{{ $place->description }}</p>
                    @if($place->map_link)
                    <a href="#" class="mt-4 block text-center bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md"> View Departments </a>
                    @endif

                    @auth
                    <!-- Review button commented out -->
                    @endauth
                </div>
            </div>
            @else
            <div class="col-md-8">
                <div class="bg-white department-card shadow-md p-4">
                    <h2 class="department-title font-semibold text-xl">{{ $place->place }}</h2>
                    <p class="text-gray-700">{{ $place->location }}</p>
                    <p class="mt-2 text-gray-600">{{ $place->description }}</p>
                    @if($place->map_link)
                    <a href="#" class="mt-4 block text-center bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md"> View Departments </a>
                    @endif

                    @auth
                    <!-- Review button commented out -->
                    @endauth
                </div>
            </div>
            <div class="col-md-4">
                <img src="{{ asset($place->photo) }}" alt="{{ $place->place }}" class="department-image rounded-t-lg cursor-pointer" onclick="enlargeImage('{{ asset($place->photo) }}')" data-toggle="modal" data-target="#imageModal">
            </div>
            @endif
        </div>
    </div>
    @empty
    <p>No places found.</p>
    @endforelse
</div>

<!-- OFFICES -->
<div class="text-center mt-5">
    <h1 class="font-bold text-3xl ml-5 mt-6">Offices</h1>
    <hr class="mb-5" />
    @forelse($departments as $department)
    <div class="container mt-5">
        <div class="row fade-in">
            @if($loop->iteration % 2 == 0)
            <div class="col-md-4">
                <img src="{{ asset($department->photo) }}" alt="{{ $department->name }}" class="department-image rounded-t-lg cursor-pointer" onclick="enlargeImage('{{ asset($department->photo) }}')" data-toggle="modal" data-target="#imageModal">
            </div>
            <div class="col-md-8">
                <div class="bg-white department-card shadow-md p-4">
                    <h2 class="department-title font-semibold text-xl">{{ $department->name }}</h2>
                    <p class="text-gray-700">{{ $department->building }}</p>
                    <p class="mt-2 text-gray-600">{{ $department->description }}</p>
                    @if($department->location)
                    <a href="{{ $department->location }}" class="mt-4 block text-center bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md" target="_blank">View on Map</a>
                    @endif
                </div>
            </div>
            @else
            <div class="col-md-8">
                <div class="bg-white department-card shadow-md p-4">
                    <h2 class="department-title font-semibold text-xl">{{ $department->name }}</h2>
                    <p class="text-gray-700">{{ $department->building }}</p>
                    <p class="mt-2 text-gray-600">{{ $department->description }}</p>
                    @if($department->location)
                    <a href="{{ $department->location }}" class="mt-4 block text-center bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md" target="_blank">View on Map</a>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <img src="{{ asset($department->photo) }}" alt="{{ $department->name }}" class="department-image rounded-t-lg cursor-pointer" onclick="enlargeImage('{{ asset($department->photo) }}')" data-toggle="modal" data-target="#imageModal">
            </div>
            @endif
        </div>
    </div>
    @empty
    <p>No departments found.</p>
    @endforelse
</div>


<!-- GSD -->
<!-- GSD -->
<div class="text-center mt-5">
    <h1 class="font-bold text-3xl ml-5 mt-6">Facilities</h1>
    <hr class="mb-5" />
    @forelse($facilities as $facility)
        <div class="container mt-5">
            <div class="row fade-in">
                @if($loop->iteration % 2 == 0)
                    <div class="col-md-4">
                        <img src="{{ asset($facility->image_path) }}" alt="{{ $facility->name }}" class="facility-image rounded-t-lg cursor-pointer" onclick="enlargeImage('{{ asset($facility->image_path) }}')" data-toggle="modal" data-target="#imageModal">
                    </div>
                    <div class="col-md-8">
                        <div class="bg-white facility-card shadow-md p-4">
                            <h2 class="facility-title font-semibold text-xl">{{ $facility->name }}</h2>
                            <p class="text-gray-700">{{ $facility->building }}</p>
                            <p class="mt-2 text-gray-600">{{ $facility->description }}</p>
                            @if($facility->location)
                                <a href="{{ $facility->location }}" class="mt-4 block text-center bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md" target="_blank">View on Map</a>
                            @endif
                        </div>
                    </div>
                @else
                    <div class="col-md-8">
                        <div class="bg-white facility-card shadow-md p-4">
                            <h2 class="facility-title font-semibold text-xl">{{ $facility->name }}</h2>
                            <p class="text-gray-700">{{ $facility->building }}</p>
                            <p class="mt-2 text-gray-600">{{ $facility->description }}</p>
                            @if($facility->location)
                                <a href="{{ $facility->location }}" class="mt-4 block text-center bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md" target="_blank">View on Map</a>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="{{ asset($facility->image_path) }}" alt="{{ $facility->name }}" class="facility-image rounded-t-lg cursor-pointer" onclick="enlargeImage('{{ asset($facility->image_path) }}')" data-toggle="modal" data-target="#imageModal">
                    </div>
                @endif
            </div>
        </div>
    @empty
        <p>No facilities found.</p>
    @endforelse
</div>



<!-- Modal for enlarging images -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0" style="border-radius: 10px; overflow: hidden;">
            <div class="modal-body p-0">
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close" style="z-index: 10;"></button>
                <img src="" alt="Enlarged image" class="img-fluid w-100" id="modalImage">
            </div>
        </div>
    </div>
</div>

<script>
    function enlargeImage(imageSrc) {
        document.getElementById('modalImage').src = imageSrc;
        $('#imageModal').modal('show'); // Show the modal if using Bootstrap
    }

    function toggleReviewForm(placeId) {
        var reviewForm = document.getElementById('reviewForm' + placeId);
        reviewForm.classList.toggle('hidden');
    }

    // Scroll detection for fade-in effect
    const options = {
        root: null,
        rootMargin: "0px",
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in-effect');
            }
        });
    }, options);

    document.querySelectorAll('.fade-in').forEach(element => {
        observer.observe(element);
    });
</script>

@endsection
