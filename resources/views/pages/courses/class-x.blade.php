@extends('layouts.app')

@section('title', 'Class X – Program | Newton\'s Academy')

@section('content')
<section class="class12">
  <div class="container-v1">
     <!-- Banner -->
    <div class="class12-banner">
      <img src="{{ Storage::url('assets/images/program.png') }}" alt="Class X Program">
    </div>

  </div>


  <div class="container-v1">

   
    <h2 class="class12-title">CLASS X</h2>

    <!-- TOP ROW -->
    <div class="row g-4 align-items-stretch">

      <!-- LEFT ABOUT -->
      <div class="col-lg-8">
        <div class="box about-box">
          <h5>About the Program</h5>
          <p>
            The Class X program at Newton's Academy is meticulously designed to provide students with a strong academic foundation. We focus on conceptual clarity across all core subjects, preparing students not just for their board examinations but for future competitive challenges. Our integrated approach combines rigorous curriculum coverage with personality development and critical thinking skills.
          </p>
        </div>
      </div>

      <!-- RIGHT INFO -->
      <div class="col-lg-4">
        <div class="info-stack">

          <div class="box small-box">
            <span>Duration</span>
            <strong>1 Year (Academic Session)</strong>
          </div>

          <div class="box small-box">
            <span>Eligibility</span>
            <strong>Students currently in or entering Class X</strong>
          </div>

        </div>
      </div>

    </div>

    <!-- SECOND ROW -->
    <div class="row g-4 mt-1">

      <div class="col-md-6">
        <div class="box program-box">
          <h6>Board Preparation</h6>
          <p>
            Our specialized board preparation modules focus on the latest patterns and marking schemes. We provide structured revision plans, regular weekly tests, and comprehensive analysis of previous year papers to ensure students achieve their maximum potential in the final exams.
          </p>
        </div>
      </div>

      <div class="col-md-6">
        <div class="box program-box">
          <h6>Foundation for JEE/NEET</h6>
          <p>
            For students aiming for future excellence, we introduce higher-level concepts in Mathematics and Science. This early exposure helps in building the analytical mindset required for prestigious entrance exams like JEE and NEET, giving our students a significant competitive advantage.
          </p>
        </div>
      </div>

    </div>

    <!-- HIGHLIGHTS -->
    <div class="box highlights mt-4">
      <h6>Course Highlights</h6>

      <div class="row">
        <div class="col-md-6"><p class="right">Comprehensive coverage of NCERT and advanced topics</p></div>
        <div class="col-md-6"><p class="right">Regular mock tests and previous year papers</p></div>

        <div class="col-md-6"><p class="right">Dedicated doubt-clearing sessions</p></div>
        <div class="col-md-6"><p class="right">Performance analysis and personalized feedback</p></div>

      </div>
    
    </div>

  </div>
</section>
@endsection
