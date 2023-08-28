<!doctype html>
<html lang="en">

<head>
    @include('layouts.include.css')
    @yield("style")
    
    <script type="text/javascript">
        var base_url = "{{ url('/') }}";
    </script>

</head>
<body>
<main class="mt-0">
    <div class="error_sec">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-lg-5">
                    <div class="error_heading">
                        <div class="text-center">
                            <h1>404</h1>
                            <p>Sorry. the content you’re looking for doesn’t exist. Either it was removed.</p>
                        </div>
                    </div>
                    <div class="text-center">
                        <img src="{{ asset('assets/images/error_img.png') }}" alt="" class="error_img">
                    </div>
                    <div class="error_btn d-flex justify-content-center">
                        <a href="{{ url('/') }}">
                        <button class="btn">Go to homepage</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
@include('layouts.include.script')
@yield('script')

</html>
