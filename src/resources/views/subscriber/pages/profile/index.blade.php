@extends('subscriber.pages.master')

@section('title')
    {{$title}}
@stop
@section('styles')
    <link rel="stylesheet" href="{{asset('godwin-dev\css\profile.css')}}" >
@stop

@section('content')
    @include('subscriber.pages.partials.error-display')
    <!-- Inner Banner -->
    <section class="inner-banner"  >
        <div class="container"id="inner-banner-profile">
            <div class="caption" >
                <h3>Hi!  <span class="firstname">{{Auth::guard('subscriber')->user()->first_name}}</span> </h3>
                <p>View other Jobs <span style="color: #ffcc33;" >100 New job</span></p>
            </div>
        </div>
    </section>

    {{--Job Grid Goes Here--}}
    @include('subscriber.grids.profile-grid')


@include('subscriber.modals.profile-modals.edit-skill-modal')
@stop

@section('scripts')

@stop

