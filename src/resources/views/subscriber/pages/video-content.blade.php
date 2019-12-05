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
    <section class="inner-banner" style="backend:#000000 url(https://via.placeholder.com/1920x600)no-repeat;">
        <div class="container">
            <div class="caption">
                <h3>Auxy Contents</h3>
                <p>We have Auxy new video in this
                    <a class="un-link" href="#" style="text-decoration: none;" >
                        <strong class="banner-sub-header" >Category</strong>
                    </a>

                </p>
                <span>Are you new to this place? Click subscribe to join us</span>
                @include('subscriber.buttons.subscribe-button')
            </div>
        </div>
    </section>

    {{--Job Grid Goes Here--}}
    @include('subscriber.grids.video-grid')

    <section class="counter">
        <div class="container">
            <div class="col-md-3 col-sm-3">
                <div class="counter-text">
                    <span aria-hidden="true" class="icon-briefcase"></span>
                    <h3>1000</h3>
                    <p>Content Posted</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-3">
                <div class="counter-text">
                    <span class="box1"><span aria-hidden="true" class="icon-expand"></span></span>
                    <h3>207</h3>
                    <p>Categories</p>
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

    @include('subscriber.grids.news-grid')
@stop
@section('scripts')

@stop

