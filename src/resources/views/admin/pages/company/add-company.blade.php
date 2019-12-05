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
                    <h5 class="card-title">Add New Company</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin-store-company', \App\Helpers\BergyUtils::uuid()) }}" method="post">
                        {{ csrf_field() }}

                        <div class="login-form-body">
                            <label for="user_name">Name</label>
                            <div class="form-gp">

                                <input type="text" id="name" name="name" value="{{old('name')}}"
                                       placeholder="Enter your name">
                                <i class="ti-user text-info"></i>
                            </div>

                            <label for="introduction">Brief Introduction</label>
                            <div class="form-gp">
                                <textarea id="introduction" rows="5" cols="98" name="introduction">{{old('introduction')}}</textarea>
                                <i class="ti-text text-info"></i>
                            </div>

                            <label for="email">Email Address</label>
                            <div class="form-gp">

                                <input type="text" id="email" name="email" value="{{old('email')}}"
                                       placeholder="Enter your email address">
                                <i class="ti-envelope text-info"></i>
                            </div>

                            <label for="email">Phone No.</label>
                            <div class="form-gp">

                                <input type="tel" id="phone1" name="phone1" value="{{old('phone1')}}"
                                       placeholder="Enter Job Poster Phone Number">
                                <i class="ti-tablet text-info"></i>
                            </div>

                            <label for="introduction">Address</label>
                            <div class="form-gp">
                                <textarea id="address" rows="5" cols="98" name="address">{{old('address')}}</textarea>
                                <i class="ti-text text-info"></i>
                            </div>

                            <div class=" submit-btn-area ">
                                <button id="form_submit" class="success-but" type="submit">Save New Job Poster <i class="ti-plus"></i>
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
