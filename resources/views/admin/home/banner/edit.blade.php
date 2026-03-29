@extends('admin.layouts.app')

@section('title', 'Edit Banner')

@section('header-actions')
    <a href="{{ route('admin.home.sections.banner.index') }}" class="btn btn-light border">
        <i class="fas fa-arrow-left mr-1"></i> Cancel
    </a>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            
            <form action="{{ route('admin.home.sections.banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    
                    <div class="form-group">
                        <label for="title">Title / Name (Optional)</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $banner->title) }}">
                        @error('title')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="link">CTA Link URL (Optional)</label>
                        <input type="url" name="link" id="link" class="form-control @error('link') is-invalid @enderror" value="{{ old('link', $banner->link) }}">
                        @error('link')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Replace Desktop Image</label>
                                <div class="mb-2">
                                    <img src="{{ Storage::url($banner->desktop_image) }}" class="img-fluid rounded border shadow-sm" style="max-height:120px; object-fit:cover;">
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="desktop_image" class="custom-file-input @error('desktop_image') is-invalid @enderror" id="desktop_image" accept="image/*">
                                    <label class="custom-file-label" for="desktop_image">Choose replacement...</label>
                                </div>
                                @error('desktop_image')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Replace Mobile Image</label>
                                <div class="mb-2">
                                    @if($banner->mobile_image)
                                        <img src="{{ Storage::url($banner->mobile_image) }}" class="img-fluid rounded border shadow-sm" style="max-height:120px; object-fit:cover;">
                                    @else
                                        <div class="bg-light border rounded d-flex align-items-center justify-content-center text-muted text-sm shadow-sm" style="height: 120px; width: 80px;">None</div>
                                    @endif
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="mobile_image" class="custom-file-input @error('mobile_image') is-invalid @enderror" id="mobile_image" accept="image/*">
                                    <label class="custom-file-label" for="mobile_image">Choose replacement...</label>
                                </div>
                                @error('mobile_image')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light text-right">
                    <button type="submit" class="btn btn-primary px-4">Update Details</button>
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
        $(this).siblings('.custom-file-label').addClass("selected").html(fileName ? fileName : 'Choose replacement...');
    });
</script>
@endpush
