@extends('admin.layouts.app')

@section('title', 'Manage Papers ('. $studyYear->year .')')

@section('header-actions')
    <a href="{{ route('admin.study-years.index', ['language_id' => $studyYear->study_language_id]) }}" class="btn btn-light border mr-2">
        <i class="fas fa-arrow-left mr-1"></i> Back to Years
    </a>
    <a href="{{ route('admin.study-papers.create', ['year_id' => $studyYear->id]) }}" class="btn btn-primary">
        <i class="fas fa-upload mr-1"></i> Upload Question Papers
    </a>
@endsection

@section('content')
<div class="card">
    <div class="card-header border-0 pb-0">
        <h3 class="card-title">Papers for <strong class="text-primary">{{ $studyYear->language->studyClass->name }} > {{ $studyYear->language->name }} > {{ $studyYear->year }}</strong></h3>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th style="width:50px;">Type</th>
                        <th>Paper Title</th>
                        <th>Uploaded Date</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($papers as $paper)
                    <tr>
                        <td class="text-center">
                            <i class="fas fa-file-pdf text-danger fa-2x"></i>
                        </td>
                        <td>
                            <strong>{{ $paper->title }}</strong>
                            <div class="text-muted text-xs mt-1">
                                <a href="{{ Storage::url($paper->file_path) }}" target="_blank" class="text-info"><i class="fas fa-external-link-alt mr-1"></i> View PDF File</a>
                            </div>
                        </td>
                        <td>
                            {{ $paper->created_at->format('M d, Y h:i A') }}
                        </td>
                        <td class="text-right">
                            <a href="{{ Storage::url($paper->file_path) }}" download class="btn btn-sm btn-light border mr-1" title="Download">
                                <i class="fas fa-download text-muted"></i>
                            </a>
                            <a href="{{ route('admin.study-papers.edit', $paper->id) }}" class="btn btn-sm btn-light border mr-1" title="Edit">
                                <i class="fas fa-edit text-muted"></i>
                            </a>
                            <form action="{{ route('admin.study-papers.destroy', $paper->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this PDF?');">
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
                            <i class="fas fa-file-pdf fa-3x mb-3 text-light"></i>
                            <h5>No Papers Found</h5>
                            <p>Get started by uploading your first PDF document.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
