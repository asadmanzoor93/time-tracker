<!doctype html>
<html>
<head>
    @include('head')
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
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