@extends('layouts.app')

@section('content')
<div class="container-fluid py-5">
    <!-- Search -->
    <div class="search-box position-relative mb-4">
        <i class="bi bi-search icon"></i>
        <input type="text" class="form-control" placeholder="Search for papers, years, subjects...">
    </div>

    <!-- Filters -->
    <div class="d-flex gap-3 mb-4">
        <button class="filter-btn">{{ $class->name }} <i class="bi bi-chevron-down ms-1"></i></button>
        <button class="filter-btn">Subject <i class="bi bi-chevron-down ms-1"></i></button>
        <button class="filter-btn">Year <i class="bi bi-chevron-down ms-1"></i></button>
    </div>

    <!-- Cards -->
    <div class="row g-4 aallsec">
        @foreach($languages as $language)
        <div class="col-lg-3 col-md-4 col-6">
            <a href="{{ route('study-material.years', [$class->slug, $language->slug]) }}">
                <div class="subject-card">
                    <div class="icon-box {{ ['icon-blue', 'icon-purple', 'icon-yellow', 'icon-green'][$loop->index % 4] }}">
                        <img src="{{ asset($language->icon ?? 'img/education.png') }}" alt="{{ $language->name }}">
                    </div>
                    <h6>{{ $language->name }}</h6>
                    <p>{{ $language->studyYears->count() }} Years</p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
