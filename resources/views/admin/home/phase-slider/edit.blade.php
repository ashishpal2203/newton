@extends('admin.layouts.app')

@section('title', 'Edit Phase Slide')

@section('header-actions')
    <a href="{{ route('admin.home.sections.phase-slider.index') }}" class="btn btn-light border">
        <i class="fas fa-arrow-left mr-1"></i> Back to List
    </a>
@endsection

@section('content')
<form action="{{ route('admin.home.sections.phase-slider.update', $phaseSlider->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-7">
            <div class="card h-100">
                <div class="card-header bg-white">
                    <h3 class="card-title">Slide Information</h3>
                </div>
                <div class="card-body">
                    <div class="form-group mb-4">
                        <label for="badge">Badge Text (Optional)</label>
                        <input type="text" name="badge" id="badge" class="form-control @error('badge') is-invalid @enderror" value="{{ old('badge', $phaseSlider->badge) }}" placeholder="e.g. 🏆 Phase 3 starts 1st Feb">
                        @error('badge')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="title">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $phaseSlider->title) }}" placeholder="Enter main title" required>
                        @error('title')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="link_text">Subtitle Link Text (Optional)</label>
                                <input type="text" name="link_text" id="link_text" class="form-control @error('link_text') is-invalid @enderror" value="{{ old('link_text', $phaseSlider->link_text) }}" placeholder="e.g. Top Rankers’ Strategy">
                                @error('link_text')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="link_url">Subtitle Link URL (Optional)</label>
                                <input type="text" name="link_url" id="link_url" class="form-control @error('link_url') is-invalid @enderror" value="{{ old('link_url', $phaseSlider->link_url) }}" placeholder="https://...">
                                @error('link_url')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label for="description">Description (Optional)</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="Enter description text">{{ old('description', $phaseSlider->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="button_text">Button Text (Optional)</label>
                                <input type="text" name="button_text" id="button_text" class="form-control @error('button_text') is-invalid @enderror" value="{{ old('button_text', $phaseSlider->button_text) }}" placeholder="Join Now">
                                @error('button_text')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="button_url">Button URL (Optional)</label>
                                <input type="text" name="button_url" id="button_url" class="form-control @error('button_url') is-invalid @enderror" value="{{ old('button_url', $phaseSlider->button_url) }}" placeholder="https://...">
                                @error('button_url')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5 mt-4 mt-lg-0">
            <div class="card h-100">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Mentor Team</h3>
                    <button type="button" class="btn btn-xs btn-outline-primary" id="addMentor"><i class="fas fa-plus"></i> Add Mentor</button>
                </div>
                <div class="card-body" id="mentorsContainer">
                    @foreach($phaseSlider->mentors as $mentor)
                    <div class="mentor-entry border rounded p-3 mb-3 bg-light position-relative pt-4">
                        <button type="button" class="btn btn-xs btn-danger position-absolute remove-mentor" style="top:5px; right:5px; border-radius:50%;"><i class="fas fa-times"></i></button>
                        <input type="hidden" name="mentor_ids[]" value="{{ $mentor->id }}">
                        
                        <div class="form-group">
                            <label class="text-xs mb-1">Mentor Name <span class="text-danger">*</span></label>
                            <input type="text" name="mentor_names[]" class="form-control form-control-sm" required value="{{ $mentor->name }}" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label class="text-xs mb-1">Subtitle/Exam <span class="text-danger">*</span></label>
                            <input type="text" name="mentor_titles[]" class="form-control form-control-sm" required value="{{ $mentor->title }}" placeholder="e.g. NEET-UG 2025">
                        </div>
                        <div class="form-group mb-0 text-center">
                            <img src="{{ Storage::url($mentor->image) }}" class="rounded mb-2" style="width: 60px; height: 60px; object-fit: cover;">
                            <div class="custom-file custom-file-sm">
                                <input type="file" name="mentor_images[]" class="custom-file-input" accept="image/*">
                                <label class="custom-file-label text-xs">Replace Image</label>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12 text-right">
            <button type="submit" class="btn btn-primary px-5 btn-lg shadow">Update Slide</button>
        </div>
    </div>
</form>

<!-- Template for hidden cloning -->
<div id="mentorTemplate" style="display:none;">
    <div class="mentor-entry border rounded p-3 mb-3 bg-light position-relative pt-4">
        <button type="button" class="btn btn-xs btn-danger position-absolute remove-mentor" style="top:5px; right:5px; border-radius:50%;"><i class="fas fa-times"></i></button>
        <input type="hidden" name="mentor_ids[]" value="">
        
        <div class="form-group">
            <label class="text-xs mb-1">Mentor Name <span class="text-danger">*</span></label>
            <input type="text" name="mentor_names[]" class="form-control form-control-sm" required placeholder="Name">
        </div>
        <div class="form-group">
            <label class="text-xs mb-1">Subtitle/Exam <span class="text-danger">*</span></label>
            <input type="text" name="mentor_titles[]" class="form-control form-control-sm" required placeholder="e.g. NEET-UG 2025">
        </div>
        <div class="form-group mb-0">
            <label class="text-xs mb-1">Image <span class="text-danger">*</span></label>
            <div class="custom-file custom-file-sm">
                <input type="file" name="mentor_images[]" class="custom-file-input" required accept="image/*">
                <label class="custom-file-label text-xs">Choose Image</label>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(function() {
        // Add Mentor
        $('#addMentor').on('click', function() {
            var html = $('#mentorTemplate').html();
            $('#mentorsContainer').append(html);
            updateMentorsControls();
        });

        // Remove Mentor
        $(document).on('click', '.remove-mentor', function() {
            $(this).closest('.mentor-entry').remove();
            updateMentorsControls();
        });

        function updateMentorsControls() {
            var count = $('.mentor-entry').length;
            if (count > 1) {
                $('.remove-mentor').show();
            } else {
                $('.remove-mentor').hide();
            }
        }

        // File input filename
        $(document).on('change', '.custom-file-input', function() {
            var fileName = $(this).val().split('\\').pop();
            $(this).siblings('.custom-file-label').addClass("selected").html(fileName ? fileName : 'Choose Image');
        });
        
        updateMentorsControls();
    });
</script>
@endpush
