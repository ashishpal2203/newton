@extends('layouts.app')

@section('title', "Foundation Coaching for 8th 9th 10th in Mulund, Mumbai | Newton's Academy")
@section('meta_description', 'Newton\'s Academy provides specialized Foundation Courses for Class 8th, 9th, and 10th. Strong conceptual groundwork for future JEE, NEET, and Olympiads prep.')
@section('meta_keywords', 'Foundation Classes Mulund, 8th coaching Mulund, 9th classes Mulund, 10th board coaching Mulund, Olympiad preparation Zaver road')

@section('json_ld_schema')
{!! \App\Helpers\SeoHelper::courseSchema(
    "Foundation Course for 8th, 9th & 10th",
    "Conceptual foundation training program in Science and Mathematics for secondary school students to prepare them for JEE, NEET, and Olympiad entrance exams.",
    "1 Year",
    "foundation-classes-in-mulund"
) !!}

{!! \App\Helpers\SeoHelper::faqSchema([
    [
        'question' => "What is the key objective of the Foundation coaching classes in Mulund?",
        'answer' => "The primary objective is to strengthen basic and advanced concepts in Mathematics and Science, prepping students early for future competitive exams like JEE, NEET, Olympiads, and NTSE."
    ],
    [
        'question' => "Which classes are covered in the Foundation program?",
        'answer' => "The foundation course is customized for students studying in Class 8, 9, and 10."
    ],
    [
        'question' => "Is this course beneficial for standard school board exams?",
        'answer' => "Yes, we cover school board syllabi (CBSE/ICSE/SSC) along with additional advanced topics, ensuring excellent school results alongside entrance prep."
    ]
]) !!}

{!! \App\Helpers\SeoHelper::breadcrumbSchema([
    'Courses' => 'courses',
    'Foundation Classes' => 'foundation-classes-in-mulund'
]) !!}
@endsection

@section('content')
<section class="class12">
  <div class="container-v1">
     <!-- Banner -->
    <div class="class12-banner">
      <img src="{{ Storage::url('assets/images/program.png') }}" alt="Secondary school science and math Foundation coaching program at Newton's Academy, Mulund" title="Foundation Coaching Program Banner">
    </div>

  </div>


  <div class="container-v1">

   
    <h1 class="class12-title">Foundation Course for 8th, 9th & 10th Grade - Mulund, Mumbai</h1>

    <!-- TOP ROW -->
    <div class="row g-4 align-items-stretch">

      <!-- LEFT ABOUT -->
      <div class="col-lg-8">
        <div class="box about-box">
          <h5>About the Program</h5>
          <p>
            The foundation years - Class 8th, 9th, and 10th - are the most critical in a student's academic journey. Strong concepts built during these years directly impact how well a student performs in Class XI, XII, and competitive exams like JEE, NEET, and MHT-CET. Newton's Academy in Mulund West, Mumbai, offers a dedicated Foundation program for 8th, 9th, and 10th grade students - focused on building deep conceptual clarity in Science and Mathematics while also preparing them for SSC board exams.
          </p>
        </div>
      </div>

      <!-- RIGHT INFO -->
      <div class="col-lg-4">
        <div class="info-stack">

          <div class="box small-box">
            <span>Grades</span>
            <strong>Class 8th | 9th | 10th</strong>
          </div>

          <div class="box small-box">
            <span>Subjects</span>
            <strong>Mathematics | Science (Physics, Chemistry, Biology)</strong>
          </div>

          <div class="box small-box">
            <span>Board</span>
            <strong>ICSE | CBSE | SSC</strong>
          </div>

        </div>
      </div>

    </div>

    <!-- SECOND ROW -->
    <div class="row g-4 mt-1">

      <div class="col-12">
        <div class="box program-box">
          <h6>Why Start Early?</h6>
          <p>
            Most students who struggle in JEE or NEET preparation trace their difficulties back to weak 9th and 10th grade concepts. At Newton's Academy, Mulund, our Foundation program ensures students don't just pass their SSC exams - they genuinely understand what they're learning. That understanding is what sets them up for success in competitive exams later.
          </p>
        </div>
      </div>

    </div>

    <!-- HIGHLIGHTS -->
    <div class="box highlights mt-4">
      <h6>What's Included</h6>

      <div class="row">
        <div class="col-md-6"><p class="right">Concept-first teaching in Mathematics and Science for 8th, 9th, and 10th grade</p></div>
        <div class="col-md-6"><p class="right">Regular chapter-wise and unit tests aligned with SSC board exam pattern</p></div>

        <div class="col-md-6"><p class="right">Special focus on 10th grade SSC board preparation</p></div>
        <div class="col-md-6"><p class="right">Early introduction to JEE/NEET concepts for 9th and 10th grade students who want a head start</p></div>

        <div class="col-md-6"><p class="right">Small batches - personal attention for every student at our Mulund centre</p></div>
        <div class="col-md-6"><p class="right">Regular parent updates on homework, tests, and academic progress</p></div>
      </div>
    
    </div>

  </div>
</section>
@endsection
