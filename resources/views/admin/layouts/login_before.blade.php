<!doctype html>
<html lang="en">

<head>
    @include('admin.layouts.include.css')
    <style>
        body {
            background-image: "{{ asset('admin_assets/images/LOGINBG.png') }}";
            background-position: center;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
    <script type="text/javascript">
        var base_url = "{{ url('/') }}";
    </script>
    @yield('style')
</head>

<body>
    @yield('content')
    @include('admin.layouts.include.script')
    @yield('script')
</body>

</html>