@extends('layouts.app')

@section('content')
<div class="" style="background: #f8f9fb;">
    <div class="container-v1">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">Our Gallery</h2>
            <div class="mx-auto" style="width: 60px; height: 4px; background: linear-gradient(90deg, #667eea, #764ba2); border-radius: 2px;"></div>
            <p class="text-muted mt-3 lead">Capturing moments of excellence and joy at Newton's Academy</p>
        </div>

        <div class="row g-4" id="gallery-grid">
            @forelse($photos as $photo)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <a href="{{ Storage::url($photo->image_path) }}" 
                       data-fancybox="gallery" 
                       data-caption="{{ $photo->title ?? '' }}"
                       class="gallery-item d-block overflow-hidden rounded-4 shadow-sm">
                        <div class="gallery-img-wrapper position-relative">
                            <img src="{{ Storage::url($photo->image_path) }}" 
                                 alt="{{ $photo->title ?? 'Gallery Photo' }}" 
                                 class="img-fluid w-100" 
                                 style="height: 250px; object-fit: cover; transition: transform 0.5s ease;">
                            
                            @if($photo->title)
                                <div class="gallery-overlay position-absolute bottom-0 start-0 w-100 p-3 text-white" 
                                     style="background: linear-gradient(0deg, rgba(0,0,0,0.8) 0%, transparent 100%); opacity: 0; transition: opacity 0.3s ease;">
                                    <p class="m-0 small fw-medium">{{ $photo->title }}</p>
                                </div>
                            @endif
                            
                            <div class="gallery-icon position-absolute top-50 start-50 translate-middle text-white" 
                                 style="opacity: 0; transition: all 0.3s ease; font-size: 1.5rem;">
                                <i class="bi bi-zoom-in"></i>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="mb-3 text-muted">
                        <i class="bi bi-images" style="font-size: 4rem; opacity: 0.2;"></i>
                    </div>
                    <h4>No photos found in our gallery.</h4>
                    <p class="text-muted">We'll be adding some beautiful moments soon! Check back later.</p>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $photos->links() }}
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
<style>
    .gallery-item:hover img {
        transform: scale(1.1);
    }
    .gallery-item:hover .gallery-overlay,
    .gallery-item:hover .gallery-icon {
        opacity: 1;
    }
    .gallery-item:hover .gallery-icon {
        transform: translate(-50%, -50%) scale(1.2);
    }
    .gallery-item {
        transition: box-shadow 0.3s ease;
    }
    .gallery-item:hover {
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.25) !important;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
    Fancybox.bind("[data-fancybox]", {
        // Custom options for a more premium feel
        Carousel: {
            infinite: true,
        },
        Images: {
            zoom: true,
        },
        Toolbar: {
            display: {
                left: ["infobar"],
                middle: ["zoomIn", "zoomOut", "toggle1to1", "rotateCCW", "rotateCW", "flipX", "flipY"],
                right: ["slideshow", "fullScreen", "download", "thumbs", "close"],
            },
        },
    });
</script>
@endpush
@endsection
