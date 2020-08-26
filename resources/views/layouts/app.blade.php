<!DOCTYPE html>
<html>

<head>
    <title>{{ trans('home.web_name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link href="{{ asset('book_lib/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('book_lib/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('book_lib/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('book_lib/css/easy-responsive-tabs.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('book_lib/css/flexslider.css') }}" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
    @include('auth.header')

    @include('auth.login')

    @include('auth.register')

    @yield('content')

    @include('auth.footer')

    <script type="text/javascript" src="{{ asset('book_lib/js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('book_lib/js/modernizr.custom.js') }}"></script>
    <script src="{{ asset('book_lib/js/imagezoom.js') }}"></script>
    <script src="{{ asset('book_lib/js/minicart.min.js') }}"></script>
    <script src="{{ mix('js/add_book_to_form.js') }}"></script>
    <script src="{{ asset('book_lib/js/easy-responsive-tabs.js') }}"></script>
    <script src="{{ asset('book_lib/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('book_lib/js/jquery.countup.js') }}"></script>
    <script src="{{ asset('book_lib/js/jquery.flexslider.js') }}"></script>
    <script type="text/javascript" src="{{ asset('book_lib/js/move-top.js') }}"></script>
    <script type="text/javascript" src="{{ asset('book_lib/js/jquery.easing.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('book_lib/js/bootstrap.js') }}"></script>
</body>

</html>
