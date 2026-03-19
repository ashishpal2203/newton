@extends('admin.layouts.app')

@section('title', 'Manage Courses')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header border-0 mt-3 bg-transparent">
                <h3 class="card-title font-weight-bold">Course List</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.courses.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus mr-1"></i> Add New Course
                    </a>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Color</th>
                            <th>Featured</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td>
                                @if($course->home_icon)
                                    <img src="{{ asset('storage/' . $course->home_icon) }}" width="40" class="rounded border">
                                @else
                                    <div class="icon-box icon-{{ $course->home_color }}" style="width:40px;height:40px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:14px;background:#eee;">
                                        <i class="fas fa-graduation-cap"></i>
                                    </div>
                                @endif
                            </td>
                            <td>{{ $course->title }}</td>
                            <td><code>{{ $course->slug }}</code></td>
                            <td><span class="badge badge-{{ $course->home_color }} text-capitalize px-2 py-1">{{ $course->home_color }}</span></td>
                            <td>
                                @if($course->is_featured)
                                    <span class="badge badge-success">Yes</span>
                                @else
                                    <span class="badge badge-secondary">No</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">No courses found. Create your first course to get started.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer bg-transparent">
                {{ $courses->links() }}
            </div>
        </div>
    </div>
</div>

<style>
.badge-blue { background-color: #eef4ff; color: #2563eb; }
.badge-purple { background-color: #f3f0ff; color: #6d28d9; }
.badge-yellow { background-color: #fff6e5; color: #f59e0b; }
.badge-green { background-color: #e9fbf3; color: #10b981; }
.badge-orange { background-color: #fff1e6; color: #f97316; }
</style>
@endsection
