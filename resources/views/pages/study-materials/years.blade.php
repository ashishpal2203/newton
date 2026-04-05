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
        <button class="filter-btn">{{ $language->name }} <i class="bi bi-chevron-down ms-1"></i></button>
        <button class="filter-btn">Year <i class="bi bi-chevron-down ms-1"></i></button>
    </div>

    <!-- Cards -->
    <div class="row g-4 aallsec">
        @foreach($years as $year)
        <div class="col-lg-3 col-md-4 col-6">
            <a href="{{ route('study-material.papers', [$class->slug, $language->slug, $year->year]) }}">
                <div class="subject-card">
                    <div class="icon-box icon-blue">
                       <img src="{{ asset('img/education.png') }}" alt="{{ $year->year }}">
                    </div>
                    <h6>{{ $year->year }}</h6>
                    <p>{{ $year->studyPapers->count() }} Papers</p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
