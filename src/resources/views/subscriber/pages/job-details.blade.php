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
                <h2>{{$results['job'][0]->title}}</h2>
                <p>View other Jobs <span style="color: #ffcc33;" > {{\App\Helpers\BergyUtils::unviewed_jobs_count()}} New job(s)</span></p>
                <a class="top-banner" href="{{route('browse-all-jobs', \App\Helpers\BergyUtils::uuid())}}" >Browse all Jobs</a>
            </div>
        </div>
    </section>

    {{--Job Grid Goes Here--}}
    @include('subscriber.grids.job-details-grid', ['data' => $results['job'][0]])
    @include('subscriber.modals.subscribe-accept-form-modal', ['data' => $results['job'][0]])
    @include('subscriber.modals.subscribe-confirm-accept-form-modal', ['data' => $results['job'][0]])
    @include('subscriber.grids.news-grid')

@stop

@section('scripts')
    @include('subscriber.scripts.show-text-part-script')
    @include('subscriber.scripts.element-in-view-script')
@stop

