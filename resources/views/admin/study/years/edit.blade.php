@extends('admin.layouts.app')

@section('title', 'Edit Year')

@section('header-actions')
    <a href="{{ route('admin.study-years.index', ['class_id' => $studyYear->study_class_id]) }}" class="btn btn-light border">
        <i class="fas fa-arrow-left mr-1"></i> Back to Years
    </a>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card">
            <form action="{{ route('admin.study-years.update', $studyYear->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group mb-0">
                        <label for="year">Year Name <span class="text-danger">*</span></label>
                        <input type="text" name="year" id="year" class="form-control @error('year') is-invalid @enderror" value="{{ old('year', $studyYear->year) }}" required>
                        @error('year')
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
