<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#ffc606;">
                <span style="color:#fdfdff;" >Contents of this page is partially hidden.</span>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body no-pad">
                <span
                    class="text-info "><strong>Already a Subscribe? Enter your Mobile No to Confirm</strong></span>
                @include('subscriber.pages.partials.error-display')

                <form class="form-check-inline" method="post" id="frm-verify" action="{{route('subscriber-confirm-msdn',\App\Helpers\BergyUtils::uuid())}}">
                    @csrf
                    <input type="hidden" name="job_id" id="job_id" value="{{$job_id}}">

                    <div class="input-append ">
                        <input type="text" class="span2" name="msdn" id="msdn" style="" placeholder="Enter Mobile Phone No.">
                        <button class="btn btn-success" id="btn-verify" type="submit">Send!</button>
                        <span class="help-block error-content" style="color: #ff491d;" id="msdn_error"></span>
                    </div>

                </form>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 top-pad">
                        <input type="text" class="form-control" name="confirm_code" id="confirm_code" style="" placeholder="Enter Code received in SMS">
                        <span class="help-block error-content" style="color: #ff491d;" id="confirm_code_error"></span>
                    </div>
                </div>
                <hr><span
                    class="text-info "><strong>Not a Subscriber?</strong></span>
                <div class="row bg bg-warning">
                    <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 top-pad">

                        <ul class="berg-round-btn-ul">
                            <li class="berg-round-btn-li">
                                <a href="#" id="btn-subscribe"  class="round yellow">Subscribe Now!
                                    <span class="round">Subscribe to get always on time job alerts!</span>
                                </a></li>
                        </ul>

                        {{--<button type="button" id="btn-subscribe" class="btn btn-lg btn-warning"><span
                                class="glyphicon glyphicon-plus-sign"></span> Subscribe
                        </button>--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
