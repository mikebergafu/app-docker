<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-4">Verify and Subscribe form</h4>

        <form method="post" action="{{route('verify-and-subscribe', \App\Helpers\BergyUtils::uuid())}}" >
            @csrf
            <div class="input-group">
                <span class="input-group-addon">#</span>
                <input type="text" size="6" class="form-control"  id="verify_code" name="verify_code" placeholder="Enter Code.">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-info">Verify Now</button>
              </span>
            </div>
        </form>
        <hr>
        <a href="{{route('verify-subscribe-form', \App\Helpers\BergyUtils::uuid())}}"  >Resend Code</a>
    </div> <!-- card-body.// -->
</div> <!-- card .// -->
