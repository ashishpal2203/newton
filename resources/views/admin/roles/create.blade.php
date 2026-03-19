@extends('admin.layouts.app')

@section('title', 'Add New Role')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Role Configuration</h3>
            </div>
            
            <form action="{{ route('admin.roles.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Role Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" placeholder="Enter role name" required>
                        @error('name') <span class="error invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group pb-2 border-bottom">
                        <label>Assign Permissions</label>
                        <p class="text-muted small mb-3">Check the capabilities this role should have throughout the system.</p>
                        <div class="row">
                            @foreach($permissions as $permission)
                                <div class="col-sm-6 mb-2">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="permission_{{ $permission->id }}" name="permissions[]" value="{{ $permission->name }}" {{ in_array($permission->name, old('permissions', [])) ? 'checked' : '' }}>
                                        <label for="permission_{{ $permission->id }}" class="custom-control-label">{{ ucfirst($permission->name) }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save Role</button>
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-default float-right">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
