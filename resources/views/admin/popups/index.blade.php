@extends('admin.layouts.app')

@section('title', 'Manage Announcement Popups')

@section('header-actions')
    <a href="{{ route('admin.popups.create') }}" class="btn btn-primary">
        <i class="fas fa-plus-circle mr-1"></i> Add New Popup
    </a>
@endsection

@section('content')
<div class="card">
    <div class="card-header border-0 pb-0">
        <h3 class="card-title">Popups List</h3>
        <p class="text-muted text-sm mb-0">Manage the popups that appear to users. Note: Enabling one popup will automatically disable all others.</p>
    </div>
    <div class="card-body p-0 mt-3">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th style="width: 150px;">Banner</th>
                        <th>Title & Target</th>
                        <th>Trigger Settings</th>
                        <th>Status</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($popups as $popup)
                    <tr>
                        <td>
                            <img src="{{ Storage::url($popup->image_path) }}" alt="Banner" class="rounded shadow-sm" style="height: 60px; width: 120px; object-fit: cover;">
                        </td>
                        <td>
                            <strong>{{ $popup->title }}</strong>
                            @if($popup->redirect_url)
                                <div class="text-xs text-muted mt-1">
                                    <a href="{{ $popup->redirect_url }}" target="_blank" class="text-primary">
                                        <i class="fas fa-external-link-alt mr-1"></i>{{ Str::limit($popup->redirect_url, 50) }}
                                    </a>
                                </div>
                            @endif
                        </td>
                        <td>
                            <span class="badge badge-info text-capitalize">{{ $popup->trigger_type }}</span>
                            <span class="text-muted small ml-1">
                                @if($popup->trigger_type == 'delay')
                                    ({{ $popup->trigger_value }} seconds)
                                @else
                                    ({{ $popup->trigger_value }} pixels scroll)
                                @endif
                            </span>
                        </td>
                        <td>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input toggle-status" id="statusSwitch{{ $popup->id }}" data-id="{{ $popup->id }}" {{ $popup->is_active ? 'checked' : '' }}>
                                <label class="custom-control-label" for="statusSwitch{{ $popup->id }}"></label>
                            </div>
                        </td>
                        <td class="text-right">
                            <a href="{{ route('admin.popups.edit', $popup->id) }}" class="btn btn-sm btn-light border" title="Edit">
                                <i class="fas fa-edit text-muted"></i>
                            </a>
                            <form action="{{ route('admin.popups.destroy', $popup->id) }}" method="POST" class="d-inline-block delete-form" onsubmit="return confirm('Are you sure you want to delete this popup?');">
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
                            <i class="fas fa-bullhorn fa-3x mb-3 text-light"></i>
                            <h5>No popups created yet</h5>
                            <p>Launch your first scholarship or announcement popup now.</p>
                            <a href="{{ route('admin.popups.create') }}" class="btn btn-sm btn-primary mt-2">Add New Popup</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $('.toggle-status').on('change', function() {
        var id = $(this).data('id');
        var checkbox = $(this);
        
        $.ajax({
            url: "{{ url('admin/popups') }}/" + id + "/toggle-status",
            type: 'POST',
            data: { _token: "{{ csrf_token() }}" },
            success: function(response) {
                if(response.success) {
                    // Update all other checkboxes in the table to unchecked
                    if(response.status) {
                        $('.toggle-status').not(checkbox).prop('checked', false);
                    }
                }
            }
        });
    });
</script>
@endpush
