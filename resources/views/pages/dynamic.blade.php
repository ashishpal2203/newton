@extends('layouts.app')

@if($page->meta_description)
    @section('meta_description', $page->meta_description)
@endif

@section('title', $page->title . ' - ' . config('app.name'))

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4 animated slideInDown">{{ $page->title }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item text-primary" aria-current="page">{{ $page->title }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Dynamic Content Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-12">
                <div class="quill-content">
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Dynamic Content End -->
@endsection
