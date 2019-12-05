<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-4">Send Verify Code form</h4>

        <form method="post" action="{{route('send-verify-subscribe', \App\Helpers\BergyUtils::uuid())}}" >
            @csrf
            <div class="input-group">
                <span class="input-group-addon">+233</span>
                <input type="number" class="form-control"  id="msisdn" name="msisdn" placeholder="Enter Mobile No.">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-info">Send Code</button>
              </span>

            </div>
            <hr>
            Please, Click the link below if you are Not ready to verify & Subscribe yet
            <a href="{{route('subscribe-not-now', \App\Helpers\BergyUtils::uuid())}}" class="text-danger badge badge-info" >Continue</a>
        </form>
    </div> <!-- card-body.// -->
</div> <!-- card .// -->
