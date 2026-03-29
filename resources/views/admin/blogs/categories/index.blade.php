@extends('admin.layouts.app')

@section('title', 'Blog Categories')

@section('header-actions')
    <a href="{{ route('admin.blog-categories.create') }}" class="btn btn-primary">
        <i class="fas fa-plus-circle mr-1"></i> Add Category
    </a>
@endsection

@section('content')
<div class="card">
    <div class="card-header border-0 pb-0">
        <h3 class="card-title">Manage Categories</h3>
    </div>
    <div class="card-body p-0 mt-3">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Slug</th>
                        <th>Usage</th>
                        <th>Status</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                    <tr>
                        <td><strong>{{ $category->name }}</strong></td>
                        <td><span class="text-muted">{{ $category->slug }}</span></td>
                        <td><span class="badge badge-info">{{ $category->blogs_count }} Blogs</span></td>
                        <td>
                            @if($category->status)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-secondary">Inactive</span>
                            @endif
                        </td>
                        <td class="text-right">
                            <a href="{{ route('admin.blog-categories.edit', $category->id) }}" class="btn btn-sm btn-light border" title="Edit">
                                <i class="fas fa-edit text-muted"></i>
                            </a>
                            <form action="{{ route('admin.blog-categories.destroy', $category->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this category?');">
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
                        <td colspan="5" class="text-center py-5 text-muted">
                            <i class="fas fa-tags fa-3x mb-3 text-light"></i>
                            <h5>No Categories Found</h5>
                            <p>Get started by adding a blog category.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
