@extends('admin.layouts.app')

@section('title', 'System Roles')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Roles and Permissions</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.roles.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Add Role
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>Role Name</th>
                            <th>Permissions</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td><strong>{{ $role->name }}</strong></td>
                            <td class="text-wrap">
                                @if($role->name === 'Admin')
                                    <span class="badge badge-danger">All Permissions</span>
                                @else
                                    @forelse($role->permissions as $permission)
                                        <span class="badge badge-info mb-1">{{ $permission->name }}</span>
                                    @empty
                                        <span class="text-muted font-italic">No permissions assigned</span>
                                    @endforelse
                                @endif
                            </td>
                            <td class="text-right">
                                @if($role->name !== 'Admin')
                                    <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this role? Users with this role may lose access.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                @else
                                    <span class="text-muted font-italic mr-2">Locked</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection
