@extends('admin.layouts.app')
@push('style-page-level')
@endpush
<style>
    figure img{
        width: 500px;
    }
</style>
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

                    <div class="">
                        <img class=" mb-3" src="{{ asset($post->img) }}" style="width: 300px;" alt="no image">
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
                                                <span>Post Details</span>
                                                <a class="edit-link" href="{{ route('admin.post.edit', $post->id) }}"
                                                   title="Edit"><i class="fa-solid fa-pen-to-square pr-1"
                                                                   style="color: #68ee6a;"></i>Edit</a>
                                            </h5>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3"><b>Title</b></p>
                                                <p class="col-sm-10">{{$post->title}}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">
                                                    <b>Description</b></p>
                                                <div class="card" >
                                                    <div class="card-body">
                                                        <div >{!! $post->desc !!}</div>
                                                        {!!$post->embed!!}
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

            </div>
        </div>
    </div>

@endsection
@push('script-page-level')

@endpush
