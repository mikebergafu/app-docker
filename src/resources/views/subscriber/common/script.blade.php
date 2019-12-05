{{--<script type="text/javascript" src="{{asset('front-end-assets/js/jquery.min.js')}}"></script>--}}
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}
{{--<script
    src="https://code.jquery.com/jquery-2.2.4.js"
    integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
    crossorigin="anonymous"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>--}}
<!-- JQuery -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript" src="{{asset('front-end-assets/js/owl.carousel.min.js')}}"></script>

<!-- Latest compiled and minified CSS -->

<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="{{asset('front-end-assets/js/bootsnav.js')}}"></script>
<script src="{{asset('front-end-assets/js/main.js')}}"></script>
<script src="{{asset('berg-assets/js/loader.js')}}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>


<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://js.pusher.com/5.0/pusher.min.js"></script>

<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('ce9e8e38cb7e176b65b5', {
        cluster: 'eu',
        forceTLS: true
    });
    var channel = pusher.subscribe('jobs');

    channel.bind('new-jobs', function(data) {
     /*   alert(JSON.stringify(data));*/
        console.log('Good');
    });
</script>


{{--
<script src="{{asset('berg-assets/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('berg-assets/blueimp/jquery-file-upload/js/jquery.ui.widget.js')}}"></script>
<script src="{{asset('berg-assets/blueimp/jquery-file-upload/js/jquery.iframe-transport.js')}}"></script>
<script src="{{asset('berg-assets/blueimp/jquery-file-upload/js/jquery.fileupload.js')}}"></script>
--}}

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />--}}

<script>
    $( document ).ready(function() {
        //console.log( "ready!" );
    });

</script>

@include('subscriber.pages.partials.include-prefabs')

@yield('scripts')
