<!-- subscribe Modal -->
<div class="modal fade text-center py-5" id="updateEducModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Add Educational History
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">

                        <form method="post" id="frm-submit-update-about" action="{{route('subscriber-add-education')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group" id="job_title_id_div">
                                <label for="educ_level_id">Certificate Awarded</label>
                                <select class="form-control" name="educ_level_id" id="educ_level_id">
                                    <option selected disabled>Select a Education Level</option>
                                    @include('subscriber.select.educational-level-select')
                                </select>

                                <span class="help-block error-content" style="color: #ff491d;"
                                      id="educ_level_id_error"></span>
                            </div>

                            <div class="form-group">
                                <label for="educ_inst_id">Name of Institution</label>
                                <select class="form-control" name="educ_inst_id" id="educ_inst_id">
                                    <option selected disabled>Select an Education Institution</option>
                                    @include('subscriber.select.educational-institutes-select')
                                </select>
                                <span class="help-block error-content" style="color: #ff491d;"
                                      id="educ_inst_error"></span>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-5 col-sm-5">
                                        <label for="from_date">From:</label>
                                        <input type="date" name="from_date" id="from_date" placeholder="From...">
                                        <span class="help-block error-content" style="color: #ff491d;"
                                              id="from_date_error"></span>
                                    </div>
                                    <div class="col-md-2 col-sm-2">
                                        <label for="is_here">Am Here:</label>
                                        <input type="checkbox" name="is_here" id="is_here">
                                        <span class="help-block error-content" style="color: #ff491d;"
                                              id="is_here_error"></span>
                                    </div>
                                    <div class="col-md-5 col-sm-5">
                                        <label for="from_date">to:</label>
                                        <input type="date" name="to_date" id="to_date" placeholder="to...">
                                        <span class="help-block error-content" style="color: #ff491d;"
                                              id="to_date_error"></span>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="educ_inst_id">Upload Document</label>
                                <br>
                                {{--@include('subscriber.grids.upload-grids.upload-image-grid')--}}
                                @include('subscriber.grids.upload-grids.upload-1-file-grid')
                                <div class="progress">
                                    <div id="progress" class="progress-bar" role="progressbar" aria-valuenow="0"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="help-block error-content" style="color: #ff491d;"
                                      id="educ_inst_error"></span>
                            </div>

                            <button type="submit" id="submit-update-education" class="btn btn-primary btn-block">
                                Add
                            </button>
                        </form>
                    </div> <!-- card-body.// -->
                </div>
            </div>
        </div>
    </div>
</div>
