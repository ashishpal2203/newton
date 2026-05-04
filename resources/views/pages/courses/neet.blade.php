@extends('layouts.app')

@section('title', "NEET Coaching Classes in Mulund, Mumbai | Newton's Academy")

@section('content')
<section class="class12">
  <div class="container-v1">
     <!-- Banner -->
    <div class="class12-banner">
      <img src="{{ Storage::url('assets/images/program.png') }}" alt="NEET Preparation">
    </div>

  </div>


  <div class="container-v1">

   
    <h2 class="class12-title">NEET Coaching Classes in Mulund, Mumbai</h2>

    <!-- TOP ROW -->
    <div class="row g-4 align-items-stretch">

      <!-- LEFT ABOUT -->
      <div class="col-lg-8">
        <div class="box about-box">
          <h5>About the Program</h5>
          <p>
            Newton's Academy is one of Mulund's most trusted NEET coaching institutes — helping medical aspirants from Mulund West, Bhandup, Nahur, and Thane build the knowledge, speed, and confidence to crack NEET and secure MBBS or BDS admission. NEET (National Eligibility cum Entrance Test) is the single national entrance exam for all medical and dental admissions across India. With over 20 lakh students competing every year for limited seats, cracking NEET requires more than just hard work — it requires the right guidance, strong Biology fundamentals, and consistent pattern-based practice. At Newton's Academy, Mulund West, our experienced faculty provides exactly that — in small batches, with personal attention, and a genuine commitment to every student's success.
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
            <strong>Physics | Chemistry | Biology</strong>
          </div>

          <div class="box small-box">
            <span>Eligibility</span>
            <strong>Students entering Class XI with PCB stream</strong>
          </div>

        </div>
      </div>

    </div>

    <!-- SECOND ROW -->
    <div class="row g-4 mt-1">

      <div class="col-md-6">
        <div class="box program-box h-100">
          <h6>Biology — The Heart of NEET</h6>
          <p>
            Biology carries the highest weightage in NEET — and at our Mulund coaching centre, we treat it that way. We cover the complete NCERT Biology syllabus with intensive depth — human physiology, genetics, ecology, plant biology, cell biology, and more. Our faculty doesn't just explain chapters; they make students visualize, retain, and apply concepts exactly the way NEET questions demand.
          </p>
        </div>
      </div>

      <div class="col-md-6">
        <div class="box program-box h-100">
          <h6>Physics & Chemistry for NEET</h6>
          <p>
            NEET Physics and Chemistry have their own flavor — and our Mulund faculty knows it well. We focus on simplified problem-solving techniques, high-frequency NEET topics, and the kind of numerical practice that builds real speed and accuracy. Students who struggle with Physics and Chemistry often find their turning point at Newton's Academy.
          </p>
        </div>
      </div>

    </div>

    <!-- HIGHLIGHTS -->
    <div class="box highlights mt-4">
      <h6>What's Included</h6>

      <div class="row">
        <div class="col-md-6"><p class="right">In-depth Biology coverage — complete NCERT + supplementary material for NEET</p></div>
        <div class="col-md-6"><p class="right">Focused Physics and Chemistry coaching with NEET-specific problem-solving techniques</p></div>

        <div class="col-md-6"><p class="right">Weekly subject-wise tests modelled on actual NEET paper pattern with negative marking</p></div>
        <div class="col-md-6"><p class="right">Personalized performance tracking — faculty identifies weak areas and works on them individually</p></div>

        <div class="col-md-6"><p class="right">Dedicated doubt-clearing sessions before and after every lecture</p></div>
        <div class="col-md-6"><p class="right">Small batches at our Mulund centre — every NEET aspirant gets personal attention</p></div>

        <div class="col-md-6"><p class="right">HSC board preparation integrated — students don't have to choose between boards and NEET</p></div>
        <div class="col-md-6"><p class="right">Regular parent updates on test scores and overall academic progress</p></div>
      </div>
    
    </div>

  </div>
</section>
@endsection
