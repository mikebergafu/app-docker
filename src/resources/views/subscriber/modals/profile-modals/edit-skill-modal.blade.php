<!-- subscribe Modal -->
<div class="modal fade text-center py-5" id="updateSkillModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
               Add Skill
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">

                        <form method="post"  id="frm-submit-update-skill" action="{{route('subscriber-add-skill')}}" >
                            @csrf
                            <div class="form-group" id="skill_id_div">
                                <label for="skill_id" >What can you do?</label>
                                <select class="form-control"  name="skill_id" id="skill_id">
                                    <option selected disabled>Select a Skill to add</option>
                                    @include('subscriber.select.skills-select')
                                </select>

                                <span class="help-block error-content" style="color: #ff491d;" id="skill_id_error"></span>
                            </div>
                           {{-- <div class="form-group">
                                <label for="job_title" >I Can't find mine in the list
                                    <span>
                                        <input type="checkbox" id="not-in-list" >
                                    </span>
                                </label>
                                <input type="text" style="display:none" class="form-control" id="job_title" name="job_title" >
                                <span class="help-block error-content" style="color: #ff491d;" id="job_title_error"></span>
                            </div>--}}

                            <button type="submit" id="submit-update-skill "  class="btn btn-primary btn-block profile-button">Add</button>
                        </form>
                    </div> <!-- card-body.// -->
                </div>
            </div>
        </div>
    </div>
</div>
