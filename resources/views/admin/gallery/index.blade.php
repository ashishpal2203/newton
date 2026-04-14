@extends('admin.layouts.app')

@section('title', 'Manage Gallery')

@section('header-actions')
    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
        <i class="fas fa-upload mr-1"></i> Upload Photos
    </a>
@endsection

@section('content')
<div class="card">
    <div class="card-header border-0">
        <h3 class="card-title">Gallery Photos</h3>
    </div>
    <div class="card-body">
        <div class="row">
            @forelse($photos as $photo)
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="card h-100 shadow-sm border-0 overflow-hidden" style="border-radius: 12px;">
                        <img src="{{ Storage::url($photo->image_path) }}" class="card-img-top" style="height: 180px; object-fit: cover;">
                        <div class="card-body p-3">
                            <p class="text-truncate mb-1 font-weight-bold" title="{{ $photo->title ?? 'Untitled' }}">
                                {{ $photo->title ?? 'Untitled' }}
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge badge-{{ $photo->status ? 'success' : 'danger' }}">
                                    {{ $photo->status ? 'Active' : 'Inactive' }}
                                </span>
                                <small class="text-muted">Order: {{ $photo->sort_order }}</small>
                            </div>
                        </div>
                        <div class="card-footer bg-white p-2 d-flex justify-content-around">
                            <a href="{{ route('admin.gallery.edit', $photo->id) }}" class="btn btn-sm btn-light border text-primary" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.gallery.destroy', $photo->id) }}" method="POST" onsubmit="return confirm('Remove this photo?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-light border text-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="fas fa-images fa-4x text-light mb-3"></i>
                    <h5 class="text-muted">No photos in gallery yet.</h5>
                    <p class="text-muted">Upload some photos to get started.</p>
                </div>
            @endforelse
        </div>
        
        <div class="d-flex justify-content-center mt-4">
            {{ $photos->links() }}
        </div>
    </div>
</div>
@endsection
