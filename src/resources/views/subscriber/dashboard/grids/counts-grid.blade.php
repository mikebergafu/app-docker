<div class="col_3">
    <div class="col-md-3 widget widget1">
        <a href="{{route('subscriber-applied-jobs')}}">
            <div class="r3_counter_box">
                <i class="fa fa-plus-square"></i>
                <div class="stats">
                    <h5>{{\App\Helpers\BergyUtils::getJobAppliedCount(\App\Helpers\BergyUtils::getSubcriberId(\App\Helpers\BergyUtils::load_numbers_in_session()))}} </h5>
                    <div class="grow">
                        <p>Jobs Applied</p>
                    </div>
                </div>
            </div>
        </a>

    </div>
    <div class="col-md-3 widget widget1">
        <div class="r3_counter_box">
            <i class="fa fa-users"></i>
            <div class="stats">
                <h5>50 <span>%</span></h5>
                <div class="grow grow1">
                    <p>New Users</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 widget widget1">
        <div class="r3_counter_box">
            <i class="fa fa-eye"></i>
            <div class="stats">
                <h5>70 <span>%</span></h5>
                <div class="grow grow3">
                    <p>New Jobs</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 widget">
        <div class="r3_counter_box">
            <i class="fa fa-usd"></i>
            <div class="stats">
                <h5>70 <span>%</span></h5>
                <div class="grow grow2">
                    <p>Profit</p>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>
