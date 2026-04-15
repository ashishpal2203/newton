@extends('layouts.app')
@section('content')

<div class="container-fluid py-5">

    <!-- Search -->
    <div class="search-box position-relative">
        <i class="bi bi-search icon"></i>
        <input type="text" class="form-control" placeholder="Search for papers, years, subjects...">
    </div>

    <!-- Filters -->
    <div class="d-flex gap-3 mb-4">
        <button class="filter-btn">Class <i class="bi bi-chevron-down ms-1"></i></button>
        <button class="filter-btn">Subject <i class="bi bi-chevron-down ms-1"></i></button>
        <button class="filter-btn">Year <i class="bi bi-chevron-down ms-1"></i></button>
    </div>

    <!-- Cards -->
    <div class="row g-4">

        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="subject-card">
                <div class="icon-box icon-blue">
                   <img src="{{ Storage::url('assets/images/education.png') }}">
                </div>
                <h6>2024</h6>
                <p>6 Papers</p>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="subject-card">
                <div class="icon-box icon-purple">
                   <img src="{{ Storage::url('assets/images/hindi.png') }}">
                </div>
                <h6>2023</h6>
                <p>6 Papers</p>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="subject-card">
                <div class="icon-box icon-yellow">
                   <img src="{{ Storage::url('assets/images/marathi.png') }}">
                </div>
                <h6>2022</h6>
                <p>6 Papers</p>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="subject-card">
                <div class="icon-box icon-green">
                    <img src="{{ Storage::url('assets/images/Sanskrit.png') }}">
                </div>
                <h6>2021</h6>
                <p>6 Papers</p>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="subject-card">
                <div class="icon-box icon-blue">
                   <img src="{{ Storage::url('assets/images/education.png') }}">
                </div>
                <h6>2020</h6>
                <p>6 Papers</p>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="subject-card">
                <div class="icon-box icon-purple">
                 <img src="{{ Storage::url('assets/images/hindi.png') }}">
               </div>
                <h6>2018</h6>
                <p>6 Papers</p>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="subject-card">
                <div class="icon-box icon-yellow">
                <img src="{{ Storage::url('assets/images/marathi.png') }}">
                </div>
                <h6>Marathi</h6>
                <p>6 Papers</p>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="subject-card">
                <div class="icon-box icon-green">
                  <img src="{{ Storage::url('assets/images/Sanskrit.png') }}">
                </div>
                <h6>History</h6>
                <p>6 Papers</p>
            </div>
        </div>

    </div>
</div>

@endsection