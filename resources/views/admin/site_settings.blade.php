@extends('layouts.adminlayout')
@section('page_meta')
    {{-- {{ pr($site_settings) }} --}}
    <meta name="description" content={{ !empty($site_settings) ? $site_settings->site_meta_desc : '' }}">
    <meta name="keywords" content="{{ !empty($site_settings) ? $site_settings->site_meta_keyword : '' }}">
    <meta name="author" content="{{ !empty($site_settings->site_name) ? $site_settings->site_name : 'Login' }}">
    <title>Admin - {{ !empty($site_settings->site_name) ? $site_settings->site_name : 'Login' }}</title>
@endsection
@section('page_content')
    {!! breadcrumb('Site Settings') !!}
    <form class="form theme-form" method="post" action="{{ url('admin/site_settings') }}" enctype="multipart/form-data"
        id="saveForm">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="card w-100 border position-relative overflow-hidden">
                            <div class="card-body p-4">
                                <h4 class="card-title">Change Logo</h4>
                                <p class="card-subtitle mb-4">Change your Site Logo</p>
                                <div class="text-center">
                                    <div class="file_choose_icon">
                                        <img src="{{ get_site_image_src('site_images', $site_settings->site_logo) }}"
                                            alt="matdash-img" class="img-fluid ">
                                    </div>
                                    <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                    <input class="form-control uploadFile" name="site_logo" type="file"
                                        data-bs-original-title="" title="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="card w-100 border position-relative overflow-hidden">
                            <div class="card-body p-4">
                                <h4 class="card-title">Change Fav Icon</h4>
                                <p class="card-subtitle mb-4">Change your Site FavIcon</p>
                                <div class="text-center">
                                    <div class="file_choose_icon">
                                        <img src="{{ get_site_image_src('site_images', $site_settings->site_favicon) }}"
                                            alt="matdash-img" class="img-fluid ">
                                    </div>
                                    <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                    <input class="form-control uploadFile" name="site_favicon" type="file"
                                        data-bs-original-title="" title="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="card w-100 border position-relative overflow-hidden">
                            <div class="card-body p-4">
                                <h4 class="card-title">Change Thumb</h4>
                                <p class="card-subtitle mb-4">Change your Site Thumb</p>
                                <div class="text-center">
                                    <div class="file_choose_icon">
                                        <img src="{{ get_site_image_src('site_images', $site_settings->site_thumbnail) }}"
                                            alt="matdash-img" class="img-fluid ">
                                    </div>
                                    <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                    <input class="form-control uploadFile" name="site_thumbnail" type="file"
                                        data-bs-original-title="" title="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card w-100 border position-relative overflow-hidden">
                            <div class="card-body p-4">
                                <h4 class="card-title">Personal Details</h4>
                                <p class="card-subtitle mb-4">To change your Website detail , edit and save from here</p>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="site_domain" class="form-label">Site Domain</label>
                                            <input class="form-control" id="site_domain" type="text" name="site_domain"
                                                placeholder="www.example.come"
                                                value="{{ !empty($site_settings) && $site_settings->site_domain ? $site_settings->site_domain : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="site_name" class="form-label">Site Name</label>
                                            <input class="form-control" id="site_name" type="text" name="site_name"
                                                placeholder=""
                                                value="{{ !empty($site_settings) && $site_settings->site_name ? $site_settings->site_name : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="site_phone" class="form-label">Site Phone</label>
                                            <input class="form-control" id="site_phone" type="text" name="site_phone"
                                                placeholder=""
                                                value="{{ !empty($site_settings) && $site_settings->site_phone ? $site_settings->site_phone : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="site_email" class="form-label">Site Email</label>
                                            <input class="form-control" id="site_email" type="text" name="site_email"
                                                placeholder=""
                                                value="{{ !empty($site_settings) && $site_settings->site_email ? $site_settings->site_email : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="site_email_noreply" class="form-label">Site No-Reply Email</label>
                                            <input class="form-control" id="site_email_noreply" type="text"
                                                name="site_email_noreply" placeholder=""
                                                value="{{ !empty($site_settings) && $site_settings->site_email_noreply ? $site_settings->site_email_noreply : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="site_address" class="form-label">Site Address</label>
                                            <textarea class="form-control" id="site_address" rows="3" name="site_address">{{ !empty($site_settings) && $site_settings->site_address ? $site_settings->site_address : '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="site_about" class="form-label">Site About</label>
                                            <textarea class="form-control" id="site_about" rows="3" name="site_about">{{ !empty($site_settings) && $site_settings->site_about ? $site_settings->site_about : '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="site_newsletter_txt" class="form-label">Site Newsletter</label>
                                            <textarea class="form-control" id="site_newsletter_txt" rows="3" name="site_newsletter_txt">{{ !empty($site_settings) && $site_settings->site_newsletter_txt ? $site_settings->site_newsletter_txt : '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="site_copyright" class="form-label">Site Copyright</label>
                                            <textarea class="form-control" id="site_copyright" rows="3" name="site_copyright">{{ !empty($site_settings) && $site_settings->site_copyright ? $site_settings->site_copyright : '' }}</textarea>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card w-100 border position-relative overflow-hidden">
                            <div class="card-body p-4">
                                <h4 class="card-title">Meta Details</h4>
                                <p class="card-subtitle mb-4">To change your meta detail , edit and save from here</p>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="site_domain" class="form-label">Site Meta Description</label>
                                            <textarea class="form-control" id="site_meta_desc" rows="3" name="site_meta_desc">{{ !empty($site_settings) && $site_settings->site_meta_desc ? $site_settings->site_meta_desc : '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="site_copyright" class="form-label">Site Meta Keywords</label>
                                            <textarea class="form-control" id="site_meta_keyword" rows="3" name="site_meta_keyword">{{ !empty($site_settings) && $site_settings->site_meta_keyword ? $site_settings->site_meta_keyword : '' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>



                    <div class="col-12">
                        <div class="card w-100 border position-relative overflow-hidden">
                            <div class="card-body p-4">
                                <h4 class="card-title">Footer Headings</h4>
                                {{-- <p class="card-subtitle mb-4">To change your meta detail , edit and save from here</p> --}}
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <div class="">
                                                <label class="form-check-label" for="color-success"> Heading 1</label>
                                                <input class="form-control" id="site_ft_heading1" type="text"
                                                    name="site_ft_heading1"
                                                    value="{{ !empty($site_settings) && $site_settings->site_ft_heading1 ? $site_settings->site_ft_heading1 : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <div class="">
                                                <label class="form-check-label" for="color-success"> Heading 2</label>
                                                <input class="form-control" id="site_ft_heading2" type="text"
                                                    name="site_ft_heading2"
                                                    value="{{ !empty($site_settings) && $site_settings->site_ft_heading2 ? $site_settings->site_ft_heading2 : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <div class="">
                                                <label class="form-check-label" for="color-success"> Heading 3</label>
                                                <input class="form-control" id="site_ft_heading3" type="text"
                                                    name="site_ft_heading3"
                                                    value="{{ !empty($site_settings) && $site_settings->site_ft_heading3 ? $site_settings->site_ft_heading3 : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <div class="">
                                                <label class="form-check-label" for="color-success"> Heading 4</label>
                                                <input class="form-control" id="site_ft_heading4" type="text"
                                                    name="site_ft_heading4"
                                                    value="{{ !empty($site_settings) && $site_settings->site_ft_heading4 ? $site_settings->site_ft_heading4 : '' }}">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="card w-100 border position-relative overflow-hidden">
                            <div class="card-body p-4">
                                <h4 class="card-title">Site SMTP Details</h4>
                                <p class="card-subtitle mb-4">To change your SMTP detail , edit and save from here
                                </p>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <div class="">
                                                <label class="form-check-label" for="color-success"> SMTP Host</label>
                                                <input class="form-control" id="site_smtp_host" type="text"
                                                    name="site_smtp_host" placeholder=""
                                                    value="{{ !empty($site_settings) && $site_settings->site_smtp_host }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <div class="">
                                                <label class="form-check-label" for="color-success"> SMTP Port</label>
                                                <input class="form-control" id="site_smtp_port" type="text"
                                                    name="site_smtp_port" placeholder=""
                                                    value="{{ !empty($site_settings) && $site_settings->site_smtp_port }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <div class="">
                                                <label class="form-check-label" for="color-success">SMTP User</label>
                                                <input class="form-control" id="site_smtp_user" type="text"
                                                    name="site_smtp_user" placeholder=""
                                                    value="{{ !empty($site_settings) && $site_settings->site_smtp_user }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <div class="">
                                                <label class="form-check-label" for="color-success"> SMTP Password</label>
                                                <input class="form-control" id="site_smtp_pswd" type="text"
                                                    name="site_smtp_pswd" placeholder=""
                                                    value="{{ !empty($site_settings) && $site_settings->site_smtp_pswd }}">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card w-100 border position-relative overflow-hidden">
                            <div class="card-body p-4">
                                <h4 class="card-title">Site Social Links</h4>
                                <p class="card-subtitle mb-4">To change your meta detail , edit and save from here</p>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <div class="">
                                                <label class="form-check-label" for="color-success"> Instagram</label>
                                                <input class="form-control" id="site_instagram" type="text"
                                                    name="site_instagram" placeholder="www.instagram.com/account_name"
                                                    value="{{ !empty($site_settings) && $site_settings->site_instagram ? $site_settings->site_instagram : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <div class="">
                                                <label class="form-check-label" for="color-success"> Facebook</label>
                                                <input class="form-control" id="site_facebook" type="text"
                                                    name="site_facebook" placeholder="www.facebook.com/account_name"
                                                    value="{{ !empty($site_settings) && $site_settings->site_facebook ? $site_settings->site_facebook : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <div class="">
                                                <label class="form-check-label" for="color-success"> Twitter</label>
                                                <input class="form-control" id="site_twitter" type="text"
                                                    name="site_twitter" placeholder="www.twitter.com/account_name"
                                                    value="{{ !empty($site_settings) && $site_settings->site_twitter ? $site_settings->site_twitter : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <div class="">
                                                <label class="form-check-label" for="color-success"> Youtube</label>
                                                <input class="form-control" id="site_youtube" type="text"
                                                    name="site_youtube" placeholder="www.youtube.com/account_name"
                                                    value="{{ !empty($site_settings) && $site_settings->site_youtube ? $site_settings->site_youtube : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-6">
                                                                                                                                                                                                                                                                                                                        <div class="mb-3">
                                                                                                                                                                                                                                                                                                                            <div class="">
                                                                                                                                                                                                                                                                                                                                <label class="form-check-label" for="color-success"> Pinterest</label>
                                                                                                                                                                                                                                                                                                                                <input class="form-control" id="site_pinterest" type="text"
                                                                                                                                                                                                                                                                                                                                    name="site_pinterest" placeholder="www.pinterest.com/account"
                                                                                                                                                                                                                                                                                                                                    value="{{ !empty($site_settings) && $site_settings->site_pinterest }}">
                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                    </div> -->
                                    <div class="col-12">
                                        <div class="d-flex align-items-center justify-content-end mt-4 gap-6">
                                            <button class="btn btn-primary" type="submit">Update Site Settings</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection
