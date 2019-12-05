@if(\App\Helpers\BergyUtils::getMsisdnFromHeader()=== 1)
@if(\App\Helpers\BergyUtils::checkSubscriptionStatus(env('TEST_MSISDN')) === true)

@endif
@else
    <ul class="berg-round-btn-ul">
        <li class="berg-round-btn-li">
            <a href="#" id="btn-subscribe1" data-toggle="modal" data-target="#subscribeModal"  class="round yellow">Subscribe Now!
                <span class="round">Subscribe to get always on time job alerts!</span>
            </a></li>
    </ul>
@endif
