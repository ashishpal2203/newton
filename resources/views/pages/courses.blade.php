@extends('layouts.app')

@section('title', "Our Courses | Newton's Academy")

@section('content')
<section class="">
  <div class="container-v1">
    <div class="">
      <div class="courses-wrapper text-center">
        <h3 class="section-title mb-2">Coaching Courses in Mulund, Mumbai</h3>
        <p class="text-muted mb-5">From JEE Mains & Advanced to MHT-CET, Science (XI–XII), Foundation (8th–10th), and School Section — Newton's Academy, has the right program for every student.</p>

        <div class="courses-grid text-start">

          <a href="{{ route('courses.jee-mains-advanced') }}" class="text-decoration-none">
            <div class="course-card">
              <div class="icon-box yellow">
                <img src="{{ Storage::url('assets/images/jee.png') }}" class="img-fluid" alt="JEE Mains">
              </div>
              <h4>JEE Mains + Advanced</h4>
              <span>(Class XI & XII)</span>
            </div>
          </a>

          {{-- <a href="{{ route('courses.neet') }}" class="text-decoration-none">
            <div class="course-card">
              <div class="icon-box green">
                <img src="{{ Storage::url('assets/images/neet.png') }}" class="img-fluid" alt="NEET">
              </div>
              <h4>NEET</h4>
              <span>(Class XI & XII)</span>
            </div>
          </a> --}}

          <a href="{{ route('courses.mht-cet') }}" class="text-decoration-none">
            <div class="course-card">
              <div class="icon-box orange">
                <img src="{{ Storage::url('assets/images/mht.png') }}" class="img-fluid" alt="MHT-CET">
              </div>
              <h4>MHT-CET</h4>
              <span>(Class XI & XII)</span>
            </div>
          </a>

          <a href="{{ route('courses.science') }}" class="text-decoration-none">
            <div class="course-card">
              <div class="icon-box blue">
                <img src="{{ Storage::url('assets/images/comm.png') }}" class="img-fluid" alt="Science">
              </div>
              <h4>Science (XI & XII)</h4>
              <span>HSC State Board</span>
            </div>
          </a>

          <a href="{{ route('courses.foundation') }}" class="text-decoration-none">
            <div class="course-card">
              <div class="icon-box purple">
                <img src="{{ Storage::url('assets/images/class.png') }}" class="img-fluid" alt="Foundation">
              </div>
              <h4>Foundation</h4>
              <span>(8th, 9th & 10th)</span>
            </div>
          </a>

          <a href="{{ route('courses.school-section') }}" class="text-decoration-none">
            <div class="course-card">
              <div class="icon-box blue">
                <img src="{{ Storage::url('assets/images/class.png') }}" class="img-fluid" alt="School Section">
              </div>
              <h4>School Section</h4>
              <span>(CBSE | ICSE | SSC)</span>
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