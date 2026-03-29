@extends('admin.layouts.app')

@section('title', 'Manage Latest Updates')

@section('header-actions')
    <a href="{{ route('admin.latest-updates.create') }}" class="btn btn-primary">
        <i class="fas fa-plus-circle mr-1"></i> Add New Update
    </a>
@endsection

@section('content')
<div class="card">
    <div class="card-header border-0 pb-0">
        <h3 class="card-title">Updates List</h3>
        <p class="text-muted text-sm mb-0">Manage the news/updates shown in the "Latest Updates" section on the Home Page.</p>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="updatesTable">
                <thead>
                    <tr>
                        <th style="width: 40px;">#</th>
                        <th>Image</th>
                        <th>Details</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody id="sortableUpdates">
                    @forelse($updates as $update)
                    <tr data-id="{{ $update->id }}">
                        <td class="text-muted"><i class="fas fa-grip-vertical handle" style="cursor: grab;"></i></td>
                        <td>
                            @if($update->image)
                                <img src="{{ Storage::url($update->image) }}" alt="Thumbnail" class="rounded" style="height: 50px; width: 80px; object-fit: cover;">
                            @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 50px; width: 80px;">
                                    <i class="fas fa-image text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <strong>{{ $update->title }}</strong>
                            <div class="text-xs text-muted mt-1">
                                <span class="mr-2"><i class="far fa-calendar-alt mr-1"></i>{{ $update->published_date ?? 'No Date' }}</span>
                                <span><i class="far fa-clock mr-1"></i>{{ $update->read_time ?? 'N/A' }}</span>
                            </div>
                            @if($update->link)
                                <a href="{{ $update->link }}" target="_blank" class="d-block text-xs text-primary mt-1"><i class="fas fa-external-link-alt mr-1"></i>{{ Str::limit($update->link, 40) }}</a>
                            @endif
                        </td>
                        <td><span class="badge badge-info">{{ $update->category ?? 'General' }}</span></td>
                        <td>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input toggle-status" id="statusSwitch{{ $update->id }}" data-id="{{ $update->id }}" {{ $update->status ? 'checked' : '' }}>
                                <label class="custom-control-label" for="statusSwitch{{ $update->id }}"></label>
                            </div>
                        </td>
                        <td class="text-right">
                            <a href="{{ route('admin.latest-updates.edit', $update->id) }}" class="btn btn-sm btn-light border" title="Edit">
                                <i class="fas fa-edit text-muted"></i>
                            </a>
                            <form action="{{ route('admin.latest-updates.destroy', $update->id) }}" method="POST" class="d-inline-block delete-form" onsubmit="return confirm('Are you sure you want to delete this update?');">
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
                            <i class="fas fa-bullhorn fa-3x mb-3 text-light"></i>
                            <h5>No updates found</h5>
                            <p>Create your first update to show it on the home page.</p>
                            <a href="{{ route('admin.latest-updates.create') }}" class="btn btn-sm btn-primary mt-2">Add New Update</a>
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
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script>
    // Status Toggle
    $('.toggle-status').on('change', function() {
        var id = $(this).data('id');
        $.ajax({
            url: "{{ url('admin/latest-updates') }}/" + id + "/toggle-status",
            type: 'POST',
            data: { _token: "{{ csrf_token() }}" },
            success: function(response) {
                // Success
            }
        });
    });

    // Drag and Drop Sort
    var el = document.getElementById('sortableUpdates');
    if (el) {
        var sortable = Sortable.create(el, {
            handle: '.handle',
            animation: 150,
            onEnd: function () {
                var order = [];
                $('#sortableUpdates tr').each(function() {
                    order.push($(this).data('id'));
                });

                $.ajax({
                    url: "{{ route('admin.latest-updates.reorder') }}",
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        order: order
                    },
                    success: function() {
                        // Sorted successfully
                    }
                });
            }
        });
    }
</script>
@endpush
