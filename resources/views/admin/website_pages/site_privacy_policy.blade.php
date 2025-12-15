@extends('layouts.adminlayout')
@section('page_meta')
    <meta name="description" content={{ !empty($site_settings) ? $site_settings->site_meta_desc : '' }}">
    <meta name="keywords" content="{{ !empty($site_settings) ? $site_settings->site_meta_keyword : '' }}">
    <meta name="author" content="{{ !empty($site_settings->site_name) ? $site_settings->site_name : 'Login' }}">
    <title>Admin - {{ !empty($site_settings) && $site_settings->site_name }}</title>
@endsection
@section('page_content')
    {!! breadcrumb('Privacy Policy') !!}
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

                        <div class="col-12">
                            <div class="mb-3">

                                <textarea id="privacy_policy" name="privacy_policy" rows="4" class="form-control editor">{{ !empty($sitecontent['privacy_policy']) ? $sitecontent['privacy_policy'] : '' }}</textarea>
                            </div>
                        </div>

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
