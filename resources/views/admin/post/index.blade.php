@extends('admin.layouts.app')
@push('style-page-level')
@endpush
@section('content')
    <!-- Page Wrapper -->

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
        <div class="row border shadow p-2" style="background-color: white; height: auto; width: 100%;">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('admin.post.edit', 0) }}">
                            <button class="btn btn-outline-success">Add New Post</button>
                        </a>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive" id="data">
                            <table class="datatable table table-stripped" id="dataTable">
                                <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($post as $key => $value)

                                    <tr>
                                        <td class="width-10">{{ $key+1 }}</td>
                                        <td class="width-20">{{ $value->title }}</td>
                                        <td class="width-20">{{$value['category']->name}}</td>
                                        <td class="width-20">Comments</td>
                                        <td class="width-20">{{ DateToHumanformat($value->created_at)}}</td>
                                        <td class="width-15">
                                            @if($value->status == "pending")
                                                <a  href="{{ route('admin.post.status', [$value->id, 'public']) }}"title="Public Now">
                                                    <button class="btn btn-outline-danger">Public Now</button>
                                                </a>

                                            @else
                                                <a href="{{ route('admin.post.status', [$value->id, 'pending']) }}"title="Cancel">
                                                    <button class="btn btn-outline-success">Private Now</button></a>
                                            @endif
                                        </td>
                                        <td class="width-15">
                                            <a class="pr-2" href="{{ route('admin.post.show', $value->slug) }}"
                                               title="View"><i class="fa-solid fa-eye" style="color: #37c0d2;"></i></a>
                                            @if($value->is_feature == 1)
                                                <a class="pr-2" href="{{ route('admin.post.changeStatus', $value->id) }}"
                                                   title="Post Up"><i class="fa-solid fa-arrow-up" style="color: #898fe1;"></i></a>
                                            @else
                                                <a class="pr-2" href="{{ route('admin.post.changeStatus', $value->id) }}"
                                                   title="Post Down"><i class="fa-solid fa-arrow-down-long" style="color: #cd1d49;"></i></a>
                                            @endif


                                            <a class="pr-2" href="{{ route('admin.post.edit', $value->id) }}"
                                               title="Edit"><i class="fa-solid fa-pen-to-square"
                                                               style="color: #68ee6a;"></i></a>
                                            <a href="javascript:{};"
                                               data-url="{{ route('admin.post.destroy',  $value->id) }}" title="Delete"
                                               class="delete"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No Record Found.</td>
                                    </tr>
                                @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- /Page Wrapper -->
@endsection
@push('script-page-level')

@endpush
