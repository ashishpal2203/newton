@extends('layouts.app')

@section('title', 'NEET Preparation | Newton\'s Academy')

@section('content')
<section class="class12">
  <div class="container-v1">
     <!-- Banner -->
    <div class="class12-banner">
      <img src="{{ Storage::url('assets/images/program.png') }}" alt="NEET Preparation">
    </div>

  </div>


  <div class="container-v1">

   
    <h2 class="class12-title">NEET</h2>

    <!-- TOP ROW -->
    <div class="row g-4 align-items-stretch">

      <!-- LEFT ABOUT -->
      <div class="col-lg-8">
        <div class="box about-box">
          <h5>About the Program</h5>
          <p>
            The NEET (National Eligibility cum Entrance Test) is the common entrance examination for students who wish to study undergraduate medical courses (MBBS) and dental courses (BDS) in government or private medical and dental colleges in India. Our NEET program is specifically designed to master the Biology, Physics, and Chemistry required to excel in this highly competitive exam.
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
            <strong>Students in Class X or XI with PCB stream</strong>
          </div>

        </div>
      </div>

    </div>

    <!-- SECOND ROW -->
    <div class="row g-4 mt-1">

      <div class="col-md-6">
        <div class="box program-box">
          <h6>Medical Foundation</h6>
          <p>
            We build a rock-solid foundation in Biology, covering the entire NCERT syllabus with intensive supplementary material. Our faculty focuses on conceptual understanding of human physiology, genetics, and ecology, ensuring students are well-equipped for the medical career.
          </p>
        </div>
      </div>

      <div class="col-md-6">
        <div class="box program-box">
          <h6>Conceptual Science</h6>
          <p>
            Physics and Chemistry for NEET require a different approach. We focus on simplified problem-solving techniques and core concepts that appear frequently in medical entrance tests, helping students tackle even the most challenging numericals with confidence.
          </p>
        </div>
      </div>

    </div>

    <!-- HIGHLIGHTS -->
    <div class="box highlights mt-4">
      <h6>Course Highlights</h6>

      <div class="row">
        <div class="col-md-6"><p class="right">In-depth Biology specialization </p></div>
        <div class="col-md-6"><p class="right">Regular mock tests on NEET pattern</p></div>

        <div class="col-md-6"><p class="right">Personalized performance mapping</p></div>
        <div class="col-md-6"><p class="right">Expert faculty from medical background</p></div>

      </div>
    
    </div>

  </div>
</section>
@endsection
