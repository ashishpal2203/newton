@extends('layouts.app')
@section('content')

<section class="blogs-section py-5">
  <div class="container">

    <!-- Heading -->
    <h2 class="text-center fw-bold mb-4">Blogs</h2>

    <!-- Search -->
   <div class="d-flex justify-content-center mb-5">
  <div class="blog-search-wrapper">
    <span class="search-icon">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
        <path d="M21 21L16.65 16.65M11 18C7.134 18 4 14.866 4 11C4 7.134 7.134 4 11 4C14.866 4 18 7.134 18 11C18 14.866 14.866 18 11 18Z"
          stroke="#9aa0a6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </span>
    <input type="text" class="blog-search" placeholder="Search for Blogs">
  </div>
</div>

    <!-- Blog Grid -->
    <div class="row g-4 kkk">

      <!-- Card -->
      <div class="col-lg-3 col-md-4 col-sm-6">
        <a href="{{ url('create-education-blog') }}">
        <div class="blog-card">
          <div class="blog-img bg-green">
            <span class="blog-tag">Blog</span>
            <img src="{{ asset('assets/images/jjj1.png') }}" alt="">
          </div>
          <div class="blog-content">
            <h6>Time Management</h6>
            <p>2.4 MB • 20 Oct</p>
          </div>
        </div>
        </a>
      </div>

      <!-- Card -->
      <div class="col-lg-3 col-md-4 col-sm-6">
        <a href="{{ url('create-education-blog') }}">
        <div class="blog-card">
          <div class="blog-img">
            <span class="blog-tag">Blog</span>
            <img src="{{ asset('assets/images/jjj2.png') }}" alt="">
          </div>
          <div class="blog-content">
            <h6>Start Strong</h6>
            <p>2.4 MB • 20 Oct</p>
          </div>
        </div>
      </a>
      </div>

      <!-- Empty Cards -->
      <div class="col-lg-3 col-md-4 col-sm-6">
         <div class="blog-card">
          <div class="blog-img">
            <span class="blog-tag">Blog</span>
            <img src="{{ asset('assets/images/jjj2.png') }}" alt="">
          </div>
          <div class="blog-content">
            <h6>Start Strong</h6>
            <p>2.4 MB • 20 Oct</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-6">
         <div class="blog-card">
          <div class="blog-img">
            <span class="blog-tag">Blog</span>
            <img src="{{ asset('assets/images/jjj1.png') }}" alt="">
          </div>
          <div class="blog-content">
            <h6>Start Strong</h6>
            <p>2.4 MB • 20 Oct</p>
          </div>
        </div>
      </div>

    </div>
    <div class="row g-4 kkk">

      <!-- Card -->
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="blog-card">
          <div class="blog-img bg-green">
            <span class="blog-tag">Blog</span>
            <img src="{{ asset('assets/images/jjj1.png') }}" alt="">
          </div>
          <div class="blog-content">
            <h6>Time Management</h6>
            <p>2.4 MB • 20 Oct</p>
          </div>
        </div>
      </div>

      <!-- Card -->
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="blog-card">
          <div class="blog-img">
            <span class="blog-tag">Blog</span>
            <img src="{{ asset('assets/images/jjj2.png') }}" alt="">
          </div>
          <div class="blog-content">
            <h6>Start Strong</h6>
            <p>2.4 MB • 20 Oct</p>
          </div>
        </div>
      </div>

      <!-- Empty Cards -->
      <div class="col-lg-3 col-md-4 col-sm-6">
         <div class="blog-card">
          <div class="blog-img">
            <span class="blog-tag">Blog</span>
            <img src="{{ asset('assets/images/jjj2.png') }}" alt="">
          </div>
          <div class="blog-content">
            <h6>Start Strong</h6>
            <p>2.4 MB • 20 Oct</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-6">
         <div class="blog-card">
          <div class="blog-img">
            <span class="blog-tag">Blog</span>
            <img src="{{ asset('assets/images/jjj1.png') }}" alt="">
          </div>
          <div class="blog-content">
            <h6>Start Strong</h6>
            <p>2.4 MB • 20 Oct</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

@endsection