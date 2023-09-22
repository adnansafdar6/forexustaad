@extends('admin.layouts.app')
@push('style-page-level')
@endpush
@section('content')
{{--{{dd($pairs)}}--}}
    <div class="content container-fluid">
        <div class="row border shadow p-2" style="background-color: white; height: auto; width: 100%;">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        @include('admin.common.breadcrumbs')
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 mt-6 offset-3 pt-2">
                        <form class="form form-vertical" action="{{ $action }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" value="{{ $pair->img }}" name="image">
                            @csrf
                            <input type="hidden" value="PUT" name="_method">
                            <div class="col">
                                @if(!is_null($pair->img))
                                    <img class="ml-4 mb-3" src="{{ asset($pair->img) }}"
                                         style="width: 100px; height: 100px;"
                                         alt="no image">
                                @endif
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <label for="img" style="margin-bottom: 10px;">Image</label>
                                    <input type="file" id="img" class="form-control" name="img"
                                           value="{{ old('img', $pair->img) }}" {{ (($pair->id == 0 ) ? 'required' : '') }}>
                                    @if($errors->has('img'))
                                        <p class="text-danger">{{ $errors->first('img') }}</p>
                                    @endif

                                </div>
                                <div class="mb-3">
                                    <label for="value" style="margin-bottom: 10px;">Select Category</label>
                                    <select class="custom-select" name="category_id" required>
                                        <option value="">----Select Category Name----</option>
                                        @foreach($categories[0]['subcategories'] as $key => $category)
                                            <option
                                                value="{{ $category->id }}" {{ ($category->id == old('id', $pair->category_id))?'selected':'' }}>{{ ucfirst($category->name) }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('name'))
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="name" style="margin-bottom: 10px;">Add Pair</label>
                                    <input type="text" class="form-control" name="pair"
                                           value="{{ old('pair', $pair->pair) }}" placeholder="Enter Pair"
                                           required>
                                    @if($errors->has('pair'))
                                        <p class="text-danger">{{ $errors->first('pair') }}</p>
                                    @endif
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">
                                        {{ $pair->id != 0 ? 'Save Changes' : 'Add Pair' }}
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
                                    <th>Image</th>
                                    <th>Pair</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($pairs as $key => $value)
                                    <tr>
                                        <td class="width-10">{{ $key+1 }}</td>
                                        <td class="width-15"><img src="{{ asset($value->img) }}" alt="No image" style="width: 100px; "
                                                                  alt="no image"></td>
                                        <td class="width-15">{{ $value->pair}}</td>
                                        <td class="width-15">{{ $value['category']->name }}</td>
                                        <td class="width-15">{{ DateToHumanformat($value->created_at) }}</td>
                                        <td class="width-15">
                                            <a class="pr-2" href="{{ route('admin.pair.edit', $value->id) }}"
                                               title="Edit"><i class="fa-solid fa-pen-to-square"
                                                               style="color: #68ee6a;"></i></a>
                                            <a href="javascript:{};"
                                               data-url="{{ route('admin.pair.destroy',  $value->id) }}"
                                               title="Delete" class="delete"><i class="fa-solid fa-trash"
                                                                                style="color: #ff0000;"></i></a>
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
