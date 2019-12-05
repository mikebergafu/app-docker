<!-- sidebar menu area start -->
<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="index.html"><img src="{{asset('assets/images/icon/logo.png')}}" alt="logo" ></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu"style="color:black;" id="menu">
                    <li class="active">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                        <ul class="collapse">
                            <li><a href="{{route('cm-dashboard', \App\Helpers\BergyUtils::uuid())}}">Dashboard</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-users"></i><span>
                                Subscriber Mgt
                                    </span></a>
                        <ul class="collapse">
                            <li><a href="{{route('admin-back-office-users', \App\Helpers\BergyUtils::uuid())}}"><i class="fa fa-plus-circle"></i>Subsciber Lists</a></li>
                            <li><a href="index3-horizontalmenu.html">Subscribers</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-area-chart"></i><span>
                                Reports
                                    </span></a>
                        <ul class="collapse">
                            <li><a href="{{route('admin-back-office-users', \App\Helpers\BergyUtils::uuid())}}"><i class="fa fa-plus-circle"></i>Subsciber Lists</a></li>
                            <li><a href="index3-horizontalmenu.html">Subscribe Count</a></li>
                        </ul>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->
