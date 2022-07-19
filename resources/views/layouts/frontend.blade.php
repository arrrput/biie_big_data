
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <!-- Meta Tags -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

    <!-- Title -->
    <title>@yield('title')</title>
    <meta name="description" content="Estate Information System">

    <!-- Favicon -->
    <!-- <link rel="icon" type="image/png" href="http://127.0.0.1:8000/uploads/website-images/favicon-2021-09-30-12-20-03-7785.png"> -->

    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('includes.frontend.style')


</head>

<body>     

  @include('includes.frontend.header')

  
  {{-- Content --}}
  @yield('content')

@include('includes.frontend.footer')



<!--Scroll-Top-->
<div class="scroll-top">
    <i class="fas fa-angle-double-up"></i>
</div>
<!--Scroll-Top-->

{{-- script --}}
@stack('prepend-script')
@include('includes.frontend.script')
</body>

</html>
