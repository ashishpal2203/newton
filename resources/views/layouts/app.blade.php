<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            @hasSection('title')
                @yield('title')
            @else
                {{ $global_settings['site_name'] ?? config('app.name', "Newton's Academy") }}
            @endif
        </title>

        <!-- Resource Hints / Performance -->
        <link rel="dns-prefetch" href="//fonts.googleapis.com">
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link rel="dns-prefetch" href="//cdn.jsdelivr.net">
        <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">

        <!-- SEO Metadata -->
        <meta name="description" content="@yield('meta_description', 'Newton\'s Academy is Mulund\'s most trusted coaching institute for IIT-JEE, NEET, MHT-CET, XI-XII Boards, and Foundation coaching. Get top results with expert mentors.')">
        <meta name="keywords" content="@yield('meta_keywords', 'Newtons Academy, Newtons Academy Mulund, Best Coaching Classes in Mulund, Best Classes in Mulund, Best JEE Classes in Mulund, Best CET Classes in Mulund, Best MHT CET Classes in Mulund, Best NEET Classes in Mulund, Top Coaching Institute in Mulund, Engineering Entrance Coaching Mulund, Science Coaching Mulund, 11th Science Classes Mulund, 12th Science Classes Mulund, IIT Coaching Mulund, Medical Entrance Coaching Mulund')">
        <meta name="robots" content="@yield('robots', 'index, follow')">
        <link rel="canonical" href="@yield('canonical', url()->current())">
        <meta name="theme-color" content="#1e4fd8">

        <!-- Open Graph / Social SEO -->
        <meta property="og:type" content="@yield('og_type', 'website')">
        <meta property="og:title" content="@yield('title', 'Best Coaching Classes in Mulund Mumbai | Newton\'s Academy')">
        <meta property="og:description" content="@yield('meta_description', 'Newton\'s Academy is Mulund\'s most trusted coaching institute for IIT-JEE, NEET, MHT-CET, XI-XII Boards, and Foundation coaching. Get top results with expert mentors.')">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:site_name" content="Newton's Academy">
        <meta property="og:image" content="@yield('og_image', asset('assets/images/about-us-header.jpeg'))">
        <meta property="og:image:alt" content="Newton's Academy logo and students">
        <meta property="og:locale" content="en_IN">

        <!-- Twitter Card Metadata -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="@yield('title', 'Best Coaching Classes in Mulund Mumbai | Newton\'s Academy')">
        <meta name="twitter:description" content="@yield('meta_description', 'Newton\'s Academy is Mulund\'s most trusted coaching institute for IIT-JEE, NEET, MHT-CET, XI-XII Boards, and Foundation coaching.')">
        <meta name="twitter:image" content="@yield('og_image', asset('assets/images/about-us-header.jpeg'))">

        <!-- Apple & Mobile Web App Meta -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="apple-mobile-web-app-title" content="Newton's Academy">

        <!-- Structured Data (JSON-LD) -->
        {!! \App\Helpers\SeoHelper::localBusinessSchema() !!}
        {!! \App\Helpers\SeoHelper::websiteSchema() !!}
        @yield('json_ld_schema')

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}?v=1" type="image/x-icon">
        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}?v=1">

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Bootstrap 5.3.0 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">

        <!-- Custom Style -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

        @stack('styles')
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen">
            @include('partials.header')

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>

            @include('partials.footer')
        </div>

        @if($activePopup)
            @include('partials.popup')
        @endif

        <!-- Bootstrap 5.3.0 JS Bundle -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        @stack('scripts')
    </body>
</html>


