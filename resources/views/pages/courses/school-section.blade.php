@extends('layouts.app')

@section('title', 'School Section | Newton\'s Academy')

@section('content')
<section class="class12">
  <div class="container-v1">
     <!-- Banner -->
    <div class="class12-banner">
      <img src="{{ Storage::url('assets/images/program.png') }}" alt="School Section Program">
    </div>

  </div>


  <div class="container-v1">

   
    <h2 class="class12-title">SCHOOL SECTION</h2>

    <!-- TOP ROW -->
    <div class="row g-4 align-items-stretch">

      <!-- LEFT ABOUT -->
      <div class="col-lg-8">
        <div class="box about-box">
          <h5>About the Program</h5>
          <p>
            Our School Section program is designed for students from Class V to Class IX. This is the most critical phase where fundamental concepts in Mathematics and Science are formed. At Newton's Academy, we ensure that students develop a genuine interest in these subjects through interactive teaching methods, regular assessments, and a supportive learning environment that encourages curiosity and academic exploration.
          </p>
        </div>
      </div>

      <!-- RIGHT INFO -->
      <div class="col-lg-4">
        <div class="info-stack">

          <div class="box small-box">
            <span>Level</span>
            <strong>Primary & Secondary (V - IX)</strong>
          </div>

          <div class="box small-box">
            <span>Focus</span>
            <strong>Conceptual Basics & Mental Ability</strong>
          </div>

        </div>
      </div>

    </div>

    <!-- SECOND ROW -->
    <div class="row g-4 mt-1">

      <div class="col-md-6">
        <div class="box program-box">
          <h6>Academic Foundation</h6>
          <p>
            We strictly follow the school curriculum while adding extra layers of depth. Our focus remains on helping students secure top ranks in their school examinations by mastering the basics of Algebra, Geometry, and General Science.
          </p>
        </div>
      </div>

      <div class="col-md-6">
        <div class="box program-box">
          <h6>Olympiad & Talent Exams</h6>
          <p>
            For students looking for extra challenges, we provide specialized training for various competitive examinations like NSO, IMO, and Homi Bhabha. This prepares them for a competitive mindset from an early age.
          </p>
        </div>
      </div>

    </div>

    <!-- HIGHLIGHTS -->
    <div class="box highlights mt-4">
      <h6>Course Highlights</h6>

      <div class="row">
        <div class="col-md-6"><p class="right">Clear and simple conceptual explanations</p></div>
        <div class="col-md-6"><p class="right">Regular activity-based learning sessions</p></div>

        <div class="col-md-6"><p class="right">Personal attention to every student</p></div>
        <div class="col-md-6"><p class="right">Mental ability and logical reasoning skills</p></div>

      </div>
    
    </div>

  </div>
</section>
@endsection
