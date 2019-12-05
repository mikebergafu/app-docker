@extends('subscriber.pages.master')

@section('title')
    {{$title}}
@stop

@section('content')
    <!-- login section start -->
    <section class="login-wrapper">
        <div class="container">
            {{-- @include('subscriber.common.input-errors')--}}
            <div class="col-md-6 col-sm-8 col-md-offset-3 col-sm-offset-2">
               @include('subscriber.forms.verify-subscriber-form')
            </div>
        </div>
    </section>
    <!-- login section End -->
@stop
