@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

{{-- ─── Stats Row ─────────────────────────────────────────── --}}
<div class="row" id="stat-cards">
    @role('Admin')
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center">
                <div class="stat-icon mr-3" style="background:rgba(102,126,234,0.12);">
                    <i class="fas fa-users" style="color:#667eea;"></i>
                </div>
                <div>
                    <div class="stat-value">{{ \App\Models\User::count() }}</div>
                    <div class="stat-label">Total Users</div>
                </div>
            </div>
            <a href="{{ route('admin.users.index') }}" class="stat-footer d-flex justify-content-between align-items-center" style="color:#667eea;border-top:1px solid #f3f4f6;">
                <span>Manage Users</span>
                <i class="fas fa-arrow-right" style="font-size:0.7rem;"></i>
            </a>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center">
                <div class="stat-icon mr-3" style="background:rgba(16,185,129,0.12);">
                    <i class="fas fa-shield-alt" style="color:#10b981;"></i>
                </div>
                <div>
                    <div class="stat-value">{{ \Spatie\Permission\Models\Role::count() }}</div>
                    <div class="stat-label">System Roles</div>
                </div>
            </div>
            <a href="{{ route('admin.roles.index') }}" class="stat-footer d-flex justify-content-between align-items-center" style="color:#10b981;border-top:1px solid #f3f4f6;">
                <span>Manage Roles</span>
                <i class="fas fa-arrow-right" style="font-size:0.7rem;"></i>
            </a>
        </div>
    </div>
    @endrole

    @can('manage pages')
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center">
                <div class="stat-icon mr-3" style="background:rgba(245,158,11,0.12);">
                    <i class="fas fa-file-alt" style="color:#f59e0b;"></i>
                </div>
                <div>
                    <div class="stat-value">{{ \App\Models\Page::count() }}</div>
                    <div class="stat-label">Dynamic Pages</div>
                </div>
            </div>
            <a href="{{ route('admin.pages.index') }}" class="stat-footer d-flex justify-content-between align-items-center" style="color:#f59e0b;border-top:1px solid #f3f4f6;">
                <span>Manage Pages</span>
                <i class="fas fa-arrow-right" style="font-size:0.7rem;"></i>
            </a>
        </div>
    </div>
    @endcan

    @can('manage media')
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center">
                <div class="stat-icon mr-3" style="background:rgba(239,68,68,0.12);">
                    <i class="fas fa-images" style="color:#ef4444;"></i>
                </div>
                <div>
                    <div class="stat-value">{{ \App\Models\Media::count() }}</div>
                    <div class="stat-label">Media Files</div>
                </div>
            </div>
            <a href="{{ route('admin.media.index') }}" class="stat-footer d-flex justify-content-between align-items-center" style="color:#ef4444;border-top:1px solid #f3f4f6;">
                <span>Media Library</span>
                <i class="fas fa-arrow-right" style="font-size:0.7rem;"></i>
            </a>
        </div>
    </div>
    @endcan
</div>

