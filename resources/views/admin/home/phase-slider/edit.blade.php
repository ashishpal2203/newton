@extends('admin.layouts.app')

@section('title', 'Edit Phase Slide')

@section('header-actions')
    <a href="{{ route('admin.home.sections.phase-slider.index') }}" class="btn btn-light border">
        <i class="fas fa-arrow-left mr-1"></i> Back to List
    </a>
@endsection

@section('content')
<form action="{{ route('admin.home.sections.phase-slider.update', $phaseSlider->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header bg-white">
                    <h3 class="card-title">Slide Information</h3>
                </div>
                <div class="card-body">
                    <div class="form-group mb-4">
                        <label for="title">Title (For admin reference) <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $phaseSlider->title) }}" placeholder="Enter title" required>
                        @error('title')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="link_url">Redirect Link URL (Optional)</label>
                        <input type="url" name="link_url" id="link_url" class="form-control @error('link_url') is-invalid @enderror" value="{{ old('link_url', $phaseSlider->link_url) }}" placeholder="https://...">
                        @error('link_url')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label>Current Banner Image</label>
                        @if($phaseSlider->image)
                            <div class="mb-3">
                                <img src="{{ Storage::url($phaseSlider->image) }}" alt="Current Image" class="img-fluid rounded" style="max-height: 200px;">
                            </div>
                        @else
                            <p class="text-muted">No image uploaded.</p>
                        @endif

                        <label for="image">Replace Banner Image (Optional)</label>
                        <div class="custom-file">
                            <input type="file" name="image" id="image" class="custom-file-input @error('image') is-invalid @enderror" accept="image/*">
                            <label class="custom-file-label" for="image">Choose new image</label>
                        </div>
                        <small class="form-text text-muted">Recommended format: JPG, PNG, WEBP. Leave blank to keep current image.</small>
                        @error('image')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer text-right bg-white border-top-0">
                    <button type="submit" class="btn btn-primary px-5 btn-lg shadow">Update Slide</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script>
    $(function() {
        // File input filename
        $(document).on('change', '.custom-file-input', function() {
            var fileName = $(this).val().split('\\').pop();
            $(this).siblings('.custom-file-label').addClass("selected").html(fileName ? fileName : 'Choose new image');
        });
    });
</script>
@endpush
