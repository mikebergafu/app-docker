<!doctype html>
<html class="no-js" lang="en">
@include('subscriber.common.meta')
<body>

<!-- Navigation Start  -->
@include('subscriber.pages.partials.nav-bar')
<!-- Navigation End  -->

@include('subscriber.common.loader')

<!-- Main jumbotron for a primary marketing message or call to action -->
@yield('content')

@include('subscriber.modals.prompt-error.error-modal')
<!-- footer start -->
@include('subscriber.pages.partials.footer')
@include('subscriber.common.script')
</body>
</html>
