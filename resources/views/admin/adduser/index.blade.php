@extends('admin.layouts.app')
@push('style-page-level')
@endpush
@section('content')
    <!-- Page Wrapper -->
{{--    {{dd($adduser['role'] )}}--}}
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
                                <a href="{{ route('admin.adduser.edit', 0) }}">
                                    <button class="btn btn-outline-success">Add New User</button>
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">

                        <div class="table-responsive" id="data">
                            <table class="datatable table table-stripped" id="dataTable">
                                <thead id="thead">
                                <tr>
                                    <th>Sr#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Mobile</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="tr">
                                @forelse($adduser as $key => $value)
                                    <tr>
                                        <td class="width-10">{{ $key+1 }}</td>
                                        <td class="width-20">{{ $value->fullName }}</td>
                                        <td class="width-20">{{ $value->email }}</td>
                                        <td class="width-20">{{ $value['role']->name }}</td>
                                        <td class="width-20">{{ $value->phone }}</td>
                                        <td class="width-20">{{ DateToHumanformat($value->created_at)}}</td>
                                        <td class="width-15">
                                            @if($value->is_active == 0)
                                                <span>De-Active</span>
                                            @else
                                                <span>Active</span>
                                            @endif
                                        </td>
                                        <td class="width-15">
                                            <a class="pr-2" href="{{ route('admin.adduser.show', $value->id)}}"
                                               title="View"><i class="fa-solid fa-eye" style="color: #37c0d2;"></i></a>
                                            @if($value->is_active == 1)
                                                <a class="pr-2"
                                                   href="{{ route('admin.adduser.changeStatus', $value->id) }}"
                                                   title="Active"><i class="fa-solid fa-arrow-up"
                                                                     style="color: #898fe1;"></i></a>
                                            @else
                                                <a class="pr-2"
                                                   href="{{ route('admin.adduser.changeStatus', $value->id) }}"
                                                   title="De-Active"><i class="fa-solid fa-arrow-down-long"
                                                                        style="color: #cd1d49;"></i></a>
                                            @endif
                                            <a class="pr-2" href="{{ route('admin.adduser.edit', $value->id) }}"
                                               title="Edit"><i class="fa-solid fa-pen-to-square"
                                                               style="color: #68ee6a;"></i></a>
                                            <a href="javascript:{};"
                                               data-url="{{ route('admin.adduser.destroy',  $value->id) }}"
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
