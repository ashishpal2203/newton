@extends('layouts.app')
@section('content')

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show text-center rounded-0 mb-0" role="alert" style="z-index: 9999;">
  <strong><i class="fas fa-check-circle me-2"></i> Success!</strong> {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

  <div class="container-fluid mob-fluid">

    <!-- Carousel -->
    <div id="demo" class="carousel slide" data-bs-ride="carousel">

      @if(isset($banners) && $banners->count() > 1)
      <!-- Indicators/dots -->
      <div class="carousel-indicators">
        @foreach($banners as $index => $banner)
          <button type="button" data-bs-target="#demo" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></button>
        @endforeach
      </div>
      @endif

      <!-- The slideshow/carousel -->
      <div class="carousel-inner">
        @if(isset($banners))
        @forelse($banners as $index => $banner)
        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
          @if($banner->link)
            <a href="{{ $banner->link }}" target="_blank">
          @endif
          
          <picture>
            @if($banner->mobile_image)
              <source media="(max-width: 768px)" srcset="{{ Storage::url($banner->mobile_image) }}">
            @endif
            <img src="{{ Storage::url($banner->desktop_image) }}" alt="{{ $banner->title ?? 'Banner' }}" class="d-block w-100">
          </picture>

          @if($banner->link)
            </a>
          @endif
        </div>
        @empty
        <div class="carousel-item active">
          <img src="{{ asset('assets/images/1.jpg') }}" alt="Default Banner" class="d-block w-100">
        </div>
        @endforelse
        @else
        <div class="carousel-item active">
          <img src="{{ asset('assets/images/1.jpg') }}" alt="Default Banner" class="d-block w-100">
        </div>
        @endif
      </div>

    </div>

  </div>


  <section class="stats-section">


    <div class="container-fluid">
      <div class="stats-mob">
        <img src="{{ asset('assets/images/counting.png') }}">
      </div>

      <div class="stats-box">


        <div class="stat-item">
          <h2 class="counter" data-target="5000">0</h2>
          <p>STUDENTS</p>
        </div>

        <div class="stat-item">
          <h2 class="counter" data-target="100">0</h2>
          <p>FACULTY</p>
        </div>

        <div class="stat-item">
          <h2 class="counter" data-target="250">0</h2>
          <p>SELECTIONS</p>
        </div>

        <div class="stat-item">
          <h2 class="counter" data-target="1000">0</h2>
          <p>TESTS</p>
        </div>

      </div>
    </div>




  </section>







  <section class="phase-slider-section my-4">
    <div class="container-fluid">
      <div id="phaseSlider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

          <!-- Slide 1 -->
          <div class="carousel-item active">
            <div class="phase-card">
              <div class="phase-left">
                <span class="phase-badge">
                  🏆 Phase 3 starts 1st Feb
                </span>

                <h5>
                  Final revision with Top Rankers’ Strategy.
                  <a href="#">Top Rankers’ Strategy</a>
                </h5>

                <p>
                  Get personalized feedback on all your tests, all your tests.
                </p>

                <a href="#" class="btn btn-sm mtttbtn">Join Now</a>
              </div>

              <div class="phase-right">
                <div class="mentor">
                  <img src="{{ asset('assets/images/neetu.png') }}">
                  <div>
                    <strong>Neetu Yadav</strong>
                    <small>NEET-UG 2025</small>
                  </div>
                </div>

                <div class="mentor">
                  <img src="{{ asset('assets/images/mahima.png') }}">
                  <div>
                    <strong>Mahima Singh</strong>
                    <small>NEET-UG 2025</small>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="carousel-item ">
            <div class="phase-card">
              <div class="phase-left">
                <span class="phase-badge">
                  🏆 Phase 3 starts 1st Feb
                </span>

                <h5>
                  Final revision with Top Rankers’ Strategy.
                  <a href="#">Top Rankers’ Strategy</a>
                </h5>

                <p>
                  Get personalized feedback on all your tests, all your tests.
                </p>

                <a href="#" class="btn btn-sm mtttbtn">Join Now</a>
              </div>

              <div class="phase-right">
                <div class="mentor">
                  <img src="{{ asset('assets/images/neetu.png') }}">
                  <div>
                    <strong>Neetu Yadav</strong>
                    <small>NEET-UG 2025</small>
                  </div>
                </div>

                <div class="mentor">
                  <img src="{{ asset('assets/images/mahima.png') }}">
                  <div>
                    <strong>Mahima Singh</strong>
                    <small>NEET-UG 2025</small>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="carousel-item ">
            <div class="phase-card">
              <div class="phase-left">
                <span class="phase-badge">
                  🏆 Phase 3 starts 1st Feb
                </span>

                <h5>
                  Final revision with Top Rankers’ Strategy.
                  <a href="#">Top Rankers’ Strategy</a>
                </h5>

                <p>
                  Get personalized feedback on all your tests, all your tests.
                </p>

                <a href="#" class="btn btn-sm mtttbtn">Join Now</a>
              </div>

              <div class="phase-right">
                <div class="mentor">
                  <img src="{{ asset('assets/images/neetu.png') }}">
                  <div>
                    <strong>Neetu Yadav</strong>
                    <small>NEET-UG 2025</small>
                  </div>
                </div>

                <div class="mentor">
                  <img src="{{ asset('assets/images/mahima.png') }}">
                  <div>
                    <strong>Mahima Singh</strong>
                    <small>NEET-UG 2025</small>
                  </div>
                </div>
              </div>
            </div>
          </div>



        </div>

        <!-- Controls -->
        <!--       <button class="carousel-control-prev" type="button" data-bs-target="#phaseSlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>

      <button class="carousel-control-next" type="button" data-bs-target="#phaseSlider" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button> -->
      </div>
    </div>
  </section>










  <section>
    <div class="container-fluid ">
      <div class="courses-section">
        <div class="courses-wrapper">

          <h3 class="section-title">Courses </h3>

          <div class="courses-grid">
            <a href="class-X.html">
              <div class="course-card">
                <div class="icon-box blue">
                  <img src="{{ asset('assets/images/PYQLibrary.png') }}">
                </div>
                <h4>Class X</h4>
                <span>8 Subjects</span>
              </div>
            </a>

            <a href="class-XII.html">
              <div class="course-card">
                <div class="icon-box purple">

                  <img src="{{ asset('assets/images/class.png') }}">
                </div>
                <h4>Class XII</h4>
                <span>8 Subjects</span>
              </div>
            </a>

            <a href="jee-mains+advanced.html">
              <div class="course-card">
                <div class="icon-box yellow">
                  <img src="{{ asset('assets/images/jee.png') }}">
                </div>
                <h4>JEE Mains</h4>
                <span>3 Subjects</span>
              </div>
            </a>

            <a href="neet.html">
              <div class="course-card">
                <div class="icon-box green">
                  <img src="{{ asset('assets/images/neet.png') }}">
                </div>
                <h4>NEET</h4>
                <span>3 Subjects</span>
              </div>
            </a>

            <a href="school-section.html">
              <div class="course-card">
                <div class="icon-box blue">
                  <img src="{{ asset('assets/images/School.png') }}">
                </div>
                <h4>School Section</h4>
                <span>3 Subjects</span>
              </div>
            </a>

            <a href="sci-comm.html">
              <div class="course-card">
                <div class="icon-box blue">
                  <img src="{{ asset('assets/images/comm.png') }}">
                </div>
                <h4>Sci & Comm</h4>
                <span>8 Subjects</span>
              </div>
            </a>

            <a href="mht-cet.html">
              <div class="course-card">
                <div class="icon-box orange">
                  <img src="{{ asset('assets/images/mht.png') }}">
                </div>
                <h4>MHT-CET</h4>
                <span>(XI & XII)</span>
              </div>
            </a>


            <a href="Integrated-classes.html">
              <div class="course-card">
                <div class="icon-box green">
                  <img src="{{ asset('assets/images/class.png') }}">
                </div>
                <h4>Integrated Classes</h4>
                <span>8 Subjects</span>
              </div>
            </a>

          </div>
        </div>
      </div>
    </div>
  </section>


  <section>
    <div class="container-fluid ">
      <div class="courses-section">
        <div class="courses-wrapper">

          <h3 class="section-title">Study Materials </h3>

          <div class="courses-grid">
            @foreach($studyClasses as $class)
            <a href="{{ route('study-material.languages', $class->slug) }}">
              <div class="course-card">
                <div class="icon-box {{ ['blue', 'purple', 'yellow', 'green'][$loop->index % 4] }}">
                  <img src="{{ asset('assets/images/' . basename($class->icon)) }}">
                </div>
                <h4>{{ $class->name }}</h4>
                <span>{{ $class->languages->count() }} Categories</span>
              </div>
            </a>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>







  <section class="testimonial-section">
    <div class="container">

      <div class="row">
        <div class="col-md-6 col-12 col-sm-12">

          <!-- Left Text -->
          <div class="testimonial-text">
            <h3 id="name" class="student-name"></h3>
            <p id="rank" class="student-rank"></p>
            <p id="msg" class="testimonial-message"></p>
          </div>

        </div>

        <div class="col-md-6 col-12 col-sm-12">

          <!-- Right Image -->
          <div class="testimonial-image">
            <img id="img" src="{{ asset('assets/images/frme.png') }}" alt="Student">

            <div class="slider-buttons">
              <button onclick="prev()">Prev</button>
              <button onclick="next()">Next</button>
            </div>
          </div>

        </div>
      </div>

    </div>
  </section>




  <section class="why-choose-us">
    <div class="container">
      <h2 class="section-titless">Why Choose Us</h2>

      <div class="row justify-content-center">
        <!-- Item 1 -->
        <div class="col-md-4">
          <a href="about-us.html">
            <div class="why-card center">
              <div class="icon">
                <img src="{{ asset('assets/images/cap.png') }}">
              </div>
              <h5>Expert Faculty</h5>
              <p>Learn from IIT/AIIMS graduates</p>
            </div>
          </a>
        </div>

        <!-- Item 2 -->
        <div class="col-md-4">
          <a href="about-us.html">
            <div class="why-card center">
              <div class="icon">
                <img src="{{ asset('assets/images/book.png') }}">
              </div>
              <h5>Structured Material</h5>
              <p>Comprehensive study material</p>
            </div>
          </a>
        </div>

        <!-- Item 3 -->
        <div class="col-md-4">
          <a href="about-us.html">
            <div class="why-card center">
              <div class="icon">
                <img src="{{ asset('assets/images/whychoos.png') }}">
              </div>
              <h5>24/7 Doubt Support</h5>
              <p>Get doubts resolved anytime</p>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>












  <section class="success-bg">
    <div class="container-fluid">

      <!-- REVIEW SLIDER -->
      <div class="swiper reviewSwiper mb-5">
        <div class="swiper-wrapper">

          @forelse($reviews as $review)
          <div class="swiper-slide">
            <div class="review-card">
              <div class="review-head">
                @if($review->user_image)
                  <img src="{{ Storage::url($review->user_image) }}" alt="Avatar" class="avatar" style="object-fit:cover;">
                @else
                  <div class="avatar" style="background-color: {{ collect(['#ff6b6b', '#4ecdc4', '#45b7d1', '#f9ca24', '#f0932b'])->random() }}; color: white;">
                    {{ strtoupper(substr($review->user_name, 0, 1)) }}
                  </div>
                @endif
                <div>
                  <h6>{{ $review->user_name }}</h6>
                  @if($review->subtitle)<span>{{ $review->subtitle }}</span>@endif
                </div>
              </div>
              <div class="stars">
                @for($i = 1; $i <= 5; $i++)
                  {!! $i <= $review->rating ? '★' : '<span style="color:#ddd">★</span>' !!}
                @endfor
              </div>
              <p>{{ $review->content }}</p>
            </div>
          </div>
          @empty
          <!-- Fallback if no active reviews yet -->
          <div class="swiper-slide">
            <div class="review-card text-center py-5 text-muted shadow-sm border">
              <h6 class="fw-bold">No Reviews Yet</h6>
              <p class="mb-0">Be the first to share your success story!</p>
            </div>
          </div>
          @endforelse

        </div>

      </div>

    

    

    </div>
  </section>



  <!-- Review Modal -->
  <div class="modal fade" id="reviewModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content rounded-4 border-0 shadow">

        <form action="{{ route('reviews.storeFrontend') }}" method="POST">
          @csrf
          <!-- Header -->
          <div class="modal-header border-0 pb-0">
            <h5 class="modal-title fw-bold">Add Your Success Story</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <!-- Body -->
          <div class="modal-body">
            
            <div class="mb-3">
              <label class="form-label">Your Name <span class="text-danger">*</span></label>
              <input type="text" name="user_name" class="form-control" placeholder="Enter your full name" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Course / Exam (Optional)</label>
              <input type="text" name="subtitle" class="form-control" placeholder="e.g. JEE Advanced 2024">
            </div>

            <div class="mb-3">
              <label class="form-label">Rating <span class="text-danger">*</span></label>
              <select name="rating" class="form-select" required>
                <option value="5" selected>⭐⭐⭐⭐⭐ (5 Stars)</option>
                <option value="4">⭐⭐⭐⭐ (4 Stars)</option>
                <option value="3">⭐⭐⭐ (3 Stars)</option>
                <option value="2">⭐⭐ (2 Stars)</option>
                <option value="1">⭐ (1 Star)</option>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Your Review <span class="text-danger">*</span></label>
              <textarea name="content" class="form-control" rows="4" placeholder="Write about your experience..." required></textarea>
            </div>

          </div>

          <!-- Footer -->
          <div class="modal-footer border-0 pt-0">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary px-4">Submit Review</button>
          </div>
        </form>

      </div>
    </div>
  </div>





  <section class="latest-updates">
    <div class="container">
      <div class="latest-header">
        <h2>Latest Updates</h2>
        <a href="#" class="read-blog">Read Blog</a>
      </div>





      <div class="row">
        @forelse($latestUpdates as $update)
        <div class="col-md-6 col-sm-12 col-12">
          <!-- Dynamic Card -->
          <div class="blog-card card-blog">
            <div class="blog-thumb">
              @if($update->image)
                <img src="{{ Storage::url($update->image) }}" alt="{{ $update->title }}">
              @else
                <img src="{{ asset('assets/images/blog1.png') }}" alt="img">
              @endif
            </div>
            <div class="blog-content">
              @if($update->category)<span class="blog-category">{{ $update->category }}</span>@endif
              <h3>
                @if($update->link)
                  <a href="{{ $update->link }}" target="_blank" style="text-decoration:none; color:inherit;">{{ $update->title }}</a>
                @else
                  {{ $update->title }}
                @endif
              </h3>
              <p class="blog-meta">
                {{ $update->published_date }} @if($update->read_time) · {{ $update->read_time }} @endif
              </p>
            </div>
          </div>
        </div>
        @empty
        <div class="col-12 text-center py-4">
          <p class="text-muted">No recent updates available.</p>
        </div>
        @endforelse
      </div>
    </div>
  </section>




@endsection