@extends('admin.layouts.app')
@push('style-page-level')
@endpush
@section('content')

    <div class="content container-fluid">
        @include('admin.common.breadcrumbs')
        <div class="row border shadow p-2">
            <div class="col-12 col-sm-12 col-md-6 mt-2 offset-3">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $pageHeading }} From</h4>
                    </div>
                    <div class="card-body ">
                        @include('admin.socialicon.form')
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@push('script-page-level')
@endpush
