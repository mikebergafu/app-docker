
<div class="row top-pad">
    <div class="basic-information">

        {{-- @include('subscriber.buttons.social-new-btn-blade')--}}

        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-user fa-fw"></i> Educational History
            </div>
            <div class="card card-body ">
                <div class="row ">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <label for="from_date">Institution:</label>
                        <select class="form-control" name="educ_inst_id" id="educ_inst_id">
                            <option selected disabled>Select an Education Institution</option>
                            @include('subscriber.select.educational-institutes-select')
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <label for="from_date">From:</label>
                        <input type="date"  class="form-control" name="from_date" id="from_date" placeholder="From...">
                        <span class="help-block error-content" style="color: #ff491d;"
                              id="from_date_error"></span>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12"> <label for="from_date">to:</label>
                        <input type="date"  class="form-control" name="to_date" id="to_date" placeholder="to...">
                        <span class="help-block error-content" style="color: #ff491d;"
                              id="to_date_error"></span></div>

                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <label for="educ_inst_id">Upload Document</label>
                        <br>
                        {{--@include('subscriber.grids.upload-grids.upload-image-grid')--}}
                        @include('subscriber.grids.upload-grids.upload-1-file-grid')
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-12 col-sm-12 col-xs-12" >
                        <button type="submit" id="submit-update-education" class="btn btn-primary btn-block">
                            Add
                        </button>
                    </div>
                </div>
            </div>

            <div class="panel-body">

                <div class="card card-body">
                    <ul class="information">
                        <li class="no-pad">
                            <span class="no-pad">University of Ghana</span>
                            <div class="row ">
                                <div class="col-md-5 col-sm-12 col-xs-12"><strong>Awarded:</strong> Degree</div>
                                <div class="col-md-5 col-sm-12 col-xs-12"><strong>Dates:</strong> 2015 - 2019</div>
                                <div class="col-md-2 col-sm-12 col-xs-12">
                                    <a href="#" class="pull-left">
                                        <i class="fa fa-pencil-square text-info"></i>
                                    </a>
                                    <a href="#" class="pull-right">
                                        <i class="fa fa-trash text-danger"></i>
                                    </a>
                                </div>
                            </div>
                        </li>

                    </ul>

                </div>
            </div>
            <a href="#" id="btn-show-educ-history-modal" class="btn btn-success pull-right profile-button" >Add Educational History</a>
        </div>

        </div>
</div>
