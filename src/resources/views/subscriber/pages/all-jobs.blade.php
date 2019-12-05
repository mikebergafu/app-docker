@extends('subscriber.pages.master')

@section('title')
    {{$title}}
@stop

@section('styles')
    <link rel="stylesheet" href="{{asset('berg-assets/css/front-css.css')}}" >
{{--    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />--}}
@stop
@section('content')
    @include('subscriber.pages.partials.error-display')
    <!-- Inner Banner -->
    <section class="inner-banner" >
        <div class="container">
            <div class="caption">
                <p>You have {{\App\Helpers\BergyUtils::unviewed_jobs_count()}} un-viewed jobs for you.
                </p>
                <span class="text-success" > <i class="glyphicon glyphicon-info-sign"></i> Let's get you informed when new jobs are posted.</span>
                <div class="input-append ">
                    <input type="text" class="span2" name="search_key" id="search_key" style="" placeholder="Enter Keyword to search">

                    <button class="btn btn-success" id="ff" type="submit"><i class="fa fa-search" ></i></button>
                    <span class="help-block error-content" style="color: #ff491d;" id="msdn_error"></span>
                </div>
              @include('subscriber.buttons.subscribe-button')
            </div>
        </div>
    </section>
    {{--Job Grid Goes Here--}}
    @include('subscriber.grids.jobs-grid')

    @include('subscriber.grids.news-grid')
@stop
@section('scripts')
   {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>--}}
   {{-- @include('subscriber.scripts.paginations.jobs-pagination-js')--}}
@stop
