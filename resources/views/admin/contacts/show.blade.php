@extends('admin.layouts.app')

@section('title', 'Inquiry Details')

@section('header-actions')
<a href="{{ route('admin.contacts.index') }}" class="btn btn-light border">
    <i class="fas fa-arrow-left mr-1"></i> Back to List
</a>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h3 class="card-title fw-bold text-dark">Message from {{ $contact->name }}</h3>
                <span class="text-muted small"><i class="far fa-clock mr-1"></i> {{ $contact->created_at->format('F d, Y h:i A') }}</span>
            </div>
            <div class="card-body p-4">
                <div class="inquiry-content bg-light p-4 rounded min-vh-25 mb-4">
                    <p class="lead mb-0 text-dark" style="white-space: pre-wrap;">{{ $contact->message ?? 'No additional message provided.' }}</p>
                </div>
            </div>
            <div class="card-footer bg-white py-3 text-right">
                <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" class="d-inline delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger px-4 delete-btn">
                        <i class="fas fa-trash-alt mr-2"></i> Delete This Inquiry
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary py-3">
                <h3 class="card-title fw-bold"><i class="fas fa-info-circle mr-2"></i> Sender Information</h3>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                        <span class="text-muted"><i class="fas fa-user mr-2"></i> Name</span>
                        <span class="font-weight-bold">{{ $contact->name }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                        <span class="text-muted"><i class="fas fa-phone mr-2"></i> Mobile</span>
                        <a href="tel:{{ $contact->mobile }}" class="font-weight-bold text-primary">{{ $contact->mobile }}</a>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                        <span class="text-muted"><i class="fas fa-envelope mr-2"></i> Email</span>
                        <a href="mailto:{{ $contact->email }}" class="font-weight-bold text-primary">{{ $contact->email }}</a>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                        <span class="text-muted"><i class="fas fa-graduation-cap mr-2"></i> Class</span>
                        <span class="badge badge-info px-3 py-2">{{ $contact->class }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                        <span class="text-muted"><i class="fas fa-stream mr-2"></i> Stream</span>
                        <span class="badge badge-secondary px-3 py-2">{{ $contact->stream }}</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="card shadow-sm border-0 mt-4">
            <div class="card-body bg-light rounded text-center py-4">
                <p class="text-muted mb-3">Quick action for this sender</p>
                <div class="d-grid gap-2">
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->mobile) }}" target="_blank" class="btn btn-success btn-block mb-2">
                        <i class="fab fa-whatsapp mr-2"></i> Reply on WhatsApp
                    </a>
                    <a href="mailto:{{ $contact->email }}" class="btn btn-primary btn-block">
                        <i class="fas fa-reply mr-2"></i> Send Email
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $('.delete-btn').on('click', function() {
        Swal.fire({
            title: 'Delete this inquiry?',
            text: "This action cannot be undone.",
            icon: 'error',
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
