@foreach(\App\Helpers\BergyUtils::getSkills() as $skill)
    <option value="{{$skill->id}}">{{$skill->name}}</option>
@endforeach
