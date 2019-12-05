<!doctype html>
<html class="no-js" lang="en">
@include('content-manager.common.meta')
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- preloader area start -->
@include('content-manager.common.loader')
<!-- preloader area end -->
<!-- login area start -->
<div class="login-area login-s2">
    @yield('content')
</div>
<!-- login area end -->

<!-- jquery latest version -->
@include('content-manager.common.scripts')
</body>

</html>
