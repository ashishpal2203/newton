@extends('admin.layouts.app')

@section('title', 'Add New Class')

@section('header-actions')
    <a href="{{ route('admin.study-classes.index') }}" class="btn btn-light border">
        <i class="fas fa-arrow-left mr-1"></i> Back to List
    </a>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card">
            <form action="{{ route('admin.study-classes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group mb-4">
                        <label for="name">Class Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required placeholder="e.g. FYBCA">
                        @error('name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-0">
                        <label for="icon">Class Icon Image (Optional)</label>
                        <div class="custom-file">
                            <input type="file" name="icon" class="custom-file-input @error('icon') is-invalid @enderror" id="icon" accept="image/*">
                            <label class="custom-file-label" for="icon">Choose file...</label>
                        </div>
                        <small class="form-text text-muted">Recommended square resolution (e.g. 512x512 png or svg).</small>
                        @error('icon')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer bg-light text-right">
                    <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save mr-2"></i> Save Class</button>
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
        $(this).siblings('.custom-file-label').addClass("selected").html(fileName ? fileName : 'Choose file...');
    });
</script>
@endpush
