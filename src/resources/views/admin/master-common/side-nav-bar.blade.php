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
                            <li><a href="{{route('admin-dashboard', \App\Helpers\BergyUtils::uuid())}}">Dashboard</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-users"></i><span>
                                User Management
                                    </span></a>
                        <ul class="collapse">
                            <li><a href="{{route('admin-all-users', \App\Helpers\BergyUtils::uuid())}}"><i class="fa fa-plus-circle"></i> User Lists</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-columns"></i><span>
                                Job Management
                                    </span></a>
                        <ul class="collapse">
                            <li><a href="{{route('admin-job-categories', \App\Helpers\BergyUtils::uuid())}}"><i class="fa fa-bookmark"></i> Keyword List</a></li>
                            <li><a href="{{route('admin-jobs', \App\Helpers\BergyUtils::uuid())}}"><i class="fa fa-building"></i> Job List</a></li>
                            <li><a href="{{route('admin-list-company', \App\Helpers\BergyUtils::uuid())}}"><i class="fa fa-building"></i> Companies List</a></li>
                            <li><a href="{{route('admin-log')}}"><i class="fa fa-building"></i> View Logs</a></li>
                        </ul>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->
