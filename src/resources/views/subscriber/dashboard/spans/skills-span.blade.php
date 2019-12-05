@foreach(\App\Helpers\BergyUtils::getSubsciberSkills() as $skill)
    <span class="service-tag">{{\App\Helpers\BergyUtils::getSkill($skill->skill_id)}}</span>
@endforeach

