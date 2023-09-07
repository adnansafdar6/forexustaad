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
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 mt-6 offset-3 pt-2">
                        <form class="form form-vertical" action="{{ $action }}" method="POST">
                            @csrf
                            <input type="hidden" value="PUT" name="_method">
                            <div class="mb-3">
                                <label for="value" style="margin-bottom: 10px;">Select Category</label>
                                <select class="custom-select" name="parent_id" required>
                                    <option value="">----Select Category Name----</option>
                                    @foreach($categories as $key => $category)
                                        <option
                                            value="{{ $category->id }}" {{ ($category->id == old('id', $subcategory->parent_id))?'selected':'' }}>{{ ucfirst($category->name) }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('name'))
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="name" style="margin-bottom: 10px;">SubCategory Name</label>
                                <input type="text" class="form-control" name="name"
                                       value="{{ old('name', $subcategory->name) }}" placeholder="Enter Category"
                                       required>
                                @if($errors->has('name'))
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">
                                    {{ $subcategory->id != 0 ? 'Save Changes' : 'Add SubCategory' }}
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive" id="data">
                            <table class="datatable table table-stripped" id="dataTable">
                                <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Category</th>
                                    <th>SubCategory</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($subcategories as $key => $sub)
                                    @foreach($sub['subcategories'] as $ke => $value)
                                        <tr>
                                            <td class="width-10">{{ $key+1 }}</td>
                                            <td class="width-15">{{ $sub->name }}</td>
                                            <td class="width-15">{{ $value->name}}</td>
                                            <td class="width-15">{{ $value->created_at }}</td>
                                            <td class="width-15">{{ $value->updated_at }}</td>
                                            <td class="width-15">
                                                <a class="pr-2" href="{{ route('admin.subcategories.edit', $value->id) }}"
                                                   title="Edit"><i class="fa-solid fa-pen-to-square" style="color: #68ee6a;"></i></a>
                                                <a href="javascript:{};"
                                                   data-url="{{ route('admin.subcategories.destroy',  $value->id) }}"
                                                   title="Delete" class="delete"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
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
