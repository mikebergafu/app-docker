<section class="profile-detail">
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="basic-information">
                    <div class="col-md-12 col-sm-12">
                        <div class="profile-content">
                            <h2>{{$data->title}}
                                <input type="hidden" id="job_id" name="job_id" value="{{$data->id}}">
                                <span>
                                   ( {{\App\Helpers\BergyUtils::get_category_name($data->category_id)}})
                                </span></h2>
                            <ul class="information">
                                <li>{{\App\Helpers\BergyUtils::strWordCut($data->description,200)}}</li>
                            </ul>
                            <ul class="information top-pad">
                                <li><h5>Minimum Qualifications:</h5>
                                    <div class="panel panel-default job-attribute">
                                        <div class="panel-body">
                                            <ul>
                                                <li>Software testing in a Web Applications/Mobile environment.</li>
                                                <li>Software Test Plans from Business Requirement Specifications for
                                                    test engineering group.
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </li>

                                <li><h5>Responsibilities:</h5>
                                    <div class="panel panel-default job-attribute">
                                        <div class="panel-body">
                                            <ul>
                                                <li>Software testing in a Web Applications/Mobile environment.</li>
                                                <li>Software Test Plans from Business Requirement Specifications for
                                                    test engineering group.
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>

                </div>

            </div>
            @if(\App\Helpers\BergyUtils::checkSubscriptionStatus(env('TEST_MSISDN')) !== true && (int)$data->is_free  !== 1)
               @include('subscriber.grids.subscriber-by-choice')
            @else
                <div class="row">
                    <div class="basic-information">
                        <div class="col-md-3 col-sm-3">
                            <h2>TXT Ghana
                                Ltd.<span>Tech Company</span>
                            </h2>
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <div class="profile-content">
                                <ul class="information">
                                    <li class="text-justify" >
                                        {{\App\Helpers\BergyUtils::strWordCut($data->description, 200)}}
                                        <a id="read-more-about-job-desc" class="btn btn-sm btn-info" >read more</a>
                                        <a href="{{route('subscriber-test-email')}}" class="btn btn-success" >Send Email</a>
                                    </li>
                                </ul>
                                <ul id="more-1" class="information fulltext">
                                    <li><span>Website:</span><a href="#">txtghana.com</a></li>
                                    <li><span>Salary: GH₵ </span>50,000</li>
                                    <li style="border-bottom: white 0px;">
                                        @include('subscriber.buttons.new-apply-btn')
                                    </li>

                                </ul>
                            </div>
                            <button aria-expanded="false" aria-controls="more-1" class="toggle-content"
                                    hidden><span
                                    class="text">Show More</span> <span
                                    class="visually-hidden">about this Job</span>
                            </button>

                        </div>

                    </div>

                </div>
                @include('subscriber.modals.apply-job.more-about-job-modal', ['data'=>$data->description])
            @endif


            {{-- <h2>Want to know more about this job? </h2>
             <p>Subscribe Now!</p>
             <div class="input-group">
                                     <span class="input-group-btn">
                             <button type="button" class="btn btn-default">subscribe!</button>
                         </span>
             </div>--}}

        </div>

    </div>

</section>

