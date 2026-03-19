@extends('admin.layouts.app')

@section('title', 'About Us Settings')

@section('content')
<div class="row">
    <div class="col-md-9 mx-auto">
        <form action="{{ route('admin.content.about.store') }}" method="POST">
            @csrf
            
            <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="about-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="hero-tab" data-toggle="pill" href="#hero" role="tab">Page Header</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="vision-tab" data-toggle="pill" href="#vision" role="tab">Vision & Mission</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="about-tabsContent">
                        
                        <!-- Page Header Tab -->
                        <div class="tab-pane fade show active" id="hero" role="tabpanel">
                            <div class="form-group">
                                <label>Header Subtitle</label>
                                <input type="text" name="content[about_header_sub]" class="form-control" value="{{ $content['about_header_sub'] ?? 'Know More About Us' }}">
                            </div>
                            <div class="form-group">
                                <label>Header Main Title</label>
                                <input type="text" name="content[about_header_title]" class="form-control" value="{{ $content['about_header_title'] ?? 'The Best Education Environment' }}">
                            </div>
                            <div class="form-group">
                                <label>Header Description</label>
                                <textarea name="content[about_header_desc]" class="form-control" rows="5">{{ $content['about_header_desc'] ?? 'We believe that quality education should be accessible to all students. Our mission is to provide an inclusive and supportive environment where students can discover their passions and reach their full potential.' }}</textarea>
                            </div>
                        </div>

                        <!-- Vision & Mission Tab -->
                        <div class="tab-pane fade" id="vision" role="tabpanel">
                            <h4>Our Vision Section</h4>
                            <div class="form-group">
                                <label>Vision Paragraph 1</label>
                                <textarea name="content[about_vision_1]" class="form-control" rows="3">{{ $content['about_vision_1'] ?? 'At Newton\'s Academy, we envision a future where every student is equipped with the knowledge, skills, and mindset to excel in their chosen paths.' }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Vision Paragraph 2</label>
                                <textarea name="content[about_vision_2]" class="form-control" rows="3">{{ $content['about_vision_2'] ?? 'We aim to be a leading institution of educational excellence, shaping the leaders and innovators of tomorrow.' }}</textarea>
                            </div>
                            
                            <hr>
                            <h4>Our Mission Section</h4>
                            <div class="form-group">
                                <label>Mission Quote</label>
                                <input type="text" name="content[about_mission_quote]" class="form-control" value="{{ $content['about_mission_quote'] ?? 'Empowering families through education, one life at a time.' }}">
                            </div>
                            <div class="form-group">
                                <label>Mission Paragraph</label>
                                <textarea name="content[about_mission_desc]" class="form-control" rows="4">{{ $content['about_mission_desc'] ?? 'At Newton\'s Academy, we believe that education is not just about academic success but also about changing lives. We are passionate about creating a positive impact.' }}</textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-1"></i> Save About Us Content
                    </button>
                </div>
            </div>
            
        </form>
    </div>
</div>
@endsection
