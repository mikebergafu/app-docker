@if(count($applied_jobs) > 0)

    <div id="page-wrapper">
        <div class="graphs">
            <h3 class="blank1">Applied Jobs</h3>
            <div class="widget_bottom">
                @foreach($applied_jobs as $key=>$applied_job)
                <div class="col-md-6 col-xs-12 col-sm-12 widget_bottom_left">
                    <div class="banner-bottom-video-grid-left">
                        <div class="panel-group" id="accordion{{$key}}" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-info">
                                <div class="panel-heading flex-sm-wrap" role="tab" id="headingOne">
                                    <h4 class="panel-title asd">
                                        <a class="pa_italic" role="button" data-toggle="collapse"
                                           data-parent="#accordion{{$key}}" href="#collapseOne{{$key}}" aria-expanded="true"
                                           aria-controls="collapseOne{{$key}}">
                                            <span class="lnr lnr-chevron-down"></span><i class="lnr lnr-chevron-up"></i><label>{{$applied_job->title}}</label>
                                        </a>
                                    </h4>

                                </div>
                                <div id="collapseOne{{$key}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="padding-5" >
                                        <a class="pull-right" href="{{route('jobs-by-categories',[$applied_job->category_id, \App\Helpers\BergyUtils::uuid()])}}" >view other jobs under {{$applied_job->name}}</a>
                                    </div>
                                    <hr>
                                    <div class="panel-body panel_text">
                                        {{\App\Helpers\BergyUtils::strWordCut($applied_job->description, 200)}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@else
    <div id="page-wrapper">
        <div class="graphs">
            <h3 class="blank1">Applied Jobs</h3>
            <div class="widget_bottom">
                <div class="col-md-6 col-xs-12 col-sm-12 widget_bottom_left">
                    <div class="banner-bottom-video-grid-left">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title asd">
                                        <a class="pa_italic" role="button" data-toggle="collapse"
                                           data-parent="#accordion" href="#collapseOne" aria-expanded="true"
                                           aria-controls="collapseOne">
                                            <span class="lnr lnr-chevron-down"></span><i class="lnr lnr-chevron-up"></i><label>No Jobs Applied yet</label>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                     aria-labelledby="headingOne">
                                    <div class="panel-body panel_text">
                                       No Job Description
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
