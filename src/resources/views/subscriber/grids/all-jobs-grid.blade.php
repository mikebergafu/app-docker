<section class="jobs">
    <div class="container">
        <div class="companies" id="jobs-grid-data">
            @foreach($jobs as $job)
                <div class="company-list">
                    <a href="{{route('jobs-details',[$job->id, \App\Helpers\BergyUtils::uuid()])}}">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <div class="company-content">
                                    <h4 style="font-weight: 500;" >{{$job->title}}</h4>
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
                                            <li>Salary:  <span class="package"><i class="fa fa-money"></i>$22,000-$50,000</span></li>
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
                <div class="pull-right" >
                    gdbmtyuiop
                    {{$jobs->render()}}
                </div>
        </div>

    </div>
    <div class="row">
        <input type="button" class="btn brows-btn" value="Brows All Categories" />
    </div>
</section>
