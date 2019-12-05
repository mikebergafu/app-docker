@foreach(\App\Helpers\BergyUtils::getEducationalInstitutions() as $educ_inst)
    <option value="{{$educ_inst->id}}">{{$educ_inst->name}}</option>
@endforeach
