@extends('subscriber.pages.master')

@section('title')
    {{$title}}
@stop
@section('content')
    <section class="main-banner" style="background:#242c36 url({{asset('front-end-assets/img/slider-01.jpg')}}) no-repeat">
        <div class="container">
            @include('subscriber.buttons.subscribe-button')
            @include('subscriber.headings.title-and-description-grid')
            @include('subscriber.buttons.subscribe-button')
        </div>

    </section>

    <section class="features">
        <div class="container">
            @include('subscriber.grids.categories-grid')
        </div>
    </section>



    {{-- jobs grid--}}
    {{-- @include('subscriber.grids.all-jobs-grid')--}}
    {{-- End jobs grid--}}

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

    @include('subscriber.grids.news-grid')
@stop
@section('scripts')


@stop
