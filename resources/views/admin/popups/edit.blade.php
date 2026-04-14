@extends('admin.layouts.app')

@section('title', 'Edit Announcement Popup')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Popup: {{ $popup->title }}</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.popups.index') }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-arrow-left mr-1"></i> Back to List
                    </a>
                </div>
            </div>
            <form action="{{ route('admin.popups.update', $popup->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title (Internal Name)</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $popup->title) }}" placeholder="e.g., Scholarship Offer 2025" required>
                        @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Banner Image</label>
                        @if($popup->image_path)
                            <div class="mb-3">
                                <img src="{{ Storage::url($popup->image_path) }}" alt="Current Banner" class="img-thumbnail" style="max-height: 200px;">
                                <p class="text-xs text-muted mt-1">Current Banner</p>
                            </div>
                        @endif
                        <div class="custom-file">
                            <input type="file" name="image" id="image" class="custom-file-input @error('image') is-invalid @enderror">
                            <label class="custom-file-label" for="image">Choose new file (leave blank to keep current)</label>
                        </div>
                        <small class="form-text text-muted">Recommended size: 800x600px or 600x800px. Max size: 2MB.</small>
                        @error('image')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="redirect_url">Redirect URL</label>
                        <input type="url" name="redirect_url" id="redirect_url" class="form-control @error('redirect_url') is-invalid @enderror" value="{{ old('redirect_url', $popup->redirect_url) }}" placeholder="https://example.com/register">
                        <small class="form-text text-muted">User will be sent here when they click the banner.</small>
                        @error('redirect_url')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="trigger_type">How to trigger?</label>
                                <select name="trigger_type" id="trigger_type" class="form-control" required>
                                    <option value="delay" {{ old('trigger_type', $popup->trigger_type) == 'delay' ? 'selected' : '' }}>Time Delay (Seconds)</option>
                                    <option value="scroll" {{ old('trigger_type', $popup->trigger_type) == 'scroll' ? 'selected' : '' }}>Scroll Depth (Pixels)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="trigger_value">Trigger Value</label>
                                <input type="number" name="trigger_value" id="trigger_value" class="form-control @error('trigger_value') is-invalid @enderror" value="{{ old('trigger_value', $popup->trigger_value) }}" min="0" required>
                                <small class="form-text text-muted" id="triggerHelp">
                                    {{ $popup->trigger_type == 'delay' ? 'Seconds to wait after page load.' : 'Pixels to scroll down before showing.' }}
                                </small>
                                @error('trigger_value')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save mr-1"></i> Update Popup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $('#trigger_type').on('change', function() {
        if ($(this).val() == 'delay') {
            $('#triggerHelp').text('Seconds to wait after page load.');
        } else {
            $('#triggerHelp').text('Pixels to scroll down before showing.');
        }
    });

    // Show filename in custom-file-input
    $('.custom-file-input').on('change', function() {
        var fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>
@endpush
