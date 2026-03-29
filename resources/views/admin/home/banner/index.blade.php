@extends('admin.layouts.app')

@section('title', 'Manage Banner Sliders')

@section('header-actions')
    <a href="{{ route('admin.home.sections.banner.create') }}" class="btn btn-primary">
        <i class="fas fa-plus-circle mr-1"></i> Add New Banners
    </a>
@endsection

@section('content')
<div class="card">
    <div class="card-header border-0 pb-0">
        <h3 class="card-title">Banner List</h3>
        <p class="text-muted text-sm mb-0">Drag and drop rows to reorder banners on the front end.</p>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="bannersTable">
                <thead>
                    <tr>
                        <th style="width: 40px;">#</th>
                        <th>Preview</th>
                        <th>Details</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody id="sortableBanners">
                    @forelse($banners as $banner)
                    <tr data-id="{{ $banner->id }}">
                        <td class="text-muted"><i class="fas fa-grip-vertical handle" style="cursor: grab;"></i></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="mr-3 text-center">
                                    <span class="d-block text-xs text-muted mb-1">Desktop</span>
                                    <img src="{{ Storage::url($banner->desktop_image) }}" alt="Desktop" class="rounded" style="height: 50px; object-fit: cover;">
                                </div>
                                <div class="text-center">
                                    <span class="d-block text-xs text-muted mb-1">Mobile</span>
                                    @if($banner->mobile_image)
                                        <img src="{{ Storage::url($banner->mobile_image) }}" alt="Mobile" class="rounded" style="height: 50px; width: 30px; object-fit: cover;">
                                    @else
                                        <span class="badge badge-light">N/A</span>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td>
                            <strong>{{ $banner->title ?? 'No Title' }}</strong>
                            @if($banner->link)
                                <a href="{{ $banner->link }}" target="_blank" class="d-block text-sm text-primary"><i class="fas fa-link mr-1"></i>Link</a>
                            @endif
                            <div class="text-xs text-muted mt-1">Added: {{ $banner->created_at->format('M d, Y') }}</div>
                        </td>
                        <td><span class="badge badge-secondary sort-indicator">{{ $banner->sort_order }}</span></td>
                        <td>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input toggle-status" id="statusSwitch{{ $banner->id }}" data-id="{{ $banner->id }}" {{ $banner->status ? 'checked' : '' }}>
                                <label class="custom-control-label" for="statusSwitch{{ $banner->id }}"></label>
                            </div>
                        </td>
                        <td class="text-right">
                            <a href="{{ route('admin.home.sections.banner.edit', $banner->id) }}" class="btn btn-sm btn-light border" title="Edit">
                                <i class="fas fa-edit text-muted"></i>
                            </a>
                            <form action="{{ route('admin.home.sections.banner.destroy', $banner->id) }}" method="POST" class="d-inline-block delete-form" onsubmit="return confirm('Are you sure you want to delete this banner?');">
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
                            <i class="fas fa-images fa-3x mb-3 text-light"></i>
                            <h5>No banners found</h5>
                            <p>Upload your first banner to get started.</p>
                            <a href="{{ route('admin.home.sections.banner.create') }}" class="btn btn-sm btn-primary mt-2">Upload Banners</a>
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
            url: "{{ url('admin/home-sections/banner') }}/" + id + "/toggle-status",
            type: 'POST',
            data: { _token: "{{ csrf_token() }}" },
            success: function(response) {
                // Toast notification or silent success
            }
        });
    });

    // Drag and Drop Sort
    var el = document.getElementById('sortableBanners');
    if (el) {
        var sortable = Sortable.create(el, {
            handle: '.handle',
            animation: 150,
            onEnd: function () {
                var order = [];
                $('#sortableBanners tr').each(function(index, element) {
                    order.push($(this).data('id'));
                    $(this).find('.sort-indicator').text(index); // Update local visual immediately
                });

                $.ajax({
                    url: "{{ route('admin.home.sections.banner.reorder') }}",
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
