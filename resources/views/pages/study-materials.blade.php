@extends('layouts.app')
@section('content')

<br>





<section>
  <div class="container-v1 ">
  <div class="courses-section">
  <div class="courses-wrapper">

    <h3 class="section-title">Study Materials </h3>

    <div class="courses-grid">

       <a href="{{ url('pyq-class-x-1st-page') }}">
      <div class="course-card">
        <div class="icon-box blue">
          <img src="{{ asset('assets/images/PYQLibrary.png') }}">
        </div>
        <h4>Class X</h4>
        <span>8 Subjects</span>
      </div>
    </a>

     <a href="{{ url('pyq-class-x-1st-page') }}">
      <div class="course-card">
        <div class="icon-box purple">
          
          <img src="{{ asset('assets/images/class.png') }}">
        </div>
        <h4>Class XII</h4>
        <span>8 Subjects</span>
      </div>
      </a>


      <a href="{{ url('pyq-class-x-1st-page') }}">
      <div class="course-card">
        <div class="icon-box yellow">
          <img src="{{ asset('assets/images/jee.png') }}">
        </div>
        <h4>JEE Mains</h4>
        <span>3 Subjects</span>
      </div>
       </a>
      
      <a href="{{ url('pyq-class-x-1st-page') }}">
      <div class="course-card">
        <div class="icon-box green">
        <img src="{{ asset('assets/images/neet.png') }}">
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