@extends('layouts.app')

@section('title', 'Integrated Classes | Newton\'s Academy')

@section('content')
<section class="class12">
  <div class="container-v1">
     <!-- Banner -->
    <div class="class12-banner">
      <img src="{{ Storage::url('assets/images/program.png') }}" alt="Integrated Classes Program">
    </div>

  </div>


  <div class="container-v1">

   
    <h2 class="class12-title">Integrated Classes</h2>

    <!-- TOP ROW -->
    <div class="row g-4 align-items-stretch">

      <!-- LEFT ABOUT -->
      <div class="col-lg-8">
        <div class="box about-box">
          <h5>About the Program</h5>
          <p>
            Our Integrated Classes program is a premium offering that combines regular school/college curriculum with advanced competitive exam preparation under one roof. This program is designed to save students' time by eliminating the need for separate coaching and school visits for core subjects. We work in collaboration with select institutions to provide a seamless learning experience where academic excellence is the primary focus.
          </p>
        </div>
      </div>

      <!-- RIGHT INFO -->
      <div class="col-lg-4">
        <div class="info-stack">

          <div class="box small-box">
            <span>Duration</span>
            <strong>2 Years (HSC + Entrance)</strong>
          </div>

          <div class="box small-box">
            <span>Advantage</span>
            <strong>Time Saving & Focused Learning</strong>
          </div>

        </div>
      </div>

    </div>

    <!-- SECOND ROW -->
    <div class="row g-4 mt-1">

      <div class="col-md-6">
        <div class="box program-box">
          <h6>Seamless Curriculum</h6>
          <p>
            The integrated approach ensures that a topic is covered from both board and entrance perspectives simultaneously. This prevents confusion and double-work for the student, leading to better conceptual clarity and memory retention.
          </p>
        </div>
      </div>

      <div class="col-md-6">
        <div class="box program-box">
          <h6>Expert In-house Faculty</h6>
          <p>
            All subjects are taught by our senior faculty members who are experts in their respective fields. Students benefit from consistent teaching styles and personalized attention throughout their two-year journey.
          </p>
        </div>
      </div>

    </div>

    <!-- HIGHLIGHTS -->
    <div class="box highlights mt-4">
      <h6>Course Highlights</h6>

      <div class="row">
        <div class="col-md-6"><p class="right">Unified schedule for boards and entrance</p></div>
        <div class="col-md-6"><p class="right">Significant time-saving for students</p></div>

        <div class="col-md-6"><p class="right">Continuous assessment and tracking</p></div>
        <div class="col-md-6"><p class="right">All-inclusive study material and tests</p></div>

      </div>
    
    </div>

  </div>
</section>
@endsection
