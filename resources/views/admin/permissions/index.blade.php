@extends('admin.layouts.app')
@push('style-page-level')
@endpush
@section('content')

    <div class="content container-fluid">
        <div class="row border shadow p-2" style="background-color: white; height: auto; width: 100%;">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        @include('admin.common.breadcrumbs')
                        <a href="{{ route('admin.permissions.edit', 0) }}"><button class="btn btn-outline-success">Add New Permission</button></a>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive" id="data">
                            <table class="datatable table table-stripped" id="dataTable">
                                <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Name</th>
                                    <th>Guard Name</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($permissions as $key => $value)
                                    <tr>
                                        <td class="width-10">{{ $key+1 }}</td>
                                        <td class="width-20">{{ $value->name }}</td>
                                        <td class="width-20">{{ $value->guard_name }}</td>
                                        <td class="width-15">{{ $value->created_at }}</td>
                                        <td class="width-15">{{ $value->updated_at }}</td>
                                        <td class="width-15">
                                            <a class="pr-2" href="{{ route('admin.permissions.edit', $value->id) }}"
                                               title="Edit"><i class="fa-solid fa-pen-to-square" style="color: #68ee6a;"></i></a>
                                            <a href="javascript:{};" data-url="{{ route('admin.permissions.destroy',  $value->id) }}" title="Delete" class="delete"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a>
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

@endsection
@push('script-page-level')
@endpush
