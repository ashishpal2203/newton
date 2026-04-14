@extends('admin.layouts.app')

@section('title', 'Edit Photo Details')

@section('header-actions')
    <a href="{{ route('admin.gallery.index') }}" class="btn btn-light border">
        <i class="fas fa-arrow-left mr-1"></i> Back to Gallery
    </a>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-10 mx-auto">
        <div class="card shadow-sm border-0" style="border-radius: 16px;">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-md-5 mb-4 mb-md-0 text-center">
                        <img src="{{ Storage::url($gallery->image_path) }}" class="img-fluid rounded shadow-sm" style="max-height: 400px; width: 100%; object-fit: contain; background: #f8f9fa;">
                    </div>
                    <div class="col-md-7">
                        <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group mb-4">
                                <label for="title">Photo Title / Caption <small class="text-muted">(Optional)</small></label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $gallery->title) }}" placeholder="e.g. Annual Sports Meet 2025">
                            </div>

                            <div class="row mb-4">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" {{ $gallery->status ? 'selected' : '' }}>Visible</option>
                                            <option value="0" {{ !$gallery->status ? 'selected' : '' }}>Hidden</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="sort_order">Sort Order</label>
                                        <input type="number" name="sort_order" id="sort_order" class="form-control" value="{{ $gallery->sort_order }}" min="0">
                                    </div>
                                </div>
                            </div>

                            <div class="border-top pt-4">
                                <button type="submit" class="btn btn-primary px-5 shadow-sm">
                                    <i class="fas fa-save mr-2"></i> Update Details
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
