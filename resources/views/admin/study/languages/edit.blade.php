@extends('admin.layouts.app')

@section('title', 'Edit Language')

@section('header-actions')
    <a href="{{ route('admin.study-languages.index', ['class_id' => $studyLanguage->study_class_id]) }}" class="btn btn-light border">
        <i class="fas fa-arrow-left mr-1"></i> Back to Languages
    </a>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card">
            <form action="{{ route('admin.study-languages.update', $studyLanguage->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group mb-4">
                        <label for="name">Language Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $studyLanguage->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-0">
                        <label for="icon">Replace Icon Image (Optional)</label>
                        @if($studyLanguage->icon)
                            <div class="mb-2">
                                <img src="{{ Storage::url($studyLanguage->icon) }}" class="img-thumbnail" style="height: 60px;">
                            </div>
                        @endif
                        <div class="custom-file">
                            <input type="file" name="icon" class="custom-file-input @error('icon') is-invalid @enderror" id="icon" accept="image/*">
                            <label class="custom-file-label" for="icon">Choose replacement...</label>
                        </div>
                        @error('icon')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
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
