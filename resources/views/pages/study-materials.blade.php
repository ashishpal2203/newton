@extends('layouts.app')

@section('title', "Free Study Materials & Past Papers | Newton's Academy")
@section('meta_description', 'Download free study materials, PYQs (Previous Year Questions), and solved board/entrance question papers at Newton\'s Academy, Mulund.')
@section('meta_keywords', 'Newton\'s Academy study materials, free PYQs download, Class 10 board papers, Class 12 solved papers')

@section('json_ld_schema')
{!! \App\Helpers\SeoHelper::breadcrumbSchema([
    'Study Materials' => 'study-material'
]) !!}
@endsection

@section('content')

<br>





<section>
  <div class="container-v1 ">
  <div class="courses-section">
  <div class="courses-wrapper">

    <h1 class="section-title fw-bold" style="color: #0032A2; font-size: 32px;">Free Study Materials & Past Papers</h1>

    <div class="courses-grid">

       <a href="{{ url('pyq-class-x-1st-page') }}">
      <div class="course-card">
        <div class="icon-box blue">
          <img src="{{ Storage::url('assets/images/PYQLibrary.png') }}">
        </div>
        <h4>Class X</h4>
        <span>8 Subjects</span>
      </div>
    </a>

     <a href="{{ url('pyq-class-x-1st-page') }}">
      <div class="course-card">
        <div class="icon-box purple">
          
          <img src="{{ Storage::url('assets/images/class.png') }}">
        </div>
        <h4>Class XII</h4>
        <span>8 Subjects</span>
      </div>
      </a>


      <a href="{{ url('pyq-class-x-1st-page') }}">
      <div class="course-card">
        <div class="icon-box yellow">
          <img src="{{ Storage::url('assets/images/jee.png') }}">
        </div>
        <h4>JEE Mains</h4>
        <span>3 Subjects</span>
      </div>
       </a>
      
      <a href="{{ url('pyq-class-x-1st-page') }}">
      <div class="course-card">
        <div class="icon-box green">
        <img src="{{ Storage::url('assets/images/neet.png') }}">
        </div>
        <h4>NEET</h4>
        <span>3 Subjects</span>
      </div>
      </a>

    </div>
  </div>
  </div>
</div>
</section>






<br>

@endsection