@extends('layouts.adminlayout')
@section('page_meta')
    <meta name="description" content={{ !empty($site_settings) ? $site_settings->site_meta_desc : '' }}">
    <meta name="keywords" content="{{ !empty($site_settings) ? $site_settings->site_meta_keyword : '' }}">
    <meta name="author" content="{{ !empty($site_settings->site_name) ? $site_settings->site_name : 'Login' }}">
    <title>Admin - {{ !empty($site_settings) && $site_settings->site_name }}</title>
@endsection
@section('page_content')
    {!! breadcrumb('Trade Person Register CMS') !!}
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

                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Form 1 </h3>
                            </div>
                            <div class="card-body">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="form1_heading"> Form 1 Heading</label>
                                        <input class="form-control" id="form1_heading" type="text"
                                            name="form1_heading" value="{{ $sitecontent['form1_heading'] ?? '' }}">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Form 2 </h3>
                            </div>


                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="form2_input_lable1">
                                                Form2 Input Label 1
                                            </label>
                                            <input class="form-control" id="form2_input_lable1" type="text"
                                                name="form2_input_lable1"
                                                value="{{ $sitecontent['form2_input_lable1'] ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="form2_input_placeholder1">
                                                Form2 Input Placeholder 1
                                            </label>
                                            <input class="form-control" id="form2_input_placeholder1" type="text"
                                                name="form2_input_placeholder1"
                                                value="{{ $sitecontent['form2_input_placeholder1'] ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="form2_input_lable2">
                                                Form2 Input Label 2
                                            </label>
                                            <input class="form-control" id="form2_input_lable2" type="text"
                                                name="form2_input_lable2"
                                                value="{{ $sitecontent['form2_input_lable2'] ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="form2_input_placeholder2">
                                                Form2 Input Placeholder 2
                                            </label>
                                            <input class="form-control" id="form2_input_placeholder2" type="text"
                                                name="form2_input_placeholder2"
                                                value="{{ $sitecontent['form2_input_placeholder2'] ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="form2_radio_sec1_lable3">
                                                Form2 Radio Section 1 Label 3 (Business Type)
                                            </label>
                                            <input class="form-control" id="form2_radio_sec1_lable3" type="text"
                                                name="form2_radio_sec1_lable3"
                                                value="{{ $sitecontent['form2_radio_sec1_lable3'] ?? '' }}">
                                        </div>
                                    </div>

                                    @php
                                        // Handle both array or JSON string safely
                                        $form2_business_type = [];

                                        if (!empty($sitecontent['form2_business_type'])) {
                                            if (is_string($sitecontent['form2_business_type'])) {
                                                $decoded = json_decode($sitecontent['form2_business_type'], true);
                                                $form2_business_type = is_array($decoded) ? $decoded : [];
                                            } elseif (is_array($sitecontent['form2_business_type'])) {
                                                $form2_business_type = $sitecontent['form2_business_type'];
                                            }
                                        }

                                        // If still empty, show one blank input
                                        if (empty($form2_business_type)) {
                                            $form2_business_type = [['title' => '', 'id' => '']];
                                        }
                                    @endphp

                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h5>Business Type </h5>
                                                <button type="button" class="btn btn-sm btn-success"
                                                    id="addRadioField">+
                                                    Add
                                                    Business</button>
                                            </div>
                                            <div class="card-body" id="fomr2BusinessContainer">

                                                {{-- Loop through existing or default field --}}

                                                @foreach ($form2_business_type as $field)
                                                    <div class="col-12 ">
                                                        <div class="field-group border rounded p-3 mb-2 position-relative">
                                                            <button type="button"
                                                                class="btn-close position-absolute top-0 end-0 m-2 remove-business-field"></button>
                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="form-label">Business Name</label>
                                                                    <input class="form-control" type="text"
                                                                        name="form2_business_type[title][]"
                                                                        placeholder="e.g. Business"
                                                                        value="{{ $field['title'] ?? '' }}">
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="form-label">Business ID (e.g. comapny,
                                                                        self)</label>
                                                                    <input class="form-control" type="text"
                                                                        name="form2_business_type[id][]"
                                                                        placeholder="e.g. business"
                                                                        value="{{ $field['id'] ?? '' }}">
                                                                </div>

                                                            </div>
                                                            {{-- <div class="mb-3">
                                                                <label class="form-label" for="form2_radio_sec1_val_1">
                                                                    Business Name
                                                                </label>
                                                                <input class="form-control" id="form2_radio_sec1_val_1"
                                                                    type="text" name="form2_business_type[title][]"
                                                                    value="{{ $field['title'] ?? '' }}">
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>

                                    {{-- Hidden template for new field --}}
                                    <template id="fomr2BusinessTemplate">
                                        <div class="col-12">
                                            <div class="field-group border rounded p-3 mb-2 position-relative">
                                                <button type="button"
                                                    class="btn-close position-absolute top-0 end-0 m-2 remove-business-field"></button>
                                                <div class="mb-3">
                                                    <label class="form-label">
                                                        Business Name
                                                    </label>
                                                    <input class="form-control" type="text"
                                                        name="form2_business_type[title][]" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </template>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                            const addBtnRadio = document.getElementById('addRadioField');
                                            const container = document.getElementById('fomr2BusinessContainer');
                                            const template = document.getElementById('fomr2BusinessTemplate').content;

                                            // Add new field
                                            addBtnRadio.addEventListener('click', () => {
                                                const newField = document.importNode(template, true);
                                                container.appendChild(newField);
                                            });

                                            // Remove field
                                            container.addEventListener('click', function(e) {
                                                if (e.target.classList.contains('remove-business-field')) {
                                                    e.target.closest('.field-group').remove();
                                                }
                                            });
                                        });
                                    </script>


                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="form2_radio_sec1_lable3">
                                                Form2 Radio Section 2 Label 4 (Number of Employees)
                                            </label>
                                            <input class="form-control" id="form2_radio_sec1_lable3" type="text"
                                                name="form2_radio_sec1_lable3"
                                                value="{{ $sitecontent['form2_radio_sec1_lable3'] ?? '' }}">
                                        </div>
                                    </div>
                                    @php
                                        // Handle both array or JSON string safely
                                        $form2_employees = [];

                                        if (!empty($sitecontent['form2_employees'])) {
                                            if (is_string($sitecontent['form2_employees'])) {
                                                $decoded = json_decode($sitecontent['form2_employees'], true);
                                                $form2_employees = is_array($decoded) ? $decoded : [];
                                            } elseif (is_array($sitecontent['form2_employees'])) {
                                                $form2_employees = $sitecontent['form2_employees'];
                                            }
                                        }

                                        // If still empty, show one blank input
                                        if (empty($form2_employees)) {
                                            $form2_employees = [['title' => '']];
                                            $form2_employees = [['id' => '']];
                                        }
                                    @endphp

                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h5>Number of Employees </h5>
                                                <button type="button" class="btn btn-sm btn-success" id="addEmployees">+
                                                    Add Option
                                                </button>
                                            </div>
                                            <div class="card-body" id="form2EmployeeContainer">

                                                {{-- Loop through existing or default field --}}

                                                @foreach ($form2_employees as $field)
                                                    <div class="col-12 ">
                                                        <div class="field-group border rounded p-3 mb-2 position-relative">
                                                            <button type="button"
                                                                class="btn-close position-absolute top-0 end-0 m-2 remove-employee-field"></button>
                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="form-label">Number of Employees</label>
                                                                    <input class="form-control" type="text"
                                                                        name="form2_employees[title][]"
                                                                        placeholder="e.g. Business"
                                                                        value="{{ $field['title'] ?? '' }}">
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="form-label">ID of Field (e.g. 2_5,
                                                                        10+)</label>
                                                                    <input class="form-control" type="text"
                                                                        name="form2_employees[id][]"
                                                                        placeholder="e.g. business"
                                                                        value="{{ $field['id'] ?? '' }}">
                                                                </div>

                                                            </div>
                                                            {{-- <div class="mb-3">
                                                                <label class="form-label">
                                                                    Number of Employees
                                                                </label>
                                                                <input class="form-control" type="text"
                                                                    name="form2_employees[title][]"
                                                                    value="{{ $field['title'] ?? '' }}">
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>

                                    {{-- Hidden template for new field --}}
                                    <template id="form2EmployeeTemplate">
                                        <div class="col-12">
                                            <div class="field-group border rounded p-3 mb-2 position-relative">
                                                <button type="button"
                                                    class="btn-close position-absolute top-0 end-0 m-2 remove-employee-field"></button>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Field Title</label>
                                                        <input class="form-control" type="text"
                                                            name="form2_employees[title][]" placeholder="e.g. Business">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Field ID</label>
                                                        <input class="form-control" type="text"
                                                            name="form2_employees[id][]" placeholder="e.g. business">
                                                    </div>

                                                </div>
                                                {{-- <div class="mb-3">
                                                    <label class="form-label">
                                                        Number of Employees
                                                    </label>
                                                    <input class="form-control" type="text"
                                                        name="form2_employees[title][]" value="">
                                                </div> --}}
                                            </div>
                                        </div>
                                    </template>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                            const addBtnEmployee = document.getElementById('addEmployees');
                                            const container = document.getElementById('form2EmployeeContainer');
                                            const template = document.getElementById('form2EmployeeTemplate').content;

                                            // Add new field
                                            addBtnEmployee.addEventListener('click', () => {

                                                const newField = document.importNode(template, true);
                                                console.log(newField)
                                                container.appendChild(newField);
                                            });

                                            // Remove field
                                            container.addEventListener('click', function(e) {
                                                if (e.target.classList.contains('remove-employee-field')) {
                                                    e.target.closest('.field-group').remove();
                                                }
                                            });
                                        });
                                    </script>

                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="form2_radio_sec2_val_1">
                                                Form2 Radio Section 2 Value 1
                                            </label>
                                            <input class="form-control" id="form2_radio_sec2_val_1" type="text"
                                                name="form2_radio_sec2_val_1"
                                                value="{{ $sitecontent['form2_radio_sec2_val_1'] ?? '' }}">
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Form 3 </h3>
                            </div>
                            <div class="card-body">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="form3_label_1"> Form 3 Lable 1</label>
                                        <input class="form-control" id="form3_label_1" type="text"
                                            name="form3_label_1" value="{{ $sitecontent['form3_label_1'] ?? '' }}">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="form2_option1"> Option 1
                                        </label>
                                        <input class="form-control" id="form2_option" type="text" name="form2_option"
                                            value="{{ $sitecontent['form2_option'] ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="form2_option2"> Option 2
                                        </label>
                                        <input class="form-control" id="form2_option2" type="text"
                                            name="form2_option2" value="{{ $sitecontent['form2_option2'] ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="form2_option3"> Option 3
                                        </label>
                                        <input class="form-control" id="form2_option3" type="text"
                                            name="form2_option3" value="{{ $sitecontent['form2_option3'] ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="form2_option4"> Option 4
                                        </label>
                                        <input class="form-control" id="form2_option4" type="text"
                                            name="form2_option4" value="{{ $sitecontent['form2_option4'] ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="form2_option5"> Option 5 </label>
                                        <input class="form-control" id="form2_option5" type="text"
                                            name="form2_option5" value="{{ $sitecontent['form2_option5'] ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    @php
                        // Handle both array or JSON string safely
                        $form3_fields = [];

                        if (!empty($sitecontent['form3_fields'])) {
                            if (is_string($sitecontent['form3_fields'])) {
                                $decoded = json_decode($sitecontent['form3_fields'], true);
                                $form3_fields = is_array($decoded) ? $decoded : [];
                            } elseif (is_array($sitecontent['form3_fields'])) {
                                $form3_fields = $sitecontent['form3_fields'];
                            }
                        }

                        // If still empty, show one blank input
                        if (empty($form3_fields)) {
                            $form3_fields = [['title' => '']];
                        }
                    @endphp

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3>Form 3</h3>
                                <button type="button" class="btn btn-sm btn-success" id="addFieldBtn">+ Add
                                    Field</button>
                            </div>
                            <div class="card-body" id="form3FieldsContainer">

                                {{-- Loop through existing or default field --}}
                                @foreach ($form3_fields as $field)
                                    <div class="field-group border rounded p-3 mb-2 position-relative">
                                        <button type="button"
                                            class="btn-close position-absolute top-0 end-0 m-2 remove-field"></button>
                                        <div class="mb-3">
                                            <label class="form-label">Form 3 Label</label>
                                            <input class="form-control" type="text" name="form3_fields[title][]"
                                                value="{{ $field['title'] ?? '' }}">
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    {{-- Hidden template for new field --}}
                    <template id="form3FieldTemplate">
                        <div class="field-group border rounded p-3 mb-2 position-relative">
                            <button type="button"
                                class="btn-close position-absolute top-0 end-0 m-2 remove-field"></button>
                            <div class="mb-3">
                                <label class="form-label">Form 3 Label</label>
                                <input class="form-control" type="text" name="form3_fields[title][]" value="">
                            </div>
                        </div>
                    </template>

                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            const addBtn = document.getElementById('addFieldBtn');
                            const container = document.getElementById('form3FieldsContainer');
                            const template = document.getElementById('form3FieldTemplate').content;

                            // Add new field
                            addBtn.addEventListener('click', () => {
                                const newField = document.importNode(template, true);
                                container.appendChild(newField);
                            });

                            // Remove field
                            container.addEventListener('click', function(e) {
                                if (e.target.classList.contains('remove-field')) {
                                    e.target.closest('.field-group').remove();
                                }
                            });
                        });
                    </script>




                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Form 4 </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="form4_heading"> Form 4 Heading</label>
                                            <input class="form-control" id="form4_heading" type="text"
                                                name="form4_heading" value="{{ $sitecontent['form4_heading'] ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="form4_credit_card"> Credit Card Button Text
                                            </label>
                                            <input class="form-control" id="form4_credit_card" type="text"
                                                name="form4_credit_card"
                                                value="{{ $sitecontent['form4_credit_card'] ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="form4_paypal"> PayPal Button Text
                                            </label>
                                            <input class="form-control" id="form4_paypal" type="text"
                                                name="form4_paypal" value="{{ $sitecontent['form4_paypal'] ?? '' }}">
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="form4_credit_card_number"> Credit Card Number
                                            </label>
                                            <input class="form-control" id="form4_credit_card_number" type="text"
                                                name="form4_credit_card_number"
                                                value="{{ $sitecontent['form4_credit_card_number'] ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="form4_credit_card_holder_name"> Credit Card
                                                Holder
                                                NAME
                                            </label>
                                            <input class="form-control" id="form4_credit_card_holder_name" type="text"
                                                name="form4_credit_card_holder_name"
                                                value="{{ $sitecontent['form4_credit_card_holder_name'] ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="form4_credit_card_expiry"> Credit Card Expiry
                                                Date
                                            </label>
                                            <input class="form-control" id="form4_credit_card_expiry" type="text"
                                                name="form4_credit_card_expiry"
                                                value="{{ $sitecontent['form4_credit_card_expiry'] ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="form4_credit_card_cvv"> Credit Card CVV Number
                                            </label>
                                            <input class="form-control" id="form4_credit_card_cvv" type="text"
                                                name="form4_credit_card_cvv"
                                                value="{{ $sitecontent['form4_credit_card_cvv'] ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="back_btn_text"> Back Button TEXT
                                            </label>
                                            <input class="form-control" id="back_btn_text" type="text"
                                                name="back_btn_text" value="{{ $sitecontent['back_btn_text'] ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="next_btn_text"> Next Button TEXT
                                            </label>
                                            <input class="form-control" id="next_btn_text" type="text"
                                                name="next_btn_text" value="{{ $sitecontent['next_btn_text'] ?? '' }}">
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Membership Card CMS </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="card_title"> Card Title</label>
                                            <input class="form-control" id="card_title" type="text" name="card_title"
                                                value="{{ $sitecontent['card_title'] ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="card_price"> Card Price</label>
                                            <input class="form-control" id="card_price" type="text" name="card_price"
                                                value="{{ $sitecontent['card_price'] ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="card_validity"> Card Validity</label>
                                            <input class="form-control" id="card_validity" type="text"
                                                name="card_validity" value="{{ $sitecontent['card_validity'] ?? '' }}">
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="card_feature1"> Card Feature 1</label>
                                            <input class="form-control" id="card_feature1" type="text"
                                                name="card_feature1" value="{{ $sitecontent['card_feature1'] ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="card_feature2"> Card Feature 2</label>
                                            <input class="form-control" id="card_feature2" type="text"
                                                name="card_feature2" value="{{ $sitecontent['card_feature2'] ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="card_feature3"> Card Feature 3</label>
                                            <input class="form-control" id="card_feature3" type="text"
                                                name="card_feature3" value="{{ $sitecontent['card_feature3'] ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="card_feature4"> Card Feature 4</label>
                                            <input class="form-control" id="card_feature4" type="text"
                                                name="card_feature4" value="{{ $sitecontent['card_feature4'] ?? '' }}">
                                        </div>
                                    </div>


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
