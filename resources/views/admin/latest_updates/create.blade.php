@extends('admin.layouts.app')

@section('title', 'Add New Latest Update')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-header bg-white py-3">
                <h3 class="card-title font-weight-bold">Update Details</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.latest-updates.index') }}" class="btn btn-sm btn-light border">
                        <i class="fas fa-arrow-left mr-1"></i> Back to List
                    </a>
                </div>
            </div>
            <form action="{{ route('admin.latest-updates.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="e.g. How to revise Physics in 30 Days?" required>
                        @error('title')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category">Category <span class="text-muted">(Optional)</span></label>
                                <input type="text" name="category" id="category" class="form-control" value="{{ old('category') }}" placeholder="e.g. EXAM TIPS">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="published_date">Display Date <span class="text-muted">(Optional)</span></label>
                                <input type="text" name="published_date" id="published_date" class="form-control" value="{{ old('published_date') }}" placeholder="e.g. 12 Dec 2024">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="read_time">Reading Time <span class="text-muted">(Optional)</span></label>
                                <input type="text" name="read_time" id="read_time" class="form-control" value="{{ old('read_time') }}" placeholder="e.g. 5 min read">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="link">Link/URL <span class="text-muted">(Optional)</span></label>
                                <input type="text" name="link" id="link" class="form-control" value="{{ old('link') }}" placeholder="https://...">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image">Thumbnail Image</label>
                        <div class="custom-file">
                            <input type="file" name="image" id="image" class="custom-file-input @error('image') is-invalid @enderror">
                            <label class="custom-file-label" for="image">Choose image...</label>
                        </div>
                        <small class="text-muted">Recommended size: 600x400px. Max 2MB.</small>
                        @error('image')<span class="invalid-feedback d-block">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="card-footer bg-white text-right">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save mr-1"></i> Save Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Show filename in custom-file-input
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>
@endpush
