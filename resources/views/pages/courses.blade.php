@extends('layouts.app')

@section('title', "Our Courses | Newton's Academy")

@section('content')
<section class="">
  <div class="container-v1">
    <div class="">
      <div class="courses-wrapper">
        <h3 class="section-title">Explore Our Specialist Courses</h3>

        <div class="courses-grid">
          <a href="{{ route('courses.class-x') }}" class="text-decoration-none">
            <div class="course-card">
              <div class="icon-box blue">
                <img src="{{ Storage::url('assets/images/PYQLibrary.png') }}" class="img-fluid" alt="Class X">
              </div>
              <h4>Class X</h4>
              <span>8 Subjects</span>
            </div>
          </a>

          <a href="{{ route('courses.class-xii') }}" class="text-decoration-none">
            <div class="course-card">
              <div class="icon-box purple">
                <img src="{{ Storage::url('assets/images/class.png') }}" class="img-fluid" alt="Class XII">
              </div>
              <h4>Class XII</h4>
              <span>8 Subjects</span>
            </div>
          </a>

          <a href="{{ route('courses.jee-mains-advanced') }}" class="text-decoration-none">
            <div class="course-card">
              <div class="icon-box yellow">
                <img src="{{ Storage::url('assets/images/jee.png') }}" class="img-fluid" alt="JEE Mains">
              </div>
              <h4>JEE Mains</h4>
              <span>3 Subjects</span>
            </div>
          </a>

          <a href="{{ route('courses.neet') }}" class="text-decoration-none">
            <div class="course-card">
              <div class="icon-box green">
                <img src="{{ Storage::url('assets/images/neet.png') }}" class="img-fluid" alt="NEET">
              </div>
              <h4>NEET</h4>
              <span>3 Subjects</span>
            </div>
          </a>

          <a href="{{ route('courses.school-section') }}" class="text-decoration-none">
            <div class="course-card">
              <div class="icon-box blue">
                <img src="{{ Storage::url('assets/images/School.png') }}" class="img-fluid" alt="School Section">
              </div>
              <h4>School Section</h4>
              <span>3 Subjects</span>
            </div>
          </a>

          <a href="{{ route('courses.sci-comm') }}" class="text-decoration-none">
            <div class="course-card">
              <div class="icon-box blue">
                <img src="{{ Storage::url('assets/images/comm.png') }}" class="img-fluid" alt="Sci & Comm">
              </div>
              <h4>Sci & Comm</h4>
              <span>8 Subjects</span>
            </div>
          </a>

          <a href="{{ route('courses.mht-cet') }}" class="text-decoration-none">
            <div class="course-card">
              <div class="icon-box orange">
                <img src="{{ Storage::url('assets/images/mht.png') }}" class="img-fluid" alt="MHT-CET">
              </div>
              <h4>MHT-CET</h4>
              <span>(XI & XII)</span>
            </div>
          </a>

          <a href="{{ route('courses.integrated-classes') }}" class="text-decoration-none">
            <div class="course-card">
              <div class="icon-box green">
                <img src="{{ Storage::url('assets/images/class.png') }}" class="img-fluid" alt="Integrated Classes">
              </div>
              <h4>Integrated Classes</h4>
              <span>8 Subjects</span>
            </div>
          </a>

        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('styles')
<style>
.courses-grid a { text-decoration: none !important; color: inherit; }
.course-card { transition: transform 0.3s ease, box-shadow 0.3s ease; }
.course-card:hover { transform: translateY(-5px); box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important; }
</style>
@endpush