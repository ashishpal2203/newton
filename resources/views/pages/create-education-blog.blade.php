@extends('layouts.app')
@section('content')

<div class="container py-5">
<div class="blog-container">

    <span class="blog-badge">{{ $blog->category->name ?? 'Update' }}</span>

    <h1 class="blog-title">
        {{ $blog->title }}
    </h1>

    <div class="blog-meta">
        {{ $blog->author_name ?? 'Newton\'s Academy' }} &nbsp;•&nbsp; {{ $blog->published_at ? $blog->published_at->format('F j, Y') : $blog->created_at->format('F j, Y') }}
    </div>

    @if($blog->image)
    <div class="mb-5">
        <img src="{{ Storage::url($blog->image) }}" alt="{{ $blog->title }}" class="img-fluid rounded shadow-sm w-100" style="max-height: 500px; object-fit: cover;">
    </div>
    @endif

    <div class="blog-content">
        {!! $blog->content !!}
    </div>
    
    @if($relatedBlogs->count() > 0)
    <div class="mt-5 pt-4 border-top">
        <h4 class="mb-4 fw-bold">Related Posts</h4>
        <div class="row g-4">
            @foreach($relatedBlogs as $related)
            <div class="col-md-4">
                <a href="{{ route('blog.show', $related->slug) }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-sm transition-hover">
                        @if($related->image)
                            <img src="{{ Storage::url($related->image) }}" class="card-img-top" style="height: 150px; object-fit: cover;" alt="{{ $related->title }}">
                        @else
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center text-muted" style="height: 150px;">
                                <i class="fas fa-image fa-2x"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <h6 class="fw-bold mb-2">{{ Str::limit($related->title, 40) }}</h6>
                            <small class="text-muted">{{ $related->published_at ? $related->published_at->format('M d, Y') : $related->created_at->format('M d, Y') }}</small>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    @endif

</div>  </div>

</div>
</div>

@endsection