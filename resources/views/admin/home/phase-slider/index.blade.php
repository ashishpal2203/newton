@extends('admin.layouts.app')

@section('title', 'Manage Phase Sliders')

@section('header-actions')
    <a href="{{ route('admin.home.sections.phase-slider.create') }}" class="btn btn-primary">
        <i class="fas fa-plus-circle mr-1"></i> Add New Slide
    </a>
@endsection

@section('content')
<div class="card">
    <div class="card-header border-0 pb-0">
        <h3 class="card-title">Phase Slider List</h3>
        <p class="text-muted text-sm mb-0">Reorder slides or toggle visibility on the homepage.</p>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th style="width: 40px;">#</th>
                        <th>Details</th>
                        <th>Mentors</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody id="sortableSlides">
                    @forelse($slides as $slide)
                    <tr data-id="{{ $slide->id }}">
                        <td class="text-muted"><i class="fas fa-grip-vertical handle" style="cursor: grab;"></i></td>
                        <td>
                            <strong>{{ $slide->title }}</strong>
                            @if($slide->badge)
                                <div class="text-xs mt-1 text-primary"><span class="badge badge-info">{{ $slide->badge }}</span></div>
                            @endif
                            <div class="text-xs text-muted mt-1">{{ Str::limit($slide->description, 50) }}</div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                @foreach($slide->mentors as $mentor)
                                    <div class="mr-2 text-center" title="{{ $mentor->name }}">
                                        <img src="{{ Storage::url($mentor->image) }}" class="rounded-circle border" style="width: 32px; height: 32px; object-fit: cover;">
                                    </div>
                                @endforeach
                            </div>
                        </td>
                        <td><span class="badge badge-secondary sort-indicator">{{ $slide->sort_order }}</span></td>
                        <td>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input toggle-status" id="statusSwitch{{ $slide->id }}" data-id="{{ $slide->id }}" {{ $slide->status ? 'checked' : '' }}>
                                <label class="custom-control-label" for="statusSwitch{{ $slide->id }}"></label>
                            </div>
                        </td>
                        <td class="text-right">
                            <a href="{{ route('admin.home.sections.phase-slider.edit', $slide->id) }}" class="btn btn-sm btn-light border" title="Edit">
                                <i class="fas fa-edit text-muted"></i>
                            </a>
                            <form action="{{ route('admin.home.sections.phase-slider.destroy', $slide->id) }}" method="POST" class="d-inline-block delete-form" onsubmit="return confirm('Are you sure you want to delete this slide?');">
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
                            <i class="fas fa-layer-group fa-3x mb-3 text-light"></i>
                            <h5>No slides found</h5>
                            <p>Create your first phase slider to show on homepage.</p>
                            <a href="{{ route('admin.home.sections.phase-slider.create') }}" class="btn btn-sm btn-primary mt-2">Create New Slide</a>
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
            url: "{{ url('admin/home-sections/phase-slider') }}/" + id + "/toggle-status",
            type: 'POST',
            data: { _token: "{{ csrf_token() }}" },
            success: function(response) {
                // Done
            }
        });
    });

    // Drag and Drop Sort
    var el = document.getElementById('sortableSlides');
    if (el) {
        var sortable = Sortable.create(el, {
            handle: '.handle',
            animation: 150,
            onEnd: function () {
                var order = [];
                $('#sortableSlides tr').each(function(index, element) {
                    order.push($(this).data('id'));
                    $(this).find('.sort-indicator').text(index); 
                });

                $.ajax({
                    url: "{{ route('admin.home.sections.phase-slider.reorder') }}",
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        order: order
                    },
                    success: function() {
                    }
                });
            }
        });
    }
</script>
@endpush
