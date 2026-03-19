@extends('admin.layouts.app')

@section('title', 'Edit Role: ' . $role->name)

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Role Details</h3>
            </div>
            
            <form action="{{ route('admin.roles.update', $role) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Role Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $role->name) }}" required>
                        @error('name') <span class="error invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group pt-3 border-top">
                        <label>Toggle Permissions</label>
                        <p class="text-muted small mb-3">Modify capabilities assigned to this role.</p>
                        <div class="row">
                            @foreach($permissions as $permission)
                                <div class="col-sm-6 mb-2">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="permission_{{ $permission->id }}" name="permissions[]" value="{{ $permission->name }}" {{ in_array($permission->name, old('permissions', $rolePermissions)) ? 'checked' : '' }}>
                                        <label for="permission_{{ $permission->id }}" class="custom-control-label">{{ ucfirst($permission->name) }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">Update Role</button>
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-default float-right">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
