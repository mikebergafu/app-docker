<section class="jobs">
    <div class="container">
        <div class="row heading">
            <h2>Find Popular Jobs</h2>
            <p class="text-info" style="color:#1ecaff;" >Subscribe to get prompt alerts on Premium job offerings</p>
        </div>
        <div class="companies">
            @foreach($jobs as $job)
                <div class="company-list">
                    <a href="{{route('jobs-details',[$job->id, \App\Helpers\BergyUtils::uuid()])}}">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <div class="company-content">
                                    @if(\App\Helpers\BergyUtils::is_viewed($job->id) === 1)

                                        <h4 style="font-weight: 500;" >{{$job->title}} <i class="badge badge-success" >viewed</i></h4>
                                    @else
                                        <h4 style="font-weight: 500;" >{{$job->title}}</h4>
                                    @endif

                                    <hr>
                                    @if($job->is_free === '1')

                                        <span
                                            class="btn btn-sm btn-warning pull-right sub-indicator text-center" >{{\App\Helpers\BergyUtils::get_job_subscribe_type_name($job->is_free)}}
                                        </span>
                                    @else
                                        <button
                                            class="btn btn-sm btn-info pull-right sub-indicator text-center">{{\App\Helpers\BergyUtils::get_job_subscribe_type_name($job->is_free)}}
                                        </button>
                                    @endif

                                    <div class="row">
                                        <div class="col-xs-12 col-md-8 col-md-offset-2">
                                            <p>
                                        <span class="company-location">
                                            <i class="fa fa-info-circle"></i>{{\App\Helpers\BergyUtils::strWordCut($job->description,100)}}</span>
                                            <hr>
                                            <ul>
                                                <li>Salary:  <span class="package"><i class="fa fa-money"></i> $22,000-$50,000</span></li>
                                                <li>Share:
                                                    <div id="share">

                                                        <!-- facebook -->
                                                        <a class="facebook" href="https://www.facebook.com/share.php?u={{route('jobs-details',[$job->id,\App\Helpers\BergyUtils::uuid()])}}&title={{$job->title}}" target="blank"><i class="icon icon-facebook"></i></a>

                                                        <!-- twitter -->
                                                        <a class="twitter" href="https://twitter.com/intent/tweet?status={{$job->title}}+{{route('jobs-details',[$job->id,\App\Helpers\BergyUtils::uuid()])}}" target="blank"><i class="icon icon-twitter"></i></a>

                                                        <!-- google plus -->
                                                        <a class="googleplus" href="https://plus.google.com/share?url={{route('jobs-details',[$job->id,\App\Helpers\BergyUtils::uuid()])}}" target="blank"><i class="icon icon-googleplus"></i></a>

                                                        <!-- linkedin -->
                                                        <a class="linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url={{route('jobs-details',[$job->id,\App\Helpers\BergyUtils::uuid()])}}&title={{$job->title}}&source={{url('/')}}" target="blank"><i class="icon icon-linkedin"></i></a>

                                                    </div>
                                                </li>
                                            </ul>

                                            </p>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </a>

                </div>
            @endforeach
                {{--<div class="pull-right" >{{$jobs->render()}}</div>--}}
        </div>


    </div>
</section>
