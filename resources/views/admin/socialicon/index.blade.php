@extends('admin.layouts.app')
@push('style-page-level')
@endpush
@section('content')
    <!-- Page Wrapper -->

        <div class="content container-fluid">
            <div class="row border shadow p-2" style="background-color: white; height: auto; width: 100%;">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            @include('admin.common.breadcrumbs')
                            <a href="{{ route('admin.socialicon.edit', 0) }}"><button class="btn btn-outline-success">Add Social Media</button></a>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive" id="data">
                                <table class="datatable table table-stripped" id="dataTable">
                                    <thead>
                                    <tr>
                                        <th>Sr#</th>
                                        <th>Title</th>
                                        <th>Link</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($socialicons as $key => $value)
                                        <tr>
                                            <td class="width-10">{{ $key+1 }}</td>
                                            <td class="width-20">{{ $value->name }}</td>
                                            <td class="width-20"><a href="{{$value->link}}" ><i class="fa-brands fa-{{$value->name}}"></i>{{$value->link}}</a></td>
                                            <td class="width-15">{{DateToHumanformat( $value->created_at) }}</td>
                                            <td class="width-15">
                                                <a class="pr-2" href="{{ route('admin.socialicon.edit', $value->id) }}"
                                                   title="Edit"><i class="fa-solid fa-pen-to-square" style="color: #68ee6a;"></i></a>
                                                <a href="javascript:{};" data-url="{{ route('admin.socialicon.destroy',  $value->id) }}" title="Delete" class="delete"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a>
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
