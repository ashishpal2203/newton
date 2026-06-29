@extends('layouts.app')
@section('title', "Newton's Academy - Best Coaching Classes in Mulund Mumbai | JEE | NEET | MHT-CET")

@section('meta_description', 'Newton\'s Academy in Mulund West, Mumbai is a leading coaching institute offering premier classroom coaching for IIT-JEE (Mains & Advanced), NEET, MHT-CET, XI & XII Science, and Foundation courses.')
@section('meta_keywords', 'Newtons Academy, Newtons Academy Mulund, Best Coaching Classes in Mulund, Best Classes in Mulund, Best JEE Classes in Mulund, Best CET Classes in Mulund, Best NEET Classes in Mulund, Science Classes Mulund, 11th Science Classes Mulund, 12th Science Classes Mulund, IIT Coaching Mulund')

@section('json_ld_schema')
{!! \App\Helpers\SeoHelper::faqSchema([
    [
        'question' => "What coaching programs does Newton's Academy offer in Mulund?",
        'answer' => "Newton's Academy offers targeted entrance coaching and board preparation courses: IIT-JEE (Mains & Advanced), NEET Medical Entrance, MHT-CET, 11th & 12th Science boards (HSC), and secondary school foundation courses (8th to 10th)."
    ],
    [
        'question' => "Why is Newton's Academy the best coaching class in Mulund?",
        'answer' => "Newton's Academy is recognized as a premier coaching classes in Mulund because of our expert faculty team, structured study notes, 24/7 dedicated support, limited batch sizes (up to 30 students), and consistently high results in board and entrance exams."
    ],
    [
        'question' => "Where is Newton's Academy located?",
        'answer' => "Our learning center is located at 1st floor Shrinivas Building, Opposite Kothari Farsan, Zaver Road, Mulund West, Mumbai, Maharashtra 400080. We welcome students from Mulund, Bhandup, Nahur, Thane, and surrounding areas."
    ],
    [
        'question' => "Does the academy support integrated HSC Board preparation?",
        'answer' => "Yes, our curriculum integrates HSC Board preparation with competitive exam coachings (JEE, NEET, MHT-CET) so students can balance board syllabus along with entrance exam strategies."
    ],
    [
        'question' => "What is the average batch size at your Mulund coaching centre?",
        'answer' => "We maintain a strict limit of 30 students per batch to ensure our senior teachers can focus on individual performance tracking and interactive conceptual learning."
    ]
]) !!}
@endsection

@section('content')

