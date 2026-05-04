@extends('layouts.app')

@section('title', "Foundation Coaching for 8th 9th 10th in Mulund, Mumbai | Newton's Academy")

@section('content')
<section class="class12">
  <div class="container-v1">
     <!-- Banner -->
    <div class="class12-banner">
      <img src="{{ Storage::url('assets/images/program.png') }}" alt="Foundation Coaching Program">
    </div>

  </div>


  <div class="container-v1">

   
    <h2 class="class12-title">Foundation Course for 8th, 9th & 10th Grade — Mulund, Mumbai</h2>

    <!-- TOP ROW -->
    <div class="row g-4 align-items-stretch">

      <!-- LEFT ABOUT -->
      <div class="col-lg-8">
        <div class="box about-box">
          <h5>About the Program</h5>
          <p>
            The foundation years — Class 8th, 9th, and 10th — are the most critical in a student's academic journey. Strong concepts built during these years directly impact how well a student performs in Class XI, XII, and competitive exams like JEE, NEET, and MHT-CET. Newton's Academy in Mulund West, Mumbai, offers a dedicated Foundation program for 8th, 9th, and 10th grade students — focused on building deep conceptual clarity in Science and Mathematics while also preparing them for SSC board exams.
          </p>
        </div>
      </div>

      <!-- RIGHT INFO -->
      <div class="col-lg-4">
        <div class="info-stack">

          <div class="box small-box">
            <span>Grades</span>
            <strong>Class 8th | 9th | 10th</strong>
          </div>

          <div class="box small-box">
            <span>Subjects</span>
            <strong>Mathematics | Science (Physics, Chemistry, Biology)</strong>
          </div>

          <div class="box small-box">
            <span>Board</span>
            <strong>SSC — Maharashtra State Board</strong>
          </div>

        </div>
      </div>

    </div>

    <!-- SECOND ROW -->
    <div class="row g-4 mt-1">

      <div class="col-12">
        <div class="box program-box">
          <h6>Why Start Early?</h6>
          <p>
            Most students who struggle in JEE or NEET preparation trace their difficulties back to weak 9th and 10th grade concepts. At Newton's Academy, Mulund, our Foundation program ensures students don't just pass their SSC exams — they genuinely understand what they're learning. That understanding is what sets them up for success in competitive exams later.
          </p>
        </div>
      </div>

    </div>

    <!-- HIGHLIGHTS -->
    <div class="box highlights mt-4">
      <h6>What's Included</h6>

      <div class="row">
        <div class="col-md-6"><p class="right">Concept-first teaching in Mathematics and Science for 8th, 9th, and 10th grade</p></div>
        <div class="col-md-6"><p class="right">Regular chapter-wise and unit tests aligned with SSC board exam pattern</p></div>

        <div class="col-md-6"><p class="right">Special focus on 10th grade SSC board preparation</p></div>
        <div class="col-md-6"><p class="right">Early introduction to JEE/NEET concepts for 9th and 10th grade students who want a head start</p></div>

        <div class="col-md-6"><p class="right">Small batches — personal attention for every student at our Mulund centre</p></div>
        <div class="col-md-6"><p class="right">Regular parent updates on homework, tests, and academic progress</p></div>
      </div>
    
    </div>

  </div>
</section>
@endsection
