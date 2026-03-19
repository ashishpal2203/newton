@extends('admin.layouts.app')

@section('title', 'Edit Page: ' . $page->title)

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.0/dist/quill.snow.css" rel="stylesheet" />
<style>
    #editor-container {
        height: 600px;
    }
</style>
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <form action="{{ route('admin.pages.update', $page) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <!-- Main Content Column -->
                <div class="col-md-8">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Page Content</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Page Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title', $page->title) }}" required>
                                @error('title') <span class="error invalid-feedback">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="content">Page Body Editor</label>
                                <input type="hidden" name="content" id="content_input" value="{{ old('content', $page->content) }}">
                                <div id="editor-container" class="form-control @error('content') is-invalid @enderror"></div>
                                @error('content') <span class="error invalid-feedback d-block">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Settings Column -->
                <div class="col-md-4">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Publishing & SEO</h3>
                        </div>
                        <div class="card-body">
                            
                            <div class="form-group mb-4">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" class="custom-control-input" id="is_published" name="is_published" value="1" {{ old('is_published', $page->is_published) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="is_published">Publish this page globally</label>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <label for="slug">URL Slug</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">/</span>
                                    </div>
                                    <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" value="{{ old('slug', $page->slug) }}" required>
                                </div>
                                <small class="text-muted">Unique identifier in the URL address bar.</small>
                                @error('slug') <span class="error invalid-feedback d-block">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="meta_description">Meta Description</label>
                                <textarea name="meta_description" class="form-control @error('meta_description') is-invalid @enderror" id="meta_description" rows="4">{{ old('meta_description', $page->meta_description) }}</textarea>
                                @error('meta_description') <span class="error invalid-feedback">{{ $message }}</span> @enderror
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning btn-block">Update Page</button>
                            <a href="{{ route('admin.pages.index') }}" class="btn btn-default btn-block mt-2">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.0/dist/quill.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var quill = new Quill('#editor-container', {
            theme: 'snow',
            placeholder: 'Write your page content here...',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'indent': '-1'}, { 'indent': '+1' }],
                    ['link', 'image', 'video'],
                    ['clean'],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'align': [] }]
                ]
            }
        });

        // Set initial content if exists
        const contentInput = document.getElementById('content_input');
        if (contentInput.value) {
            quill.root.innerHTML = contentInput.value;
        }

        // On form submit, update hidden input
        document.querySelector('form').onsubmit = function() {
            contentInput.value = quill.root.innerHTML;
        };
    });
</script>
@endpush
