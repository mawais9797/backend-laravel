@extends('layouts.adminlayout')
@section('page_meta')
    <meta name="description" content={{ !empty($site_settings) ? $site_settings->site_meta_desc : '' }}">
    <meta name="keywords" content="{{ !empty($site_settings) ? $site_settings->site_meta_keyword : '' }}">
    <meta name="author" content="{{ !empty($site_settings->site_name) ? $site_settings->site_name : 'Login' }}">
    <title>Admin - {{ !empty($site_settings) && $site_settings->site_name }}</title>
@endsection
@section('page_content')
    @if (request()->segment(3) == 'edit' || request()->segment(3) == 'add')
        {!! breadcrumb('Add/Update Plan') !!}
        <form class="form theme-form" method="post" action="" enctype="multipart/form-data" id="saveForm">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">


                        <div class="col-lg-12 d-flex align-items-stretch">
                            <div class="card w-100 border position-relative overflow-hidden">
                                <div class="card-body p-4">
                                    <h4 class="card-title">Category Block</h4>

                                    <div class="row">

                                        <div class="col-lg-12 d-flex align-items-stretch">
                                            <div class="card w-100 border position-relative overflow-hidden">
                                                <div class="card-body p-4">
                                                    <h4 class="card-title">Category Image</h4>
                                                    <div class="text-center">
                                                        <div class="file_choose_icon">
                                                            <img src="{{ get_site_image_src('categories', !empty($row) ? $row->image : '') }}"
                                                                alt="matdash-img" class="img-fluid" width="120"
                                                                height="120">
                                                        </div>
                                                        <input class="form-control uploadFile" name="image" type="file"
                                                            data-bs-original-title="" title="">
                                                        <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label" for="title">Title
                                                    </label>
                                                    <input class="form-control" id="title" type="text" name="title"
                                                        placeholder="" value="{{ !empty($row->title) ? $row->title : '' }}">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label" for="price">Price
                                                    </label>
                                                    <input class="form-control" id="price" type="text" name="price"
                                                        placeholder="" value="{{ !empty($row->price) ? $row->price : '' }}">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label" for="validity">Plans Validity
                                                    </label>
                                                    <select class="form-control" id="validity" name="validity">
                                                        <option>Choose your option</option>
                                                        <option value="Week"
                                                            {{ isset($row) && $row->validity == 'Week' ? 'selected' : '' }}>
                                                            Week</option>
                                                        <option value="Month"
                                                            {{ isset($row) && $row->validity == 'Month' ? 'selected' : '' }}>
                                                            Month</option>
                                                        <option value="Year"
                                                            {{ isset($row) && $row->validity == 'Year' ? 'selected' : '' }}>
                                                            Year</option>


                                                        {{--
                                                        <option value="Week">
                                                            Week
                                                        </option>
                                                        <option value="Month">
                                                            Month
                                                        </option>
                                                        <option value="Year">
                                                            Year
                                                        </option> --}}
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <label class="form-label" for="feature1">Feature 1
                                                    </label>
                                                    <input class="form-control" id="feature1" type="text"
                                                        name="feature1" placeholder=""
                                                        value="{{ !empty($row->feature1) ? $row->feature1 : '' }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <label class="form-label" for="feature2">Feature 2
                                                    </label>
                                                    <input class="form-control" id="feature2" type="text"
                                                        name="feature2" placeholder=""
                                                        value="{{ !empty($row->feature2) ? $row->feature2 : '' }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <label class="form-label" for="feature3">Feature 3
                                                    </label>
                                                    <input class="form-control" id="feature3" type="text"
                                                        name="feature3" placeholder=""
                                                        value="{{ !empty($row->feature3) ? $row->feature3 : '' }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <label class="form-label" for="feature4">Feature 4
                                                    </label>
                                                    <input class="form-control" id="feature4" type="text"
                                                        name="feature4" placeholder=""
                                                        value="{{ !empty($row->feature4) ? $row->feature4 : '' }}">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <div class="form-check form-switch py-2">
                                                        <input class="form-check-input success" type="checkbox"
                                                            id="color-success"
                                                            {{ !empty($row) ? ($row->status == 1 ? 'checked' : '') : '' }}
                                                            name="status" />
                                                        <label class="form-check-label" for="color-success">
                                                            {{ !empty($row) ? ($row->status == 0 ? 'InActive' : 'Active') : 'Status' }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                </div>
                            </div>
                        </div>




                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-end mt-4 gap-6">
                                <button class="btn btn-primary" type="submit">
                                    {{ !empty($row) ? 'Update Plan' : 'Add Plan' }}</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    @else
        {!! breadcrumb('Plans', url('/admin/plans/add')) !!}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered text-nowrap align-middle">
                            <thead>
                                <!-- start row -->
                                <tr>
                                    <th>Sr#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Validity</th>

                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                <!-- end row -->
                            </thead>
                            <tbody>
                                @if (!empty($rows))
                                    {{-- {{ pr($rows) }} --}}
                                    @foreach ($rows as $key => $row)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>

                                            <td>
                                                <div class="d-flex align-items-center gap-6 crud_thumbnail_icon">
                                                    <img src="{{ get_site_image_src('plans', !empty($row->image) ? $row->image : '') }}"
                                                        width="45" />

                                                    {{-- <h6 class="mb-0"> {{ $row->title }}</h6> --}}
                                                </div>
                                            </td>

                                            <td>{!! $row->title !!}</td>
                                            <td>{!! $row->price !!}</td>
                                            <td>{!! $row->validity !!}</td>

                                            <td>{!! getStatus($row->status) !!}</td>
                                            {{-- <td>{!! getStatus($row['status']) !!}</td> --}}


                                            <td>
                                                <div class="dropdown dropstart">
                                                    <a href="javascript:void(0)" class="text-muted"
                                                        id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="ti ti-dots-vertical fs-6"></i>
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center gap-3"
                                                                href="{{ url('admin/plans/edit/' . $row->id) }}">
                                                                <i class="fs-4 ti ti-edit"></i>Edit
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center gap-3"
                                                                href="{{ url('admin/plans/delete/' . $row->id) }}"
                                                                onclick="return confirm('Are you sure?');">
                                                                <i class="fs-4 ti ti-trash"></i>Delete
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr class="odd">
                                        <td colspan="4">No record(s) found!</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
