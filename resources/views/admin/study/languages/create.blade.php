@extends('admin.layouts.app')

@section('title', 'Add Language to ' . $studyClass->name)

@section('header-actions')
    <a href="{{ route('admin.study-languages.index', ['class_id' => $studyClass->id]) }}" class="btn btn-light border">
        <i class="fas fa-arrow-left mr-1"></i> Back to Languages
    </a>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card">
            <form action="{{ route('admin.study-languages.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="study_class_id" value="{{ $studyClass->id }}">
                
                <div class="card-body">
                    <div class="form-group mb-4">
                        <label for="name">Language Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required placeholder="e.g. English">
                        @error('name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-0">
                        <label for="icon">Language Icon Image (Optional)</label>
                        <div class="custom-file">
                            <input type="file" name="icon" class="custom-file-input @error('icon') is-invalid @enderror" id="icon" accept="image/*">
                            <label class="custom-file-label" for="icon">Choose file...</label>
                        </div>
                        @error('icon')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer bg-light text-right">
                    <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save mr-2"></i> Save Language</button>
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
