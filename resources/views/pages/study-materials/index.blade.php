@extends('layouts.app')

@section('content')
<div class="container-v1">
    <div class="">
        <div class="courses-wrapper">
            <h3 class="section-title">Study Materials</h3>
            <div class="courses-grid">
                @foreach($classes as $class)
                <a href="{{ route('study-material.years', $class) }}">
                    <div class="course-card">
                        <div class="icon-box {{ ['blue', 'purple', 'yellow', 'green', 'orange'][$loop->index % 5] }}">
                            <img src="{{ Storage::url($class->icon ?? 'assets/images/PYQLibrary.png') }}" alt="{{ $class->name }}" class="img-fluid">
                        </div>
                        <h4>{{ $class->name }}</h4>
                        <span>{{ $class->studyYears->count() }} Years</span>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
