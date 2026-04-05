@extends('layouts.app')

@section('content')
<div class="container-fluid py-5">
    <div class="courses-section">
        <div class="courses-wrapper">
            <h3 class="section-title">Study Materials</h3>
            <div class="courses-grid">
                @foreach($classes as $class)
                <a href="{{ route('study-material.languages', $class->slug) }}">
                    <div class="course-card">
                        <div class="icon-box {{ ['blue', 'purple', 'yellow', 'green', 'orange'][$loop->index % 5] }}">
                            <img src="{{ asset($class->icon ?? 'img/PYQLibrary.png') }}" alt="{{ $class->name }}">
                        </div>
                        <h4>{{ $class->name }}</h4>
                        <span>{{ $class->languages->count() }} Categories</span>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
