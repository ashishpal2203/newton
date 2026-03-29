@extends('admin.layouts.app')

@section('title', 'Manage Languages ('. $studyClass->name .')')

@section('header-actions')
    <a href="{{ route('admin.study-classes.index') }}" class="btn btn-light border mr-2">
        <i class="fas fa-arrow-left mr-1"></i> Back to Classes
    </a>
    <a href="{{ route('admin.study-languages.create', ['class_id' => $studyClass->id]) }}" class="btn btn-primary">
        <i class="fas fa-plus-circle mr-1"></i> Add New Language
    </a>
@endsection

@section('content')
<div class="card">
    <div class="card-header border-0 pb-0">
        <h3 class="card-title">Languages for <strong class="text-primary">{{ $studyClass->name }}</strong></h3>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>Language</th>
                        <th>Icon</th>
                        <th>Overview</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($languages as $language)
                    <tr>
                        <td><strong>{{ $language->name }}</strong></td>
                        <td>
                            @if($language->icon)
                                <img src="{{ Storage::url($language->icon) }}" alt="{{ $language->name }}" class="rounded" style="height: 40px; width: 40px; object-fit: contain; background:#f8f9fa;">
                            @else
                                <span class="badge badge-light">No Icon</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge badge-info">{{ $language->years_count ?? 0 }} Years</span>
                        </td>
                        <td class="text-right">
                            <a href="{{ route('admin.study-years.index', ['language_id' => $language->id]) }}" class="btn btn-sm btn-primary border border-primary mr-2" title="Manage Years">
                                Manage Years <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                            <a href="{{ route('admin.study-languages.edit', $language->id) }}" class="btn btn-sm btn-light border" title="Edit">
                                <i class="fas fa-edit text-muted"></i>
                            </a>
                            <form action="{{ route('admin.study-languages.destroy', $language->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure? This will delete the language AND all its years and question papers permanently!');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger border-0" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-5 text-muted">
                            <i class="fas fa-language fa-3x mb-3 text-light"></i>
                            <h5>No Languages Found</h5>
                            <p>Get started by adding a language to this class.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
