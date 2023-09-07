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
                        @include('admin.training.form')
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('script-page-level')
    <script type="text/javascript">
        ClassicEditor
            .create(document.querySelector('#ckeditor'),{
            ckfinder:{
                uploadUrl:'{{route('admin.post.ckeditor').'?_token='.csrf_token()}}',

            }
        })
            .then(editor=>{
                console.log(editor);
            })
            .catch(error=>{
                console.log(error);
            })
    </script>

    <script>
        $(document).ready(function () {
            $("#close-review-box3").click(function () {
                $("#post-review-box3").hide();
                $("#leavebtn3").show();
            });
            $("#open-review-box3").click(function () {
                $("#post-review-box3").show();
                $("#leavebtn3").hide();
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#close-review-box").click(function () {
                $("#post-review-box").hide();
                $("#leavebtn").show();
            });
            $("#open-review-box").click(function () {
                $("#post-review-box").show();
                $("#leavebtn").hide();
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#close-review-box2").click(function () {
                $("#post-review-box2").hide();
                $("#leavebtn2").show();
            });
            $("#open-review-box2").click(function () {
                $("#post-review-box2").show();
                $("#leavebtn2").hide();
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#close-publish").click(function () {
                $("#inputs").hide();
                $("#leavebtn1").show();
            });
            $("#open-publish").click(function () {
                $("#inputs").show();
                $("#leavebtn1").hide();
            });
        });
    </script>


@endpush
