@extends('layouts.adminlayout')
@section('page_meta')
    <meta name="description" content={{ !empty($site_settings) ? $site_settings->site_meta_desc : '' }}">
    <meta name="keywords" content="{{ !empty($site_settings) ? $site_settings->site_meta_keyword : '' }}">
    <meta name="author" content="{{ !empty($site_settings->site_name) ? $site_settings->site_name : 'Login' }}">
    <title>Admin - {{ !empty($site_settings) && $site_settings->site_name }}</title>
@endsection
@section('page_content')
    {!! breadcrumb('Contact Us') !!}
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
                <h5>Section 1 - Contact Details </h5>
            </div>
            <div class="card-body">
                <!-- 1st row: Left + Right side by side -->
                <div class="row">
                    <div class="col-md-12">


                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="sec1_main_heading1">Section1 Main Heading 1</label>
                                <input class="form-control" id="sec1_main_heading1" type="text" name="sec1_main_heading1"
                                    value="{{ $sitecontent['sec1_main_heading1'] ?? '' }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="sec1_main_heading2">Section1 Main Heading 2</label>
                                <input class="form-control" id="sec1_main_heading2" type="text" name="sec1_main_heading2"
                                    value="{{ $sitecontent['sec1_main_heading2'] ?? '' }}">
                            </div>
                        </div>
                        {{-- <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="sec1_main_heading2">Section1 Main Heading 3</label>
                                <input class="form-control" id="sec1_main_heading2" type="text" name="sec1_main_heading2"
                                    value="{{ $sitecontent['sec1_main_heading2'] ?? '' }}">
                            </div>
                        </div> --}}

                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="sec1_desc">Description</label>
                                <textarea id="sec1_desc" name="sec1_desc" rows="4" class="form-control">{{ !empty($sitecontent['sec1_desc']) ? $sitecontent['sec1_desc'] : '' }}</textarea>
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
                                        <h5>Block Input {{ $how_works }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="card w-100 border position-relative overflow-hidden">
                                                <div class="card-body p-4">
                                                    <div class="text-center">
                                                        <div class="file_choose_icon">
                                                            <img src="{{ get_site_image_src('images', !empty($sitecontent['image' . $i]) ? $sitecontent['image' . $i] : '') }}"
                                                                alt="matdash-img" class="img-fluid ">
                                                        </div>
                                                        <p class="mb-0">Allowed JPG, GIF or PNG. Max size of
                                                            800K</p>
                                                        <input class="form-control uploadFile"
                                                            name="image{{ $i }}" type="file"
                                                            data-bs-original-title="" title="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label"
                                                        for="sec1_contact_input{{ $i }}">Heading
                                                        {{ $how_works }}</label>
                                                    <input class="form-control"
                                                        id="sec1_contact_input{{ $i }}" type="text"
                                                        name="sec1_contact_input{{ $i }}" placeholder=""
                                                        value="{{ !empty($sitecontent['sec1_contact_input' . $i]) ? $sitecontent['sec1_contact_input' . $i] : '' }}">
                                                </div>
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



        {{-- Section 1 START --}}
        <div class="card">
            <div class="card-header">
                <h5>Section 2 - Form Placeholders </h5>
            </div>
            <div class="card-body">
                <!-- 1st row: Left + Right side by side -->
                <div class="row">



                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="sec2_username">Section2 Username Placeholder</label>
                            <input class="form-control" id="sec2_username" type="text" name="sec2_username"
                                value="{{ $sitecontent['sec2_username'] ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="sec2_phone_number">Section2 Phone Number
                                Placeholder</label>
                            <input class="form-control" id="sec2_phone_number" type="text" name="sec2_phone_number"
                                value="{{ $sitecontent['sec2_phone_number'] ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="sec2_email">Section2 Email Placeholder</label>
                            <input class="form-control" id="sec2_email" type="text" name="sec2_email"
                                value="{{ $sitecontent['sec2_email'] ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="sec2_message">Section2 Message Placeholder</label>
                            <input class="form-control" id="sec2_message" type="text" name="sec2_message"
                                value="{{ $sitecontent['sec2_message'] ?? '' }}">
                        </div>
                    </div>


                </div>

                <div class="row">

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="sec2_btn1_text">Section 2 Button 1 TEXT</label>
                            <input class="form-control" id="sec2_btn1_text" type="text" name="sec2_btn1_text"
                                placeholder=""
                                value="{{ !empty($sitecontent['sec2_btn1_text']) ? $sitecontent['sec2_btn1_text'] : '' }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="sec2_btn1_link">Section 2 Button 1 LINK</label>
                            <input class="form-control" id="sec2_btn1_link" type="text" name="sec2_btn1_link"
                                placeholder=""
                                value="{{ !empty($sitecontent['sec2_btn1_link']) ? $sitecontent['sec2_btn1_link'] : '' }}">
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
