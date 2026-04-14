@extends('layouts.app')
@section('content')

<section>
  <div class="container-v1">
    <div class="about-hero-section">
  <div class="about-hero-bg">
    <div class="about-hero-overlay"></div>
    <img src="{{ asset('assets/images/Container.png') }}" alt="Students">
  </div>

  <div class="about-content">
    <h2>
      {{ content('about', 'about_header_title', 'About Newton\'s Academy') }}
      <span></span>
    </h2>

    <p>
      {{ content('about', 'about_header_desc', 'Newton\'s Academy offers top-notch education for all students. Our dedicated team creates a nurturing learning environment. We cater to diverse academic backgrounds, encourage extracurricular activities, and support underprivileged students. Together, we empower students and contribute to literacy growth for a brighter future.') }}
    </p>
  </div>
  </div>
  </div>
</section>







<section class="container-v1">
  <div class="row g-4">

    <!-- Our Vision -->
    <div class="col-md-6">
      <div class="card h-100 border-0 shadow-lg rounded-4 p-4">
        <div class="d-flex align-items-center gap-3 mb-3">
          <div class="vm-icon">
            
            <img src="{{ asset('assets/images/my1.png') }}">
          </div>
          <h4 class="mb-0 fw-bold text-primary">Our Vision</h4>
        </div>
        <p class="text-muted mb-0">
          {{ content('about', 'about_vision_1', 'To become the leading education institution that empowers and inspires students to achieve their full potential and contribute to society\'s progress.') }}
        </p>
      </div>
    </div>

    <!-- Our Mission -->
    <div class="col-md-6">
      <div class="card h-100 border-0 shadow-lg rounded-4 p-4">
        <div class="d-flex align-items-center gap-3 mb-3">
          <div class="vm-icon">
             <img src="{{ asset('assets/images/my2.png') }}">
          </div>
          <h4 class="mb-0 fw-bold text-primary">Our Mission</h4>
        </div>
        <p class="text-muted mb-0">
          {{ content('about', 'about_mission_quote', 'Empowering families through education, one life at a time.') }}
        </p>
      </div>
    </div>

  </div>
</section>









<section class="hhh">
  <div class="container-v1 ">

    <div class="why-choose-wrap">

      <h3 class="why-choose-title">{{ content('about', 'about_why_heading', 'Why Choose Us') }}</h3>

      <div class="row g-4">

        <div class="col-lg-4 col-md-6">
          <div class="why-card">
            <span class="why-icon">
               <img src="{{ asset('assets/images/111.png') }}">
             </span>
            <h6>Top-Tier Faculty</h6>
            <p>Our faculty is comprised of IITians and Doctors dedicated to enhancing student success.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="why-card">
            <span class="why-icon">
             <img src="{{ asset('assets/images/222.png') }}">
           </span>
            <h6>Tailored Study Material</h6>
            <p>Faculty-designed materials tailored to boost confidence for competitive exams.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="why-card">
            <span class="why-icon">
             <img src="{{ asset('assets/images/333.png') }}">
           </span>
            <h6>Individualized Focus</h6>
            <p>Small class size (30 students) for individualized attention and better comprehension.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="why-card">
            <span class="why-icon"> 
              <img src="{{ asset('assets/images/444.png') }}">
            </span>
            <h6>Regular Tests</h6>
            <p>Regular assessment by experienced professors following current exam patterns.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="why-card">
            <span class="why-icon">
             <img src="{{ asset('assets/images/555.png') }}">
           </span>
            <h6>Library Facility</h6>
            <p>Wide range of books for competitive exams; hassle-free borrowing system.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="why-card">
            <span class="why-icon">
             <img src="{{ asset('assets/images/666.png') }}">

           </span>
            <h6>Parental Updates</h6>
            <p>Keeping parents up-to-date with homework status and performance.</p>
          </div>
        </div>

      </div>
    </div>

  </div>
</section>


<br><br>







   <div class="container-v1">
    <div class="cta-strip d-flex justify-content-between align-items-center flex-wrap gap-3">
      <div>
        <h6 class="mb-1 fw-bold text-white">{{ content('about', 'about_cta_heading', 'Talk to our expert for Free Counselling') }}</h6>
        <small class="text-white-50">
          {{ content('about', 'about_cta_sub', 'Get personalized guidance for your academic journey') }}
        </small>
      </div>

      <a href="tel:9137848668" class="btn btn-light btn-sm fw-semibold">
        <i class="bi bi-telephone"></i> Call Now: 91378 48668
      </a>
    </div>
    </div>













<section class="champions-section">
    <div class="container-v1">
        
        <h2 class="section-titles jj">Our Champions</h2>

        <div class="row g-4">

            <!-- Card 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="champion-card">
                    <div class="champion-header">
                        <img src="{{ asset('assets/images/test1.png') }}" alt="Neetu Yadav">
                        <div>
                            <h5>Neetu Yadav</h5>
                            <span>NEET</span>
                        </div>
                    </div>
                    <p>
                        Thanks to all the teachers at Newton's Academy, I was able to improve even my weakest subject.
                        Without their incredible support and attention it would not be possible for me to be able to crack NEET!
                    </p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="champion-card">
                    <div class="champion-header">
                        <img src="{{ asset('assets/images/test2.png') }}" alt="">
                        <div>
                            <h5>Sejal Vishwakarma</h5>
                            <span>10th</span>
                        </div>
                    </div>
                    <p>
                        It has been 3 years since I passed out but I am still connected with Newton's Academy.
                        I have never seen such compassionate teachers, especially Ganga Sir, who has guided me all along and I am pursuing Engineering now!
                    </p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="champion-card">
                    <div class="champion-header">
                      <img src="{{ asset('assets/images/test3.png') }}" alt="Neetu Yadav">
                        <div>
                            <h5>Mahima Singh</h5>
                            <span>12th</span>
                        </div>
                    </div>
                    <p>
                        I am studying in this class from last 3 years.
                        I experienced that every teachers provide their 100% effort.
                        I can assure you 100% that you will not gone regret after joining in this classes.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection