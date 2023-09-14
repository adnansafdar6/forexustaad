@extends('admin.layouts.app')
@push('style-page-level')

@endpush
@section('content')

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
        <div class="row border shadow p-2">
            <div class="col-12 col-sm-12 col-md-12 mt-2 ">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $pageHeading }} From</h4>
                    </div>
                    <div class="card-body">
                        @include('admin.adduser.form')
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('script-page-level')
    <script>
        $(document).ready(function () {
            $('#pass').click(function (event){
                if($('#password').attr('type') === "text"){
                    $('#pass').removeClass('fa-eye');
                    $('#pass').addClass('fa-eye-slash');
                    $('#password').attr('type', 'password');
                } else {
                    $('#pass').removeClass('fa-eye-slash');
                    $('#pass').addClass('fa-eye');
                    $('#password').attr('type', 'text');
                }
            });
            $('#confirm').click(function (event){
                if($('#password_confirmation').attr('type') === "text"){
                    $('#confirm').removeClass('fa-eye');
                    $('#confirm').addClass('fa-eye-slash');
                    $('#password_confirmation').attr('type', 'password');
                } else {
                    $('#confirm').removeClass('fa-eye-slash');
                    $('#confirm').addClass('fa-eye');
                    $('#password_confirmation').attr('type', 'text');
                }
            });
        });
    </script>

@endpush
