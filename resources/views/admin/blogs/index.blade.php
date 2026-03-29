@extends('admin.layouts.app')

@section('title', 'Manage Blogs')

@section('header-actions')
    <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
        <i class="fas fa-edit mr-1"></i> Write New Post
    </a>
@endsection

@section('content')
<div class="card">
    <div class="card-header border-0 pb-0">
        <h3 class="card-title">All Blog Posts</h3>
    </div>
    <div class="card-body p-0 mt-3">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th style="width: 50px;">Image</th>
                        <th>Title / Slug</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Publish Date</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($blogs as $blog)
                    <tr>
                        <td>
                            @if($blog->image)
                                <img src="{{ Storage::url($blog->image) }}" class="rounded shadow-sm" style="width: 50px; height: 50px; object-fit: cover;">
                            @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center text-muted" style="width: 50px; height: 50px;">
                                    <i class="fas fa-image"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <strong class="d-block">{{ $blog->title }}</strong>
                            <small class="text-muted"><a href="#" target="_blank" class="text-info">{{ $blog->slug }}</a></small>
                        </td>
                        <td>
                            <span class="badge badge-light border">{{ $blog->category->name ?? 'Uncategorized' }}</span>
                        </td>
                        <td>
                            @if($blog->status)
                                <span class="badge badge-success">Published</span>
                            @else
                                <span class="badge badge-warning text-dark">Draft</span>
                            @endif
                        </td>
                        <td>
                            @if($blog->published_at)
                                {{ $blog->published_at->format('M d, Y') }}
                            @else
                                <span class="text-muted">Not Set</span>
                            @endif
                        </td>
                        <td class="text-right">
                            <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-sm btn-light border mr-1" title="Edit">
                                <i class="fas fa-edit text-muted"></i>
                            </a>
                            <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this blog post permanently?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger border-0" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <i class="fas fa-newspaper fa-3x mb-3 text-light"></i>
                            <h5>No Blogs Found</h5>
                            <p>Get started by writing your first blog post.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
