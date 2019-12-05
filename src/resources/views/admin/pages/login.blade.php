@extends('admin.master.auth-master')

@section('title')
    {{$title}}::JobDotGo+
@stop

@section('content')
    <div class="container">
        {{--for displaying input errors--}}
        @include('all-common.input-errors')
        <div class="login-box ptb--100">
            <form action="{{ route('admin-login') }}" method="post">
                {{ csrf_field() }}
                <div class="login-form-head bg bg-warning">
                    <h3 class="text-white" >JobDotGo+</h3>
                    <hr>
                    <h6>You're at the Administrator Portal</h6>
                    <p style="font-weight: bold;" >Please Enter your details to login</p>
                </div>
                <div class="login-form-body">
                    <label for="user_name">User Name</label>
                    <div class="form-gp">

                        <input type="text" id="user_name" name="user_name" value="{{old('user_name')}}" placeholder="Enter your user name">
                        <i class="ti-user text-info"></i>
                    </div>
                    <label for="password">Password</label>
                    <div class="form-gp">
                        <input type="password" id="password" name="password" placeholder="Enter your password">
                        <i class="ti-lock text-info"></i>
                    </div>
                    <div class="row mb-4 rmber-area">
                        <div class="col-6">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                <label class="custom-control-label text-info" for="customControlAutosizing">Remember Me</label>
                            </div>
                        </div>
                        <div class="col-6 text-right">
                            <a class="text-info"  href="#">Forgot Password?</a>
                        </div>
                    </div>
                    <div class=" submit-btn-area ">
                        <button id="form_submit" class="success-but" type="submit">Login <i class="ti-arrow-right"></i></button>
                    </div>
                    <div class="form-footer text-center mt-5">
                        <p class="text-muted">Don't have an account? <a class="text-info" href="register.html">Contact Admin</a></p>
                    </div>
                    <div class="form-footer text-center mt-5">
                        <p class="text-muted">Or</p>
                    </div>
                    <div class=" submit-btn-area ">
                        <button id="btn-admin-welcome-link" class="success-but btn btn-warning" type="button"><i class="ti-arrow-left"></i>  Go Back</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@stop
