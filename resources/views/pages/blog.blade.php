@extends('layouts.app')
@section('content')

<section class="blogs-section">
  <div class="container-v1">

    <!-- Heading -->
    <h2 class="text-center fw-bold mb-4">Blogs</h2>

    <!-- Search -->
   <div class="d-flex justify-content-center mb-5">
      <form action="{{ route('blog') }}" method="GET" class="blog-search-wrapper w-100" style="max-width: 500px;">
        <span class="search-icon">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
            <path d="M21 21L16.65 16.65M11 18C7.134 18 4 14.866 4 11C4 7.134 7.134 4 11 4C14.866 4 18 7.134 18 11C18 14.866 14.866 18 11 18Z"
              stroke="#9aa0a6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </span>
        <input type="text" name="search" class="blog-search w-100" placeholder="Search for Blogs by title or tags..." value="{{ request('search') }}">
      </form>
    </div>

    <!-- Blog Grid -->
    <div class="row g-4 kkk">
      @forelse($blogs as $blog)
      <!-- Card -->
      <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <a href="{{ route('blog.show', $blog->slug) }}" class="text-decoration-none">
          <div class="blog-card h-100 shadow-sm border-0 position-relative transition-hover">
            <div class="blog-img" style="height: 200px; overflow: hidden; background-color: #f8f9fa;">
              <span class="blog-tag z-index-1 text-uppercase fw-bold">{{ $blog->category->name ?? 'Update' }}</span>
              @if($blog->image)
                <img src="{{ Storage::url($blog->image) }}" alt="{{ $blog->title }}" class="w-100 h-100 object-fit-cover">
              @else
                <div class="w-100 h-100 d-flex align-items-center justify-content-center text-muted">
                    <i class="fas fa-image fa-3x mb-3 text-light"></i>
                </div>
              @endif
            </div>
            <div class="blog-content p-3 bg-white">
              <h6 class="text-dark fw-bold mb-2">{{ Str::limit($blog->title, 50) }}</h6>
              <p class="text-muted small mb-0">
                  <i class="far fa-user mr-1"></i> {{ $blog->author_name ?? 'Admin' }} 
                  &nbsp;&bull;&nbsp; 
                  <i class="far fa-calendar-alt mr-1"></i> {{ $blog->published_at ? $blog->published_at->format('M d, Y') : $blog->created_at->format('M d, Y') }}
              </p>
            </div>
          </div>
        </a>
      </div>
      @empty
      <div class="col-12 py-5 text-center text-muted bg-white rounded shadow-sm border">
        <i class="fas fa-search fa-3x mb-3 text-light"></i>
        <h5 class="fw-bold">No Blogs Found</h5>
        <p>There are no published blog posts fitting this criteria right now.</p>
      </div>
      @endforelse
    </div>

    <!-- Pagination -->
    <div class="row mt-5">
        <div class="col-12 d-flex justify-content-center">
            {{ $blogs->links('pagination::bootstrap-5') }}
        </div>
    </div>
  </div>
</section>

@endsection