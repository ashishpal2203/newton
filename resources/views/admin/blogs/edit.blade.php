@extends('admin.layouts.app')

@section('title', 'Edit Blog Post')

@section('header-actions')
    <a href="{{ route('admin.blogs.index') }}" class="btn btn-light border">
        <i class="fas fa-arrow-left mr-1"></i> Back to Blog List
    </a>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-lg-8 border-right">
                            <div class="form-group mb-4">
                                <label for="title" class="fw-bold">Blog Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control form-control-lg @error('title') is-invalid @enderror" value="{{ old('title', $blog->title) }}" required>
                                <small class="text-muted d-block mt-1">Slug: <span class="text-info">{{ $blog->slug }}</span></small>
                                @error('title') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="content" class="fw-bold">Blog Content <span class="text-danger">*</span></label>
                                <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror">{{ old('content', $blog->content) }}</textarea>
                                @error('content') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group mb-0">
                                <label for="short_description" class="fw-bold">Short Description (Excerpt)</label>
                                <textarea name="short_description" id="short_description" rows="3" class="form-control @error('short_description') is-invalid @enderror">{{ old('short_description', $blog->short_description) }}</textarea>
                                @error('short_description') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <!-- Right Column (Sidebar) -->
                        <div class="col-lg-4 pl-4 bg-light pt-3 pb-3 rounded">
                            
                            <div class="form-group mb-4">
                                <label for="status" class="fw-bold">Publish Status</label>
                                <div class="custom-control custom-switch custom-switch-off-warning custom-switch-on-success">
                                    <input type="checkbox" class="custom-control-input" id="status" name="status" value="1" {{ $blog->status ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="status">Publish Immediately</label>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="published_at" class="fw-bold">Publish Date (Optional)</label>
                                <input type="date" name="published_at" id="published_at" class="form-control @error('published_at') is-invalid @enderror" value="{{ old('published_at', $blog->published_at ? $blog->published_at->format('Y-m-d') : '') }}">
                                @error('published_at') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="blog_category_id" class="fw-bold">Category <span class="text-danger">*</span></label>
                                <select name="blog_category_id" id="blog_category_id" class="form-control @error('blog_category_id') is-invalid @enderror" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('blog_category_id', $blog->blog_category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('blog_category_id') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="image" class="fw-bold">Replace Featured Image</label>
                                @if($blog->image)
                                    <div class="mb-2">
                                        <img src="{{ Storage::url($blog->image) }}" class="img-fluid rounded shadow-sm" style="max-height: 150px;">
                                    </div>
                                @endif
                                <div class="custom-file mt-2">
                                    <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="image" accept="image/*">
                                    <label class="custom-file-label" for="image">Choose replacement...</label>
                                </div>
                                @error('image') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="author_name" class="fw-bold">Author Name (Optional)</label>
                                <input type="text" name="author_name" id="author_name" class="form-control @error('author_name') is-invalid @enderror" value="{{ old('author_name', $blog->author_name) }}">
                                @error('author_name') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group mb-0">
                                <label for="tags" class="fw-bold">Tags (Optional)</label>
                                <input type="text" name="tags" id="tags" class="form-control @error('tags') is-invalid @enderror" value="{{ old('tags', $blog->tags) }}">
                                @error('tags') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            </div>

                        </div>
                    </div>
                </div>
                
                <div class="card-footer bg-white border-top text-right py-3">
                    <button type="submit" class="btn btn-primary px-5 py-2 fw-bold"><i class="fas fa-save mr-2"></i> Update Blog Post</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.tiny.cloud/1/k7s1mzelbak5781z8q09854jffex95a5hrxp8w2dpo96dkjd/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>
<script>
    tinymce.init({
        selector: '#content',
        height: 600,
       plugins: [
        'anchor', 'autolink', 'charmap', 'codesample', 'emoticons',
        'link', 'lists', 'media', 'searchreplace',
        'table', 'visualblocks', 'wordcount'
    ],
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography uploadcare | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Newton Academy',
        mergetags_list: [
            { value: 'First.Name', title: 'First Name' },
            { value: 'Email', title: 'Email' },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
        uploadcare_public_key: 'a3e5dca8b7fc7e396b71',
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        }
    });

    $('.custom-file-input').on('change', function() {
        var fileName = $(this).val().split('\\').pop();
        $(this).siblings('.custom-file-label').addClass("selected").html(fileName ? fileName : 'Choose Cover Image');
    });
</script>
@endpush