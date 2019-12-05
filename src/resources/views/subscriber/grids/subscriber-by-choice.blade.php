

@if(env('TEST_MSISDN') !== null)
    <div class="row">
        <div class="basic-information job-attribute newsletter">
            <div class="col-md-12 col-sm-12">
                <span>Details of this job are partially hidden</span>
                <h3>Want to know more about this job? </h3>
                <div class="input-group">
                <span class="input-group-btn">
                    <button type="button" id="btn-subscribe-by-choice" class="btn btn-default">subscribe now!</button>
                </span>
                </div>
            </div>

        </div>

    </div>
@else
    <div class="row">
        <div class="basic-information job-attribute newsletter">
            <div class="col-md-12 col-sm-12">
                <span>Details of this job are partially hidden</span>
                <h3>Want to know more about this job? </h3>
                <div class="input-group">
                <span class="input-group-btn">
                    <button type="button" id="btn-subscribe-by-verification" class="btn btn-default">subscribe now!!</button>
                </span>
                </div>
            </div>

        </div>

    </div>
@endif
