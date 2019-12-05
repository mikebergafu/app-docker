@foreach(\App\Helpers\BergyUtils::getJobTitles() as $job_title)
    <option value="{{$job_title->id}}">{{$job_title->name}}</option>
@endforeach
