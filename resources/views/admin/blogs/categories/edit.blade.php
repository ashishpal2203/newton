@extends('admin.layouts.app')

@section('title', 'Edit Blog Category')

@section('header-actions')
    <a href="{{ route('admin.blog-categories.index') }}" class="btn btn-light border">
        <i class="fas fa-arrow-left mr-1"></i> Back to Categories
    </a>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card">
            <form action="{{ route('admin.blog-categories.update', $blogCategory->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group mb-4">
                        <label for="name">Category Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $blogCategory->name) }}" required>
                        @error('name') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group mb-0">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" id="status" name="status" value="1" {{ $blogCategory->status ? 'checked' : '' }}>
                            <label class="custom-control-label" for="status">Active / Visible</label>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light text-right">
                    <button type="submit" class="btn btn-primary px-4">Update Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
