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
                    </div>
                    <div class="row">
                    <div class="col-12 col-sm-6 col-md-12 mt-6  pt-2">
                        <form class="form form-vertical" action="{{ $action }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" value="{{ $logo->img }}" name="image">
                            @csrf
                            <input type="hidden" value="PUT" name="_method">
                            <div class="row">
                            <div class="col-6 ">
                                <label for="img" style="margin-bottom: 10px;">Logo</label>
                                <input type="file" id="img" class="form-control" name="img"
                                       value="{{ old('img', $logo->img) }}" {{ (($logo->id == 0 ) ? 'required' : '') }}>
                                @if($errors->has('img'))
                                    <p class="text-danger">{{ $errors->first('img') }}</p>
                                @endif

                            </div>
                                <div class="col-6">
                                    @if(!is_null($logo->img))
                                        <img class="ml-4 mb-3" src="{{ asset($logo->img) }}" style="width: 100px; height: 100px;"
                                             alt="no image">
                                    @endif
                                </div>
                                <div class="row ml-2 mt-4">
                                    <div class="col-2 ">
                                        <input class="form-check-input" id="is_active" type="checkbox"
                                               name="is_active" {{ old('is_active', $logo->is_active) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">
                                            &nbsp;&nbsp;Is Active
                                        </label>
                                    </div>
                                </div>
                            <div class="col-8 d-flex justify-content-end mt-4">
                                <button type="submit" class="btn btn-primary me-1 mb-1">
                                    {{ $logo->id != 0 ? 'Save Changes' : 'Add Logo' }}
                                </button>
                            </div>
                            </div>
                        </form>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive" id="data">
                            <table class="datatable table table-stripped" id="dataTable">
                                <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Logo</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($logos as $key => $value)
                                    <tr>
                                        <td class="width-10">{{ $key+1 }}</td>
                                        <td class="width-15"><img src="{{ asset($value->img) }}" style="width: 100px; "
                                                                  alt="no image"></td>
                                        <td class="width-15">
                                            @if($value->is_active == 0)
                                                <span>De-Active</span>
                                            @else
                                                <span>Active</span>
                                            @endif
                                        </td>
                                        <td class="width-15">{{ DateToHumanformat($value->created_at) }}</td>
                                        <td class="width-15">
                                            @if($value->is_active == 1)
                                                <a class="pr-2"
                                                   href="{{ route('admin.logo.changeStatus', $value->id) }}"
                                                   title="Active"><i class="fa-solid fa-arrow-up"
                                                                     style="color: #898fe1;"></i></a>
                                            @else
                                                <a class="pr-2"
                                                   href="{{ route('admin.logo.changeStatus', $value->id) }}"
                                                   title="De-Active"><i class="fa-solid fa-arrow-down-long"
                                                                        style="color: #cd1d49;"></i></a>
                                            @endif
                                            <a class="pr-2" href="{{ route('admin.logo.edit', $value->id) }}"
                                               title="Edit"><i class="fa-solid fa-pen-to-square" style="color: #68ee6a;"></i></a>
                                            <a href="javascript:{};"
                                               data-url="{{ route('admin.logo.destroy',  $value->id) }}"
                                               title="Delete" class="delete"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a>
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
