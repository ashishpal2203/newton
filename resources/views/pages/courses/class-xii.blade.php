@extends('layouts.app')

@section('title', 'Class XII – Program | Newton\'s Academy')

@section('content')
<section class="class12">
  <div class="container-v1">
     <!-- Banner -->
    <div class="class12-banner">
      <img src="{{ Storage::url('assets/images/program.png') }}" alt="Class XII Program">
    </div>

  </div>


  <div class="container-v1">

   
    <h2 class="class12-title">CLASS XII</h2>

    <!-- TOP ROW -->
    <div class="row g-4 align-items-stretch">

      <!-- LEFT ABOUT -->
      <div class="col-lg-8">
        <div class="box about-box">
          <h5>About the Program</h5>
          <p>
            The Class XII program at Newton's Academy is the pinnacle of our school-level academic offerings. This crucial year focuses on mastering the advanced curriculum of Physics, Chemistry, and Mathematics/Biology. We emphasize deep conceptual understanding, rigorous practice, and time-management skills to ensure students excel in their Higher Secondary Certificate (HSC) exams while simultaneously preparing for various entrance examinations.
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
            <strong>Students currently in or entering Class XII</strong>
          </div>

        </div>
      </div>

    </div>

    <!-- SECOND ROW -->
    <div class="row g-4 mt-1">

      <div class="col-md-6">
        <div class="box program-box">
          <h6>HSC Board Excellence</h6>
          <p>
            We provide specialized coaching tailored to the HSC Board requirements. This includes detailed coverage of textbooks, regular solving of board-pattern papers, and intensive mock practical sessions. Our goal is to ensure every student secures top-tier marks in their board results.
          </p>
        </div>
      </div>

      <div class="col-md-6">
        <div class="box program-box">
          <h6>Integrated Entrance Support</h6>
          <p>
            Recognizing the importance of competitive exams, our Class XII curriculum is integrated with core concepts required for JEE, NEET, and MHT-CET. We provide additional problem-solving workshops and specialized materials to bridge the gap between board exams and entrance tests.
          </p>
        </div>
      </div>

    </div>

    <!-- HIGHLIGHTS -->
    <div class="box highlights mt-4">
      <h6>Course Highlights</h6>

      <div class="row">
        <div class="col-md-6"><p class="right">Intensive HSC Board syllabus coverage</p></div>
        <div class="col-md-6"><p class="right">Weekly full-length board pattern tests</p></div>

        <div class="col-md-6"><p class="right">Personalized mentoring for career choices</p></div>
        <div class="col-md-6"><p class="right">Advanced laboratory practice and guidance</p></div>

      </div>
    
    </div>

  </div>
</section>
@endsection
