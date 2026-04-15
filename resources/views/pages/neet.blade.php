@extends('layouts.app')
@section('content')

<section class="class12">
  <div class="container-fluid">
     <!-- Banner -->
    <div class="class12-banner">
      <img src="{{ Storage::url('assets/images/program.png') }}" alt="">
    </div>

  </div>


  <div class="container-fluid">

   
    <h2 class="class12-title">NEET</h2>

    <!-- TOP ROW -->
    <div class="row g-4 align-items-stretch">

      <!-- LEFT ABOUT -->
      <div class="col-lg-8">
        <div class="box about-box">
          <h5>About the Program</h5>
          <p>The JEE (Joint Entrance Examination) is India's premier engineering entrance exam, divided into two stages: JEE Main and JEE Advanced. This comprehensive program is designed to prepare students for both levels, covering the complete syllabus with in-depth conceptual understanding and rigorous problem-solving practice.    </p>
        </div>
      </div>

      <!-- RIGHT INFO -->
      <div class="col-lg-4">
        <div class="info-stack">

          <div class="box small-box">
            <span>Duration</span>
            <strong>2 Years (XI & XII)</strong>
          </div>

          <div class="box small-box">
            <span>Eligibility</span>
            <strong>Students in Class X or XI with PCM stream</strong>
          </div>

        </div>
      </div>

    </div>

    <!-- SECOND ROW -->
    <div class="row g-4 mt-1">

      <div class="col-md-6">
        <div class="box program-box">
          <h6>JEE Main</h6>
          <p>
            JEE Main serves as the gateway to National Institutes of Technology (NITs), Indian Institutes of Information Technology (IIITs), and other centrally funded technical institutions. It's also the qualifying examination for JEE Advanced. The exam tests students in Physics, Chemistry, and Mathematics with a focus on application-based problem-solving.
          </p>
        </div>
      </div>

      <div class="col-md-6">
        <div class="box program-box">
          <h6>JEE Advanced</h6>
          <p>
            JEE Advanced is the entrance examination for the prestigious Indian Institutes of Technology (IITs). Only the top 2.5 lakh candidates from JEE Main are eligible to appear for this exam. It demands a deeper understanding of concepts and exceptional analytical skills, featuring challenging multi-concept problems that test creativity and logical reasoning.
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









<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br><br>
<br>
<br>
<br>
<br>

@endsection