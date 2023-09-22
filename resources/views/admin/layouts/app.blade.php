<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

{{--    <title>{{ $pageTitle }}</title>--}}


    <!-- Fonts -->
{{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
{{--    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">--}}

    <!-- Scripts -->
    @vite(['resources/sass/app.scss'])
{{--    , 'resources/js/app.js'--}}
{{--    <!-- Scripts -->--}}
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}
{{--    <!-- Styles -->--}}
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/admin/new/img/favicon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/new/css/bootstrap.min.css') }}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/new/fontawesome-free-6.4.2-web/css/all.min.css') }}">
    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/new/css/feathericon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/new/plugins/morris/morris.css') }}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/new/css/style.css') }}">


    <!-- DataTable -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/plugins/datatable/datatable.min.css') }}">

    <!-- Toaster -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/toastr/toastr.min.css') }}">

    @stack('style-page-level')

</head>
<body>
<div class="main-wrapper" id="app">
    <!-- ---------NAVBAR--------- -->
    @include('admin.common.navbar')
    <!-- -------NAVBAR END------ -->
    <!-- -------SIDEBAR START------- -->
    @include('admin.common.sidebar')
    <!-- -------SIDEBAR END------- -->
    <div class="page-wrapper">
        @yield('content')
    </div>
    <!-- -------FOOTER START------- -->
{{--    @include('admin.common.footer')--}}
    <!-- -------FOOTER END------- -->
</div>

<!-- jQuery -->
<script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
<!-- Ckeditor -->
<script src="{{ asset('assets/admin/new/ckeditor5/ckeditor.js') }}"></script>

<!-- Bootstrap Core JS -->
<script src="{{ asset('assets/admin/new/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/admin/new/js/bootstrap.min.js') }}"></script>

<!-- Slimscroll JS -->
<script src="{{ asset('assets/admin/new/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<script src="{{ asset('assets/admin/new/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('assets/admin/new/plugins/morris/morris.min.js') }}"></script>
<script src="{{ asset('assets/admin/new/js/chart.morris.js') }}"></script>
<!-- Custom JS -->
<script  src="{{ asset('assets/admin/new/js/script.js') }}"></script>





<script src="{{ asset('assets/admin/plugins/toastr/toastr.min.js') }}"></script>

<script src="{{ asset('assets/admin/custom/custom.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/sweetalert2/sweetalert.min.js') }}"></script>

<script src="{{ asset('assets/admin/plugins/datatable/datatable.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatable/simple-datatables.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatable/datatable_bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/admin/custom/api.js') }}"></script>
<script type="text/javascript">
    // let table = document.querySelector('#dataTable');
    // let dataTable = new simpleDatatables.DataTable(table);
    window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
                'baseUrl' => url('/')."/admin/",
                'apiUrl' => url('/')."/api/",
                'session_id'=> session()->getId(),
        ]) !!};
    $(document).ready(function () {
        // $('#dataTable').DataTable({
        //     destroy: true,
        //     processing: true,
        //     select: true,
        //     paging: true,
        //     lengthChange: true,
        //     "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        //     searching: true,
        //     "order": [],
        //     info: false,
        //     responsive: true,
        //     autoWidth: false
        // });

        $(".admin-logout").on("click", function(event){
            event.preventDefault();
            document.getElementById('logout-form').submit();
        });
        $('#dataTable').DataTable();
        toastr.options = {
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            // "rtl": isEnableRtl,
            "closeButton":true
        }
        if ("{!! session()->has('success') !!}") {
            toastr.success("{!! session()->get('success') !!}", 'Success')
        }
        if ("{!! session()->has('error') !!}") {
            toastr.error("{!! session()->get('error') !!}", 'Error')
        }
        if ("{!! session()->has('info') !!}") {
            toastr.info( "{!! session()->get('info') !!}", 'Info')
        }
        if ("{!! session()->has('warning') !!}") {
            toastr.warning( "{!! session()->get('warning') !!}", 'Warning')
        }
    })

</script>
@stack('script-page-level')


</body>
</html>
