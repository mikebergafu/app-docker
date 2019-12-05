<div id="subscribeVerifyModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#000000;">
                <span style="color:#fdfdff;" >Contents of this page is partially hidden XXX.</span>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body no-pad">
                <p>You might currently be using the JobDotGo Plus App on PC or MAC, Kindly verify your mobile number. </p>
                <hr>
                <p class="text-justify ">
                    Selecting the subscribe button indicates you want to receive premium content from JobsDotGoPlus.
                    <a href="#" id="view-more" >Read more...</a>

                </p>
                <hr>

                <div id="view-subscription-terms" style="display: none;" >
                    <p class="text-info text-justify" >
                        A cookie associated with a cross-site resource at http://fontawesome.com/
                        was set without the `SameSite` attribute. A future release of Chrome will only
                        deliver cookies with cross-site requests if they are set with `SameSite=None`
                        and `Secure`. You can review cookies in
                        developer tools under Application>Storage>Cookies and see more details at
                        https://www.chromestatus.com/feature/5088147346030592 and
                        https://www.chromestatus.com/feature/5633521622188032.
                    </p>
                    <hr>
                </div>

                <div class="form-group row no-pad">
                    <label for="phone_number"
                           class="col-md-12 col-sm-12 col-form-label text-sm-left text-md-left">
                        Enter your mobile no and wait to receive a verification code on your phone.
                    </label>

                    <div class="col-md-12 col-sm-12 no-pad">

                        <div class="row" >

                            <div class="col-md-8 col-sm-8 col-xs-8 verify_box"  style="margin-left: 0; margin-right: 0;" >
                                <input type="tel" class="form-control  @error('msdn') is-invalid @enderror"
                                       aria-label="Phone Number" style="margin-left: 0;"  name="msdn" id="msdn" value="233"
                                       required autocomplete="msdn" autofocus placeholder="Enter Mobile Phone No.">
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-2 no-pad" >
                                <button class="btn btn-info" id="btn-send-sms" type="button"><i class="fa fa-send" ></i></button>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="row code-div" >
                    <div class="col-md-12 col-sm-12 col-xs-12 top-pad">
                        <input type="text" class="form-control" name="verify_code" id="verify_code" style="" placeholder="Enter Code received in SMS here">
                        <span class="help-block error-content" style="color: #ff491d;" id="confirm_code_error"></span>
                    </div>

                </div>
                {{--btn-verify-now--}}
                <button class="btn btn-default pull-right button-verify-now" id="btn-verify-code" type="button">
                    <i class="fa fa-unlock"></i>
                    Verify Now
                </button>
                <hr class="pad-hr" >
                <div class="row" >
                    <div class="col-md-7 col-sm-7 col-xs-7 " id="sub-btn-div" >
                        <a id="confirm-accept-subscribe" class="btn btn-success btn-block" href="#" >Yes</a>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-5 " >
                        <a class=" btn btn-danger btn-block" data-dismiss="modal" aria-hidden="true" href="#" >No</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


