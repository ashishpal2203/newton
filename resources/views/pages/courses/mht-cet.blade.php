@extends('layouts.app')

@section('title', 'MHT-CET Preparation | Newton\'s Academy')

@section('content')
<section class="class12">
  <div class="container-v1">
     <!-- Banner -->
    <div class="class12-banner">
      <img src="{{ Storage::url('assets/images/program.png') }}" alt="MHT-CET Preparation">
    </div>

  </div>


  <div class="container-v1">

   
    <h2 class="class12-title">MHT-CET</h2>

    <!-- TOP ROW -->
    <div class="row g-4 align-items-stretch">

      <!-- LEFT ABOUT -->
      <div class="col-lg-8">
        <div class="box about-box">
          <h5>About the Program</h5>
          <p>
            The MHT-CET (Maharashtra Health and Technical Common Entrance Test) is the state-level entrance exam conducted by the Government of Maharashtra for admission to undergraduate courses in Engineering, Pharmacy, and Agriculture. Our program is meticulously aligned with the Maharashtra State Board syllabus, focusing on accuracy and speed—the two critical factors for success in this computer-based test.
          </p>
        </div>
      </div>

      <!-- RIGHT INFO -->
      <div class="col-lg-4">
        <div class="info-stack">

          <div class="box small-box">
            <span>Duration</span>
            <strong>1 - 2 Years (XI & XII)</strong>
          </div>

          <div class="box small-box">
            <span>Target</span>
            <strong>Top Engineering & Pharmacy Colleges in MH</strong>
          </div>

        </div>
      </div>

    </div>

    <!-- SECOND ROW -->
    <div class="row g-4 mt-1">

      <div class="col-md-6">
        <div class="box program-box">
          <h6>State Board Integration</h6>
          <p>
            Since MHT-CET is heavily based on the Maharashtra State Board textbooks, we ensure 100% mastery of the HSC curriculum. Our teaching methodology bridges the gap between theoretical board knowledge and the objective application required for CET.
          </p>
        </div>
      </div>

      <div class="col-md-6">
        <div class="box program-box">
          <h6>Speed & Accuracy Training</h6>
          <p>
            With 150-200 questions to solve in a limited time, speed is key. We conduct regular "speed-test" sessions and provide shortcut techniques in Mathematics and Physics to help students solve complex problems within seconds.
          </p>
        </div>
      </div>

    </div>

    <!-- HIGHLIGHTS -->
    <div class="box highlights mt-4">
      <h6>Course Highlights</h6>

      <div class="row">
        <div class="col-md-6"><p class="right">Focus on Maharashtra State Board syllabus</p></div>
        <div class="col-md-6"><p class="right">Extensive shortcut techniques for PCM/PCB</p></div>

        <div class="col-md-6"><p class="right">Computer-based mock test series</p></div>
        <div class="col-md-6"><p class="right">Previous year question analysis </p></div>

      </div>
    
    </div>

  </div>
</section>
@endsection
