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
                        <div class="row">
                            <div class="col-3   ">
                                <a href="{{ route('admin.training.edit', 0) }}">
                                    <button class="btn btn-outline-success">Add New Lecture</button>
                                </a>
                            </div>
                            <div class="col-4">
                                <select class="custom-select " name="category_id" >
                                    <option value="">----Filter By Category----</option>
                                    @foreach($training as $key => $value)
                                        <option
                                            value="{{ $value->id }}">{{ ucfirst( $value['category']->name) }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('category_id'))
                                    <p class="text-danger">{{ $errors->first('category_id') }}</p>
                                @endif
                            </div>

                        </div>

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
                                @forelse($training as $key => $value)
                                    <tr>
                                        <td class="width-10">{{ $key+1 }}</td>
                                        <td class="width-20">{{ $value->title }}</td>
                                        <td class="width-20">{{$value['category']->name}}</td>
                                        <td class="width-20">Comments</td>
                                        <td class="width-20">{{ \Carbon\Carbon::parse($value->created_at)->format('d/m/Y h:i')}}</td>
                                        <td class="width-15">
                                            @if($value->is_active == 0)
                                                <span>De-Active</span>
                                            @else
                                                <span>Active</span>
                                            @endif
                                        </td>
                                        <td class="width-15">
                                            <a class="pr-2" href="{{ route('admin.training.show', $value->slug)}}"
                                               title="View"><i class="fa-solid fa-eye" style="color: #37c0d2;"></i></a>
                                            @if($value->is_active == 1)
                                                <a class="pr-2"
                                                   href="{{ route('admin.training.changeStatus', $value->id) }}"
                                                   title="Active"><i class="fa-solid fa-arrow-up"
                                                                     style="color: #898fe1;"></i></a>
                                            @else
                                                <a class="pr-2"
                                                   href="{{ route('admin.training.changeStatus', $value->id) }}"
                                                   title="De-Active"><i class="fa-solid fa-arrow-down-long"
                                                                        style="color: #cd1d49;"></i></a>
                                            @endif
                                            <a class="pr-2" href="{{ route('admin.training.edit', $value->id) }}"
                                               title="Edit"><i class="fa-solid fa-pen-to-square"
                                                               style="color: #68ee6a;"></i></a>
                                            <a href="javascript:{};"
                                               data-url="{{ route('admin.training.destroy',  $value->id) }}"
                                               title="Delete"
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
