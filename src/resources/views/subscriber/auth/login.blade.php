@extends('subscriber.pages.master')

@section('title')
    {{$title}}
@stop

@section('content')
    <!-- login section start -->
    <section class="login-wrapper">
        <div class="container">

            <div class="col-md-6 col-sm-8 col-md-offset-3 col-sm-offset-2">
                <form action="{{ route('subscriber-login', \App\Helpers\BergyUtils::uuid()) }}" method="post">
                   @csrf

                    <h2>Login</h2>
                    <p>{{ __('Login with Mobile Phone No.') }}

                        <input class="form-check-input" type="checkbox" name="check_phone" id="check_phone"
                            {{ old('check_phone') ? 'checked' : '' }}>
                    </p>
                    @include('subscriber.common.input-errors')
                    <div class="form-group row">
                        <label for="user_name"
                               class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                        <div class="col-lg-12">
                            <input id="user_name" type="text"
                                   class="form-control input-lg  @error('user_name') is-invalid @enderror"
                                   name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>

                            @error('user_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                    </div>


                    <div class="form-group row">
                        <label for="password"
                               class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                        <div class="col-lg-12">
                            <input id="password" type="password"
                                   class="form-control input-lg @error('password') is-invalid @enderror" name="password"
                                   required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <p>{{ __('Remember Me') }}

                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    </p>

                    <label><a href="">Forget Password?</a></label>

                    <button type="submit" class="btn btn-primary">Login</button>
                    <p>Haven't Any Account? <a href="{{route('subscriber-signup-form', \App\Helpers\BergyUtils::uuid())}}">Create An Account</a></p>
                </form>
            </div>
        </div>
    </section>
    <!-- login section End -->
@stop
