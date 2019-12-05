@extends('subscriber.pages.master')

@section('title')
    {{$title}}
@stop
@section('styles')
    <link rel="stylesheet" href="{{asset('berg-assets/css/front-css.css')}}" >
@stop

@section('content')
    @include('subscriber.pages.partials.error-display')
    <!-- Inner Banner -->
    <section class="inner-banner" style="backend:#242c36 url(https://via.placeholder.com/1920x600)no-repeat;">
        <div class="container">
            <div class="caption">
                <h3>Hi! <span class="text-deafault" style="color:white;" >{{Auth::guard('subscriber')->user()->first_name}}</span> </h3>
                <p>Enrich your presence, <span style="color: #ffcc33;" >Update your profile</span></p>
            </div>
        </div>
    </section>

    {{--Job Grid Goes Here--}}
    @include('subscriber.pages.profile.edit')

    <section class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1">
                    <h2>Want More Job & Latest Job? </h2>
                    <p>Subscribe to our mailing list to receive an update when new Job arrive!</p>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Type Your Email Address...">
                        <span class="input-group-btn">
							<button type="button" class="btn btn-default">subscribe!</button>
						</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('scripts')

@stop

