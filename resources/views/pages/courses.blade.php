@extends('layouts.app')

@section('title', "Our Courses | Newton's Academy")

@section('content')
<section class="py-5">
  <div class="container-fluid">
    <div class="courses-section">
      <div class="courses-wrapper">
        <h3 class="section-title">Explore Our Specialist Courses</h3>

        <div class="courses-grid">
          @forelse($courses as $course)
          <a href="{{ route('courses.show', $course->slug) }}" class="text-decoration-none">
            <div class="course-card border-0 shadow-sm h-100">
              <div class="icon {{ $course->home_color }}">
                @if($course->home_icon)
                  <img src="{{ asset('storage/' . $course->home_icon) }}" alt="{{ $course->title }}" style="width: 24px; height: 24px; object-fit: contain;">
                @else
                  <i class="bi bi-mortarboard-fill"></i>
                @endif
              </div>
              <h4 class="mt-3 mb-1 text-dark">{{ $course->title }}</h4>
              <span class="text-muted small">{{ $course->home_subtitle }}</span>
            </div>
          </a>
          @empty
            <div class="col-12 text-center py-5">
              <div class="p-5 bg-white rounded-4 shadow-sm">
                <i class="bi bi-journal-x display-1 text-muted"></i>
                <h5 class="mt-3">No courses available yet</h5>
                <p class="text-muted">Our academic experts are currently updating our course catalog. Please check back soon!</p>
              </div>
            </div>
          @endforelse
        </div>
      </div>
    </div>
  </div>
</section>

@push('styles')
<style>
.courses-grid a { text-decoration: none !important; }
.course-card { transition: transform 0.3s ease, box-shadow 0.3s ease; }
.course-card:hover { transform: translateY(-5px); box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important; }
</style>
@endpush
@endsection