<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Newton Academy CMS') }} — Admin</title>

    <!-- Google Font: Inter -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <style>
        /* ─── Typography ─────────────────────────────── */
        body, .nav-sidebar, .content-header, .card-title {
            font-family: 'Inter', sans-serif !important;
        }

        /* ─── Sidebar ────────────────────────────────── */
        .main-sidebar {
            background: linear-gradient(180deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%) !important;
            border-right: none !important;
        }
        .brand-link {
            background: rgba(255,255,255,0.04) !important;
            border-bottom: 1px solid rgba(255,255,255,0.07) !important;
            padding: 18px 20px !important;
        }
        .brand-text {
            font-size: 1.1rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            color: #ffffff !important;
        }
        .brand-text span {
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 0.75rem;
            font-weight: 500;
            display: block;
        }
        .nav-sidebar .nav-link {
            color: rgba(255,255,255,0.65) !important;
            border-radius: 10px !important;
            margin: 2px 10px !important;
            padding: 10px 14px !important;
            transition: all 0.2s ease !important;
            font-size: 0.875rem;
            font-weight: 500;
        }
        .nav-sidebar .nav-link:hover {
            background: rgba(255,255,255,0.1) !important;
            color: #ffffff !important;
            transform: translateX(3px);
        }
        .nav-sidebar .nav-link.active {
            background: linear-gradient(135deg, #667eea, #764ba2) !important;
            color: #ffffff !important;
            box-shadow: 0 4px 15px rgba(102,126,234,0.4) !important;
        }
        .nav-header {
            color: rgba(255,255,255,0.35) !important;
            font-size: 0.65rem !important;
            font-weight: 700 !important;
            letter-spacing: 1.5px !important;
            text-transform: uppercase !important;
            padding: 14px 24px 6px !important;
        }
        .nav-icon {
            color: rgba(255,255,255,0.5) !important;
        }
        .nav-link.active .nav-icon {
            color: #ffffff !important;
        }
        .sidebar .nav-treeview > .nav-item > .nav-link {
            padding-left: 34px !important;
            font-size: 0.82rem !important;
        }
        .sidebar .nav-treeview > .nav-item > .nav-link.active {
            background: rgba(255,255,255,0.12) !important;
            box-shadow: none !important;
        }

        /* ─── Top Navbar ─────────────────────────────── */
        .main-header.navbar {
            background: #ffffff !important;
            border-bottom: 1px solid #f0f0f5 !important;
            box-shadow: 0 1px 20px rgba(0,0,0,0.06) !important;
        }
        .main-header .nav-link {
            color: #374151 !important;
            font-weight: 500;
            font-size: 0.875rem;
        }

        /* ─── Content Area ───────────────────────────── */
        .content-wrapper {
            background: #f4f6fc !important;
        }
        .content-header {
            padding: 20px 20px 0 !important;
        }
        .content-header h1 {
            font-size: 1.4rem !important;
            font-weight: 700 !important;
            color: #1e2a4a !important;
        }

        /* ─── Info Boxes / Stats Cards ───────────────── */
        .stat-card {
            border-radius: 16px !important;
            border: none !important;
            box-shadow: 0 4px 24px rgba(0,0,0,0.07) !important;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            overflow: hidden;
        }
        .stat-card:hover {
            transform: translateY(-4px) !important;
            box-shadow: 0 8px 30px rgba(0,0,0,0.12) !important;
        }
        .stat-card .card-body {
            padding: 24px !important;
        }
        .stat-icon {
            width: 56px;
            height: 56px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
        }
        .stat-value {
            font-size: 2rem !important;
            font-weight: 800 !important;
            line-height: 1 !important;
            color: #1e2a4a !important;
        }
        .stat-label {
            font-size: 0.8rem !important;
            font-weight: 500 !important;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #6b7280 !important;
        }
        .stat-footer {
            padding: 14px 24px !important;
            font-size: 0.8rem !important;
            font-weight: 500 !important;
            text-decoration: none !important;
        }

        /* ─── Cards ──────────────────────────────────── */
        .card {
            border-radius: 16px !important;
            border: none !important;
            box-shadow: 0 2px 16px rgba(0,0,0,0.06) !important;
        }
        .card-header {
            border-radius: 16px 16px 0 0 !important;
            background: #ffffff !important;
            border-bottom: 1px solid #f0f0f5 !important;
            padding: 18px 24px !important;
            font-weight: 700 !important;
            color: #1e2a4a !important;
        }
        .card-header.bg-primary, .card-header.bg-warning,
        .card-header.bg-success, .card-header.bg-danger,
        .card-header.bg-secondary {
            background: inherit !important;
        }
        .card-body { padding: 20px 24px !important; }
        .card-footer { border-radius: 0 0 16px 16px !important; padding: 14px 24px !important; }

        /* ─── Tables ─────────────────────────────────── */
        .table thead th {
            background: #f8f9fb !important;
            color: #374151 !important;
            font-size: 0.78rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-top: none !important;
            padding: 14px 16px !important;
        }
        .table tbody td {
            vertical-align: middle !important;
            padding: 14px 16px !important;
            color: #374151 !important;
            font-size: 0.88rem;
        }
        .table-hover tbody tr:hover { background: #f8f9fc !important; }

        /* ─── Buttons ────────────────────────────────── */
        .btn { border-radius: 10px !important; font-weight: 600 !important; font-size: 0.875rem !important; }
        .btn-primary { background: linear-gradient(135deg, #667eea, #764ba2) !important; border: none !important; box-shadow: 0 4px 12px rgba(102,126,234,0.4) !important; }
        .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 6px 16px rgba(102,126,234,0.5) !important; }
        .btn-sm { padding: 6px 14px !important; font-size: 0.8rem !important; border-radius: 8px !important; }

        /* ─── Badges ─────────────────────────────────── */
        .badge { border-radius: 6px !important; font-size: 0.72rem !important; padding: 4px 10px !important; font-weight: 600 !important; }

        /* ─── Form Controls ──────────────────────────── */
        .form-control, .custom-select {
            border-radius: 10px !important;
            border: 1.5px solid #e5e7eb !important;
            font-size: 0.875rem !important;
            padding: 10px 14px !important;
            transition: all 0.15s ease;
        }
        .form-control:focus { border-color: #667eea !important; box-shadow: 0 0 0 3px rgba(102,126,234,0.15) !important; }
        label { font-weight: 600 !important; font-size: 0.82rem !important; color: #374151 !important; margin-bottom: 6px !important; }

        /* ─── Alerts ─────────────────────────────────── */
        .alert { border-radius: 12px !important; border: none !important; font-size: 0.875rem !important; }
        .alert-success { background: #d1fae5 !important; color: #065f46 !important; }
        .alert-danger { background: #fee2e2 !important; color: #991b1b !important; }

        /* ─── Main Footer ────────────────────────────── */
        .main-footer {
            background: #ffffff !important;
            border-top: 1px solid #f0f0f5 !important;
            color: #6b7280 !important;
            font-size: 0.8rem !important;
        }

        /* ─── Dropdown ───────────────────────────────── */
        .dropdown-menu { border-radius: 14px !important; box-shadow: 0 8px 30px rgba(0,0,0,0.12) !important; border: none !important; padding: 8px !important; }
        .dropdown-item { border-radius: 8px !important; font-size: 0.875rem !important; }

        /* ─── Tabs ───────────────────────────────────── */
        .nav-tabs .nav-link { border-radius: 10px 10px 0 0 !important; font-weight: 600 !important; font-size: 0.875rem !important; color: #6b7280 !important; }
        .nav-tabs .nav-link.active { color: #667eea !important; border-bottom-color: transparent !important; }

        /* ─── Sidebar User Panel ─────────────────────── */
        .user-panel {
            padding: 16px 20px !important;
            border-bottom: 1px solid rgba(255,255,255,0.07) !important;
        }
        .user-panel .info a { color: rgba(255,255,255,0.8) !important; font-weight: 600 !important; font-size: 0.9rem; }
        .user-panel .info p { color: rgba(255,255,255,0.45) !important; font-size: 0.75rem; margin: 0; }

        /* ─── Page Scrollbar ─────────────────────────── */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: rgba(102,126,234,0.3); border-radius: 10px; }
    </style>

    @stack('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto align-items-center">
            <li class="nav-item mr-3">
                <a href="{{ url('/') }}" target="_blank" class="nav-link text-muted">
                    <i class="fas fa-external-link-alt mr-1"></i> View Site
                </a>
            </li>
            <!-- Notifications placeholder -->
            <li class="nav-item mr-2">
                <a class="nav-link" href="#" title="Notifications">
                    <i class="far fa-bell"></i>
                </a>
            </li>
            <!-- User Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link d-flex align-items-center" data-toggle="dropdown" href="#">
                    <div style="width:32px;height:32px;border-radius:50%;background:linear-gradient(135deg,#667eea,#764ba2);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:13px;margin-right:8px;">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <span class="font-weight-600" style="font-size:0.875rem;color:#374151;">{{ Auth::user()->name }}</span>
                    <i class="fas fa-chevron-down ml-2" style="font-size:0.65rem;color:#9ca3af;"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" style="min-width:200px;">
                    <div class="px-3 py-2 mb-1" style="border-bottom:1px solid #f3f4f6;">
                        <p class="mb-0 font-weight-bold" style="font-size:0.875rem;color:#111827;">{{ Auth::user()->name }}</p>
                        <p class="mb-0" style="font-size:0.78rem;color:#6b7280;">{{ Auth::user()->email }}</p>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item text-danger mt-1">
                            <i class="fas fa-sign-out-alt mr-2"></i> Sign Out
                        </a>
                    </form>
                </div>
            </li>
        </ul>
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar elevation-0" style="box-shadow: 2px 0 20px rgba(0,0,0,0.15) !important;">
        <!-- Brand -->
        <a href="{{ route('admin.dashboard') }}" class="brand-link text-decoration-none">
            <div class="d-flex align-items-center">
                <div style="width:36px;height:36px;border-radius:10px;background:linear-gradient(135deg,#667eea,#764ba2);display:flex;align-items:center;justify-content:center;margin-right:12px;flex-shrink:0;">
                    <i class="fas fa-graduation-cap" style="color:#fff;font-size:16px;"></i>
                </div>
                <div>
                    <p class="brand-text mb-0" style="font-size:0.95rem !important;">Newton CMS</p>
                    <span class="brand-text" style="-webkit-text-fill-color:rgba(255,255,255,0.45) !important;background:none !important;font-size:0.7rem;">Admin Dashboard</span>
                </div>
            </div>
        </a>

        <div class="sidebar">
            <!-- User Panel -->
            <div class="user-panel mt-3 pb-3 mb-1 d-flex">
                <div class="image">
                    <div style="width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#667eea,#764ba2);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:14px;">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                </div>
                <div class="info ml-2">
                    <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    <p>@foreach(Auth::user()->getRoleNames() as $role){{ $role }}@endforeach</p>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-header">Content Management</li>



                    <li class="nav-item">
                        <a href="{{ route('admin.home.sections.banner.index') }}" class="nav-link {{ request()->routeIs('admin.home.sections.banner.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-image text-success"></i>
                            <p>Banner Slider</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.latest-updates.index') }}" class="nav-link {{ request()->routeIs('admin.latest-updates.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-bullhorn"></i>
                            <p>Latest Updates</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.reviews.index') }}" class="nav-link {{ request()->routeIs('admin.reviews.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-star text-warning"></i>
                            <p>Reviews & Ratings</p>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('admin.blog*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->routeIs('admin.blog*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-blog text-info"></i>
                            <p>
                                Blog Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.blogs.index') }}" class="nav-link {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Posts</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.blog-categories.index') }}" class="nav-link {{ request()->routeIs('admin.blog-categories.*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Categories</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.study-classes.index') }}" class="nav-link {{ request()->routeIs('admin.study-*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-book-reader"></i>
                            <p>Study Materials</p>
                        </a>
                    </li>

                    @can('manage media')
                    <li class="nav-item">
                        <a href="{{ route('admin.media.index') }}" class="nav-link {{ request()->routeIs('admin.media.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-images"></i>
                            <p>Media Library</p>
                        </a>
                    </li>
                    @endcan

                    <li class="nav-header">Administration</li>

                    @can('manage users')
                    <li class="nav-item {{ request()->routeIs('admin.users.*') || request()->routeIs('admin.roles.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->routeIs('admin.users.*') || request()->routeIs('admin.roles.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>User Management <i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i><p>Users</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.roles.index') }}" class="nav-link {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i><p>Roles & Permissions</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endcan

                    <li class="nav-item">
                        <a href="{{ route('admin.contacts.index') }}" class="nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-envelope-open-text text-primary"></i>
                            <p>
                                Contact Inquiries
                                @php
                                    $unreadCount = \App\Models\Contact::where('is_read', false)->count();
                                @endphp
                                @if($unreadCount > 0)
                                    <span class="badge badge-danger right">{{ $unreadCount }}</span>
                                @endif
                            </p>
                        </a>
                    </li>

                    @can('manage settings')
                    <li class="nav-item">
                        <a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>Settings</p>
                        </a>
                    </li>
                    @endcan

                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h1 class="m-0">@yield('title', 'Dashboard')</h1>
                    @yield('header-actions')
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible mb-4" role="alert">
                        <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible mb-4" role="alert">
                        <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                    </div>
                @endif

                @yield('content')

            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-inline" style="font-size:0.78rem;">
            Newton CMS v2.0
        </div>
        <strong>Copyright &copy; {{ date('Y') }} <a href="{{ url('/') }}" style="color:#667eea;">Newton's Academy</a>.</strong> All rights reserved.
    </footer>
</div>

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

@stack('scripts')
</body>
</html>
