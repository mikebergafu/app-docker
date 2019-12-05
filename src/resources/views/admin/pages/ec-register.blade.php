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
                    <h5 class="card-title">Add New Service Provider</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin-register') }}" method="post">
                        {{ csrf_field() }}

                        <div class="login-form-body">
                            <label for="user_type">Back Office User Type</label>
                            <div class="form-gp">

                                <select  id="user_type" name="user_type" >
                                    <option value="3" >Service Provider</option>
                                </select>
                            </div>

                        <div class="login-form-body">
                            <label for="user_name">Name</label>
                            <div class="form-gp">

                                <input type="text" id="name" name="name" value="{{old('name')}}"
                                       placeholder="Enter your name">
                                <i class="ti-user text-info"></i>
                            </div>

                            <label for="user_name">User Name</label>
                            <div class="form-gp">

                                <input type="text" id="user_name" name="user_name" value="{{old('user_name')}}"
                                       placeholder="Enter your user name">
                                <i class="ti-user text-info"></i>
                            </div>

                            <label for="email">Email Address</label>
                            <div class="form-gp">

                                <input type="text" id="email" name="email" value="{{old('email')}}"
                                       placeholder="Enter your email address">
                                <i class="ti-envelope text-info"></i>
                            </div>

                            <label for="password">Password</label>
                            <div class="form-gp">
                                <input type="password" id="password" name="password" placeholder="Enter your password">
                                <i class="ti-lock text-info"></i>
                            </div>

                            <label for="password_confirmation">Repeat Password</label>
                            <div class="form-gp">
                                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repeat your password">
                                <i class="ti-lock text-info"></i>
                            </div>

                            <div class="row mb-4 rmber-area">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" name ="is_blocked" id="customControlAutosizing">
                                        <label class="custom-control-label text-info" for="customControlAutosizing">Is Disabled</label>
                                    </div>
                                </div>

                            </div>
                            <div class=" submit-btn-area ">
                                <button id="form_submit" class="success-but" type="submit">Save New Admin <i class="ti-plus"></i>
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
