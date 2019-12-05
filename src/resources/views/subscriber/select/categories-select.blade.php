<option selected disabled >Select Category (Keyword)</option>
@foreach(\App\Helpers\BergyUtils::categories() as $category)
    <option value="{{$category->id}}">{{$category->name}}</option>
@endforeach
