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
                            <a href="{{ route('admin.footer.edit', 0) }}"><button class="btn btn-outline-success">Add footer</button></a>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive" id="data">
                                <table class="datatable table table-stripped" id="dataTable">
                                    <thead>
                                    <tr>
                                        <th>Sr#</th>
                                        <th>Title</th>
                                        <th>Link</th>
                                        <th>Place</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($footers as $key => $value)
                                        <tr>
                                            <td class="width-10">{{ $key+1 }}</td>
                                            <td class="width-15">{{ $value->name }}</td>
                                            <td class="width-15">{{strlimit($value->link)}}</td>
                                            <td class="width-15">{{$value->type}}</td>
                                            <td class="width-15">{{DateToHumanformat( $value->created_at) }}</td>
                                            <td class="width-15">
                                                @if($value->is_active == 0)
                                                    <span>De-Active</span>
                                                @else
                                                    <span>Active</span>
                                                @endif
                                            </td>
                                            <td class="width-15">
                                                    @if($value->is_active == 1)
                                                        <a class="pr-2" href="{{ route('admin.footer.changeStatus', $value->id) }}"
                                                           title="De Active"><i class="fa-solid fa-thumbs-up"></i></a>
                                                @else
                                                        <a class="pr-2" href="{{ route('admin.footer.changeStatus', $value->id) }}"
                                                           title="Active"><i class="fa-solid fa-thumbs-down" style="color: #ff3300;"></i></a>
                                                @endif
                                                <a class="pr-2" href="{{ route('admin.footer.edit', $value->id) }}"
                                                   title="Edit"><i class="fa-solid fa-pen-to-square" style="color: #68ee6a;"></i></a>
                                                <a href="javascript:{};" data-url="{{ route('admin.footer.destroy',  $value->id) }}" title="Delete" class="delete"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a>
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
