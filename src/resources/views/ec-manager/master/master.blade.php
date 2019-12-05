<!doctype html>
<html class="no-js" lang="en">
@include('ec-manager.master-common.meta')
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- preloader area start -->
@include('ec-manager.master-common.loader')
<!-- preloader area end -->

<!-- page container area start -->
@yield('content')
<!-- page container area end -->
{{--page settings--}}
<!-- offset area start -->
@yield('settings-content')
<!-- offset area end -->

<!-- jquery latest version -->
@include('ec-manager.master-common.scripts')
</body>

</html>
