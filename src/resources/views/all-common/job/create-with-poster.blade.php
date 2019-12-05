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
                    <h5 class="card-title">Add a New Job Listing</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin-add-jobs-with-poster', \App\Helpers\BergyUtils::uuid()) }}" method="post">
                        {{ csrf_field() }}

                        <div class="login-form-body">
                            <span class="form-control" >{{$company->name}}</span>
                            <hr>

                            <input type="hidden" value="{{$company->id}}" >

                            <label for="title">Job Title(<strong class="text-success" >Short Name of Job</strong>)</label>
                            <div class="form-gp">

                                <input type="text" id="title" name="title" value="{{old('title')}}"
                                       placeholder="Enter your Job title" readonly onfocus="this.removeAttribute('readonly');" >
                                <i class="ti-info text-info"></i>
                            </div>


                            <label for="category_id">Job Category (<strong class="text-success" >select Keyword to be used to subscribe to this job</strong>)</label><i class="ti-bookmark text-info"></i>
                            <div class="form-gp">
                                <select id="category_id" name="category_id" class="form-control custom-select-lg" >
                                    <option selected disabled >select keyword to be used to subscribe to this job</option>
                                    @foreach($results['categories'] as $category)
                                        <option value="{{$category->id}}" >{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <label for="description">Description <i class="ti-agenda text-info"></i></label>
                            <div class="form-gp">
                                    <textarea id="description" class="form-control" name="description" cols="65" rows="5"
                                              placeholder="Enter your brief description this job">{{old('description')}}</textarea>
                            </div>

                            <div class="row mb-6 rmber-area">
                                <div class="col-8">
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" name ="is_free" id="customControlAutosizing">
                                        <label class="custom-control-label text-danger" for="customControlAutosizing">Can be viewed without subscription(free)</label>
                                    </div>
                                </div>

                            </div>
                            <br>
                            <div class="row mb-6 rmber-area">
                                <div class="col-8">
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" name ="has_external_link" id="has_external_link">
                                        <label class="custom-control-label text-danger" for="has_external_link">Has External Link</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                           <div id="external_url_div" style="display: none;" >
                               <label for="external_url">External Url<i class="ti-link text-info"></i></label>
                               <div class="form-gp">
                                   <input type="text" id="external_url" class="form-control"  name="external_url"
                                          placeholder="Enter Job External Link URL " value="{{old('external_url')}}">
                               </div>
                           </div>

                            <br>
                            <label for="expires">Job Expiry Date<i class="ti-timer text-info"></i></label>
                            <div class="form-gp">
                                <input type="date" id="expires" class="form-control" name="expires"
                                       placeholder="Enter Job Expiry Date " value="{{old('expires')}}">
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
                                <button id="form_submit" class="success-but" type="submit">Save New Job <i class="ti-plus"></i>
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
