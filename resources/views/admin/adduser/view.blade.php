@extends('admin.layouts.app')
@push('style-page-level')
@endpush

@section('content')
    {{--{{dd($post)}}--}}
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    @include('admin.common.breadcrumbs')
                </div>
            </div>
        </div>

        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <div class="profile-header">
                    <div class="row align-items-center">
                        <div class="col-auto profile-image">
                            <a href="#">
                                <img class="rounded-circle" alt="User Image"
                                     src="{{asset($adduser->img)}}">
                            </a>
                        </div>
                        <div class="col ml-md-n2 profile-user-info">
                            <h4 class="user-name mb-0">{{$adduser->fullName}}</h4>
                            <h6 class="text-muted">{{$adduser->email}}</h6>
                            <div class="user-Location"><i class="fa fa-map-marker"></i> {{$adduser->address}}</div>
                            <div class="about-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </div>
                        </div>

                    </div>
                </div>
                <div class="profile-menu">
                    <ul class="nav nav-tabs nav-tabs-solid">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
                        </li>
                        {{--                            <li class="nav-item">--}}
                        {{--                                <a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>--}}
                        {{--                            </li>--}}
                    </ul>
                </div>
                <div class="tab-content profile-tab-cont">

                    <!-- Personal Details Tab -->
                    <div class="tab-pane fade show active" id="per_details_tab">

                        <!-- Personal Details -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span>Personal Details</span>
                                            <a
                                               href="{{route('admin.adduser.edit',$adduser->id)}}"><i class="fa fa-edit mr-1"></i>Edit</a>
                                        </h5>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
                                            <p class="col-sm-10">{{$adduser->fullName}}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Date of
                                                Birth</p>
                                            <p class="col-sm-10">{{$adduser->dob}}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
                                            <p class="col-sm-10">{{$adduser->email}}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
                                            <p class="col-sm-10">{{$adduser->phone}}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Role</p>
                                            <p class="col-sm-10">{{$adduser['role']->name}}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Role</p>
                                            <p class="col-sm-10">{{$adduser->web}}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0">Address</p>
                                            <p class="col-sm-10 mb-0">{{$adduser->address}}<br></p>
                                        </div>
                                    </div>
                                </div>


                            </div>


                        </div>
                        <!-- /Personal Details -->

                    </div>
                    <!-- /Personal Details Tab -->


                </div>
            </div>
        </div>

    </div>


    </div>

@endsection
@push('script-page-level')

@endpush
