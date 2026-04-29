@extends('admin.layouts.app')

@section('title', 'Create Phase Slide')

@section('header-actions')
    <a href="{{ route('admin.home.sections.phase-slider.index') }}" class="btn btn-light border">
        <i class="fas fa-arrow-left mr-1"></i> Back to List
    </a>
@endsection

@section('content')
<form action="{{ route('admin.home.sections.phase-slider.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header bg-white">
                    <h3 class="card-title">Slide Information</h3>
                </div>
                <div class="card-body">
                    <div class="form-group mb-4">
                        <label for="title">Title (For admin reference) <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Enter title" required>
                        @error('title')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="link_url">Redirect Link URL (Optional)</label>
                        <input type="url" name="link_url" id="link_url" class="form-control @error('link_url') is-invalid @enderror" value="{{ old('link_url') }}" placeholder="https://...">
                        @error('link_url')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="image">Banner Image <span class="text-danger">*</span></label>
                        <div class="custom-file">
                            <input type="file" name="image" id="image" class="custom-file-input @error('image') is-invalid @enderror" required accept="image/*">
                            <label class="custom-file-label" for="image">Choose Image</label>
                        </div>
                        <small class="form-text text-muted">Recommended format: JPG, PNG, WEBP.</small>
                        @error('image')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer text-right bg-white border-top-0">
                    <button type="submit" class="btn btn-primary px-5 btn-lg shadow">Save Slide</button>
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
            $(this).siblings('.custom-file-label').addClass("selected").html(fileName ? fileName : 'Choose Image');
        });
    });
</script>
@endpush
