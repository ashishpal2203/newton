@extends('admin.layouts.app')

@section('title', 'Upload Papers to ' . $studyYear->year)

@section('header-actions')
    <a href="{{ route('admin.study-papers.index', ['year_id' => $studyYear->id]) }}" class="btn btn-light border">
        <i class="fas fa-arrow-left mr-1"></i> Back to Papers
    </a>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card">
            <form action="{{ route('admin.study-papers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="study_year_id" value="{{ $studyYear->id }}">
                
                <div class="card-body">
                    <div class="alert alert-info py-2 text-sm bg-light text-info border-info mb-4">
                        <i class="fas fa-info-circle mr-2"></i> You can upload multiple PDFs at once.
                    </div>

                    <div class="form-group mb-4">
                        <label for="files">Upload PDF Documents <span class="text-danger">*</span></label>
                        <div class="custom-file">
                            <input type="file" name="files[]" class="custom-file-input @error('files') is-invalid @enderror @error('files.*') is-invalid @enderror" id="files" accept="application/pdf" multiple required>
                            <label class="custom-file-label" for="files">Choose PDF(s)...</label>
                        </div>
                        @error('files') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        @error('files.*') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>

                    <hr>
                    <p class="text-sm text-muted mb-3"><i class="fas fa-magic mr-1"></i> If you leave the title blank, the original filename of the PDF will be used.</p>

                    <div class="form-group mb-0">
                        <label for="title">Title / Name (Optional)</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="e.g. Maths Semester 1 Question Paper">
                        @error('title')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer bg-light text-right">
                    <button type="submit" class="btn btn-primary px-4"><i class="fas fa-upload mr-2"></i> Upload PDFs</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $('.custom-file-input').on('change', function() {
        var files = Array.from(this.files);
        var label = $(this).next('.custom-file-label');
        if (files.length > 1) {
            label.html(files.length + ' files selected');
        } else if (files.length == 1) {
            label.html(files[0].name);
        } else {
            label.html('Choose PDF(s)...');
        }
    });
</script>
@endpush
