{{--<div class="pull-right" >{{$categories->render()}}</div>--}}
@foreach($categories as $category)
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="features-content">
            <a class="un-link" href="{{route('jobs-by-categories',[$category->id, \App\Helpers\BergyUtils::uuid()])}}"
               style="text-decoration: none;">
                <input type="hidden" value="{{$category->id}}" />
                <span class="box1 "><span aria-hidden="true" class="icon-gears header-title"
                                          style="font-weight: bolder;"></span></span>
                <h3 style="color: #000000; font-weight: bolder;">{{\App\Helpers\BergyUtils::strWordCut($category->name,20)}}</h3>
                <hr class="style18">
                <p>{{\App\Helpers\BergyUtils::strWordCut($category->description,100)}}</p>
            </a>
           {{-- <button data-theme="b" class="ui-btn ui-shadow ui-corner-all ui-icon-heart ui-btn-icon-notext">Add to Fav</button>
--}}
            <hr>

            @include('subscriber.buttons.btn-add-to-fav')
        </div>


    </div>
@endforeach
<div class="pull-right">{{$categories->render()}}</div>
{{--<div class="body" ></div>--}}

