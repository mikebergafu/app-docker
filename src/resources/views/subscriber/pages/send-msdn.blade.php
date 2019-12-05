@extends('subscriber.pages.master')

@section('title')
    {{$title}}
@stop

@section('styles')
    <link rel="stylesheet" href="{{asset('berg-assets/css/theme.css')}}">
@stop

@section('content')
    <section class="main-banner" style="background:#242c36 url({{asset('front-end-assets/img/slider-01.jpg')}}) no-repeat">
        <div class="container">
            @include('subscriber.buttons.subscribe-button')
            @include('subscriber.headings.title-and-description-grid')
            @include('subscriber.buttons.subscribe-button')
            </div>
        </div>
    </section>

    <section class="features">
        <div class="container">
           @include('subscriber.grids.categories-grid')
        </div>
    </section>

    <section class="counter">
        <div class="container">
            <div class="col-md-3 col-sm-3">
                <div class="counter-text">
                    <span aria-hidden="true" class="icon-briefcase"></span>
                    <h3>1000</h3>
                    <p>Jobs Posted</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-3">
                <div class="counter-text">
                    <span class="box1"><span aria-hidden="true" class="icon-expand"></span></span>
                    <h3>207</h3>
                    <p>All Companies</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-3">
                <div class="counter-text">
                    <span class="box1"><span aria-hidden="true" class="icon-profile-male"></span></span>
                    <h3>700+</h3>
                    <p>Total Members</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-3">
                <div class="counter-text">
                    <span class="box1"><span aria-hidden="true" class="icon-sad"></span></span>
                    <h3>802+</h3>
                    <p>Happy Members</p>
                </div>
            </div>
        </div>
    </section>


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
       {{-- @include('subscriber.modals.send-msdn-form-modal')--}}
        @include('subscriber.modals.subs-modal')
    </section>
@stop

@section('scripts')
    @include('subscriber.scripts.verify-subscribe')

    @include('subscriber.scripts.pages-navigator-js')
@stop
