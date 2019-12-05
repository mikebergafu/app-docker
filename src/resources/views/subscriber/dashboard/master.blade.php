<!DOCTYPE HTML>
<html lang="en">
@include('subscriber.dashboard.common.meta')
<body class="sticky-header left-side-collapsed"  onload="initMap()">
<section>
    <!-- left side start-->
    <div class="left-side sticky-left-side">

      @include('subscriber.dashboard.partials.top-side-bar')
        <!--logo and iconic logo end-->
          @include('subscriber.dashboard.partials.side-bar')
    </div>
    <!-- left side end-->

    <!-- main content start-->
    <div class="main-content">
        <!-- header-starts -->
    @include('subscriber.dashboard.partials.header')
        <!-- //header-ends -->
       @yield('content')
    </div>
    <!--footer section start-->
    @include('subscriber.dashboard.partials.footer')
    <!--footer section end-->
</section>

@include('subscriber.dashboard.common.script')
</body>
</html>
