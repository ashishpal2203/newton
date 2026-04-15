@extends('layouts.app')
@section('content')

<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu">
  <div class="offcanvas-header">
    <img src="{{ asset('logo.png') }}" height="32">
    <button class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>

  <div class="offcanvas-body">
    <ul class="navbar-nav gap-3">
      <li><a class="nav-link" href="#">HOME</a></li>
      <li><a class="nav-link" href="#">COURSE</a></li>
      <li><a class="nav-link" href="#">PYQ LIBRARY</a></li>
      <li><a class="nav-link" href="#">ABOUT US</a></li>
      <li><a class="nav-link" href="#">BLOG</a></li>
      <li><a class="nav-link" href="#">CONTACT US</a></li>
    </ul>

    <div class="mt-4 d-grid gap-2">
      <a class="btn btn-outline-primary rounded-pill">Sign in</a>
      <a class="btn btn-primary rounded-pill">Register</a>
    </div>
  </div>
</div>







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
           <a href="{{ url('pyq-class-x-2nd-page') }}">
            <div class="subject-card">
                <div class="icon-box icon-blue">
                   <img src="{{ Storage::url('assets/images/education.png') }}">
                </div>
                <h6>English</h6>
                <p>6 Papers</p>
            </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-4 col-6">
            <a href="{{ url('pyq-class-x-2nd-page') }}">
            <div class="subject-card">
                <div class="icon-box icon-purple">
                   <img src="{{ Storage::url('assets/images/hindi.png') }}">
                </div>
                <h6>Hindi</h6>
                <p>6 Papers</p>
            </div>
        </a>
        </div>

        <div class="col-lg-3 col-md-4 col-6">
            <a href="{{ url('pyq-class-x-2nd-page') }}">
            <div class="subject-card">
                <div class="icon-box icon-yellow">
                   <img src="{{ Storage::url('assets/images/marathi.png') }}">
                </div>
                <h6>Marathi</h6>
                <p>6 Papers</p>
            </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-4 col-6">
            <a href="{{ url('pyq-class-x-2nd-page') }}">
            <div class="subject-card">
                <div class="icon-box icon-green">
                    <img src="{{ Storage::url('assets/images/Sanskrit.png') }}">
                </div>
                <h6>Sanskrit</h6>
                <p>6 Papers</p>
            </div>
        </a>
        </div>

        <div class="col-lg-3 col-md-4 col-6">
            <a href="{{ url('pyq-class-x-2nd-page') }}">
            <div class="subject-card">
                <div class="icon-box icon-blue">
                   <img src="{{ Storage::url('assets/images/education.png') }}">
                </div>
                <h6>Maths</h6>
                <p>6 Papers</p>
            </div>
        </a>
        </div>

        <div class="col-lg-3 col-md-4 col-6">
            <a href="{{ url('pyq-class-x-2nd-page') }}">
            <div class="subject-card">
                <div class="icon-box icon-purple">
                 <img src="{{ Storage::url('assets/images/hindi.png') }}">
               </div>
                <h6>Science</h6>
                <p>6 Papers</p>
            </div>
        </a>
        </div>

        <div class="col-lg-3 col-md-4 col-6">
            <a href="{{ url('pyq-class-x-2nd-page') }}">
            <div class="subject-card">
                <div class="icon-box icon-yellow">
                <img src="{{ Storage::url('assets/images/marathi.png') }}">
                </div>
                <h6>Geography</h6>
                <p>6 Papers</p>
            </div>
        </a>
        </div>

        <div class="col-lg-3 col-md-4 col-6">
            <a href="{{ url('pyq-class-x-2nd-page') }}">
            <div class="subject-card">
                <div class="icon-box icon-green">
                  <img src="{{ Storage::url('assets/images/Sanskrit.png') }}">
                </div>
                <h6>History</h6>
                <p>6 Papers</p>
            </div>
        </a>
        </div>

    </div>
</div>

@endsection