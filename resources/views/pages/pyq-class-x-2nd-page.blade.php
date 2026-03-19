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
    <div class="row g-4 aallsec">

        <div class="col-lg-3 col-md-4 col-6">
            <a href="{{ url('pyq-class-x-2024') }}">
            <div class="subject-card">
                <div class="icon-box icon-blue">
                   <img src="{{ asset('assets/images/education.png') }}">
                </div>
                <h6>2024</h6>
                <p>2 Papers</p>
            </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-4 col-6">
            <a href="pyq-class-x-2023">
            <div class="subject-card">
                <div class="icon-box icon-purple">
                   <img src="{{ asset('assets/images/hindi.png') }}">
                </div>
                <h6>2023</h6>
                <p>2 Papers</p>
            </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-4 col-6">
            <a href="{{ url('pyq-class-x-2022') }}">
            <div class="subject-card">
                <div class="icon-box icon-yellow">
                   <img src="{{ asset('assets/images/marathi.png') }}">
                </div>
                <h6>2022</h6>
                <p>2 Papers</p>
            </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-4 col-6">
            <a href="{{ url('pyq-class-x-2021') }}">
            <div class="subject-card">
                <div class="icon-box icon-green">
                    <img src="{{ asset('assets/images/Sanskrit.png') }}">
                </div>
                <h6>2021</h6>
                <p>2 Papers</p>
            </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-4 col-6">
            <a href="{{ url('pyq-class-x-2020') }}">
            <div class="subject-card">
                <div class="icon-box icon-blue">
                   <img src="{{ asset('assets/images/education.png') }}">
                </div>
                <h6>2020</h6>
                <p>2 Papers</p>
            </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-4 col-6">
            <a href="{{ url('pyq-class-x-2018') }}">
            <div class="subject-card">
                <div class="icon-box icon-purple">
                 <img src="{{ asset('assets/images/hindi.png') }}">
               </div>
                <h6>2018</h6>
                <p>2 Papers</p>
            </div>
             </a>
        </div>

        <div class="col-lg-3 col-md-4 col-6">
            <a href="{{ url('pyq-class-x-geography') }}">
            <div class="subject-card">
                <div class="icon-box icon-yellow">
                <img src="{{ asset('assets/images/marathi.png') }}">
                </div>
                <h6>Geography</h6>
                <p>2 Papers</p>
            </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-4 col-6">
            <a href="{{ url('pyq-class-x-history') }}">
            <div class="subject-card">
                <div class="icon-box icon-green">
                  <img src="{{ asset('assets/images/Sanskrit.png') }}">
                </div>
                <h6>History</h6>
                <p>2 Papers</p>
            </div>
            </a>
        </div>

    </div>
</div>

@endsection