<!DOCTYPE html>
<html>

<head>
    <title>{{ trans('home.web_name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
    <link href="{{ asset('book_lib/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('book_lib/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('book_lib/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('book_lib/css/easy-responsive-tabs.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('book_lib/css/flexslider.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{ asset('admin-lte/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-lte/plugins/toastr/toastr.min.css') }}" rel="stylesheet">
</head>

<body>
    @include('auth.header')

    @include('auth.login')

    @include('auth.register')

    @include('borrow_book_form')

    @yield('content')

    @include('auth.footer')

    @include('sweetalert::alert')

    <script src="{{ asset('book_lib/js/jquery-2.1.4.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('book_lib/js/modernizr.custom.js') }}"></script>
    <script src="{{ asset('book_lib/js/imagezoom.js') }}"></script>
    <script src="{{ asset('book_lib/js/minicart.min.js') }}"></script>
    <script src="{{ mix('js/add_book_to_form.js') }}"></script>
    <script src="{{ asset('book_lib/js/easy-responsive-tabs.js') }}"></script>
    <script src="{{ asset('book_lib/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('book_lib/js/jquery.countup.js') }}"></script>
    <script src="{{ asset('book_lib/js/jquery.flexslider.js') }}"></script>
    <script src="{{ asset('book_lib/js/move-top.js') }}" type="text/javascript"></script>
    <script src="{{ asset('book_lib/js/jquery.easing.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('book_lib/js/bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-lte/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/toastr/toastr.min.js') }}"></script>
</body>

</html>
