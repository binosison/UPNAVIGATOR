@extends('layouts.user')

@section('title', 'Reviews')

@section('content')

<div class="container">
    <h1 class="my-4">Reviews</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Submit a Review</h5>
                    <form action="{{ route('reviews.submit') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="user_id" class="form-label">User ID</label>
                            <input type="text" class="form-control" id="user_id" name="user_id" required>
                        </div>
                        <div class="mb-3">
                            <label for="place_id" class="form-label">Place ID</label>
                            <input type="text" class="form-control" id="place_id" name="place_id" required>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Review Content</label>
                            <textarea class="form-control" id="content" name="content" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Review</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
