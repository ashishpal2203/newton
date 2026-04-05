@extends('layouts.app')

@section('content')
<div class="container-fluid py-5">
    <!-- Search -->
    <div class="search-wrap mb-4">
        <i class="bi bi-search"></i>
        <input type="text" class="form-control" placeholder="Search for papers, years, subjects...">
    </div>

    <!-- Filters -->
    <div class="d-flex gap-3 mb-4">
        <button class="filter-btn">{{ $class->name }} <i class="bi bi-chevron-down ms-1"></i></button>
        <button class="filter-btn">{{ $language->name }} <i class="bi bi-chevron-down ms-1"></i></button>
        <button class="filter-btn">{{ $studyYear->year }} <i class="bi bi-chevron-down ms-1"></i></button>
    </div>

    <!-- Cards -->
    <div class="row g-4">
        @foreach($papers as $paper)
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <a href="{{ asset('storage/' . $paper->file_path) }}" target="_blank" class="text-decoration-none">
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
@endsection
