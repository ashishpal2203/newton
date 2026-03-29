@extends('admin.layouts.app')

@section('title', 'Manage Reviews')

@section('header-actions')
    <a href="{{ route('admin.reviews.create') }}" class="btn btn-primary">
        <i class="fas fa-plus-circle mr-1"></i> Add New Review
    </a>
@endsection

@section('content')
<div class="card">
    <div class="card-header border-0 pb-0">
        <h3 class="card-title">Customer Reviews & Success Stories</h3>
        <p class="text-muted text-sm d-block mt-2 mb-0">Drag and drop the <i class="fas fa-grip-vertical mx-1"></i> handles to reorder how they appear on the homepage.</p>
    </div>
    <div class="card-body p-0 mt-3">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="reviewsTable">
                <thead>
                    <tr>
                        <th style="width: 40px;"></th>
                        <th>User</th>
                        <th>Rating</th>
                        <th>Content Overview</th>
                        <th>Status</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody id="sortable-reviews">
                    @forelse($reviews as $review)
                    <tr data-id="{{ $review->id }}" class="sortable-item">
                        <td class="text-center text-muted cursor-move handle">
                            <i class="fas fa-grip-vertical"></i>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                @if($review->user_image)
                                    <img src="{{ Storage::url($review->user_image) }}" alt="Avatar" class="rounded-circle mr-3" style="width: 45px; height: 45px; object-fit: cover;">
                                @else
                                    <div class="rounded-circle mr-3 d-flex align-items-center justify-content-center bg-primary text-white font-weight-bold" style="width: 45px; height: 45px; font-size: 1.2rem;">
                                        {{ strtoupper(substr($review->user_name, 0, 1)) }}
                                    </div>
                                @endif
                                <div>
                                    <strong class="d-block">{{ $review->user_name }}</strong>
                                    <small class="text-muted">{{ $review->subtitle ?? 'No subtitle' }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="text-warning text-nowrap">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $review->rating ? '' : 'text-light' }}"></i>
                                @endfor
                            </div>
                        </td>
                        <td class="text-truncate" style="max-width: 250px;">
                            <span title="{{ $review->content }}">{{ Str::limit($review->content, 50) }}</span>
                        </td>
                        <td>
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" class="custom-control-input toggle-status" id="status_{{ $review->id }}" data-id="{{ $review->id }}" {{ $review->status ? 'checked' : '' }}>
                                <label class="custom-control-label" for="status_{{ $review->id }}"></label>
                            </div>
                        </td>
                        <td class="text-right">
                            <a href="{{ route('admin.reviews.edit', $review->id) }}" class="btn btn-sm btn-light border" title="Edit">
                                <i class="fas fa-edit text-muted"></i>
                            </a>
                            <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this review?');">
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
                            <i class="fas fa-comments fa-3x mb-3 text-light"></i>
                            <h5>No Reviews Found</h5>
                            <p>Get started by adding a review or waiting for user submissions.</p>
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
        let reviewId = $(this).data('id');
        let status = $(this).is(':checked') ? 1 : 0;
        
        $.ajax({
            url: `/admin/reviews/${reviewId}/toggle-status`,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
            },
            success: function(response) {
                // Optional toast notification
            },
            error: function() {
                alert('An error occurred while updating status.');
            }
        });
    });

    // Reorder capability using SortableJS
    var el = document.getElementById('sortable-reviews');
    if (el && el.children.length > 0 && !el.querySelector('td[colspan]')) {
        var sortable = Sortable.create(el, {
            handle: '.handle',
            animation: 150,
            onEnd: function () {
                var order = [];
                $('.sortable-item').each(function() {
                    order.push($(this).data('id'));
                });
                
                $.ajax({
                    url: '{{ route("admin.reviews.reorder") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        order: order
                    },
                    success: function() {
                        // Order saved
                    }
                });
            }
        });
    }
</script>

<style>
    .cursor-move { cursor: move; }
    .sortable-ghost { opacity: 0.4; }
</style>
@endpush
