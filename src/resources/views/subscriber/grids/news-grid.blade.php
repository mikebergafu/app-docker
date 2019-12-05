<section class="newsletter">
    <div class="container">

        <div class="row">
            <div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1">
                <h2>Want More Job & Latest Job? </h2>
                <p>Subscribe to our mailing list to receive an update when new Job arrive!</p>
                @if (count($errors) > 0)
                    <div class = "alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{route('subscribe-to-jobs')}}" >
                    @csrf
                    <div class="input-group">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Type Your Email Address...">
                        <span class="input-group-btn">
							<button type="submit" class="btn btn-default">subscribe!</button>
						</span>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>
