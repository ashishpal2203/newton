@extends('admin.layouts.app')

@section('title', 'Upload Banners')

@section('header-actions')
    <a href="{{ route('admin.home.sections.banner.index') }}" class="btn btn-light border">
        <i class="fas fa-arrow-left mr-1"></i> Back to List
    </a>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header bg-white">
                <h3 class="card-title">Upload New Banners</h3>
            </div>
            
            <form action="{{ route('admin.home.sections.banner.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="alert alert-info py-2 text-sm bg-light text-info border-info mb-4">
                        <i class="fas fa-info-circle mr-2"></i> You can upload multiple banners at once by selecting multiple <b>Desktop Images</b>. If providing mobile versions, select the same number of <b>Mobile Images</b> and ensure they match the selection order.
                    </div>

                    <div class="form-group mb-4">
                        <label for="desktop_images">Desktop Images (Required) <span class="text-danger">*</span></label>
                        <div class="custom-file">
                            <input type="file" name="desktop_images[]" class="custom-file-input @error('desktop_images') is-invalid @enderror @error('desktop_images.*') is-invalid @enderror" id="desktop_images" multiple accept="image/*" required>
                            <label class="custom-file-label" for="desktop_images">Choose file(s)...</label>
                        </div>
                        <small class="form-text text-muted">Recommended aspect ratio 16:9 or similar wide banner format.</small>
                        @error('desktop_images')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                        @error('desktop_images.*')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="mobile_images">Mobile Images (Optional)</label>
                        <div class="custom-file">
                            <input type="file" name="mobile_images[]" class="custom-file-input @error('mobile_images') is-invalid @enderror @error('mobile_images.*') is-invalid @enderror" id="mobile_images" multiple accept="image/*">
                            <label class="custom-file-label" for="mobile_images">Choose file(s)...</label>
                        </div>
                        <small class="form-text text-muted">A portrait or square version of the banner for optimal mobile viewing.</small>
                        @error('mobile_images')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                        @error('mobile_images.*')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr>
                    <p class="text-sm text-muted mb-3"><i class="fas fa-magic mr-1"></i> If uploading multiple banners, the following properties will apply to the FIRST banner only, or you can edit them individually later.</p>

                    <div class="form-group">
                        <label for="title">Title / Name (Optional)</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="e.g. Winter Sale">
                        @error('title')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-0">
                        <label for="link">CTA Link URL (Optional)</label>
                        <input type="url" name="link" id="link" class="form-control @error('link') is-invalid @enderror" value="{{ old('link') }}" placeholder="https://...">
                        @error('link')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer bg-light text-right">
                    <button type="submit" class="btn btn-primary px-4"><i class="fas fa-upload mr-2"></i> Upload Banners</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Show selected filenames in custom file input labels
    $('.custom-file-input').on('change', function() {
        var files = Array.from(this.files);
        var label = $(this).next('.custom-file-label');
        if (files.length > 1) {
            label.html(files.length + ' files selected');
        } else if (files.length == 1) {
            label.html(files[0].name);
        } else {
            label.html('Choose file(s)...');
        }
    });
</script>
@endpush
