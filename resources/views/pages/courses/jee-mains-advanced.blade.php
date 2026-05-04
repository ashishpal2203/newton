@extends('layouts.app')

@section('title', "JEE Mains & Advanced Coaching in Mulund, Mumbai | Newton's Academy")

@section('content')
<section class="class12">
  <div class="container-v1">
     <!-- Banner -->
    <div class="class12-banner">
      <img src="{{ Storage::url('assets/images/program.png') }}" alt="JEE Main + Advanced Program">
    </div>
  </div>

  <div class="container-v1">
   
    <h2 class="class12-title">JEE Mains + Advanced Coaching Classes in Mulund, Mumbai</h2>

    <!-- TOP ROW -->
    <div class="row g-4 align-items-stretch">

      <!-- LEFT ABOUT -->
      <div class="col-lg-8">
        <div class="box about-box">
          <h5>About the Program</h5>
          <p>
            Newton's Academy is one of Mulund's most trusted coaching institutes for JEE preparation. Located in Mulund West, Mumbai, we offer a focused, structured program for JEE Mains and JEE Advanced — built for students in Class XI and XII who are serious about cracking IIT and NIT. Our JEE program goes beyond textbook teaching. We focus on deep conceptual clarity, high-difficulty problem practice, and the exam temperament needed to perform under pressure — whether you're aiming for JEE Mains or the full Advanced level.
          </p>
        </div>
      </div>

      <!-- RIGHT INFO -->
      <div class="col-lg-4">
        <div class="info-stack">

          <div class="box small-box">
            <span>Duration</span>
            <strong>2 Years (Class XI + XII)</strong>
          </div>

          <div class="box small-box">
            <span>Subjects</span>
            <strong>Physics | Chemistry | Mathematics</strong>
          </div>

          <div class="box small-box">
            <span>Eligibility</span>
            <strong>Students entering Class XI with PCM stream</strong>
          </div>

        </div>
      </div>

    </div>

    <!-- SECOND ROW -->
    <div class="row g-4 mt-1">

      <div class="col-md-6">
        <div class="box program-box h-100">
          <h6>About JEE Mains</h6>
          <p>
            JEE Mains is the qualifying exam for NITs, IIITs, and other top engineering colleges — and the gateway to JEE Advanced. At our Mulund coaching centre, we cover the complete PCM syllabus with concept-first teaching, application-based problem solving, and regular mock tests aligned with the latest NTA exam pattern.
          </p>
        </div>
      </div>

      <div class="col-md-6">
        <div class="box program-box h-100">
          <h6>About JEE Advanced</h6>
          <p>
            JEE Advanced is the gateway to India's 23 IITs — and only the top 2.5 lakh JEE Mains qualifiers are eligible to appear. It demands not just knowledge, but exceptional analytical thinking and multi-concept problem solving. At Newton's Academy, Mulund, we train students for Advanced from Day 1 — with high-difficulty problem sets and dedicated doubt-clearing sessions.
          </p>
        </div>
      </div>

    </div>

    <!-- HIGHLIGHTS -->
    <div class="box highlights mt-4">
      <h6>What's Included</h6>

      <div class="row">
        <div class="col-md-6"><p class="right">Complete syllabus coverage — Physics, Chemistry, Mathematics for JEE Mains + Advanced</p></div>
        <div class="col-md-6"><p class="right">Weekly and monthly mock tests on the latest JEE exam pattern</p></div>

        <div class="col-md-6"><p class="right">Dedicated doubt-clearing sessions before and after every lecture</p></div>
        <div class="col-md-6"><p class="right">Personal performance analysis and one-on-one feedback</p></div>

        <div class="col-md-6"><p class="right">HSC Board preparation integrated — no need to choose between boards and JEE</p></div>
        <div class="col-md-6"><p class="right">Small batches of max 30 students — individual attention at our Mulund centre</p></div>
      </div>
    
    </div>

  </div>
</section>
@endsection
