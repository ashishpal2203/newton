@extends('layouts.app')

@section('title', "JEE Mains & Advanced Coaching in Mulund, Mumbai | Newton's Academy")
@section('meta_description', 'Newton\'s Academy is the leading JEE Main & Advanced coaching classes in Mulund West. Highly structured 2-year course for Class XI & XII PCM students.')
@section('meta_keywords', 'Best JEE Classes in Mulund, IIT Coaching Mulund, JEE Mains Coaching Mulund, JEE Advanced Classes Mulund, Zaver road JEE coaching')

@section('json_ld_schema')
{!! \App\Helpers\SeoHelper::courseSchema(
    "IIT-JEE Mains & Advanced Coaching",
    "A comprehensive, concept-first 2-year preparation coaching program for IIT-JEE Mains and JEE Advanced entrance exams, integrated with HSC board syllabus.",
    "2 Years",
    "jee-classes-in-mulund"
) !!}

{!! \App\Helpers\SeoHelper::faqSchema([
    [
        'question' => "What is the duration of the JEE coaching classes in Mulund?",
        'answer' => "The JEE Mains & Advanced classroom coaching program at Newton's Academy is a comprehensive 2-year program for students in Class XI and XII."
    ],
    [
        'question' => "Are board preparations covered along with JEE Mains & Advanced?",
        'answer' => "Yes, we offer fully integrated coaching where the HSC Board syllabus is integrated with competitive JEE entrance coaching so students prepare for both simultaneously."
    ],
    [
        'question' => "What is the student batch limit for JEE classes?",
        'answer' => "To ensure highly personalized attention, we maintain small batch sizes of up to 30 students per class at our Mulund West coaching center."
    ]
]) !!}

{!! \App\Helpers\SeoHelper::breadcrumbSchema([
    'Courses' => 'courses',
    'JEE Mains & Advanced' => 'jee-classes-in-mulund'
]) !!}
@endsection

@section('content')
<section class="class12">
  <div class="container-v1">
     <!-- Banner -->
    <div class="class12-banner">
      <img src="{{ Storage::url('assets/images/program.png') }}" alt="JEE Mains and Advanced coaching classroom program at Newton's Academy, Mulund" title="JEE Coaching Program Banner">
    </div>
  </div>

  <div class="container-v1">
   
    <h1 class="class12-title">JEE Mains + Advanced Coaching Classes in Mulund, Mumbai</h1>

    <!-- TOP ROW -->
    <div class="row g-4 align-items-stretch">

      <!-- LEFT ABOUT -->
      <div class="col-lg-8">
        <div class="box about-box">
          <h5>About the Program</h5>
          <p>
            Newton's Academy is one of Mulund's most trusted coaching institutes for JEE preparation. Located in Mulund West, Mumbai, we offer a focused, structured program for JEE Mains and JEE Advanced - built for students in Class XI and XII who are serious about cracking IIT and NIT. Our JEE program goes beyond textbook teaching. We focus on deep conceptual clarity, high-difficulty problem practice, and the exam temperament needed to perform under pressure - whether you're aiming for JEE Mains or the full Advanced level.
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
            JEE Mains is the qualifying exam for NITs, IIITs, and other top engineering colleges - and the gateway to JEE Advanced. At our Mulund coaching centre, we cover the complete PCM syllabus with concept-first teaching, application-based problem solving, and regular mock tests aligned with the latest NTA exam pattern.
          </p>
        </div>
      </div>

      <div class="col-md-6">
        <div class="box program-box h-100">
          <h6>About JEE Advanced</h6>
          <p>
            JEE Advanced is the gateway to India's 23 IITs - and only the top 2.5 lakh JEE Mains qualifiers are eligible to appear. It demands not just knowledge, but exceptional analytical thinking and multi-concept problem solving. At Newton's Academy, Mulund, we train students for Advanced from Day 1 - with high-difficulty problem sets and dedicated doubt-clearing sessions.
          </p>
        </div>
      </div>

    </div>

    <!-- HIGHLIGHTS -->
    <div class="box highlights mt-4">
      <h6>What's Included</h6>

      <div class="row">
        <div class="col-md-6"><p class="right">Complete syllabus coverage - Physics, Chemistry, Mathematics for JEE Mains + Advanced</p></div>
        <div class="col-md-6"><p class="right">Weekly and monthly mock tests on the latest JEE exam pattern</p></div>

        <div class="col-md-6"><p class="right">Dedicated doubt-clearing sessions before and after every lecture</p></div>
        <div class="col-md-6"><p class="right">Personal performance analysis and one-on-one feedback</p></div>

        <div class="col-md-6"><p class="right">HSC Board preparation integrated - no need to choose between boards and JEE</p></div>
        <div class="col-md-6"><p class="right">Small batches of max 30 students - individual attention at our Mulund centre</p></div>
      </div>
    
    </div>

  </div>
</section>
@endsection
