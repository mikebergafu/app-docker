<!-- subscribe Modal -->
<div class="modal fade text-center py-5" id="submitJobApplicationModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                Job Application
                <button type="button" class="close text-danger" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">

                        <form id="frm-submit-update-about" >
                            @csrf
                            <div class="form-group" id="job_title_id_div">
                                <label for="job_title_id" >Email</label>
                                <input type="email" class="form-control" id="email" name="email" >
                                <span class="help-block error-content" style="color: #ff491d;" id="job_title_id_error"></span>
                            </div>

                            <div class="form-group">
                                <label for="about" >Add a cover letter</label>
                                <textarea class="form-control" name="about" id="about" rows="5"></textarea>
                                <span class="help-block error-content" style="color: #ff491d;" id="about_error"></span>
                            </div>

                            <div class="form-group">
                                <label for="about" >Add CV</label>
                                <input type="file" class="form-control" name="photos[]" multiple />
                                <span class="help-block error-content" style="color: #ff491d;" id="about_error"></span>
                            </div>

                            <button type="button" id="submit-update-about "  class="btn btn-info btn-block profile-button">Submit Application</button>
                        </form>
                    </div> <!-- card-body.// -->
                </div>
            </div>
        </div>
    </div>
</div>
