@extends('admin.pages.master-content')

@section('title')
    {{$title}}::JobDotGo+
@stop

@section('inner-content')
    @include('all-common.input-errors')

    <div class="row">
        <div class="col-md-2 col-md-offset-2 mt-5" ></div>
        <div class="col-lg-8 col-md-8 mt-5">
            <div class="card card-bordered">
                <div class="card-header bg bg-warning text-white" >
                    <h5 class="card-title">Add New Job Category/Keyword</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin-add-job-categories', \App\Helpers\BergyUtils::uuid()) }}" method="post">
                        {{ csrf_field() }}



                            <div class="login-form-body">
                                <label for="name">Job Category (Keyword)</label>
                                <div class="form-gp">

                                    <input type="text" id="name" name="name" value="{{old('name')}}"
                                           placeholder="Enter your Job Category name" readonly onfocus="this.removeAttribute('readonly');" >
                                    <i class="ti-info text-info"></i>
                                </div>

                                <label for="description">Description <i class="ti-agenda text-info"></i></label>
                                <div class="form-gp">
                                    <textarea id="description" name="description" cols="65" rows="5"
                                              placeholder="Enter your brief description of the keyword">{{old('description')}}</textarea>
                                </div>

                                <div class="row mb-4 rmber-area">
                                    <div class="col-6">
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" checked name ="is_active" id="customControlAutosizing">
                                            <label class="custom-control-label text-info" for="customControlAutosizing">Is Active</label>
                                        </div>
                                    </div>

                                </div>
                                <div class=" submit-btn-area ">
                                    <button id="form_submit" class="success-but" type="submit">Save New Category (Keyword) <i class="ti-plus"></i>
                                    </button>
                                </div>

                            </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-md-offset-2 mt-5" ></div>
    </div>

@stop
