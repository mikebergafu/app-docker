<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>
        JobDot Go+ |
        @yield('title')
    </title>
    <meta name="description" content="">
   {{-- <meta name="viewport" content="width=device-width, initial-scale=1">--}}
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- All Plugin Css -->
    <link rel="stylesheet" href="{{asset('front-end-assets/css/plugins.css')}}">

    <!-- Style & Common Css -->

   {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">--}}
    <link rel="stylesheet" href="{{asset('front-end-assets/css/common.css')}}">
    <link rel="stylesheet" href="{{asset('front-end-assets/css/main.css')}}">

    <link rel="stylesheet" href="{{asset('berg-assets/css/loader.css')}}">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    {{--<!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
--}}
    <link rel="stylesheet" href="{{asset('berg-assets/css/spin-button.css')}}">
    <link rel="stylesheet" href="{{asset('berg-assets/css/category-icons.css')}}">
    <link rel="stylesheet" href="{{asset('berg-assets/css/animated-icons.css')}}">
    <link rel="stylesheet" href="{{asset('berg-assets/css/hr.css')}}">
    <link rel="stylesheet" href="{{asset('berg-assets/css/animate-button.css')}}">
    <link rel="stylesheet" href="{{asset('berg-assets/css/round-text-button.scss')}}">
    <link rel="stylesheet" href="{{asset('berg-assets/css/social-stack.css')}}">

    <link rel="stylesheet" href="{{asset('berg-assets/css/rotate-button.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="{{asset('berg-assets/css/social-new.css')}}">
    <link rel="stylesheet" href="{{asset('berg-assets/css/share-buttons.css')}}">

{{--
    <link href="{{asset('berg-assets/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
--}}

    <link rel="stylesheet" href="{{asset('berg-assets/css/upload-image.css')}}">

    {{-- <link rel="stylesheet" href="{{asset('berg-assets/css/subs-modal.css')}}">--}}

    {{--<link rel="stylesheet" href="{{asset('berg-assets/jquery-mobile/all/jquery.mobile-1.4.5.css')}}">
    <link rel="stylesheet" href="{{asset('berg-assets/jquery-mobile/all/jquery.mobile.theme-1.4.5.css')}}">
    <link rel="stylesheet" href="{{asset('berg-assets/jquery-mobile/all/jquery.mobile.icons-1.4.5.css')}}">



    <script src="{{asset('berg-assets/jquery-mobile/all/jquery.mobile-1.4.5.js')}}"></script>--}}

    @yield('styles')

</head>
