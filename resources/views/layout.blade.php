<!doctype html>
<html>
<head>
    @include('head')
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
    <script src="{{ asset('js/jquery.min.js') }}" type="text/js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" type="text/js"></script>
    <script src="{{ asset('js/moment-with-locales.min.js') }}" type="text/js"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}" type="text/js"></script>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="container">
        <div>
            <h1>Time Tracker Application</h1>
        </div>
        <header class="row">
            @include('header')
        </header>

        <div id="main">
            @yield('content')
        </div>

        <footer class="row">
            @include('footer')
        </footer>
    </div>

</body>
</html>