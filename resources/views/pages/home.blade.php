@extends('layouts.app')
@section('content')

<div class="container-fluid mob-fluid px-0">
  @php
    $slides = content('home', 'home_hero_slides', []);
    
    // Fallback if no slides but old single banner exists (Optional, but safer)
    $laptopBanner = content('home', 'home_hero_banner_laptop');
    $mobileBanner = content('home', 'home_hero_banner_mobile');
    if(count($slides) == 0 && ($laptopBanner || $mobileBanner)) {
        $slides = [[
            'laptop' => $laptopBanner,
            'mobile' => $mobileBanner,
            'seo_title' => content('home', 'home_hero_banner_seo_title'),
            'alt_tag' => content('home', 'home_hero_banner_alt')
        ]];
    }
  @endphp

  @if(count($slides) > 0)
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
      <div class="carousel-inner">
        @foreach($slides as $index => $slide)
          <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
            <div class="hero-banner-wrapper">
              <picture>
                @if(isset($slide['mobile']) && $slide['mobile'])
                  <source media="(max-width: 767px)" srcset="{{ asset('storage/' . $slide['mobile']) }}">
                @endif
                
                @if(isset($slide['laptop']) && $slide['laptop'])
                  <img src="{{ asset('storage/' . $slide['laptop']) }}" 
                       alt="{{ $slide['alt_tag'] ?? 'Newton Academy' }}" 
                       title="{{ $slide['seo_title'] ?? 'Newton Academy Banner' }}" 
                       class="d-block w-100 banner-img"
                       style="width:100%">
                @elseif(isset($slide['mobile']) && $slide['mobile'])
                   {{-- Fallback to mobile if laptop is missing --}}
                   <img src="{{ asset('storage/' . $slide['mobile']) }}" 
                       alt="{{ $slide['alt_tag'] ?? 'Newton Academy' }}" 
                       title="{{ $slide['seo_title'] ?? 'Newton Academy Banner' }}" 
                       class="d-block w-100 banner-img"
                       style="width:100%">
                @else
                   <img src="{{ asset('assets/images/1.jpg') }}" class="d-block w-100 banner-img" style="width:100%">
                @endif
              </picture>
            </div>
          </div>
        @endforeach
      </div>
      @if(count($slides) > 1)
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      @endif
    </div>
  @else
    {{-- Default static fallback banner --}}
    <div class="hero-banner-wrapper">
      <img src="{{ asset('assets/images/1.jpg') }}" alt="Newton Academy" class="d-block w-100 banner-img" style="width:100%">
    </div>
  @endif
</div>


<section class="stats-section">


  <div class="container-fluid">
    <div class="stats-mob">
      <img src="{{ asset('assets/images/counting.png') }}">
    </div>
    
  <div class="stats-box">
    @php $stats = content('home', 'home_stats', [
        ['num' => '5000', 'text' => 'STUDENTS'],
        ['num' => '100', 'text' => 'FACULTY'],
        ['num' => '250', 'text' => 'SELECTIONS'],
        ['num' => '1000', 'text' => 'TESTS']
    ]); @endphp
    @foreach($stats as $stat)
    <div class="stat-item">
      <h2 class="counter" data-target="{{ $stat['num'] ?? '0' }}">0</h2>
      <p>{{ $stat['text'] ?? '' }}</p>
    </div>
    @endforeach
  </div>
  </div>




</section>







