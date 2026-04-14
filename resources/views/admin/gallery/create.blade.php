@extends('admin.layouts.app')

@section('title', 'Upload Gallery Photos')

@section('header-actions')
    <a href="{{ route('admin.gallery.index') }}" class="btn btn-light border">
        <i class="fas fa-arrow-left mr-1"></i> Back to Gallery
    </a>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card shadow-sm border-0" style="border-radius: 16px;">
            <div class="card-body p-4">
                <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
                    @csrf
                    
                    <div class="text-center mb-4 py-4 border-dashed rounded-lg" style="border: 2px dashed #e0e0e0; background: #fafafa; border-radius: 12px;">
                        <i class="fas fa-cloud-upload-alt fa-3x text-primary mb-3"></i>
                        <h5>Select Photos</h5>
                        <p class="text-muted small">You can select multiple images at once (JPEG, PNG, WEBP)</p>
                        
                        <input type="file" name="photos[]" id="photos" class="d-none" multiple accept="image/*" onchange="updateFileList(this)">
                        <button type="button" class="btn btn-outline-primary px-4" onclick="document.getElementById('photos').click()">
                            Browse Files
                        </button>
                    </div>

                    <div id="fileList" class="mb-4 d-flex flex-wrap gap-2"></div>

                    @error('photos.*')
                        <div class="alert alert-danger mb-4">{{ $message }}</div>
                    @enderror

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary btn-lg px-5 shadow-sm" id="submitBtn" disabled>
                            <i class="fas fa-save mr-2"></i> Start Upload
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function updateFileList(input) {
    const list = document.getElementById('fileList');
    const submitBtn = document.getElementById('submitBtn');
    list.innerHTML = '';
    
    if (input.files.length > 0) {
        submitBtn.disabled = false;
        Array.from(input.files).forEach(file => {
            const reader = new FileReader();
            const div = document.createElement('div');
            div.className = 'position-relative';
            div.style.width = '80px';
            div.style.height = '80px';
            
            reader.onload = function(e) {
                div.innerHTML = `
                    <img src="${e.target.result}" class="rounded w-100 h-100 shadow-sm" style="object-fit: cover; border: 2px solid #fff;">
                    <div class="position-absolute border-0" style="top: -5px; right: -5px; background: #667eea; color: #fff; width: 18px; height: 18px; border-radius: 50%; font-size: 10px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-check"></i>
                    </div>
                `;
            }
            reader.readAsDataURL(file);
            list.appendChild(div);
        });
    } else {
        submitBtn.disabled = true;
    }
}

document.getElementById('uploadForm').onsubmit = function() {
    document.getElementById('submitBtn').disabled = true;
    document.getElementById('submitBtn').innerHTML = '<span class="spinner-border spinner-border-sm mr-2"></span> Uploading...';
};
</script>
@endpush
@endsection
