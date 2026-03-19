@extends('admin.layouts.app')

@section('title', 'Manage Pages')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Dynamic Pages</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.pages.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Add Page
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>URL Slug</th>
                            <th>Status</th>
                            <th>Last Updated</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pages as $page)
                        <tr>
                            <td><strong>{{ $page->title }}</strong></td>
                            <td class="text-muted">/{{ $page->slug }}</td>
                            <td>
                                @if($page->is_published)
                                    <span class="badge badge-success">Published</span>
                                @else
                                    <span class="badge badge-secondary">Draft</span>
                                @endif
                            </td>
                            <td>{{ $page->updated_at->format('M d, Y') }}</td>
                            <td class="text-right">
                                <a href="{{ url($page->slug) }}" target="_blank" class="btn btn-sm btn-default" title="View Page">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-sm btn-info" title="Edit Page">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this page permanently?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete Page">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">No pages found. Create one to get started!</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                {{ $pages->links('pagination::bootstrap-4') }}
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection
