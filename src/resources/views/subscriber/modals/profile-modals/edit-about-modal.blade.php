<!-- subscribe Modal -->
<div class="modal fade text-center py-5" id="updateAboutModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
               ABOUT ME
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">

                        <form id="frm-submit-update-about" >
                            @csrf
                            <div class="form-group" id="job_title_id_div">
                                <label for="job_title_id" >What do you do?</label>
                                <select class="form-control" name="job_title_id" id="job_title_id">
                                    <option selected disabled>Select a Job Title</option>
                                    @include('subscriber.select.job-titles-select')
                                </select>

                                <span class="help-block error-content" style="color: #ff491d;" id="job_title_id_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="job_title" >I Can't find mine in the list
                                    <span>
                                        <input type="checkbox" id="not-in-list" >
                                    </span>
                                </label>
                                <input type="text" style="display:none" class="form-control" id="job_title" name="job_title" >
                                <span class="help-block error-content" style="color: #ff491d;" id="job_title_error"></span>
                            </div>

                            <div class="form-group">
                                <label for="about" >Let's know something brief about you?</label>
                                <textarea class="form-control" name="about" id="about" rows="5"></textarea>
                                <span class="help-block error-content" style="color: #ff491d;" id="about_error"></span>
                            </div>
                            <button type="button" id="submit-update-about "  class="btn btn-primary btn-block profile-button">Update</button>
                        </form>
                    </div> <!-- card-body.// -->
                </div>
            </div>
        </div>
    </div>
</div>
