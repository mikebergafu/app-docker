<div class="left-side-inner">

    <!--sidebar nav start-->
    <ul class="nav nav-pills nav-stacked custom-nav">
        <li><a href="{{route('subscriber-dashboard', \App\Helpers\BergyUtils::uuid())}}"><i class="lnr lnr-power-switch"></i><span>Dashboard</span></a></li>
        <li class="menu-list">
            <a href="#"><i class="lnr lnr-cog"></i>
                <span>Settings</span></a>
            <ul class="sub-menu-list">
                <li><a href="{{route('subscriber-settings', \App\Helpers\BergyUtils::uuid())}}">App Settings</a> </li>
            </ul>
        </li>
        <li class="menu-list"><a href="#"><i class="lnr lnr-briefcase"></i>  <span>Jobs</span></a>
            <ul class="sub-menu-list">
                <li><a href="{{route('subscriber-applied-jobs')}}">Applied Jobs</a> </li>
            </ul>
        </li>


    </ul>
    <!--sidebar nav end-->
</div>
