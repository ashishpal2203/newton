@extends('admin.layouts.app')

@section('title', 'Home Page Settings')

@section('content')
<div class="row">
    <div class="col-md-11 mx-auto">
        <form action="{{ route('admin.content.home.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="card card-primary card-outline card-outline-tabs shadow-lg">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="home-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="hero-tab" data-toggle="tab" href="#hero" role="tab">Hero</a></li>
                        <li class="nav-item"><a class="nav-link" id="stats-tab" data-toggle="tab" href="#stats" role="tab">Stats</a></li>
                        <li class="nav-item"><a class="nav-link" id="phase-tab" data-toggle="tab" href="#phase" role="tab">Phase Slider</a></li>
                        <li class="nav-item"><a class="nav-link" id="courses-tab" data-toggle="tab" href="#courses" role="tab">Courses</a></li>
                        <li class="nav-item"><a class="nav-link" id="study-tab" data-toggle="tab" href="#study" role="tab">Study Materials</a></li>
                        <li class="nav-item"><a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab">About</a></li>
                        <li class="nav-item"><a class="nav-link" id="mission-tab" data-toggle="tab" href="#mission" role="tab">Mission</a></li>
                        <li class="nav-item"><a class="nav-link" id="testimonials-tab" data-toggle="tab" href="#testimonials" role="tab">Testimonials</a></li>
                        <li class="nav-item"><a class="nav-link" id="success-tab" data-toggle="tab" href="#success" role="tab">Success Stories</a></li>
                        <li class="nav-item"><a class="nav-link" id="updates-tab" data-toggle="tab" href="#updates" role="tab">Updates</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="home-tabsContent">
                        
                        <!-- Hero Tab -->
                        <div class="tab-pane fade show active" id="hero" role="tabpanel">
                            <div class="form-group">
                                <label>Hero Pre-Title</label>
                                <input type="text" name="content[home_hero_pre_title]" class="form-control" value="{{ $content['home_hero_pre_title'] ?? 'The Best Education' }}">
                            </div>
                            <div class="form-group">
                                <label>Hero Main Title</label>
                                <input type="text" name="content[home_hero_title]" class="form-control" value="{{ $content['home_hero_title'] ?? 'Your Success is Our Priority' }}">
                            </div>
                            <div class="form-group">
                                <label>Hero Subtitle / Description</label>
                                <textarea name="content[home_hero_desc]" class="form-control" rows="3">{{ $content['home_hero_desc'] ?? 'We offer high-quality education to help you achieve your goals and excel in your career.' }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Hero Primary Button Text</label>
                                <input type="text" name="content[home_hero_btn_1]" class="form-control" value="{{ $content['home_hero_btn_1'] ?? 'Read More' }}">
                            </div>

                            <hr>
                            <h5>Hero Banners (Slider)</h5>
                            <div class="repeater" data-group="home_hero_slides">
                                <div data-repeater-list="collections[home_hero_slides]">
                                    @php $slides = $content['home_hero_slides'] ?? [['laptop' => '', 'mobile' => '', 'seo_title' => '', 'alt_tag' => '']]; @endphp
                                    @foreach($slides as $index => $slide)
                                    <div data-repeater-item class="row border p-3 mb-3 rounded bg-light">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Laptop Banner (Desktop)</label>
                                                <input type="file" name="laptop_file" class="form-control-file d-block mb-2">
                                                @if(isset($slide['laptop']) && $slide['laptop'])
                                                    <img src="{{ asset('storage/' . $slide['laptop']) }}" class="img-thumbnail mb-2" style="max-height: 80px;">
                                                    <input type="hidden" name="laptop" value="{{ $slide['laptop'] }}">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mobile Banner</label>
                                                <input type="file" name="mobile_file" class="form-control-file d-block mb-2">
                                                @if(isset($slide['mobile']) && $slide['mobile'])
                                                    <img src="{{ asset('storage/' . $slide['mobile']) }}" class="img-thumbnail mb-2" style="max-height: 80px;">
                                                    <input type="hidden" name="mobile" value="{{ $slide['mobile'] }}">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>SEO Title</label>
                                                <input type="text" name="seo_title" class="form-control" value="{{ $slide['seo_title'] ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Alt Tag</label>
                                                <input type="text" name="alt_tag" class="form-control" value="{{ $slide['alt_tag'] ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-right">
                                            <button data-repeater-delete type="button" class="btn btn-danger btn-sm">Remove Slide</button>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="text-center">
                                    <button data-repeater-create type="button" class="btn btn-success"><i class="fas fa-plus mr-1"></i> Add New Slide</button>
                                </div>
                            </div>
                        </div>

                        <!-- Stats Tab -->
                        <div class="tab-pane fade" id="stats" role="tabpanel">
                            <h5>Counter Stats</h5>
                            <div class="repeater" data-group="home_stats">
                                <div data-repeater-list="collections[home_stats]">
                                    @php $stats = $content['home_stats'] ?? [['num' => '5000', 'text' => 'STUDENTS']]; @endphp
                                    @foreach($stats as $index => $stat)
                                    <div data-repeater-item class="row border p-2 mb-2 rounded bg-light">
                                        <div class="col-md-5">
                                            <label>Number</label>
                                            <input type="text" name="num" class="form-control" value="{{ $stat['num'] }}">
                                        </div>
                                        <div class="col-md-5">
                                            <label>Label</label>
                                            <input type="text" name="text" class="form-control" value="{{ $stat['text'] }}">
                                        </div>
                                        <div class="col-md-2 mt-4 text-right">
                                            <button type="button" data-repeater-delete class="btn btn-danger btn-sm mt-1"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <button type="button" data-repeater-create class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Add Stat</button>
                            </div>
                        </div>

                        <!-- Phase Slider Tab -->
                        <div class="tab-pane fade" id="phase" role="tabpanel">
                            <h5>Phase Cards</h5>
                            <div class="repeater" data-group="home_phases">
                                <div data-repeater-list="collections[home_phases]">
                                    @php $phases = $content['home_phases'] ?? [['badge' => '🏆 Phase 3 starts 1st Feb', 'title' => 'Final revision', 'link_text' => 'Strategy', 'desc' => '...', 'link' => '#']]; @endphp
                                    @foreach($phases as $index => $phase)
                                    <div data-repeater-item class="border p-3 mb-3 rounded bg-light shadow-sm">
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Badge Text</label>
                                                <input type="text" name="badge" class="form-control" value="{{ $phase['badge'] }}">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Title</label>
                                                <input type="text" name="title" class="form-control" value="{{ $phase['title'] }}">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Link Text</label>
                                                <input type="text" name="link_text" class="form-control" value="{{ $phase['link_text'] }}">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Link URL</label>
                                                <input type="text" name="link" class="form-control" value="{{ $phase['link'] }}">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label>Description</label>
                                                <textarea name="desc" class="form-control" rows="2">{{ $phase['desc'] }}</textarea>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="button" data-repeater-delete class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Remove Phase</button>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <button type="button" data-repeater-create class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Add Phase Card</button>
                            </div>
                        </div>

                        <!-- Courses Tab -->
                        <div class="tab-pane fade" id="courses" role="tabpanel">
                            <h5>Courses Grid</h5>
                            <div class="repeater" data-group="home_courses">
                                <div data-repeater-list="collections[home_courses]">
                                    @php $courses = $content['home_courses'] ?? [['title' => 'Class X', 'subtitle' => '8 Subjects', 'link' => '#']]; @endphp
                                    @foreach($courses as $index => $course)
                                    <div data-repeater-item class="border p-3 mb-3 rounded bg-light">
                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label>Course Title</label>
                                                <input type="text" name="title" class="form-control" value="{{ $course['title'] }}">
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label>Subjects/Subtitle</label>
                                                <input type="text" name="subtitle" class="form-control" value="{{ $course['subtitle'] }}">
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label>Link</label>
                                                <input type="text" name="link" class="form-control" value="{{ $course['link'] }}">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Icon (Upload or keep existing)</label>
                                                <input type="file" name="icon_file" class="form-control-file mb-1">
                                                <input type="hidden" name="icon" value="{{ $course['icon'] ?? '' }}">
                                                @if(isset($course['icon']))
                                                    <img src="{{ asset('storage/' . $course['icon']) }}" style="height: 30px;">
                                                @endif
                                            </div>
                                            <div class="col-md-6 form-group text-right mt-4">
                                                <button type="button" data-repeater-delete class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <button type="button" data-repeater-create class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Add Course</button>
                            </div>
                        </div>

                        <!-- Study Materials Tab -->
                        <div class="tab-pane fade" id="study" role="tabpanel">
                            <h5>Study Materials Grid</h5>
                            <div class="repeater" data-group="home_study">
                                <div data-repeater-list="collections[home_study]">
                                    @php $studies = $content['home_study'] ?? [['title' => 'Class X', 'subtitle' => '8 Subjects', 'link' => '#']]; @endphp
                                    @foreach($studies as $index => $study)
                                    <div data-repeater-item class="border p-3 mb-3 rounded bg-light">
                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label>Material Title</label>
                                                <input type="text" name="title" class="form-control" value="{{ $study['title'] }}">
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label>Subjects/Subtitle</label>
                                                <input type="text" name="subtitle" class="form-control" value="{{ $study['subtitle'] }}">
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label>Link</label>
                                                <input type="text" name="link" class="form-control" value="{{ $study['link'] }}">
                                            </div>
                                            <div class="col-md-12 text-right mt-2">
                                                <button type="button" data-repeater-delete class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <button type="button" data-repeater-create class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Add Material</button>
                            </div>
                        </div>

                        <!-- About Tab -->
                        <div class="tab-pane fade" id="about" role="tabpanel">
                            <div class="form-group">
                                <label>About Section Subheading</label>
                                <input type="text" name="content[home_about_sub]" class="form-control" value="{{ $content['home_about_sub'] ?? 'About Us' }}">
                            </div>
                            <div class="form-group">
                                <label>About Section Main Heading</label>
                                <input type="text" name="content[home_about_heading]" class="form-control" value="{{ $content['home_about_heading'] ?? 'First Choice For Excellent Education' }}">
                            </div>
                            <div class="form-group">
                                <label>About Section Description 1</label>
                                <textarea name="content[home_about_desc_1]" class="form-control" rows="3">{{ $content['home_about_desc_1'] ?? '' }}</textarea>
                            </div>
                        </div>

                        <!-- Mission Tab -->
                        <div class="tab-pane fade" id="mission" role="tabpanel">
                            <div class="form-group">
                                <label>Mission Section Heading</label>
                                <input type="text" name="content[home_mission_heading]" class="form-control" value="{{ $content['home_mission_heading'] ?? 'Our Mission' }}">
                            </div>
                            <div class="form-group">
                                <label>Mission Content</label>
                                <textarea name="content[home_mission_desc]" class="form-control" rows="5">{{ $content['home_mission_desc'] ?? '' }}</textarea>
                            </div>
                        </div>

                        <!-- Testimonials Tab -->
                        <div class="tab-pane fade" id="testimonials" role="tabpanel">
                            <h5>Student Testimonials</h5>
                            <div class="repeater" data-group="home_testimonials">
                                <div data-repeater-list="collections[home_testimonials]">
                                    @php $testimonials = $content['home_testimonials'] ?? [['name' => '', 'rank' => '', 'message' => '']]; @endphp
                                    @foreach($testimonials as $index => $t)
                                    <div data-repeater-item class="border p-3 mb-3 rounded bg-light shadow-sm">
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Student Name</label>
                                                <input type="text" name="name" class="form-control" value="{{ $t['name'] }}">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Rank/Info</label>
                                                <input type="text" name="rank" class="form-control" value="{{ $t['rank'] }}">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label>Message</label>
                                                <textarea name="message" class="form-control" rows="2">{{ $t['message'] }}</textarea>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Image</label>
                                                <input type="file" name="image_file" class="form-control-file mb-1">
                                                <input type="hidden" name="image" value="{{ $t['image'] ?? '' }}">
                                                @if(isset($t['image']))
                                                    <img src="{{ asset('storage/' . $t['image']) }}" style="height: 40px;" class="rounded border">
                                                @endif
                                            </div>
                                            <div class="col-md-6 text-right mt-4">
                                                <button type="button" data-repeater-delete class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <button type="button" data-repeater-create class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Add Testimonial</button>
                            </div>
                        </div>

                        <!-- Success Stories Tab -->
                        <div class="tab-pane fade" id="success" role="tabpanel">
                            <h5>Success Stories (Reviews)</h5>
                            <div class="repeater" data-group="home_success">
                                <div data-repeater-list="collections[home_success]">
                                    @php $stories = $content['home_success'] ?? [['name' => '', 'meta' => '', 'stars' => 5, 'text' => '']]; @endphp
                                    @foreach($stories as $index => $s)
                                    <div data-repeater-item class="border p-3 mb-3 rounded bg-light">
                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control" value="{{ $s['name'] }}">
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label>Course/Year</label>
                                                <input type="text" name="meta" class="form-control" value="{{ $s['meta'] }}">
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label>Stars (1-5)</label>
                                                <input type="number" name="stars" class="form-control" value="{{ $s['stars'] ?? 5 }}" min="1" max="5">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label>Review Text</label>
                                                <textarea name="text" class="form-control" rows="2">{{ $s['text'] }}</textarea>
                                            </div>
                                            <div class="col-md-2 form-group">
                                                <label>Avatar</label>
                                                <input type="text" name="avatar" class="form-control" value="{{ $s['avatar'] ?? 'P' }}" maxlength="1">
                                            </div>
                                            <div class="col-md-10 text-right mt-4">
                                                <button type="button" data-repeater-delete class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <button type="button" data-repeater-create class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Add Story</button>
                            </div>
                        </div>

                        <!-- Updates Tab -->
                        <div class="tab-pane fade" id="updates" role="tabpanel">
                            <h5>Latest Updates</h5>
                            <div class="repeater" data-group="home_updates">
                                <div data-repeater-list="collections[home_updates]">
                                    @php $updates = $content['home_updates'] ?? [['title' => '', 'category' => 'UPDATE', 'meta' => '']]; @endphp
                                    @foreach($updates as $index => $u)
                                    <div data-repeater-item class="border p-3 mb-3 rounded bg-light">
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Title</label>
                                                <input type="text" name="title" class="form-control" value="{{ $u['title'] }}">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Category</label>
                                                <input type="text" name="category" class="form-control" value="{{ $u['category'] }}">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Date/Meta</label>
                                                <input type="text" name="meta" class="form-control" value="{{ $u['meta'] }}">
                                            </div>
                                            <div class="col-md-6 form-group text-right mt-4">
                                                <button type="button" data-repeater-delete class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <button type="button" data-repeater-create class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Add Update</button>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-right bg-white p-3 border-top rounded-bottom">
                    <button type="submit" class="btn btn-primary btn-lg shadow px-5">
                        <i class="fas fa-save mr-2"></i> Save All Home Content
                    </button>
                </div>
            </div>
            
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
<script>
$(document).ready(function () {
    $('.repeater').repeater({
        show: function () {
            $(this).slideDown();
        },
        hide: function (deleteElement) {
            if(confirm('Are you sure you want to delete this element?')) {
                $(this).slideUp(deleteElement);
            }
        },
        ready: function (setIndexes) {
            // setIndexes();
        },
        isFirstItemUndeletable: false
    });
});
</script>
<style>
    .nav-tabs .nav-link.active { border-top: 3px solid #007bff; }
    .tab-pane { padding-top: 20px; }
</style>
@endpush
