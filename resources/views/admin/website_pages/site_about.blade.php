@extends('layouts.adminlayout')
@section('page_meta')
    <meta name="description" content={{ !empty($site_settings) ? $site_settings->site_meta_desc : '' }}">
    <meta name="keywords" content="{{ !empty($site_settings) ? $site_settings->site_meta_keyword : '' }}">
    <meta name="author" content="{{ !empty($site_settings->site_name) ? $site_settings->site_name : 'Login' }}">
    <title>Admin - {{ !empty($site_settings) && $site_settings->site_name }}</title>
@endsection
@section('page_content')
    {!! breadcrumb('About Us') !!}
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
                <h2> Section 1 </h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="sec1_heading">Heading</label>
                                    <input class="form-control" id="sec1_heading" type="text" name="sec1_heading"
                                        placeholder=""
                                        value="{{ !empty($sitecontent['sec1_heading']) ? $sitecontent['sec1_heading'] : '' }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="sec1_desc">Description</label>
                                    <textarea id="sec1_desc" name="sec1_desc" rows="4" class="form-control">{{ !empty($sitecontent['sec1_desc']) ? $sitecontent['sec1_desc'] : '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="section1_btn1_text">Button 1 TEXT</label>
                                        <input class="form-control" id="section1_btn1_text" type="text"
                                            name="section1_btn1_text" placeholder=""
                                            value="{{ !empty($sitecontent['section1_btn1_text']) ? $sitecontent['section1_btn1_text'] : '' }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="section1_btn1_link">Button 1 LINK</label>
                                        <input class="form-control" id="section1_btn1_link" type="text"
                                            name="section1_btn1_link" placeholder=""
                                            value="{{ !empty($sitecontent['section1_btn1_link']) ? $sitecontent['section1_btn1_link'] : '' }}">
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="section1_btn2_text">Button 2 TEXT</label>
                                        <input class="form-control" id="section1_btn2_text" type="text"
                                            name="section1_btn2_text" placeholder=""
                                            value="{{ !empty($sitecontent['section1_btn2_text']) ? $sitecontent['section1_btn2_text'] : '' }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="section1_btn2_link">Button 2 LINK</label>
                                        <input class="form-control" id="section1_btn2_link" type="text"
                                            name="section1_btn2_link" placeholder=""
                                            value="{{ !empty($sitecontent['section1_btn2_link']) ? $sitecontent['section1_btn2_link'] : '' }}">
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card w-100 border position-relative overflow-hidden">
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <div class="file_choose_icon">
                                        <img src="{{ get_site_image_src('images', !empty($sitecontent['image1']) ? $sitecontent['image1'] : '') }}"
                                            alt="matdash-img" class="img-fluid ">
                                    </div>
                                    <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                    <input class="form-control uploadFile" name="image1" type="file"
                                        data-bs-original-title="" title="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="row">

                    <?php $counter = 0; ?>
                    @for ($i = 2; $i <= 5; $i++)
                        <?php $counter = $counter + 1; ?>
                        <div class="col-md-3">
                            <div class="col-12">
                                <div class="card w-100 border position-relative overflow-hidden">
                                    <div class="card-body p-4">
                                        <h5>Category Image {{ $counter }}</h5>
                                        <div class="text-center">
                                            <div class="file_choose_icon">
                                                <img src="{{ get_site_image_src('images', !empty($sitecontent['image' . $i]) ? $sitecontent['image' . $i] : '') }}"
                                                    alt="matdash-img" class="img-fluid ">
                                            </div>
                                            <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                            <input type="file" class="form-control uploadFile"
                                                name="image{{ $i }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="category_name{{ $i }}">Category Name
                                        {{ $counter }}</label>
                                    <input class="form-control" id="category_name{{ $i }}" type=i
                                        name="category_name{{ $counter }}" placeholder=""
                                        value="{{ !empty($sitecontent['category_name' . $i]) ? $sitecontent['category_name' . $i] : '' }}">
                                </div>
                            </div>
                        </div>
                    @endfor
                </div> --}}



            </div>
        </div>
        {{-- Section 1 END --}}



        {{-- Section 2 START --}}
        <div class="card">
            <div class="card-header">
                <h5>Section 2 - Our Values </h5>
            </div>
            <div class="card-body">
                <!-- 1st row: Left + Right side by side -->
                <div class="row">
                    <div class="col-md-12">

                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="sect2_heading">Section2 Heading</label>
                                <input class="form-control" id="sect2_heading" type="text" name="sect2_heading"
                                    value="{{ $sitecontent['sect2_heading'] ?? '' }}">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="sect2_desc">Section2 Description</label>
                                <input class="form-control" id="sect2_desc" type="text" name="sect2_desc"
                                    value="{{ $sitecontent['sect2_desc'] ?? '' }}">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <?php $how_works = 0; ?>
                        @for ($i = 2; $i <= 4; $i++)
                            <?php $how_works = $how_works + 1; ?>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Block {{ $how_works }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="col">
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
                                                        for="sec2_values_heading{{ $i }}">Heading
                                                        {{ $how_works }}</label>
                                                    <input class="form-control"
                                                        id="sec2_values_heading{{ $i }}" type="text"
                                                        name="sec2_values_heading{{ $i }}" placeholder=""
                                                        value="{{ !empty($sitecontent['sec2_values_heading' . $i]) ? $sitecontent['sec2_values_heading' . $i] : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label"
                                                        for="sec2_values_text{{ $i }}">Text
                                                        {{ $how_works }}</label>
                                                    <input class="form-control" id="sec2_values_text{{ $i }}"
                                                        type="text" name="sec2_values_text{{ $i }}"
                                                        placeholder=""
                                                        value="{{ !empty($sitecontent['sec2_values_text' . $i]) ? $sitecontent['sec2_values_text' . $i] : '' }}">
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
        {{-- Section 2 END --}}


        {{-- Section 3 START --}}
        <div class="card">
            <div class="card-header">
                <h5>Section 3 - Why choose us</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card w-100 border position-relative overflow-hidden">
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <div class="file_choose_icon">
                                        <img src="{{ get_site_image_src('images', !empty($sitecontent['image5']) ? $sitecontent['image5'] : '') }}"
                                            alt="matdash-img" class="img-fluid ">
                                    </div>
                                    <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                    <input class="form-control uploadFile" name="image5" type="file"
                                        data-bs-original-title="" title="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="sec3_heading">Heading</label>
                                    <input class="form-control" id="sec3_heading" type="text" name="sec3_heading"
                                        placeholder=""
                                        value="{{ !empty($sitecontent['sec3_heading']) ? $sitecontent['sec3_heading'] : '' }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="sec3_desc">Description</label>
                                    <textarea id="sec3_desc" name="sec3_desc" rows="4" class="form-control">{{ !empty($sitecontent['sec3_desc']) ? $sitecontent['sec3_desc'] : '' }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <?php $how_works = 0; ?>
                            @for ($i = 1; $i <= 4; $i++)
                                <?php $how_works = $how_works + 1; ?>
                                <div class="col-md-8">
                                    <div class="mb-4">
                                        <label class="form-label" for="sec3_point_{{ $i }}">Point
                                            {{ $how_works }}</label>
                                        <input class="form-control" id="sec3_point_{{ $i }}" type="text"
                                            name="sec3_point_{{ $i }}" placeholder=""
                                            value="{{ !empty($sitecontent['sec3_point_' . $i]) ? $sitecontent['sec3_point_' . $i] : '' }}">
                                    </div>

                                </div>
                            @endfor
                        </div>

                        <div class="row">
                            <div class="col-md-6">

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="section3_btn3_text">Button 3 TEXT</label>
                                        <input class="form-control" id="section3_btn3_text" type="text"
                                            name="section3_btn3_text" placeholder=""
                                            value="{{ !empty($sitecontent['section3_btn3_text']) ? $sitecontent['section3_btn3_text'] : '' }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="section3_btn3_link">Button 3 LINK</label>
                                        <input class="form-control" id="section3_btn3_link" type="text"
                                            name="section3_btn3_link" placeholder=""
                                            value="{{ !empty($sitecontent['section3_btn3_link']) ? $sitecontent['section3_btn3_link'] : '' }}">
                                    </div>
                                </div>

                            </div>



                        </div>
                    </div>


                </div>
            </div>
        </div>
        {{-- Section 3 END --}}

        {{-- Section 4 START --}}
        <div class="card">
            <div class="card-header">
                <h2> Section 4 </h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="sec4_heading">Heading</label>
                                    <input class="form-control" id="sec4_heading" type="text" name="sec4_heading"
                                        placeholder=""
                                        value="{{ !empty($sitecontent['sec4_heading']) ? $sitecontent['sec4_heading'] : '' }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="sec4_desc">Description</label>
                                    <textarea id="sec4_desc" name="sec4_desc" rows="4" class="form-control">{{ !empty($sitecontent['sec4_desc']) ? $sitecontent['sec4_desc'] : '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="sec4_btn4_text">Button 4 TEXT</label>
                                        <input class="form-control" id="sec4_btn4_text" type="text"
                                            name="sec4_btn4_text" placeholder=""
                                            value="{{ !empty($sitecontent['sec4_btn4_text']) ? $sitecontent['sec4_btn4_text'] : '' }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="sec4_btn4_link">Button 4 LINK</label>
                                        <input class="form-control" id="sec4_btn4_link" type="text"
                                            name="sec4_btn4_link" placeholder=""
                                            value="{{ !empty($sitecontent['sec4_btn4_link']) ? $sitecontent['sec4_btn4_link'] : '' }}">
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="sec4_btn5_text">Button 5 TEXT</label>
                                        <input class="form-control" id="sec4_btn5_text" type="text"
                                            name="sec4_btn5_text" placeholder=""
                                            value="{{ !empty($sitecontent['sec4_btn5_text']) ? $sitecontent['sec4_btn5_text'] : '' }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="sec4_btn5_link">Button 5 LINK</label>
                                        <input class="form-control" id="sec4_btn5_link" type="text"
                                            name="sec4_btn5_link" placeholder=""
                                            value="{{ !empty($sitecontent['sec4_btn5_link']) ? $sitecontent['sec4_btn5_link'] : '' }}">
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card w-100 border position-relative overflow-hidden">
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <div class="file_choose_icon">
                                        <img src="{{ get_site_image_src('images', !empty($sitecontent['image6']) ? $sitecontent['image6'] : '') }}"
                                            alt="matdash-img" class="img-fluid ">
                                    </div>
                                    <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                    <input class="form-control uploadFile" name="image6" type="file"
                                        data-bs-original-title="" title="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
        {{-- Section 4 END --}}



        {{-- Section 5 START --}}
        <div class="card">
            <div class="card-header">
                <h5>Section 5 - Testimonials </h5>
            </div>
            <div class="card-body">
                <!-- 1st row: Left + Right side by side -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="section3_testi_heading">Testimonials Heading</label>
                                <input class="form-control" id="sec5_testi_heading" type="text"
                                    name="sec5_testi_heading" value="{{ $sitecontent['sec5_testi_heading'] ?? '' }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Section 5 END --}}


        <div class="col-12">
            <div class="d-flex align-items-center justify-content-end mt-4 gap-6">
                <button class="btn btn-primary" type="submit">Update Page</button>
            </div>
        </div>
    @endsection
