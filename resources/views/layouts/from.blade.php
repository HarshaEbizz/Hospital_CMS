<!doctype html>
<html lang="en">

<head>
    @include('layouts.include.css')

    <script type="text/javascript">
        var base_url = "{{ url('/') }}";
    </script>
</head>
<body>
    <div class="kiran_wrp fixed-top">
        @include('layouts.include.header')
    </div>
    <main class="no-menu">
        @yield('content')
    </main>

</body>
@include('layouts.include.script')
@yield('script')
</html>