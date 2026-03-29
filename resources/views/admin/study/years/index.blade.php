@extends('admin.layouts.app')

@section('title', 'Manage Years ('. $studyLanguage->name .')')

@section('header-actions')
    <a href="{{ route('admin.study-languages.index', ['class_id' => $studyLanguage->study_class_id]) }}" class="btn btn-light border mr-2">
        <i class="fas fa-arrow-left mr-1"></i> Back to Languages
    </a>
    <a href="{{ route('admin.study-years.create', ['language_id' => $studyLanguage->id]) }}" class="btn btn-primary">
        <i class="fas fa-plus-circle mr-1"></i> Add New Year
    </a>
@endsection

@section('content')
<div class="card">
    <div class="card-header border-0 pb-0">
        <h3 class="card-title">Years for <strong class="text-primary">{{ $studyLanguage->studyClass->name }} > {{ $studyLanguage->name }}</strong></h3>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>Year</th>
                        <th>Overview</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($years as $year)
                    <tr>
                        <td><strong>{{ $year->year }}</strong></td>
                        <td>
                            <span class="badge badge-info">{{ $year->papers_count ?? 0 }} Papers</span>
                        </td>
                        <td class="text-right">
                            <a href="{{ route('admin.study-papers.index', ['year_id' => $year->id]) }}" class="btn btn-sm btn-primary border border-primary mr-2" title="Manage Question Papers">
                                Manage Papers <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                            <a href="{{ route('admin.study-years.edit', $year->id) }}" class="btn btn-sm btn-light border" title="Edit">
                                <i class="fas fa-edit text-muted"></i>
                            </a>
                            <form action="{{ route('admin.study-years.destroy', $year->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure? This will delete the year AND all its question papers permanently!');">
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
                        <td colspan="3" class="text-center py-5 text-muted">
                            <i class="fas fa-calendar-alt fa-3x mb-3 text-light"></i>
                            <h5>No Years Found</h5>
                            <p>Get started by adding an academic year here.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
