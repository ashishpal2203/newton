<div class="containedc">
<header class="na-header">
  <nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container-fluid">

      <!-- MOBILE LEFT HAMBURGER -->
      <button class="btn d-lg-none me-2" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
        <img src="{{ Storage::url('assets/images/Icon.png') }}">
      </button>

      <!-- LOGO (CENTER ON MOBILE) -->
      <a class="navbar-brand mx-lg-0 mx-auto" href="{{ url('/') }}">
        <img src="{{ Storage::url('assets/images/logo.png') }}" height="38" alt="Newton Academy">
      </a>

      <!-- MOBILE RIGHT BLUE DOT -->
      <div class="d-lg-none ms-auto">
        <span class="profile-dot"></span>
      </div>

      <!-- DESKTOP MENU -->
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav mx-auto gap-3">
          <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('home') }}">home</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->is('courses') ? 'active' : '' }}" href="{{ route('courses') }}">courses</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->routeIs('study-material.*') ? 'active' : '' }}" href="{{ route('study-material.index') }}">Study Materials </a></li>
          <li class="nav-item"><a class="nav-link {{ request()->is('about-us') ? 'active' : '' }}" href="{{ route('about-us') }}">about us</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->routeIs('gallery.index') ? 'active' : '' }}" href="{{ route('gallery.index') }}">Gallery</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->is('blog') ? 'active' : '' }}" href="{{ route('blog') }}">blog</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ route('home') }}#contact">contact us</a></li>
        </ul>

        <!-- DESKTOP BUTTONS -->
        <div class="d-flex gap-23">
          
         
          <a href="#"><img src="{{ Storage::url('assets/images/call.png') }}"></a>
          @auth
            <a href="{{ route('admin.dashboard') }}" class="btn btn-light rounded-pill borderpill px-4 logincss">Dashboard</a>
          @else
            <a href="{{ route('login') }}" class="btn btn-light rounded-pill borderpill px-4 logincss">Login</a>
          @endauth
          
        </div>
      </div>

    </div>
  </nav>
</header>
</div>




<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu">
  <div class="offcanvas-header">
    <img src="{{ Storage::url('assets/images/logo.png') }}" height="32">
    <button class="btn-close" data-bs-dismiss="offcanvas">
     
    </button>
  </div>

  <div class="offcanvas-body">
    <ul class="navbar-nav gap-3">
      <li><a class="nav-link" href="{{ route('home') }}">Home</a></li>
      <li><a class="nav-link" href="{{ route('courses') }}">Courses</a></li>
      <li><a class="nav-link" href="{{ route('study-material.index') }}">Study Materials</a></li>
      <li><a class="nav-link" href="{{ route('about-us') }}">About Us</a></li>
      <li><a class="nav-link" href="{{ route('gallery.index') }}">Gallery</a></li>
      <li><a class="nav-link" href="{{ route('blog') }}">Blog</a></li>
      <li><a class="nav-link" href="{{ route('contact') }}">Contact Us</a></li>
    </ul>

    <div class="mt-4 d-grid gap-2">
      @auth
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary rounded-pill">Dashboard</a>
      @else
        <a href="{{ route('login') }}" class="btn btn-outline-primary rounded-pill">Login</a>
      @endauth
      <a href="tel:8591598974" class="btn btn-primary rounded-pill">Call Us</a>
    </div>
  </div>
</div>
