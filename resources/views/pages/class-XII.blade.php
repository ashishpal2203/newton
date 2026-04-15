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

   
    <h2 class="class12-title">CLASS XII</h2>

    <!-- TOP ROW -->
    <div class="row g-4 align-items-stretch">

      <!-- LEFT ABOUT -->
      <div class="col-lg-8">
        <div class="box about-box">
          <h5>About the Program</h5>
          <p>
            The JEE (Joint Entrance Examination) is India's premier engineering entrance exam, divided into two stages: JEE Main and JEE Advanced. This comprehensive program is designed to prepare students for both levels, covering the complete syllabus with in-depth conceptual understanding and rigorous problem-solving practice.
          </p>
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
            <strong>Class XI / XII (PCM)</strong>
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
            Focus on NCERT based concepts with problem solving
            for national level entrance exams.
          </p>
        </div>
      </div>

      <div class="col-md-6">
        <div class="box program-box">
          <h6>JEE Advanced</h6>
          <p>
            Advanced level conceptual clarity and analytical thinking
            for IIT admissions.
          </p>
        </div>
      </div>

    </div>

    <!-- HIGHLIGHTS -->
    <div class="box highlights mt-4">
      <h6>Course Highlights</h6>

      <div class="row">
        <div class="col-md-6"><p class="right">Complete JEE syllabus coverage</p></div>
        <div class="col-md-6"><p class="right">Daily practice problems</p></div>

        <div class="col-md-6"><p class="right">Regular tests & analysis</p></div>
        <div class="col-md-6"><p class="right">Expert faculty & mentorship</p></div>

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