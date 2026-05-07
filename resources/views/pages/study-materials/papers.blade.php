@extends('layouts.app')

@section('content')
<div class="container-v1">
    <!-- Search -->
    <div class="search-wrap mb-4">
        <i class="bi bi-search"></i>
        <input type="text" class="form-control" placeholder="Search for papers, years, subjects...">
    </div>

    <!-- Filters -->
    <div class="d-flex gap-3 mb-4">
        <button class="filter-btn">{{ $class->name }} <i class="bi bi-chevron-down ms-1"></i></button>
        <button class="filter-btn">{{ $studyYear->year }} <i class="bi bi-chevron-down ms-1"></i></button>
    </div>

    <!-- Cards -->
    <div class="row g-4">
        @foreach($papers as $paper)
        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
            <a href="javascript:void(0)" onclick="accessPaper('{{ Storage::url($paper->file_path) }}')" class="text-decoration-none">
                <div class="paper-card">
                    <div class="paper-top">
                        <span class="pdf-badge">PDF</span>
                        <i class="bi bi-file-earmark-text pdf-icon"></i>
                    </div>
                    <div class="paper-body">
                        <h6>{{ $paper->title }}</h6>
                        <div class="paper-meta">Paper &nbsp;•&nbsp; {{ $studyYear->year }}</div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach

        @if($papers->isEmpty())
        <div class="col-12 text-center py-5">
            <p class="text-muted">No papers found for this selection.</p>
        </div>
        @endif
    </div>
</div>

<!-- Study Material Lead Modal -->
<div class="modal fade" id="studyLeadModal" tabindex="-1" aria-labelledby="studyLeadModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow">
      <div class="modal-header bg-primary text-white border-0">
        <h5 class="modal-title" id="studyLeadModalLabel"><i class="bi bi-file-earmark-pdf me-2"></i>Access Study Material</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4">
        <p class="text-muted mb-4 small">Please fill out the form below to access the free study material.</p>
        <form id="studyLeadForm">
            @csrf
            <div class="mb-3">
              <input type="text" name="name" class="form-control bg-light border-0 px-3 py-2" placeholder="Full Name" required>
            </div>
            <div class="mb-3">
              <input type="email" name="email" class="form-control bg-light border-0 px-3 py-2" placeholder="Email Address" required>
            </div>
            <div class="mb-3">
              <input type="text" name="mobile" class="form-control bg-light border-0 px-3 py-2" placeholder="Mobile Number (10 digits)" required pattern="[0-9]{10}" title="Please enter correct mobile number">
            </div>
            <div class="row g-2 mb-4">
                <div class="col-6">
                    <input type="text" name="class" class="form-control bg-light border-0 px-3 py-2" placeholder="Class (e.g. 11th)">
                </div>
                <div class="col-6">
                    <input type="text" name="stream" class="form-control bg-light border-0 px-3 py-2" placeholder="Stream (e.g. Science)">
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold" id="studyLeadSubmitBtn">
                Unlock PDF <i class="bi bi-unlock ms-1"></i>
            </button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Toast Notification -->
<div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 9999;">
  <div id="studyLeadToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
        <i class="bi bi-check-circle-fill me-2"></i> Congratulations! Now you can access all study materials.
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
    let hasAccess = {{ session()->has('study_lead_verified') ? 'true' : 'false' }};
    let pendingPdfUrl = '';
    let studyLeadModal = null;

    document.addEventListener("DOMContentLoaded", function() {
        studyLeadModal = new bootstrap.Modal(document.getElementById('studyLeadModal'));
        
        document.getElementById('studyLeadForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            let submitBtn = document.getElementById('studyLeadSubmitBtn');
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Processing...';
            submitBtn.disabled = true;

            let formData = new FormData(this);

            fetch('{{ route("study-material.verify-lead") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    hasAccess = true;
                    studyLeadModal.hide();
                    
                    // Show Toast
                    const toastEl = document.getElementById('studyLeadToast');
                    const toast = new bootstrap.Toast(toastEl, { delay: 4000 });
                    toast.show();

                    // Open PDF
                    setTimeout(() => {
                        window.open(pendingPdfUrl, '_blank');
                    }, 500);
                    
                    // Reset button
                    submitBtn.innerHTML = 'Unlock PDF <i class="bi bi-unlock ms-1"></i>';
                    submitBtn.disabled = false;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                submitBtn.innerHTML = 'Unlock PDF <i class="bi bi-unlock ms-1"></i>';
                submitBtn.disabled = false;
                alert('Something went wrong. Please try again.');
            });
        });
    });

    function accessPaper(url) {
        if (hasAccess) {
            window.open(url, '_blank');
        } else {
            pendingPdfUrl = url;
            studyLeadModal.show();
        }
    }
</script>
@endpush
