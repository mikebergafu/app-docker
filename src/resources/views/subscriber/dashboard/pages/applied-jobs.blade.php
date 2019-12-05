@section('title')
    {{$title}}
@stop
@extends('subscriber.dashboard.master')
@section('content')
    <!-- //header-ends -->
    <div id="page-wrapper">
        <div class="graphs">
        @include('subscriber.dashboard.grids.counts-grid')

        <!-- switches -->
        @include('subscriber.dashboard.grids.applied-jobs-grid')
        <!-- //switches -->
            <div class="col_1">
                <p>Content coming</p>
                <div class="clearfix"> </div>
            </div>
        </div>
        <!--body wrapper start-->
    </div>
    <!--body wrapper end-->
@stop
