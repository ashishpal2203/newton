@extends('layouts.app')

@section('title', "Science Coaching for Class 11 & 12 in Mulund, Mumbai | Newton's Academy")

@section('content')
<section class="class12">
  <div class="container-v1">
     <!-- Banner -->
    <div class="class12-banner">
      <img src="{{ Storage::url('assets/images/program.png') }}" alt="Science Coaching Program">
    </div>

  </div>


  <div class="container-v1">

   
    <h2 class="class12-title">Science Coaching for Class XI & XII in Mulund, Mumbai</h2>

    <!-- TOP ROW -->
    <div class="row g-4 align-items-stretch">

      <!-- LEFT ABOUT -->
      <div class="col-lg-8">
        <div class="box about-box">
          <h5>About the Program</h5>
          <p>
            Joining Science stream in Class XI is a big step — and the jump from 10th to 11th is one of the biggest academic challenges a student faces. Newton's Academy in Mulund, Mumbai, offers dedicated Science coaching for Class XI and XII students across HSC (Maharashtra State Board), helping them build strong fundamentals in Physics, Chemistry, Mathematics, and Biology. Whether your child wants to pursue engineering, medicine, or simply score well in HSC boards — our Science program gives them the foundation they need to succeed.
          </p>
        </div>
      </div>

      <!-- RIGHT INFO -->
      <div class="col-lg-4">
        <div class="info-stack">

          <div class="box small-box">
            <span>Duration</span>
            <strong>1–2 Years (Class XI + XII)</strong>
          </div>

          <div class="box small-box">
            <span>Subjects</span>
            <strong>Physics | Chemistry | Mathematics | Biology</strong>
          </div>

          <div class="box small-box">
            <span>Board</span>
            <strong>HSC — Maharashtra State Board</strong>
          </div>
          
          <div class="box small-box">
            <span>Eligibility</span>
            <strong>Students entering Class XI with Science stream</strong>
          </div>

        </div>
      </div>

    </div>

    <!-- SECOND ROW -->
    <div class="row g-4 mt-1">

      <div class="col-12">
        <div class="box program-box">
          <h6>Why Science Coaching at Newton's Academy, Mulund?</h6>
          <p>
            The Class XI–XII Science syllabus is vast, conceptual, and demanding. Without proper guidance, many students struggle to keep up — especially in Physics and Mathematics. At our Mulund coaching centre, we break down complex topics into simple, understandable concepts, ensure students stay on top of their HSC syllabus, and prepare them for board exams with regular tests and practice.
          </p>
        </div>
      </div>

    </div>

    <!-- HIGHLIGHTS -->
    <div class="box highlights mt-4">
      <h6>What's Included</h6>

      <div class="row">
        <div class="col-md-6"><p class="right">Complete HSC Science syllabus coverage — Physics, Chemistry, Maths, Biology</p></div>
        <div class="col-md-6"><p class="right">Chapter-wise tests and unit tests aligned with HSC board exam pattern</p></div>

        <div class="col-md-6"><p class="right">Separate doubt-clearing sessions — before and after lectures</p></div>
        <div class="col-md-6"><p class="right">Focused preparation for HSC board practicals and theory paper</p></div>

        <div class="col-md-6"><p class="right">Small batches — every student gets individual attention at our Mulund centre</p></div>
        <div class="col-md-6"><p class="right">Regular parent updates on test scores and academic progress</p></div>
      </div>
    
    </div>

  </div>
</section>
@endsection
