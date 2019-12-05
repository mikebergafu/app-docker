<div id="verifyCodeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Verification code is sent to your mobile phone.</p>
                <span
                    class="text-info "><strong>Please Check your SMS box for the verification code.</strong></span>
                @include('subscriber.pages.partials.error-display')
                <form method="post" id="frm-verify" action="{{route('send-confirm-sms',\App\Helpers\BergyUtils::uuid())}}">
                    @csrf
                    <input type="hidden" name="job_id" id="job_id" value="{{$job_id}}">


                    <div class="form-group">
                        <input type="text" name="msdn" id="msdn" class="form-control"
                               placeholder="Enter Mobile Phone No.">

                        <span class="help-block error-content" style="color: #ff491d;" id="msdn_error"></span>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12 top-pad ">
                            <button type="submit" id="btn-verify" class="btn btn-lg btn-success"><span id="spin-animate"
                                                                                                       class="glyphicon glyphicon-check"></span>
                                Verify Code
                            </button>

                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 top-pad">
                            <button type="button" id="btn-subscribe" class="btn btn-lg btn-warning"><span
                                    class="glyphicon glyphicon-plus-sign"></span> Subscribe
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
