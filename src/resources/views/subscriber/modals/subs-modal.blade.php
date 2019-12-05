<!-- subscribe Modal -->
<div class="modal fade text-center py-5" id="subscribeModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg bg-warning">
                Send Verify SMS
            </div>
            <div class="modal-body">
               {{-- <div class="input-append ">
                    <span class="text-warning" style="color: #ffc62e;">Enter your mobile no and wait to receive a verification on your phone.</span>
                    <hr>
                    <br>
                    <label for="msdn" >233</label>
                    <input type="text" size="20px" class="span2" name="msdn" id="msdn" style="" placeholder="Enter Mobile Phone No.">

                    <span class="help-block error-content" style="color: #ff491d;" id="msdn_error"></span>
                    <a href="javascript:void(0)" id="btn-send-sms" >Send Verification Code</a>
                    <button class="btn btn-info" id="btn-send-sms" type="button"><i class="fa fa-send" ></i> Send Verification Code</button>
                </div>--}}
                <span class="text-warning" style="color: #ffc62e;">Enter your mobile no and wait to receive a verification on your phone.</span>
                <hr>


                <div class="form-group row no-pad">
                    <label for="phone_number"
                           class="col-md-12 col-sm-12 col-form-label text-sm-left text-md-left">
                        Enter your mobile no and wait to receive a verification code on your phone.
                    </label>

                    <div class="col-md-12 col-sm-12 no-pad">

                        <div class="row" >
                            <div class="col-md-2 col-sm-2 col-xs-3" >
                                <input type="text" class="form-control" disabled value="+233" >
                            </div>
                            <div class="col-md-7 col-sm-7 col-xs-6" >
                                <input type="tel" class="form-control  @error('msdn') is-invalid @enderror"
                                       aria-label="Phone Number"  name="msdn" id="msdn" value="{{ old('msdn') }}"
                                       required autocomplete="msdn" autofocus placeholder="Enter Mobile Phone No.">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3 no-pad" >
                                <button class="btn btn-info" id="btn-send-sms" type="button"><i class="fa fa-send" ></i></button>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 top-pad">
                        <input type="text" class="form-control" name="verify_code" id="verify_code" style="" placeholder="Enter Code received in SMS here">
                        <span class="help-block error-content" style="color: #ff491d;" id="confirm_code_error"></span>
                    </div>

                </div>

                <button class="btn btn-default" id="btn-verify-now" style="background-color: rgba(255,198,6,0.54)" type="button">
                    <i class="fa fa-unlock"></i>
                    Verify Now
                </button>
            </div>
        </div>
    </div>
</div>
