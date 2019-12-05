<nav class="navbar navbar-expand-lg bg-danger rounded noti">
    <ul class="nav nav-pills">
        <li class="nav-item dropdown">
            <a class="nav-link text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-bell noti-icon"></i>
                <i class="badge badge-notify" >34</i>
            </a>
            <ul class="dropdown-menu">
                <li class="head text-light bg-dark" style="padding: 5px;">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                            <span class="fa fa-envelope"></span>
                            <a href="" class="float-right text-light">Mark all as read</a>
                        </div>
                    </div>
                </li>
                <li class="footer bg-dark text-center">
                    <hr>
                    <a href="" class="text-light">View All</a>
                </li>
            </ul>
        </li>
    </ul>

</nav>
<nav class="navbar navbar-default navbar-sticky bootsnav">
    <div class="container">
        <!-- Start Header Navigation -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">
                <img src="{{asset('front-end-assets/img/logo.png')}}" class="logo"
                     alt="" width="300">

            </a>

            {{--  <a class="navbar-brand" href="index.html">
                  <a  class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                      <i class="glyphicon glyphicon-bell"></i>
                  </a>
                  <i class="glyphicon glyphicon-bell"></i>
                  <span class="label label-danger">11</span>
              </a>--}}

            {{-- <div class=" navbar-brand" data-toggle="collapse" data-target="#noti">
                 <div class='support'>
                    --}}{{-- <a class="call-support show-mobile" href="#">Call Support</a>
                     <span class='show-large'>Call 555-555-5555.</span>--}}{{--
                     <i class="glyphicon glyphicon-bell"></i>
                     <span class="label label-danger">11</span>
                 </div>

                --}}{{-- <a href="#" >
                     <i class="glyphicon glyphicon-bell"></i>
                     <span class="label label-danger">11</span>
                 </a>--}}{{--
             </div>--}}

            {{--{{Session::flush()}}--}}
        </div>
        <!-- End Header Navigation -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                <li><a href="{{route('subscriber-home', \App\Helpers\BergyUtils::uuid())}}">Home</a></li>
                {{--<li><a href="#" class="btn-try-send" >SMS SEND</a></li>--}}
                <li><a href="{{route('browse-all-jobs', \App\Helpers\BergyUtils::uuid())}}">Browse Jobs</a></li>
                <li><a href="{{route('subscriber-aux-content-index', \App\Helpers\BergyUtils::uuid())}}">Aux Contents</a></li>
                @if(\App\Helpers\BergyUtils::checkSubscriptionStatus(\App\Helpers\BergyUtils::load_numbers_in_session()))
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle"
                           data-toggle="dropdown">{{\App\Helpers\BergyUtils::load_numbers_in_session()}}</a>
                        <ul class="dropdown-menu animated fadeOutUp" style="display: none; opacity: 1;">
                            @if(\App\Helpers\BergyUtils::checkIfHasProfile(\App\Helpers\BergyUtils::load_numbers_in_session()))
                            <li><a href="{{route('subscriber-profile', \App\Helpers\BergyUtils::uuid())}}">Profile</a></li>
                            @endif
                                <li><a id="unsub-link" href="#">Unsubscribe</a></li>
                            <li><a href="{{route('subscriber-dashboard', \App\Helpers\BergyUtils::uuid())}}">My Dashboard</a></li>

                            <li class="active"><a
                                    href="{{route('subscriber-logout', \App\Helpers\BergyUtils::uuid())}}">Logout</a>
                            </li>

                        </ul>
                    </li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle"
                           data-toggle="dropdown">Guest</a>
                        {{--<ul class="dropdown-menu animated fadeOutUp" style="display: none; opacity: 1;">
                            <li class="active"><a
                                    href="{{route('subscriber-login-form', \App\Helpers\BergyUtils::uuid())}}">Login</a>
                            </li>
                            <li><a href="{{route('subscriber-signup-form', \App\Helpers\BergyUtils::uuid())}}">Sign
                                    Up</a></li>

                        </ul>--}}
                    </li>
                @endif
                <li class="dropdown collapse navbar-collapse" id="noti">
                    <div class='support'>
                        <a class="call-support show-mobile" href="#">
                            <i class="glyphicon glyphicon-bell"></i>
                            <span class="label label-danger">11</span>
                        </a>


                    </div>
                    <ul class="dropdown-menu animated fadeOutUp" style="display: none; opacity: 1;">
                        <li class="active"><a
                                href="#">New Jobs</a>
                        </li>
                        <li class="active"><a
                                href="#">New Jobs</a>
                        </li>
                    </ul>
                </li>

            </ul>

        </div><!-- /.navbar-collapse -->

    </div>

</nav>
