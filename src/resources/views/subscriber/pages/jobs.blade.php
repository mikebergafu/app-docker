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
                <h2>{{$category->name}}</h2>
                <p>We have {{\App\Helpers\BergyUtils::count_jobs_category($category->id)}} new jobs in this
                    <a class="un-link" href="{{route('jobs-by-categories',[$category->id, \App\Helpers\BergyUtils::uuid()])}}" style="text-decoration: none;" >
                    <strong class="banner-sub-header" >Category</strong>
                    </a>

                </p>
                <span>Are you new to this place? Click subscribe to join us</span>
                @include('subscriber.buttons.subscribe-button')
            </div>
        </div>
    </section>

    {{--Job Grid Goes Here--}}
    @include('subscriber.grids.jobs-grid')

    @include('subscriber.grids.news-grid')
@stop
@section('scripts')

@stop

