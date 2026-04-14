@extends('layouts.app')

@section('title', 'Science & Commerce | Newton\'s Academy')

@section('content')
<section class="class12">
  <div class="container-v1">
     <!-- Banner -->
    <div class="class12-banner">
      <img src="{{ Storage::url('assets/images/program.png') }}" alt="Science & Commerce Program">
    </div>

  </div>


  <div class="container-v1">

   
    <h2 class="class12-title">Science & Commerce</h2>

    <!-- TOP ROW -->
    <div class="row g-4 align-items-stretch">

      <!-- LEFT ABOUT -->
      <div class="col-lg-8">
        <div class="box about-box">
          <h5>About the Program</h5>
          <p>
            At Newton's Academy, we provide specialized coaching for both Science and Commerce streams for Class XI and XII. Our Science program focuses on engineering and medical foundations, while our Commerce program is tailored for students aiming for careers in Chartered Accountancy, Management, and Finance. We pride ourselves on providing expert faculty for every core subject, ensuring students are well-prepared for their board exams and beyond.
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
            <span>Streams Available</span>
            <strong>Science & Commerce</strong>
          </div>

        </div>
      </div>

    </div>

    <!-- SECOND ROW -->
    <div class="row g-4 mt-1">

      <div class="col-md-6">
        <div class="box program-box">
          <h6>Science Excellence</h6>
          <p>
            Our Science division focuses on Physics, Chemistry, Biology, and Mathematics. We use advanced teaching aids and practical-oriented approaches to help students master complex concepts and excel in their board examinations.
          </p>
        </div>
      </div>

      <div class="col-md-6">
        <div class="box program-box">
          <h6>Commerce Mastery</h6>
          <p>
            The Commerce stream covers Book-keeping & Accountancy, Economics, and Organization of Commerce. We prepare students for professional challenges by focusing on analytical skills and real-world business concepts.
          </p>
        </div>
      </div>

    </div>

    <!-- HIGHLIGHTS -->
    <div class="box highlights mt-4">
      <h6>Course Highlights</h6>

      <div class="row">
        <div class="col-md-6"><p class="right">Expert faculty for all core subjects</p></div>
        <div class="col-md-6"><p class="right">Detailed study material for boards</p></div>

        <div class="col-md-6"><p class="right">Regular counseling for career paths</p></div>
        <div class="col-md-6"><p class="right">Topic-wise mock tests and analysis</p></div>

      </div>
    
    </div>

  </div>
</section>
@endsection