<!-- Semantic H1 Heading for SEO & Accessibility -->
<h1 class="visually-hidden">Newton's Academy - Best Coaching Classes in Mulund Mumbai | IIT-JEE, NEET & Science coaching</h1>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show text-center rounded-0 mb-0" role="alert" style="z-index: 9999;">
  <strong><i class="fas fa-check-circle me-2"></i> Success!</strong> {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<section id="hero_banner" class="container-v1">
    <div class="">

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
            <img src="{{ Storage::url($banner->desktop_image) }}" alt="{{ $banner->title ?? 'Banner' }}" class="d-block w-100 img-fluid">
          </picture>

          @if($banner->link)
            </a>
          @endif
        </div>
        @empty
        <div class="carousel-item active">
          <img src="{{ Storage::url('assets/images/1.jpg') }}" alt="Default Banner" class="d-block w-100 img-fluid">
        </div>
        @endforelse
        @else
        <div class="carousel-item active">
          <img src="{{ Storage::url('assets/images/1.jpg') }}" alt="Default Banner" class="d-block w-100 img-fluid">
        </div>
        @endif
      </div>

    </div>

  </div>
</section>


  <section class="stats-section container-v1">


    <div class="">
      <div class="stats-mob">
        <img src="{{ Storage::url('assets/images/counting.png') }}" class="img-fluid" alt="Newton's Academy Student Performance Statistics and Countings">
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







  <section class="phase-slider-section my-4 ">
    <div class="container-v1">
      <div id="phaseSlider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          @forelse($phaseSlides as $index => $slide)
          <!-- Slide {{ $index + 1 }} -->
          <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
            @if($slide->link_url)
              <a href="{{ $slide->link_url }}" target="_blank" class="d-block">
            @endif
            
            @if($slide->image)
              <img src="{{ Storage::url($slide->image) }}" class="d-block w-100 img-fluid rounded" alt="{{ $slide->title }}">
            @else
              <div class="p-5 text-center bg-light rounded border">
                <h5>{{ $slide->title }}</h5>
              </div>
            @endif
            
            @if($slide->link_url)
              </a>
            @endif
          </div>
          @empty
          <!-- Default Slide if empty -->
          <div class="carousel-item active">
            <div class="p-5 text-center bg-light rounded border">
              <h5>Dynamic Phase Banner Coming Soon</h5>
              <p>Manage this content from the admin dashboard.</p>
            </div>
          </div>
          @endforelse
        </div>

        <!-- Controls -->
        @if($phaseSlides->count() > 1)
          <button class="carousel-control-prev" type="button" data-bs-target="#phaseSlider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#phaseSlider" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
          </button>
        @endif
      </div>
    </div>
  </section>










  <section class="">
    <div class="">
      <div class="container-v1">
        <div class="courses-wrapper text-center">

          <h3 class="section-title mb-2">Courses We Offer</h3>
          <p class="text-muted mb-5">From JEE Mains & Advanced to MHT-CET, Science (XI–XII), Foundation (8th–10th),  and School Section <br> Newton's Academy, Mulund, has the right program for every student.</p>

          <div class="courses-grid text-start">
            <a href="{{ route('courses.jee-mains-advanced') }}" class="text-decoration-none">
              <div class="course-card">
                <div class="icon-box yellow">
                  <img src="{{ Storage::url('assets/images/jee.png') }}" class="img-fluid" alt="JEE Mains">
                </div>
                <h4>JEE Mains + Advanced</h4>
                <span>(Class XI & XII)</span>
              </div>
            </a>

            <a href="{{ route('courses.neet') }}" class="text-decoration-none">
              <div class="course-card">
                <div class="icon-box green">
                  <img src="{{ Storage::url('assets/images/neet.png') }}" class="img-fluid" alt="NEET">
                </div>
                <h4>NEET</h4>
                <span>(Class XI & XII)</span>
              </div>
            </a>

            <a href="{{ route('courses.mht-cet') }}" class="text-decoration-none">
              <div class="course-card">
                <div class="icon-box orange">
                  <img src="{{ Storage::url('assets/images/mht.png') }}" class="img-fluid" alt="MHT-CET">
                </div>
                <h4>MHT-CET</h4>
                <span>(Class XI & XII)</span>
              </div>
            </a>

            <a href="{{ route('courses.science') }}" class="text-decoration-none">
              <div class="course-card">
                <div class="icon-box blue">
                  <img src="{{ Storage::url('assets/images/comm.png') }}" class="img-fluid" alt="Science">
                </div>
                <h4>Science (XI & XII)</h4>
                <span>HSC State Board</span>
              </div>
            </a>

            <a href="{{ route('courses.foundation') }}" class="text-decoration-none">
              <div class="course-card">
                <div class="icon-box purple">
                  <img src="{{ Storage::url('assets/images/class.png') }}" class="img-fluid" alt="Foundation">
                </div>
                <h4>Foundation</h4>
                <span>(8th, 9th & 10th)</span>
              </div>
            </a>

            <a href="{{ route('courses.school-section') }}" class="text-decoration-none">
              <div class="course-card">
                <div class="icon-box blue">
                  <img src="{{ Storage::url('assets/images/class.png') }}" class="img-fluid" alt="School Section">
                </div>
                <h4>School Section</h4>
                <span>(CBSE | ICSE | SSC)</span>
              </div>
            </a>

          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="">
    <div class="">
      <div class="container-v1">
        <div class="courses-wrapper">

          <h3 class="section-title">Study Materials </h3>

          <div class="courses-grid">
            @foreach($studyClasses as $class)
            <a href="{{ route('study-material.years', ['class' => $class->slug]) }}">
              <div class="course-card">
                <div class="icon-box {{ ['blue', 'purple', 'yellow', 'green'][$loop->index % 4] }}">
                  <img src="{{ Storage::url($class->icon) }}" class="img-fluid" alt="{{ $class->name }} Study Materials Icon" title="{{ $class->name }} Study Materials">
                </div>
                <h4 class="study-class-name">{{ $class->name }}</h4>
                {{-- <span>{{ $class->studyYears->count() }} Years</span> --}}
              </div>
            </a>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>







  <section class="testimonial-section ">
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
            <img id="img" src="{{ Storage::url('assets/images/frme.webp') }}" alt="Student" class="img-fluid">

            {{-- <div class="slider-buttons">
              <button onclick="prev()">Prev</button>
              <button onclick="next()">Next</button>
            </div> --}}
          </div>

        </div>
      </div>

    </div>
  </section>




  <section class="why-choose-us">
    <div class="container container-v1">
      <h2 class="section-titless mb-4">Why Choose Us</h2>

      <div class="row justify-content-center gy-4">
        <!-- Item 1 -->
        <div class="col-md-4">
            <div class="why-card center">
              <div class="icon">
                <img src="{{ Storage::url('assets/images/cap.png') }}" class="img-fluid" alt="Expert Faculty Graduation Cap Icon">
              </div>
              <h5>Expert Faculty</h5>
              <p>Learn from IIT/AIIMS graduates</p>
            </div>
        </div>

        <!-- Item 2 -->
        <div class="col-md-4">
            <div class="why-card center">
              <div class="icon">
                <img src="{{ Storage::url('assets/images/book.png') }}" class="img-fluid" alt="Structured Study Material Book Icon">
              </div>
              <h5>Structured Material</h5>
              <p>Comprehensive study material</p>
            </div>
        </div>

        <!-- Item 3 -->
        <div class="col-md-4">
            <div class="why-card center">
              <div class="icon">
                <img src="{{ Storage::url('assets/images/whychoos.png') }}" class="img-fluid" alt="24/7 Support and Mentorship Icon">
              </div>
              <h5>24/7 Doubt Support</h5>
              <p>Get doubts resolved anytime</p>
            </div>
        </div>
      </div>
    </div>
  </section>












  <section class="success-bg ">
    <div class="container-v1">

      <!-- REVIEW SLIDER -->
      <div class="swiper reviewSwiper mb-5">
        <div class="swiper-wrapper">

          @forelse($reviews as $review)
          <div class="swiper-slide">
            <div class="review-card">
              <div class="review-head">
                @if($review->user_image)
                  <img src="{{ Storage::url($review->user_image) }}" alt="Avatar" class="avatar img-fluid" style="object-fit:cover;">
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

  <!-- FAQ SECTION FOR GOOGLE & AI ENGINES -->
  <section class="faq-section py-5" style="background-color: #f8f9fa;">
    <div class="container-v1 container">
      <div class="text-center mb-5">
        <h2 class="fw-bold" style="color: #0032A2; font-size: 32px;">Frequently Asked Questions (FAQs)</h2>
        <p class="text-muted">Common questions about admissions, coaching, and classes at Newton's Academy, Mulund.</p>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="accordion" id="faqAccordion">
            
            <div class="accordion-item border-0 mb-3 shadow-sm rounded-3 overflow-hidden" style="border-radius: 10px !important;">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="font-size: 16px; background-color: #fff;">
                  What coaching programs does Newton's Academy offer in Mulund?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                <div class="accordion-body bg-white text-muted" style="font-size: 15px; line-height: 1.6;">
                  Newton's Academy offers targeted entrance coaching and board preparation courses: IIT-JEE (Mains & Advanced), NEET Medical Entrance, MHT-CET, XI & XII Science boards (HSC), and secondary school foundation courses (8th to 10th).
                </div>
              </div>
            </div>

            <div class="accordion-item border-0 mb-3 shadow-sm rounded-3 overflow-hidden" style="border-radius: 10px !important;">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="font-size: 16px; background-color: #fff;">
                  Why is Newton's Academy the best coaching class in Mulund?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                <div class="accordion-body bg-white text-muted" style="font-size: 15px; line-height: 1.6;">
                  Newton's Academy is recognized as a premier coaching classes in Mulund because of our expert faculty team, structured study notes, 24/7 dedicated support, limited batch sizes (up to 30 students), and consistently high results in board and entrance exams.
                </div>
              </div>
            </div>

            <div class="accordion-item border-0 mb-3 shadow-sm rounded-3 overflow-hidden" style="border-radius: 10px !important;">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="font-size: 16px; background-color: #fff;">
                  Where is Newton's Academy located?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                <div class="accordion-body bg-white text-muted" style="font-size: 15px; line-height: 1.6;">
                  Our learning center is located at <strong>1st floor Shrinivas Building, Opposite Kothari Farsan, Zaver Road, Mulund West, Mumbai, Maharashtra 400080</strong>. We welcome students from Mulund, Bhandup, Nahur, Thane, and surrounding areas.
                </div>
              </div>
            </div>

            <div class="accordion-item border-0 mb-3 shadow-sm rounded-3 overflow-hidden" style="border-radius: 10px !important;">
              <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" style="font-size: 16px; background-color: #fff;">
                  Does the academy support integrated HSC Board preparation?
                </button>
              </h2>
              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                <div class="accordion-body bg-white text-muted" style="font-size: 15px; line-height: 1.6;">
                  Yes, our curriculum integrates HSC Board preparation with competitive exam coachings (JEE, NEET, MHT-CET) so students can balance board syllabus along with entrance exam strategies.
                </div>
              </div>
            </div>

            <div class="accordion-item border-0 mb-3 shadow-sm rounded-3 overflow-hidden" style="border-radius: 10px !important;">
              <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive" style="font-size: 16px; background-color: #fff;">
                  What is the average batch size at your Mulund coaching centre?
                </button>
              </h2>
              <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                <div class="accordion-body bg-white text-muted" style="font-size: 15px; line-height: 1.6;">
                  We maintain a strict limit of <strong>30 students per batch</strong> to ensure our senior teachers can focus on individual performance tracking and interactive conceptual learning.
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="latest-updates container-v1 ">
    <div class="container">
      <div class="latest-header mb-4">
        <h2>Latest Updates</h2>
        <a href="{{ route('blog') }}" class="read-blog">Read Blog</a>
      </div>

      <div class="row g-4">
        @forelse($blogs as $blog)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
          <a href="{{ route('blog.show', $blog->slug) }}" class="text-decoration-none">
            <div class="blog-card h-100 shadow-sm border-0 position-relative transition-hover">
              <div class="blog-img" style="height: 200px; overflow: hidden; background-color: #f8f9fa;">
                <span class="blog-tag z-index-1 text-uppercase fw-bold">{{ $blog->category->name ?? 'Blog' }}</span>
                @if($blog->image)
                  <img src="{{ Storage::url($blog->image) }}" alt="{{ $blog->title }}" class="w-100 h-100 object-fit-cover">
                @else
                  <div class="w-100 h-100 d-flex align-items-center justify-content-center text-muted">
                      <i class="fas fa-image fa-3x mb-3 text-light"></i>
                  </div>
                @endif
              </div>
              <div class="blog-content p-3 bg-white">
                <h6 class="text-dark fw-bold mb-2">{{ Str::limit($blog->title, 50) }}</h6>
                <p class="text-muted small mb-0">
                    <i class="far fa-user mr-1"></i> {{ $blog->author_name ?? 'Admin' }} 
                    &nbsp;&bull;&nbsp; 
                    <i class="far fa-calendar-alt mr-1"></i> {{ $blog->published_at ? $blog->published_at->format('M d, Y') : $blog->created_at->format('M d, Y') }}
                </p>
              </div>
            </div>
          </a>
        </div>
        @empty
        <div class="col-12 text-center py-4">
          <p class="text-muted">No recent blogs available.</p>
        </div>
        @endforelse
      </div>
    </div>
  </section>




@endsection