{{-- ─── Welcome Card + Quick Actions ──────────────────────── --}}
<div class="row">
    {{-- Welcome Banner --}}
    <div class="col-lg-8 mb-4">
        <div class="card" style="background:linear-gradient(135deg,#1a1a2e 0%,#16213e 50%,#0f3460 100%);color:#fff;border-radius:20px;">
            <div class="card-body p-5">
                <div class="d-flex align-items-center mb-3">
                    <div style="width:48px;height:48px;border-radius:14px;background:rgba(255,255,255,0.1);display:flex;align-items:center;justify-content:center;margin-right:16px;">
                        <i class="fas fa-graduation-cap" style="font-size:1.3rem;color:#a78bfa;"></i>
                    </div>
                    <div>
                        <h4 class="mb-0" style="color:#fff;font-weight:800;">Welcome back, {{ Auth::user()->name }}!</h4>
                        <small style="color:rgba(255,255,255,0.5);">{{ now()->format('l, F j Y') }}</small>
                    </div>
                </div>
                <p style="color:rgba(255,255,255,0.65);margin-bottom:24px;font-size:0.9rem;line-height:1.7;">
                    Manage your Newton's Academy website content, users, and settings from this centralized dashboard.
                    Use the sidebar to navigate between sections.
                </p>
                <div class="d-flex gap-2 flex-wrap">
                    <a href="{{ route('admin.content.home') }}" class="btn btn-sm" style="background:rgba(255,255,255,0.12);color:#fff;border-radius:10px;padding:8px 18px;border:1px solid rgba(255,255,255,0.15);">
                        <i class="fas fa-home mr-1"></i> Edit Home Page
                    </a>
                    <a href="{{ route('admin.content.about') }}" class="btn btn-sm" style="background:rgba(255,255,255,0.12);color:#fff;border-radius:10px;padding:8px 18px;border:1px solid rgba(255,255,255,0.15);">
                        <i class="fas fa-info-circle mr-1"></i> Edit About Us
                    </a>
                    <a href="{{ url('/') }}" target="_blank" class="btn btn-sm" style="background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;border-radius:10px;padding:8px 18px;border:none;">
                        <i class="fas fa-external-link-alt mr-1"></i> View Live Site
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Quick Actions --}}
    <div class="col-lg-4 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-bolt mr-2" style="color:#f59e0b;"></i>Quick Actions</h5>
            </div>
            <div class="card-body p-3">
                <a href="{{ route('admin.pages.create') }}" class="d-flex align-items-center p-3 mb-2 text-decoration-none" style="background:#f8f9fc;border-radius:12px;transition:all 0.2s;">
                    <div style="width:38px;height:38px;border-radius:10px;background:rgba(102,126,234,0.1);display:flex;align-items:center;justify-content:center;margin-right:12px;flex-shrink:0;">
                        <i class="fas fa-plus" style="color:#667eea;font-size:0.9rem;"></i>
                    </div>
                    <div>
                        <div style="font-weight:600;font-size:0.85rem;color:#1e2a4a;">New Page</div>
                        <div style="font-size:0.75rem;color:#9ca3af;">Create a CMS page</div>
                    </div>
                </a>
                <a href="{{ route('admin.media.index') }}" class="d-flex align-items-center p-3 mb-2 text-decoration-none" style="background:#f8f9fc;border-radius:12px;transition:all 0.2s;">
                    <div style="width:38px;height:38px;border-radius:10px;background:rgba(239,68,68,0.1);display:flex;align-items:center;justify-content:center;margin-right:12px;flex-shrink:0;">
                        <i class="fas fa-upload" style="color:#ef4444;font-size:0.9rem;"></i>
                    </div>
                    <div>
                        <div style="font-weight:600;font-size:0.85rem;color:#1e2a4a;">Upload Media</div>
                        <div style="font-size:0.75rem;color:#9ca3af;">Add images & files</div>
                    </div>
                </a>
                @can('manage users')
                <a href="{{ route('admin.users.create') }}" class="d-flex align-items-center p-3 mb-2 text-decoration-none" style="background:#f8f9fc;border-radius:12px;transition:all 0.2s;">
                    <div style="width:38px;height:38px;border-radius:10px;background:rgba(16,185,129,0.1);display:flex;align-items:center;justify-content:center;margin-right:12px;flex-shrink:0;">
                        <i class="fas fa-user-plus" style="color:#10b981;font-size:0.9rem;"></i>
                    </div>
                    <div>
                        <div style="font-weight:600;font-size:0.85rem;color:#1e2a4a;">Add User</div>
                        <div style="font-size:0.75rem;color:#9ca3af;">Create a new admin</div>
                    </div>
                </a>
                @endcan
                @can('manage settings')
                <a href="{{ route('admin.settings.index') }}" class="d-flex align-items-center p-3 text-decoration-none" style="background:#f8f9fc;border-radius:12px;transition:all 0.2s;">
                    <div style="width:38px;height:38px;border-radius:10px;background:rgba(245,158,11,0.1);display:flex;align-items:center;justify-content:center;margin-right:12px;flex-shrink:0;">
                        <i class="fas fa-cog" style="color:#f59e0b;font-size:0.9rem;"></i>
                    </div>
                    <div>
                        <div style="font-weight:600;font-size:0.85rem;color:#1e2a4a;">Settings</div>
                        <div style="font-size:0.75rem;color:#9ca3af;">Configure your site</div>
                    </div>
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>

@endsection
