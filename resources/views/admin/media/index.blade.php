@extends('admin.layouts.app')

@section('title', 'Media Library')

@section('content')
<div class="row mb-3">
    <div class="col-12 text-right">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadModal">
            <i class="fas fa-upload"></i> Upload Media
        </button>
    </div>
</div>

<div class="row">
    @forelse($mediaFiles as $media)
        <div class="col-lg-2 col-md-3 col-sm-4 col-6">
            <div class="card shadow-sm media-card">
                @if(Str::startsWith($media->mime_type, 'image/'))
                    <a href="{{ asset($media->file_path) }}" target="_blank">
                        <img src="{{ asset($media->file_path) }}" class="card-img-top object-fit-cover" alt="{{ $media->file_name }}" style="height: 120px; object-fit: cover;">
                    </a>
                @else
                    <div class="bg-light text-muted d-flex align-items-center justify-content-center" style="height: 120px;">
                        <i class="fas fa-file-alt fa-3x"></i>
                    </div>
                @endif
                
                <div class="card-body p-2 text-center text-truncate small border-top" title="{{ $media->file_name }}">
                    {{ $media->file_name }}
                </div>
                
                <div class="card-footer p-2 text-center bg-white">
                    <div class="btn-group w-100">
                        <button onclick="navigator.clipboard.writeText('{{ asset($media->file_path) }}'); alert('Copied to clipboard!')" class="btn btn-default btn-xs" title="Copy URL">
                            <i class="fas fa-copy"></i>
                        </button>
                        <form action="{{ route('admin.media.destroy', $media) }}" method="POST" class="d-inline w-50" onsubmit="return confirm('Delete this media file permanently?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-xs w-100" style="border-top-left-radius:0; border-bottom-left-radius:0;" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info text-center w-100">
                <i class="fas fa-info-circle"></i> No media files uploaded yet.
            </div>
        </div>
    @endforelse
</div>

<div class="row">
    <div class="col-12">
        {{ $mediaFiles->links('pagination::bootstrap-4') }}
    </div>
</div>

<!-- Upload Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.media.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Upload New Media</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="files[]" id="customFile" multiple required>
                            <label class="custom-file-label" for="customFile">Choose files...</label>
                        </div>
                        <small class="form-text text-muted mt-2">
                            Supported formats: JPG, PNG, GIF, SVG, PDF, DOC. Maximum 10MB per file.
                        </small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
    // Update custom file label with selected files name
    $('.custom-file-input').on('change',function(){
        var files = [];
        for (var i = 0; i < $(this)[0].files.length; i++) {
            files.push($(this)[0].files[i].name);
        }
        $(this).next('.custom-file-label').html(files.join(', '));
    })
</script>
@endpush
