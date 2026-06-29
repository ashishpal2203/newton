@extends('layouts.app')

@section('title', "MHT-CET Coaching Classes in Mulund, Mumbai | Newton's Academy")
@section('meta_description', 'Newton\'s Academy provides top MHT-CET coaching classes in Mulund West. Dedicated entrance training for Engineering & Pharmacy aspirants of Class XI & XII.')
@section('meta_keywords', 'Best CET Classes in Mulund, MHT CET Coaching Mulund, Engineering Entrance Coaching Mulund, CET classes in Mumbai')

@section('json_ld_schema')
{!! \App\Helpers\SeoHelper::courseSchema(
    "MHT-CET Coaching Classes",
    "Comprehensive prep course for Maharashtra Common Entrance Test (MHT-CET) for Engineering and Pharmacy, focusing on board-aligned concepts and shortcuts.",
    "2 Years",
    "mht-cet-classes-in-mulund"
) !!}

{!! \App\Helpers\SeoHelper::faqSchema([
    [
        'question' => "What is the duration of the MHT-CET coaching in Mulund?",
        'answer' => "The MHT-CET coaching classes at Newton's Academy is a 2-year classroom course for Class XI and XII science students."
    ],
    [
        'question' => "Are board exam concepts aligned with MHT-CET coaching?",
        'answer' => "Yes, since the MHT-CET exam is fully aligned with the Maharashtra HSC State Board syllabus, our classes integrate board preparations with CET shortcuts and speed test tactics."
    ],
    [
        'question' => "Do you provide mock tests for MHT-CET preparation?",
        'answer' => "Yes, we provide online and offline test series designed exactly on the latest MHT-CET computer-based test interface."
    ]
]) !!}

{!! \App\Helpers\SeoHelper::breadcrumbSchema([
    'Courses' => 'courses',
    'MHT-CET Classes' => 'mht-cet-classes-in-mulund'
]) !!}
@endsection

@section('content')
<section class="class12">
  <div class="container-v1">
     <!-- Banner -->
    <div class="class12-banner">
      <img src="{{ Storage::url('assets/images/program.png') }}" alt="MHT-CET engineering coaching classroom program at Newton's Academy, Mulund" title="MHT-CET Coaching Program Banner">
    </div>

  </div>


  <div class="container-v1">

   
    <h1 class="class12-title">MHT-CET Coaching Classes in Mulund, Mumbai</h1>

    <!-- TOP ROW -->
    <div class="row g-4 align-items-stretch">

      <!-- LEFT ABOUT -->
      <div class="col-lg-8">
        <div class="box about-box">
          <h5>About the Program</h5>
          <p>
            Newton's Academy offers focused MHT-CET coaching classes in Mulund, Mumbai - designed for Maharashtra students aiming at top engineering and pharmacy colleges in the state. MHT-CET is conducted by the Government of Maharashtra and is the main pathway to admission in Maharashtra's engineering and pharmacy colleges. Since the exam is based on the Maharashtra State Board HSC syllabus, students who build strong board fundamentals have a natural edge - and that's exactly what we build at our Mulund coaching centre.
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
            <strong>Physics | Chemistry | Mathematics (Engineering) / Biology (Pharmacy)</strong>
          </div>

          <div class="box small-box">
            <span>Eligibility</span>
            <strong>Students in Class XI or XII with PCM or PCB stream</strong>
          </div>

        </div>
      </div>

    </div>

    <!-- SECOND ROW -->
    <div class="row g-4 mt-1">

      <div class="col-md-6">
        <div class="box program-box h-100">
          <h6>State Board Integration</h6>
          <p>
            MHT-CET tests exactly what HSC teaches - but in a fast, objective format. At Newton's Academy, Mulund, we ensure students master the Maharashtra State Board HSC syllabus completely. Our teaching bridges the gap between board preparation and CET objective application - so students are strong in both without feeling like they're studying for two separate exams.
          </p>
        </div>
      </div>

      <div class="col-md-6">
        <div class="box program-box h-100">
          <h6>Speed & Accuracy Training</h6>
          <p>
            In MHT-CET, you need to solve up to 200 questions in a limited time - speed and accuracy are everything. Our faculty conducts regular timed speed-test sessions and teaches proven shortcut techniques in Physics, Chemistry, and Mathematics to help students solve faster without losing accuracy.
          </p>
        </div>
      </div>

    </div>

    <!-- HIGHLIGHTS -->
    <div class="box highlights mt-4">
      <h6>What's Included</h6>

      <div class="row">
        <div class="col-md-6"><p class="right">100% focus on Maharashtra State Board HSC syllabus - the backbone of MHT-CET</p></div>
        <div class="col-md-6"><p class="right">Shortcut techniques for PCM/PCB to maximize speed and accuracy</p></div>

        <div class="col-md-6"><p class="right">Regular computer-based mock tests simulating actual MHT-CET conditions</p></div>
        <div class="col-md-6"><p class="right">Previous year MHT-CET paper analysis - topic-wise and chapter-wise</p></div>

        <div class="col-md-6"><p class="right">Small batches at our Mulund West centre - personal attention for every student</p></div>
        <div class="col-md-6"><p class="right">Integrated board + CET preparation - no need to choose one over the other</p></div>
      </div>
    
    </div>

  </div>
</section>
@endsection
