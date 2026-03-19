@extends('admin.layouts.app')

@section('title', 'Website Settings')

@section('content')
<div class="row">
    <div class="col-md-10 mx-auto">
        <form action="{{ route('admin.settings.store') }}" method="POST">
            @csrf
            
            <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="settings-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="general-tab" data-toggle="pill" href="#general" role="tab">General Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="social-tab" data-toggle="pill" href="#social" role="tab">Social Links</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="seo-tab" data-toggle="pill" href="#seo" role="tab">SEO & Footer</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="settings-tabsContent">
                        
                        <!-- General Tab -->
                        <div class="tab-pane fade show active" id="general" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="site_name">Website Name</label>
                                        <input type="text" name="settings[site_name]" class="form-control" id="site_name" value="{{ $settings['site_name'] ?? 'Newton\'s Academy' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contact_email">Contact Email</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input type="email" name="settings[contact_email]" class="form-control" id="contact_email" value="{{ $settings['contact_email'] ?? 'info@newtonsacademy.com' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contact_phone">Contact Phone</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input type="text" name="settings[contact_phone]" class="form-control" id="contact_phone" value="{{ $settings['contact_phone'] ?? '85915 89741 | 91378 48658' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="site_address">Office Address</label>
                                        <textarea name="settings[site_address]" class="form-control" id="site_address" rows="3">{{ $settings['site_address'] ?? "1st floor Shrinivas Building Opposite\nKothari Farsan,\nZaver Road, Mulund West, Mumbai-400080" }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Social Links Tab -->
                        <div class="tab-pane fade" id="social" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="social_facebook">Facebook URL</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-facebook-f text-primary"></i></span>
                                            </div>
                                            <input type="url" name="settings[social_facebook]" class="form-control" id="social_facebook" value="{{ $settings['social_facebook'] ?? 'https://www.facebook.com/NewtonsAcademy17' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="social_linkedin">LinkedIn URL</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-linkedin-in text-info"></i></span>
                                            </div>
                                            <input type="url" name="settings[social_linkedin]" class="form-control" id="social_linkedin" value="{{ $settings['social_linkedin'] ?? 'https://www.linkedin.com/uas/login?session_redirect=https%3A%2F%2Fwww.linkedin.com%2Fcompany%2F90970653%2Fadmin%2F' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="social_instagram">Instagram URL</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-instagram text-danger"></i></span>
                                            </div>
                                            <input type="url" name="settings[social_instagram]" class="form-control" id="social_instagram" value="{{ $settings['social_instagram'] ?? 'https://www.instagram.com/newtons_academy_/' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="social_youtube">YouTube URL</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-youtube text-danger"></i></span>
                                            </div>
                                            <input type="url" name="settings[social_youtube]" class="form-control" id="social_youtube" value="{{ $settings['social_youtube'] ?? 'https://www.youtube.com/@NewtonsAcademy/playlists' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- SEO Tab -->
                        <div class="tab-pane fade" id="seo" role="tabpanel">
                            <div class="form-group">
                                <label for="meta_description">Global Meta Description</label>
                                <textarea name="settings[meta_description]" class="form-control" id="meta_description" rows="3">{{ $settings['meta_description'] ?? 'Learn effectively at Newton\'s Academy.' }}</textarea>
                            </div>

                            <hr>

                            <div class="form-group">
                                <label for="footer_text">Footer Copyright Text</label>
                                <input type="text" name="settings[footer_text]" class="form-control" id="footer_text" value="{{ $settings['footer_text'] ?? '© '.date('Y').' Newton\'s Academy. Designed by' }}">
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer bg-light text-right">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-1"></i> Save Settings
                    </button>
                </div>
            </div>
            
        </form>
    </div>
</div>
@endsection
