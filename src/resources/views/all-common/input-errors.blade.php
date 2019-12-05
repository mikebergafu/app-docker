@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <h4 class="header-title" style="padding-top: 5px;">We just want to let you know.</h4>
        @foreach ($errors->all() as $error)
            {{$error}} <br>
        @endforeach
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-times"></span>
        </button>
    </div>
@elseif(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <h4 class="header-title" style="padding-top: 5px;">We just want to let you know.</h4>
        {{session()->get('success')}} <br>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="fa fa-times"></span>
        </button>
    </div>
@endif
