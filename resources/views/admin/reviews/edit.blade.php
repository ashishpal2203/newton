@extends('admin.layouts.app')

@section('title', 'Edit Review')

@section('header-actions')
    <a href="{{ route('admin.reviews.index') }}" class="btn btn-light border">
        <i class="fas fa-arrow-left mr-1"></i> Back to Reviews
    </a>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <form action="{{ route('admin.reviews.update', $review->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 form-group mb-4">
                            <label for="user_name">Reviewer Name <span class="text-danger">*</span></label>
                            <input type="text" name="user_name" id="user_name" class="form-control @error('user_name') is-invalid @enderror" value="{{ old('user_name', $review->user_name) }}" required>
                            @error('user_name') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 form-group mb-4">
                            <label for="subtitle">Subtitle / Context</label>
                            <input type="text" name="subtitle" id="subtitle" class="form-control @error('subtitle') is-invalid @enderror" value="{{ old('subtitle', $review->subtitle) }}">
                            @error('subtitle') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group mb-4">
                            <label for="rating">Rating (1 to 5 Stars) <span class="text-danger">*</span></label>
                            <select name="rating" id="rating" class="form-control @error('rating') is-invalid @enderror" required>
                                <option value="5" {{ old('rating', $review->rating) == 5 ? 'selected' : '' }}>⭐⭐⭐⭐⭐ (5 Stars)</option>
                                <option value="4" {{ old('rating', $review->rating) == 4 ? 'selected' : '' }}>⭐⭐⭐⭐ (4 Stars)</option>
                                <option value="3" {{ old('rating', $review->rating) == 3 ? 'selected' : '' }}>⭐⭐⭐ (3 Stars)</option>
                                <option value="2" {{ old('rating', $review->rating) == 2 ? 'selected' : '' }}>⭐⭐ (2 Stars)</option>
                                <option value="1" {{ old('rating', $review->rating) == 1 ? 'selected' : '' }}>⭐ (1 Star)</option>
                            </select>
                            @error('rating') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 form-group mb-4">
                            <label for="user_image">Replace Avatar (Optional)</label>
                            @if($review->user_image)
                                <div class="mb-2">
                                    <img src="{{ Storage::url($review->user_image) }}" class="rounded-circle" style="height: 40px; width: 40px; object-fit: cover;">
                                </div>
                            @endif
                            <div class="custom-file">
                                <input type="file" name="user_image" class="custom-file-input @error('user_image') is-invalid @enderror" id="user_image" accept="image/*">
                                <label class="custom-file-label" for="user_image">Choose new image...</label>
                            </div>
                            @error('user_image') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="form-group mb-0">
                        <label for="content">Review Content <span class="text-danger">*</span></label>
                        <textarea name="content" id="content" rows="4" class="form-control @error('content') is-invalid @enderror" required>{{ old('content', $review->content) }}</textarea>
                        @error('content') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="card-footer bg-light text-right">
                    <button type="submit" class="btn btn-primary px-4">Update Review</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $('.custom-file-input').on('change', function() {
        var fileName = $(this).val().split('\\').pop();
        $(this).siblings('.custom-file-label').addClass("selected").html(fileName ? fileName : 'Choose new image...');
    });
</script>
@endpush
