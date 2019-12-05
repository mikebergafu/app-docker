<div id="subscribeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header " style="background-color:#ffc606;">
                <span class="text-info" style="color:#fdfdff;">New JobsDotGoPlus Subscriptions.</span>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <span class="text-info " ><strong>Please Enter your Mobile No. to Subscribe Now!</strong></span>
                <form method="post" id="frm-subscribe" action="{{route('subscribe-msdn', \App\Helpers\BergyUtils::uuid())}}">
                    @csrf
                    <input type="hidden" name="job_id" id="job_id" value="{{$job_id}}">

                    <div class="form-group">
                        <input type="text" name="msdn" id="msdn" class="form-control"
                               placeholder="Enter Mobile Phone No. to subscribe">

                        <span class="help-block error-content" style="color: #ff491d;" id="msdn_error"></span>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-xs-offset-3 col-sm-12 col-xs-12 no-pad">
                            <button type="submit" id="btn-subscribe-submit" class="btn btn-lg btn-warning"><span
                                    class="glyphicon glyphicon-plus-sign"></span> Subscribe
                            </button>
                        </div>
                    </div>
                    <span>Are you an existing subscriber? Please click th link below to confirm your subscription </span>
                    <button type="button" id="btn-confirm-subscription" class="btn-link"><span id="spin-animate" class="glyphicon glyphicon-check"></span>
                        Verify Subscription
                    </button>

                </form>
            </div>
        </div>
    </div>
</div>