<section class="phase-slider-section my-4">
  <div class="container-fluid">
    <div id="phaseSlider" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        @php $phases = content('home', 'home_phases', [
            [
                'badge' => '🏆 Phase 3 starts 1st Feb',
                'title' => 'Final revision with Top Rankers’ Strategy.',
                'link_text' => 'Top Rankers’ Strategy',
                'desc' => 'Get personalized feedback on all your tests, all your tests.',
                'link' => '#'
            ]
        ]); @endphp
        @foreach($phases as $index => $phase)
        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
          <div class="phase-card">
            <div class="phase-left">
              @if($phase['badge'] ?? '')
              <span class="phase-badge">
                {{ $phase['badge'] }}
              </span>
              @endif

              <h5>
                {{ $phase['title'] ?? '' }}
                @if($phase['link_text'] ?? '')
                <a href="{{ $phase['link'] ?? '#' }}">{{ $phase['link_text'] }}</a>
                @endif
              </h5>

              <p>
                {{ $phase['desc'] ?? '' }}
              </p>

              <a href="{{ $phase['link'] ?? '#' }}" class="btn btn-sm mtttbtn">Join Now</a>
            </div>

            <div class="phase-right">
              {{-- For now, mentors are static or we could add another nested repeater. 
                   The user said 'dont disturb frontend', so I'll keep the two mentor slots but pull from phase data if we add those fields later.
                   For now, keeping them simple. --}}
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
        @endforeach
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
      @foreach($courses as $course)
      <a href="{{ route('courses.show', $course->slug) }}" class="text-decoration-none">
        <div class="course-card border-0 shadow-sm">
          <div class="icon {{ $course->home_color }}">
            @if($course->home_icon)
              <img src="{{ asset('storage/' . $course->home_icon) }}" alt="{{ $course->title }}" style="width: 24px; height: 24px; object-fit: contain;">
            @else
              <i class="bi bi-mortarboard-fill"></i>
            @endif
          </div>
          <h4 class="mt-3 mb-1 text-dark">{{ $course->title }}</h4>
          <span class="text-muted small">{{ $course->home_subtitle }}</span>
        </div>
      </a>
      @endforeach
    </div>     </a>

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
      @php $studies = content('home', 'home_study', [
          ['title' => 'Class X', 'subtitle' => '8 Subjects', 'link' => '#'],
          ['title' => 'Class XII', 'subtitle' => '8 Subjects', 'link' => '#'],
          ['title' => 'JEE Mains', 'subtitle' => '3 Subjects', 'link' => '#'],
          ['title' => 'NEET', 'subtitle' => '3 Subjects', 'link' => '#']
      ]); @endphp
      @foreach($studies as $study)
      <a href="{{ $study['link'] ?? '#' }}">
      <div class="course-card">
        <div class="icon-box">
          <img src="{{ asset('assets/images/class.png') }}">
        </div>
        <h4>{{ $study['title'] ?? '' }}</h4>
        <span>{{ $study['subtitle'] ?? '' }}</span>
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
      <h3 id="st-name" class="student-name"></h3>
      <p id="st-rank" class="student-rank"></p>
      <p id="st-msg" class="testimonial-message"></p>
    </div>
    </div>
    <div class="col-md-6 col-12 col-sm-12">
    <!-- Right Image -->
    <div class="testimonial-image">
      <img id="st-img" src="{{ asset('assets/images/frme.png') }}" alt="Student">
      <div class="slider-buttons">
        <button onclick="prev()">Prev</button>
        <button onclick="next()">Next</button>
      </div>
    </div>
  </div>
  </div>
  </div>
</section>

@php 
  $testimonials = content('home', 'home_testimonials', [
      ['name' => 'Priya Sharma', 'rank' => 'AIR 245', 'message' => 'Excellent coaching!', 'image' => 'assets/images/frme.png'],
      ['name' => 'Rahul Desai', 'rank' => 'NEET 680/720', 'message' => 'Highly recommended!', 'image' => 'assets/images/frme.png']
  ]);
  // Prepare for JS
  $tJson = json_encode($testimonials);
@endphp

<script>
  const testimonials = {!! $tJson !!};
  let currentT = 0;
  
  function updateT() {
    if(!testimonials.length) return;
    const t = testimonials[currentT];
    document.getElementById('st-name').innerText = t.name || '';
    document.getElementById('st-rank').innerText = t.rank || '';
    document.getElementById('st-msg').innerText = t.message || '';
    if(t.image) {
      let src = t.image.includes('/') ? "{{ asset('storage') }}/" + t.image : "{{ asset('') }}" + t.image;
      document.getElementById('st-img').src = src;
    }
  }
  
  function next() {
    currentT = (currentT + 1) % testimonials.length;
    updateT();
  }
  function prev() {
    currentT = (currentT - 1 + testimonials.length) % testimonials.length;
    updateT();
  }
  
  document.addEventListener('DOMContentLoaded', updateT);
</script>




