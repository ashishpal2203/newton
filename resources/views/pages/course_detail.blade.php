@extends('layouts.app')

@section('title', $course->title . " | Newton's Academy")

@section('content')
<main class="class12 pb-5">
    <div class="container py-4">
        <!-- Banner -->
        <div class="row">
            <div class="col-12">
                <div class="class12-banner shadow-sm">
                    @if($course->banner)
                        <img src="{{ asset('storage/' . $course->banner) }}" alt="{{ $course->title }}" class="img-fluid rounded-4">
                    @else
                        {{-- Fallback image if banner is missing --}}
                        <div class="bg-primary text-white d-flex align-items-center justify-content-center rounded-4" style="height: 300px; background: linear-gradient(135deg, #0b3c8a 0%, #155DFC 100%);">
                            <h1 class="display-4 font-weight-bold">{{ $course->title }}</h1>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Title Section -->
        <div class="mt-5 mb-4">
             <h2 class="class12-title d-inline-block">{{ $course->title }}</h2>
        </div>

        <div class="row g-4 align-items-stretch">
            <!-- Left: About Content -->
            <div class="col-lg-8">
                <div class="box about-box h-100">
                    <h5 class="mb-4">{{ $course->about_title }}</h5>
                    <div class="about-description">
                        {!! nl2br(e($course->about_text)) !!}
                    </div>
                </div>
            </div>

            <!-- Right: Info Stack -->
            <div class="col-lg-4">
                <div class="info-stack">
                    @forelse($course->info_boxes ?? [] as $box)
                    <div class="box small-box p-4 bg-white shadow-sm border-0 mb-3 rounded-4">
                        <span class="d-block mb-1 text-primary font-weight-bold" style="font-size: 18px;">{{ $box['label'] ?? '' }}</span>
                        <strong class="h5 mb-0 text-dark">{{ $box['value'] ?? '' }}</strong>
                    </div>
                    @empty
                        {{-- No Info Boxes --}}
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Program Details Blocks -->
        @if(!empty($course->program_details))
        <div class="row g-4 mt-1">
            @foreach($course->program_details as $detail)
            <div class="col-md-6 mb-3">
                <div class="box program-box p-4 bg-white shadow-sm border-0 h-100 rounded-4">
                    <h6 class="mb-3 text-primary font-weight-bold" style="font-size: 22px;">{{ $detail['title'] ?? '' }}</h6>
                    <div class="text-muted" style="font-size: 15px; line-height: 1.6;">
                        {!! nl2br(e($detail['content'] ?? '')) !!}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <!-- Highlights Section -->
        @if(!empty($course->highlights))
        <div class="row mt-5">
            <div class="col-12">
                <div class="box highlights-box p-5 bg-white shadow-sm border-0 rounded-4">
                    <h6 class="mb-4 text-primary font-weight-bold" style="font-size: 24px;">Course Highlights</h6>
                    <div class="row">
                        @foreach($course->highlights as $highlight)
                        <div class="col-md-6 mb-3">
                            <p class="right-highlight mb-0 pl-4 position-relative">
                                {{ $highlight }}
                            </p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</main>

@push('styles')
<style>
/* Exact replication of neet.html experience */
.class12 { background-color: #f5f5f5 !important; }
.class12-banner img { width: 100%; height: auto; max-height: 400px; object-fit: cover; }
.class12-title { position: relative; font-weight: 700; font-size: 32px; color: #1e293b; margin-bottom: 0; }
.class12-title::after { content: ""; position: absolute; left: 0; bottom: -8px; width: 45px; height: 3px; background: #3b82f6; border-radius: 10px; }

.box { background: #fff; border-radius: 14px; padding: 41px; box-shadow: 0 10px 25px rgba(0,0,0,.08); border: none; }
.about-box h5 { font-size: 30px; color: #0032A2; font-weight: 700; }
.about-description { font-size: 16px; line-height: 1.8; color: #4a5568; }

.info-stack { display: flex; flex-direction: column; gap: 16px; }
.small-box { padding: 30px !important; }
.small-box span { color: #3b82f6 !important; }
.small-box strong { color: #1e293b !important; }

.program-box h6 { color: #155DFC !important; }

.highlights-box h6 { color: #155DFC !important; }
p.right-highlight { position: relative; padding-left: 45px !important; font-size: 16px; color: #1e293b; line-height: 24px; }
p.right-highlight::before { 
    content: "✓"; 
    position: absolute; 
    left: 0; 
    top: 50%; 
    transform: translateY(-50%);
    width: 28px; 
    height: 28px; 
    background: #eef4ff; 
    color: #2563eb; 
    font-weight: 800; 
    border-radius: 50%; 
    display: flex; 
    align-items: center; 
    justify-content: center; 
    font-size: 14px; 
}

@media (max-width: 991px) {
    .info-stack { margin-top: 20px; }
}

@media (max-width: 768px) {
    .box { padding: 30px 20px !important; }
    .about-box h5 { font-size: 24px; }
    .class12-title { font-size: 26px; }
}
</style>
@endpush
@endsection
