
<section class="profile-detail">
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="basic-information">
                    <div class="col-md-3 col-sm-3">
                        <img src="{{asset('front-end-assets/img/user.jpg')}}" alt="" class="img-responsive">
                            <div class="col-sm-6" >
                                 <a href="#"  class="btn btn-success profile-button" >Update CV</a>
                            </div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                        <div class="profile-content">
                            <h2>{{Auth::guard('subscriber')->user()->first_name." ".Auth::guard('subscriber')->user()->last_name}}
                                @if($about)
                                <span>{{\App\Helpers\BergyUtils::getAboutJobTitle($about->job_title_id)}}</span>
                                @else
                                    <span>Pending</span>
                                @endif
                            </h2>
                            <ul class="information">
                                <li><span>Last Position Held:</span>Developer</li>
                                <li><span>Status:</span>{{\App\Helpers\BergyUtils::getSubscribeStatus(BergyUtils::getSubcriberId(BergyUtils::load_numbers_in_session()))}}</li>
                                <li><span>Email:</span>daniel-duke@gmail.com</li>
                                <li><span>Mobile:</span>+91 548 576 8579</li>
                                <li><span>Company:</span>Soft Techi Infoteck Pvt.</li>
                                <li><span>Date of Birth:</span>10 July 1990</li>
                                <li>
                                    <div class="row" >
                                        <div class="col-sm-6" >
                                            <a href="#"   class="btn btn-success profile-button" >Update Profile</a>
                                        </div>
                                    </div>


                                </li>
                            </ul>
                        </div>
                    </div>

                   {{-- @include('subscriber.buttons.social-new-btn-blade')--}}
                </div>
            </div>
            @include('subscriber.grids.profile.about-grid')
            @include('subscriber.grids.profile.skills-grid')
            @include('subscriber.grids.profile.education-grid')
        </div>
    </div>
</section>