<section class="why-choose-us">
  <div class="container">
    <h2 class="section-titless">{{ content('home', 'home_why_heading', 'Why Choose Us') }}</h2>

    <div class="row justify-content-center">
      <!-- Item 1 -->
      <div class="col-md-4">
        <a href="{{ url('about-us') }}">
        <div class="why-card center">
          <div class="icon">
             <img src="{{ asset('assets/images/cap.png') }}">
          </div>
          <h5>{{ content('home', 'home_why_1_title', 'Expert Faculty') }}</h5>
          <p>{{ content('home', 'home_why_1_desc', 'Learn from IIT/AIIMS graduates') }}</p>
        </div>
        </a>
      </div>

      <!-- Item 2 -->
      <div class="col-md-4">
        <a href="{{ url('about-us') }}">
        <div class="why-card center">
          <div class="icon">
            <img src="{{ asset('assets/images/book.png') }}">
          </div>
          <h5>{{ content('home', 'home_why_2_title', 'Structured Material') }}</h5>
          <p>{{ content('home', 'home_why_2_desc', 'Comprehensive study material') }}</p>
        </div>
        </a>
      </div>

      <!-- Item 3 -->
      <div class="col-md-4">
        <a href="{{ url('about-us') }}">
        <div class="why-card center">
          <div class="icon">
            <img src="{{ asset('assets/images/whychoos.png') }}">
          </div>
          <h5>{{ content('home', 'home_why_3_title', '24/7 Doubt Support') }}</h5>
          <p>{{ content('home', 'home_why_3_desc', 'Get doubts resolved anytime') }}</p>
        </div>
      </a>
      </div>
    </div>
  </div>
</section>












<section class="success-bg">
  <div class="container-fluid">

    <!-- REVIEW SLIDER -->
    <div class="swiper reviewSwiper">
      <div class="swiper-wrapper">
        @php $successStories = content('home', 'home_success', [
            ['name' => 'Priya Sharma', 'meta' => 'JEE Advanced 2024', 'stars' => 5, 'text' => 'The structured approach helped me secure AIR 245!', 'avatar' => 'P'],
            ['name' => 'Rahul Desai', 'meta' => 'NEET 2024', 'stars' => 5, 'text' => 'Expert faculty and great environment.', 'avatar' => 'R']
        ]); @endphp
        @foreach($successStories as $story)
        <div class="swiper-slide">
          <div class="review-card">
            <div class="review-head">
              <div class="avatar">{{ $story['avatar'] ?? 'N' }}</div>
              <div>
                <h6>{{ $story['name'] ?? '' }}</h6>
                <span>{{ $story['meta'] ?? '' }}</span>
              </div>
            </div>
            <div class="stars">
              @for($i=0; $i<($story['stars'] ?? 5); $i++) ★ @endfor
            </div>
            <p>{{ $story['text'] ?? '' }}</p>
          </div>
        </div>
        @endforeach
      </div>

      <!-- 
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div> -->
    </div>

    <!-- NICHE WALA SUCCESS STORY BOX -->
    <div class="success-mini-wrap">
       <button class="btn btn-primary rounded-circle shadow"
          style="width:55px;height:55px;"
          data-bs-toggle="modal"
          data-bs-target="#reviewModal">
      <span class="plus-btn">+</span>
    </button>


      <div class="success-mini">
        <p>Success Stories</p>
        <div class="stars disabled">★★★★★</div>
      </div>
    </div>

  </div>
</section>



<!-- Review Modal -->
<div class="modal fade" id="reviewModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content rounded-4 border-0 shadow">

      <!-- Header -->
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold">Add Your Review</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Body -->
      <div class="modal-body">
        <form>

          <div class="mb-3">
            <label class="form-label">Your Name</label>
            <input type="text" class="form-control" placeholder="Enter your name">
          </div>

          <div class="mb-3">
            <label class="form-label">Course / Exam</label>
            <input type="text" class="form-control" placeholder="JEE / NEET / CET">
          </div>

          <div class="mb-3">
            <label class="form-label">Rating</label>
            <div class="text-warning fs-4">
              ★ ★ ★ ★ ★
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Your Review</label>
            <textarea class="form-control" rows="4"
              placeholder="Write your experience..."></textarea>
          </div>

        </form>
      </div>

      <!-- Footer -->
      <div class="modal-footer border-0">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button class="btn btn-primary">Submit Review</button>
      </div>

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
      @php $updates = content('home', 'home_updates', [
            ['category' => 'EXAM TIPS', 'title' => 'How to revise Physics in 30 Days?', 'meta' => '12 Dec 2024 · 5 min read'],
            ['category' => 'UPDATES', 'title' => 'New Batch starting for JEE 2026', 'meta' => '15 Dec 2024 · 2 min read']
      ]); @endphp
      @foreach($updates as $update)
      <div class="col-md-6 col-sm-12 col-12">
        <!-- Blog Card -->
        <div class="blog-card card-blog">
          <div class="blog-thumb"></div>
          <div class="blog-content">
            <span class="blog-category">{{ $update['category'] ?? 'UPDATE' }}</span>
            <h3>{{ $update['title'] ?? '' }}</h3>
            <p class="blog-meta">{{ $update['meta'] ?? '' }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
</div>
</section>

@endsection