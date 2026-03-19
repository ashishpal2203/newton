@extends('admin.layouts.app')

@section('title', 'Edit Course: ' . $course->title)

@section('content')
<div class="row text-dark">
    <div class="col-md-11 mx-auto">
        <form action="{{ route('admin.courses.update', $course) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="card card-primary card-outline card-outline-tabs shadow-lg">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="course-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active font-weight-bold" data-toggle="tab" href="#basic">General</a></li>
                        <li class="nav-item"><a class="nav-link font-weight-bold" data-toggle="tab" href="#info">Info Boxes</a></li>
                        <li class="nav-item"><a class="nav-link font-weight-bold" data-toggle="tab" href="#programs">Program Details</a></li>
                        <li class="nav-item"><a class="nav-link font-weight-bold" data-toggle="tab" href="#highlights">Highlights</a></li>
                        <li class="nav-item"><a class="nav-link font-weight-bold" data-toggle="tab" href="#home">Home Card</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        
                        <!-- General Info -->
                        <div class="tab-pane fade show active" id="basic">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Course Title</label>
                                        <input type="text" name="title" class="form-control" value="{{ $course->title }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Slug (URL)</label>
                                        <input type="text" name="slug" class="form-control" value="{{ $course->slug }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>About Title</label>
                                        <input type="text" name="about_title" class="form-control" value="{{ $course->about_title }}">
                                    </div>
                                    <div class="form-group">
                                        <label>About Description</label>
                                        <textarea name="about_text" class="form-control" rows="6">{{ $course->about_text }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group border p-3 rounded bg-light shadow-sm">
                                        <label>Main Banner Image</label>
                                        @if($course->banner)
                                            <div class="mb-2"><img src="{{ asset('storage/' . $course->banner) }}" class="img-thumbnail" style="max-height:120px;"></div>
                                        @endif
                                        <input type="file" name="banner" class="form-control-file">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Info Boxes -->
                        <div class="tab-pane fade" id="info">
                            <div id="info-boxes-container">
                                @forelse($course->info_boxes ?? [] as $index => $item)
                                <div class="row mb-2 box-item">
                                    <div class="col-md-4"><input type="text" name="info_boxes[{{ $index }}][label]" class="form-control" value="{{ $item['label'] }}"></div>
                                    <div class="col-md-7"><input type="text" name="info_boxes[{{ $index }}][value]" class="form-control" value="{{ $item['value'] }}"></div>
                                    <div class="col-md-1"><button type="button" class="btn btn-danger remove-item"><i class="fas fa-trash"></i></button></div>
                                </div>
                                @empty
                                <div class="row mb-2 box-item">
                                    <div class="col-md-4"><input type="text" name="info_boxes[0][label]" class="form-control" placeholder="Label"></div>
                                    <div class="col-md-7"><input type="text" name="info_boxes[0][value]" class="form-control" placeholder="Value"></div>
                                    <div class="col-md-1"><button type="button" class="btn btn-danger remove-item"><i class="fas fa-trash"></i></button></div>
                                </div>
                                @endforelse
                            </div>
                            <button type="button" id="add-info-box" class="btn btn-success btn-sm mt-2 shadow-sm"><i class="fas fa-plus mr-1"></i> Add Info Box</button>
                        </div>

                        <!-- Program Details -->
                        <div class="tab-pane fade" id="programs">
                            <div id="programs-container">
                                @forelse($course->program_details ?? [] as $index => $item)
                                <div class="card card-outline card-secondary mb-3 program-item shadow-none border">
                                    <div class="card-header py-2 d-flex justify-content-between">
                                        <h3 class="card-title text-sm font-weight-bold pt-1 text-primary">Program Detail Block</h3>
                                        <button type="button" class="btn btn-danger btn-xs remove-item"><i class="fas fa-times"></i></button>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="form-group mb-2">
                                            <input type="text" name="program_details[{{ $index }}][title]" class="form-control font-weight-bold" value="{{ $item['title'] }}">
                                        </div>
                                        <textarea name="program_details[{{ $index }}][content]" class="form-control" rows="3">{{ $item['content'] }}</textarea>
                                    </div>
                                </div>
                                @empty
                                <div class="card card-outline card-secondary mb-3 program-item shadow-none border">
                                    <div class="card-header py-2 d-flex justify-content-between">
                                        <h3 class="card-title text-sm font-weight-bold pt-1 text-primary">Program Detail Block</h3>
                                        <button type="button" class="btn btn-danger btn-xs remove-item"><i class="fas fa-times"></i></button>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="form-group mb-2">
                                            <input type="text" name="program_details[0][title]" class="form-control font-weight-bold" placeholder="Heading">
                                        </div>
                                        <textarea name="program_details[0][content]" class="form-control" rows="3" placeholder="Block Content..."></textarea>
                                    </div>
                                </div>
                                @endforelse
                            </div>
                            <button type="button" id="add-program-detail" class="btn btn-success btn-sm shadow-sm"><i class="fas fa-plus mr-1"></i> Add Program Block</button>
                        </div>

                        <!-- Highlights -->
                        <div class="tab-pane fade" id="highlights">
                            <div id="highlights-container">
                                @forelse($course->highlights ?? [] as $highlight)
                                <div class="input-group mb-2 highlight-item text-dark">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-check-circle text-success font-weight-bold"></i></span></div>
                                    <input type="text" name="highlights[]" class="form-control" value="{{ $highlight }}">
                                    <div class="input-group-append"><button type="button" class="btn btn-danger remove-item"><i class="fas fa-times"></i></button></div>
                                </div>
                                @empty
                                <div class="input-group mb-2 highlight-item text-dark">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-check-circle text-success font-weight-bold"></i></span></div>
                                    <input type="text" name="highlights[]" class="form-control" placeholder="Highlight details...">
                                    <div class="input-group-append"><button type="button" class="btn btn-danger remove-item"><i class="fas fa-times"></i></button></div>
                                </div>
                                @endforelse
                            </div>
                            <button type="button" id="add-highlight" class="btn btn-success btn-sm mt-2 shadow-sm"><i class="fas fa-plus mr-1"></i> Add Highlight</button>
                        </div>

                        <!-- Home Page Card -->
                        <div class="tab-pane fade" id="home">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group border p-3 rounded bg-light shadow-sm">
                                        <label>Home Card Icon</label>
                                        @if($course->home_icon)
                                            <div class="mb-2"><img src="{{ asset('storage/' . $course->home_icon) }}" class="img-thumbnail" style="max-height:80px;"></div>
                                        @endif
                                        <input type="file" name="home_icon" class="form-control-file">
                                    </div>
                                    <div class="form-group">
                                        <label>Card Theme Color</label>
                                        <select name="home_color" class="form-control custom-select">
                                            <option value="blue" {{ $course->home_color == 'blue' ? 'selected' : '' }}>Blue</option>
                                            <option value="purple" {{ $course->home_color == 'purple' ? 'selected' : '' }}>Purple</option>
                                            <option value="yellow" {{ $course->home_color == 'yellow' ? 'selected' : '' }}>Yellow</option>
                                            <option value="green" {{ $course->home_color == 'green' ? 'selected' : '' }}>Green</option>
                                            <option value="orange" {{ $course->home_color == 'orange' ? 'selected' : '' }}>Orange</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Home Subtitle (Category)</label>
                                        <input type="text" name="home_subtitle" class="form-control" value="{{ $course->home_subtitle }}">
                                    </div>
                                    <div class="custom-control custom-switch mt-4">
                                        <input type="checkbox" name="is_featured" class="custom-control-input" id="is_featured" value="1" {{ $course->is_featured ? 'checked' : '' }}>
                                        <label class="custom-control-label font-weight-bold" for="is_featured">Show on Home Page</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer text-right border-top bg-transparent">
                    <a href="{{ route('admin.courses.index') }}" class="btn btn-light border mr-2">Cancel</a>
                    <button type="submit" class="btn btn-primary px-5 shadow border-0">Update Course</button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    let infoIndex = {{ count($course->info_boxes ?? [0]) }};
    let programIndex = {{ count($course->program_details ?? [0]) }};

    $('#add-info-box').click(function() {
        $('#info-boxes-container').append(`
            <div class="row mb-2 box-item animated fadeInDown">
                <div class="col-md-4"><input type="text" name="info_boxes[${infoIndex}][label]" class="form-control" placeholder="Label"></div>
                <div class="col-md-7"><input type="text" name="info_boxes[${infoIndex}][value]" class="form-control" placeholder="Value"></div>
                <div class="col-md-1"><button type="button" class="btn btn-danger remove-item"><i class="fas fa-trash"></i></button></div>
            </div>
        `);
        infoIndex++;
    });

    $('#add-program-detail').click(function() {
        $('#programs-container').append(`
            <div class="card card-outline card-secondary mb-3 program-item shadow-none border animated fadeIn">
                <div class="card-header py-2 d-flex justify-content-between">
                    <h3 class="card-title text-sm font-weight-bold pt-1 text-primary">Program Detail Block</h3>
                    <button type="button" class="btn btn-danger btn-xs remove-item"><i class="fas fa-times"></i></button>
                </div>
                <div class="card-body p-3">
                    <div class="form-group mb-2">
                        <input type="text" name="program_details[${programIndex}][title]" class="form-control font-weight-bold" placeholder="Heading">
                    </div>
                    <textarea name="program_details[${programIndex}][content]" class="form-control" rows="3" placeholder="Block Content..."></textarea>
                </div>
            </div>
        `);
        programIndex++;
    });

    $('#add-highlight').click(function() {
        $('#highlights-container').append(`
            <div class="input-group mb-2 highlight-item animated fadeIn">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-check-circle text-success font-weight-bold"></i></span></div>
                <input type="text" name="highlights[]" class="form-control" placeholder="Highlight details...">
                <div class="input-group-append"><button type="button" class="btn btn-danger remove-item"><i class="fas fa-times"></i></button></div>
            </div>
        `);
    });

    $(document).on('click', '.remove-item', function() {
        $(this).closest('.box-item, .program-item, .highlight-item').remove();
    });
});
</script>
@endpush
@endsection
