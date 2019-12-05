@foreach(\App\Helpers\BergyUtils::getEducationalLevels() as $educ_level)
    <option value="{{$educ_level->id}}">{{$educ_level->name}}</option>
@endforeach
