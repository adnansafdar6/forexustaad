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
                                <select class="custom-select" name="category_id" required>
                                    <option value="">----Select Category Name----</option>
                                    @foreach($categories[0]['subcategories'] as $key => $category)
                                        <option value="{{ $category->id }}" {{ ($category->id == old('id',$faq->category_id ))?'selected':'' }}>{{ ucfirst($category->name) }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('category_id'))
                                    <p class="text-danger">{{ $errors->first('category_id') }}</p>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="name" style="margin-bottom: 10px;">Question</label>
                                <input type="text" class="form-control" name="question"
                                       value="{{ old('question', $faq->question) }}" placeholder="Enter Question"
                                       required>
                                @if($errors->has('question'))
                                    <p class="text-danger">{{ $errors->first('question') }}</p>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="name" style="margin-bottom: 10px;">Answer</label>
                                <textarea type="text" class="form-control" name="answer"
                                        placeholder="Enter Answer"
                                          required>{{ old('answer', $faq->answer) }}</textarea>
                                @if($errors->has('answer'))
                                    <p class="text-danger">{{ $errors->first('answer') }}</p>
                                @endif
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">
                                    {{ $faq->id != 0 ? 'Save Changes' : 'Add FAQ' }}
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
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Date </th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($faqs as $key => $faq)
{{--                                    {{dd($sub)}}--}}
                                        <tr>
                                            <td class="width-10">{{ $key+1 }}</td>
                                            <td class="width-15">{{ $faq['category']->name }}</td>
                                            <td class="width-15">{{ strlimit($faq->question )}}</td>
                                            <td class="width-15">{{strlimit( $faq->answer)}}</td>
                                            <td class="width-15">{{ DateToHumanformat($faq->created_at )}}</td>
                                            <td class="width-15">
                                                <a class="pr-2" href="{{ route('admin.faq.edit', $faq->id) }}"
                                                   title="Edit"><i class="fa-solid fa-pen-to-square" style="color: #68ee6a;"></i></a>
                                                <a href="javascript:{};"
                                                   data-url="{{ route('admin.faq.destroy',  $faq->id) }}"
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

    <!-- /Page Wrapper -->

@endsection
@push('script-page-level')
@endpush
