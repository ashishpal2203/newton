@extends('admin.layouts.app')

@section('title', 'Edit Paper Details')

@section('header-actions')
    <a href="{{ route('admin.study-papers.index', ['year_id' => $studyPaper->study_year_id]) }}" class="btn btn-light border">
        <i class="fas fa-arrow-left mr-1"></i> Back to Papers
    </a>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card">
            <form action="{{ route('admin.study-papers.update', $studyPaper->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group mb-4">
                        <label for="title">Paper Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $studyPaper->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-0">
                        <label for="file">Replace PDF Document (Optional)</label>
                        <div class="mb-2">
                            <span class="badge badge-info py-1 px-2"><i class="fas fa-file-pdf mr-1"></i> Current File Active</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="file" class="custom-file-input @error('file') is-invalid @enderror" id="file" accept="application/pdf">
                            <label class="custom-file-label" for="file">Choose replacement PDF...</label>
                        </div>
                        <small class="form-text text-muted">Only upload if you want to replace the current paper.</small>
                        @error('file')
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
        $(this).siblings('.custom-file-label').addClass("selected").html(fileName ? fileName : 'Choose replacement PDF...');
    });
</script>
@endpush
