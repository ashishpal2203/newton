@extends('admin.layouts.app')

@section('title', 'Add Year to ' . $studyLanguage->name)

@section('header-actions')
    <a href="{{ route('admin.study-years.index', ['language_id' => $studyLanguage->id]) }}" class="btn btn-light border">
        <i class="fas fa-arrow-left mr-1"></i> Back to Years
    </a>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card">
            <form action="{{ route('admin.study-years.store') }}" method="POST">
                @csrf
                <input type="hidden" name="study_language_id" value="{{ $studyLanguage->id }}">
                
                <div class="card-body">
                    <div class="form-group mb-0">
                        <label for="year">Year Name <span class="text-danger">*</span></label>
                        <input type="text" name="year" id="year" class="form-control @error('year') is-invalid @enderror" value="{{ old('year') }}" required placeholder="e.g. 2025 or 2024-25">
                        @error('year')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer bg-light text-right">
                    <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save mr-2"></i> Save Year</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
