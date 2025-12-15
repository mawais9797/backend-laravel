@extends('layouts.adminlayout')
@section('page_meta')
    <meta name="description" content={{ !empty($site_settings) ? $site_settings->site_meta_desc : '' }}">
    <meta name="keywords" content="{{ !empty($site_settings) ? $site_settings->site_meta_keyword : '' }}">
    <meta name="author" content="{{ !empty($site_settings->site_name) ? $site_settings->site_name : 'Login' }}">
    <title>Admin - {{ !empty($site_settings) && $site_settings->site_name }}</title>
@endsection
@section('page_content')
    {!! breadcrumb('Register CMS') !!}
    <form class="form theme-form" method="post" action="" enctype="multipart/form-data" id="saveForm">
        @csrf

        {{-- Meta Tags START --}}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="row">
                        <div class="col">
                            <div>
                                <label class="form-label" for="page_title">Page Title</label>
                                <input class="form-control" id="page_title" type="text" name="page_title" placeholder=""
                                    value="{{ !empty($sitecontent['page_title']) ? $sitecontent['page_title'] : '' }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div>
                                <label class="form-label" for="meta_title">Meta Title</label>
                                <input class="form-control" id="meta_title" type="text" name="meta_title" placeholder=""
                                    value="{{ !empty($sitecontent['meta_title']) ? $sitecontent['meta_title'] : '' }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div>
                                <label class="form-label" for="site_meta_desc">Meta Description</label>
                                <textarea class="form-control" id="meta_description" rows="3" name="meta_description">{{ !empty($sitecontent['meta_description']) ? $sitecontent['meta_description'] : '' }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div>
                                <label class="form-label" for="meta_keywords">Meta Keywords</label>
                                <textarea class="form-control" id="meta_keywords" rows="3" name="meta_keywords">{{ !empty($sitecontent['meta_keywords']) ? $sitecontent['meta_keywords'] : '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Meta Tags END --}}


        {{-- Section 1 START --}}
        <div class="card">
            <div class="card-header">
                <h5>Section 1 - Left Side </h5>
            </div>
            <div class="card-body">
                <!-- 1st row: Left + Right side by side -->
                <div class="row">
                    <div class="col-md-12">

                        <div class="col-md-12">

                            <div class="col-md-12">
                                <div class="card w-100 border position-relative overflow-hidden">
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <h4>Background Image</h4>
                                            <div class="file_choose_icon">
                                                <img src="{{ get_site_image_src('images', !empty($sitecontent['image1']) ? $sitecontent['image1'] : '') }}"
                                                    alt="matdash-img" class="img-fluid ">
                                            </div>
                                            <p class="mb-0">Allowed JPG, GIF or PNG. Max size of
                                                800K</p>
                                            <input class="form-control uploadFile" name="image1" type="file"
                                                data-bs-original-title="" title="">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label" for="sec1_heading"> Section 1 Heading
                                    </label>
                                    <input class="form-control" id="sec1_heading" type="text" name="sec1_heading"
                                        placeholder=""
                                        value="{{ !empty($sitecontent['sec1_heading']) ? $sitecontent['sec1_heading'] : '' }}">
                                </div>
                            </div>

                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="sec1_desc">Description</label>
                                <textarea id="sec1_desc" name="sec1_desc" rows="4" class="form-control editor">{{ !empty($sitecontent['sec1_desc']) ? $sitecontent['sec1_desc'] : '' }}</textarea>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <?php $how_works = 0; ?>
                        @for ($i = 1; $i <= 3; $i++)
                            <?php $how_works = $how_works + 1; ?>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Block Navigation {{ $how_works }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="sec1_nav1_text"> Navigation
                                                    {{ $how_works }}
                                                    Text</label>
                                                <input class="form-control" id="sec1_nav1_text" type="text"
                                                    name="sec1_nav1_text{{ $i }}"
                                                    value="{{ $sitecontent['sec1_nav1_text' . $i] ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="sec1_nav1_link"> Navigation
                                                    {{ $how_works }}
                                                    Link</label>
                                                <input class="form-control" id="sec1_nav1_link" type="text"
                                                    name="sec1_nav1_link{{ $i }}"
                                                    value="{{ $sitecontent['sec1_nav1_link' . $i] ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>

                </div>
            </div>
        </div>
        {{-- Section 1 END --}}



        {{-- Section 2 START --}}
        <div class="card">
            <div class="card-header">
                <h5>Section 2 - Right Side </h5>
            </div>
            <div class="card-body">
                <!-- 1st row: Left + Right side by side -->
                <div class="row">

                    <div class="col-md-12">
                        <div class="card w-100 border position-relative overflow-hidden">
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h4>Logo Image</h4>
                                    <div class="file_choose_icon">
                                        <img src="{{ get_site_image_src('images', !empty($sitecontent['image2']) ? $sitecontent['image2'] : '') }}"
                                            alt="matdash-img" class="img-fluid ">
                                    </div>
                                    <p class="mb-0">Allowed JPG, GIF or PNG. Max size of
                                        800K</p>
                                    <input class="form-control uploadFile" name="image2" type="file"
                                        data-bs-original-title="" title="">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="sec2_btn1_text">Section 2 Button 1 TEXT</label>
                                            <input class="form-control" id="sec2_btn1_text" type="text"
                                                name="sec2_btn1_text" placeholder=""
                                                value="{{ !empty($sitecontent['sec2_btn1_text']) ? $sitecontent['sec2_btn1_text'] : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="sec2_btn1_link">Section 2 Button 1 LINK</label>
                                            <input class="form-control" id="sec2_btn1_link" type="text"
                                                name="sec2_btn1_link" placeholder=""
                                                value="{{ !empty($sitecontent['sec2_btn1_link']) ? $sitecontent['sec2_btn1_link'] : '' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="sec2_heading">Section 2 Heading</label>
                                            <input class="form-control" id="sec2_heading" type="text"
                                                name="sec2_heading" placeholder=""
                                                value="{{ !empty($sitecontent['sec2_heading']) ? $sitecontent['sec2_heading'] : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="sec2_text">Section 2 Text</label>
                                            <input class="form-control" id="sec2_text" type="text" name="sec2_text"
                                                placeholder=""
                                                value="{{ !empty($sitecontent['sec2_text']) ? $sitecontent['sec2_text'] : '' }}">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="sec2_name">Section2 FULL NAME Placeholder</label>
                            <input class="form-control" id="sec2_name" type="text" name="sec2_name"
                                value="{{ $sitecontent['sec2_name'] ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="sec2_email">Section2 EMAIL Placeholder</label>
                            <input class="form-control" id="sec2_email" type="text" name="sec2_email"
                                value="{{ $sitecontent['sec2_email'] ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="sec2_phone">Section2 Phone Number Placeholder</label>
                            <input class="form-control" id="sec2_phone" type="text" name="sec2_phone"
                                value="{{ $sitecontent['sec2_phone'] ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="sec2_password">Section2 PASSWORD
                                Placeholder</label>
                            <input class="form-control" id="sec2_password" type="text" name="sec2_password"
                                value="{{ $sitecontent['sec2_password'] ?? '' }}">
                        </div>
                    </div>
                    {{-- <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="sec2_checkbox_text">Section2 CheckBox Text</label>
                            <input class="form-control" id="sec2_checkbox_text" type="text" name="sec2_checkbox_text"
                                value="{{ $sitecontent['sec2_checkbox_text'] ?? '' }}">
                        </div>
                    </div> --}}

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Checkbox Text Block </h4>
                            </div>
                            <div class="card-body">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="chkbox_text1"> Checkbox Text 1</label>
                                        <input class="form-control" id="chkbox_text1" type="text" name="chkbox_text1"
                                            value="{{ $sitecontent['chkbox_text1'] ?? '' }}">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="checkbox_text2"> Checkbox Text 2</label>
                                        <input class="form-control" id="checkbox_text2" type="text"
                                            name="checkbox_text2" value="{{ $sitecontent['checkbox_text2'] ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="checkbox_text2_link"> Checkbox Text 2
                                            Link</label>
                                        <input class="form-control" id="checkbox_text2_link" type="text"
                                            name="checkbox_text2_link"
                                            value="{{ $sitecontent['checkbox_text2_link'] ?? '' }}">
                                    </div>
                                </div>


                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="checkbox_text3"> Checkbox Text 3</label>
                                        <input class="form-control" id="checkbox_text3" type="text"
                                            name="checkbox_text3" value="{{ $sitecontent['checkbox_text3'] ?? '' }}">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="checkbox_text4"> Checkbox Text 4</label>
                                        <input class="form-control" id="checkbox_text4" type="text"
                                            name="checkbox_text4" value="{{ $sitecontent['checkbox_text4'] ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="checkbox_text4_link"> Checkbox Text 4 Link</label>
                                        <input class="form-control" id="checkbox_text4_link" type="text"
                                            name="checkbox_text4_link"
                                            value="{{ $sitecontent['checkbox_text4_link'] ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="sec2_submit_btn_text">Section2 Submit Button Text
                            </label>
                            <input class="form-control" id="sec2_submit_btn_text" type="text"
                                name="sec2_submit_btn_text" value="{{ $sitecontent['sec2_submit_btn_text'] ?? '' }}">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label" for="sec2_no_account_text">Section2 Already Have Account Text
                            </label>
                            <input class="form-control" id="sec2_no_account_text" type="text"
                                name="sec2_no_account_text" value="{{ $sitecontent['sec2_no_account_text'] ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="sec2_login_text">Section2 Login Text
                            </label>
                            <input class="form-control" id="sec2_login_text" type="text" name="sec2_login_text"
                                value="{{ $sitecontent['sec2_login_text'] ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="sec2_login_link">Section2 Login Link
                            </label>
                            <input class="form-control" id="sec2_login_link" type="text" name="sec2_login_link"
                                value="{{ $sitecontent['sec2_login_link'] ?? '' }}">
                        </div>
                    </div>


                </div>


            </div>
            {{-- Section 1 END --}}




            <div class="col-12">
                <div class="d-flex align-items-center justify-content-end mt-4 gap-6">
                    <button class="btn btn-primary" type="submit">Update Page</button>
                </div>
            </div>
        @endsection
