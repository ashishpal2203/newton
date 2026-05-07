@extends('admin.layouts.app')

@section('title', 'Study Material Leads')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3">
                <h3 class="card-title fw-bold text-dark"><i class="fas fa-file-download mr-2 text-primary"></i> Study Material Leads</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="border-top-0 px-4">Name</th>
                                <th class="border-top-0">Contact Info</th>
                                <th class="border-top-0">Class & Stream</th>
                                <th class="border-top-0">Downloaded At</th>
                                <th class="border-top-0 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($leads as $lead)
                            <tr>
                                <td class="px-4">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm mr-3 bg-soft-primary text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                            {{ strtoupper(substr($lead->name, 0, 1)) }}
                                        </div>
                                        <span>{{ $lead->name }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="small">
                                        <i class="fas fa-phone-alt text-muted mr-1"></i> {{ $lead->mobile }}<br>
                                        <i class="fas fa-envelope text-muted mr-1"></i> {{ $lead->email }}
                                    </div>
                                </td>
                                <td>
                                    <span class="badge badge-soft-info px-2 py-1">{{ $lead->class ?: 'N/A' }}</span>
                                    <span class="badge badge-soft-secondary px-2 py-1 ml-1">{{ $lead->stream ?: 'N/A' }}</span>
                                </td>
                                <td>
                                    <span class="text-muted small">{{ $lead->created_at->format('M d, Y h:i A') }}</span><br>
                                    <span class="text-xs text-muted">{{ $lead->created_at->diffForHumans() }}</span>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('admin.study-leads.destroy', $lead->id) }}" method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-outline-danger shadow-sm delete-btn" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-5">
                                    <div class="py-4">
                                        <i class="fas fa-inbox fa-3x text-light mb-3"></i>
                                        <h5 class="text-muted">No leads found yet.</h5>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if($leads->hasPages())
            <div class="card-footer bg-white py-3">
                <div class="d-flex justify-content-center">
                    {{ $leads->links() }}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<style>
    .bg-light-blue { background-color: rgba(102, 126, 234, 0.03) !important; }
    .bg-soft-primary { background-color: rgba(102, 126, 234, 0.1) !important; }
    .badge-soft-info { background-color: rgba(0, 192, 239, 0.1); color: #00c0ef; }
    .badge-soft-secondary { background-color: rgba(108, 117, 125, 0.1); color: #6c757d; }
    .text-xs { font-size: 0.75rem; }
    .transition-hover:hover { transform: translateY(-2px); box-shadow: 0 4px 10px rgba(0,0,0,0.1); transition: all 0.2s; }
</style>
@endsection

@push('scripts')
<script>
    $('.delete-btn').on('click', function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "This lead will be permanently deleted!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $(this).closest('form').submit();
            }
        });
    });
</script>
@endpush
