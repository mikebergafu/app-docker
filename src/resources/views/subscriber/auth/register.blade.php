@extends('subscriber.pages.master')

@section('title')
    {{$title}}
@stop

@section('content')
    <!-- login section start -->
    <section class="login-wrapper">
        <div class="container">
             @include('subscriber.common.input-errors')
            <h2>Sign Up</h2>
            <form action="{{ route('subscriber-signup', \App\Helpers\BergyUtils::uuid()) }}" method="post">
                {{ csrf_field() }}
                <div class="col-md-6 col-sm-6 col-xs-12 ">

                    <div class="form-group row">
                        <label for="user_name"
                               class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}
                        </label>

                        <div class="col-lg-12">
                            <input id="user_name" type="text"
                                   class="form-control input-lg  @error('user_name') is-invalid @enderror"
                                   name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name"
                                   autofocus>

                            @error('user_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email"
                               class="col-md-4 col-form-label text-md-right">{{ __('Email Address') }}</label>

                        <div class="col-lg-12">
                            <input id="email" type="email"
                                   class="form-control input-lg  @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email"
                                   autofocus>

                            @error('email')
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
                    <div class="form-group row">
                        <label for="password-confirm"
                               class="col-md-4 col-form-label text-md-right">{{ __('Repeat Password') }}</label>
                        <div class="col-lg-12">
                            <input id="password-confirm" type="password"
                                   class="form-control input-lg @error('password') is-invalid @enderror"
                                   name="password_confirmation"
                                   required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                </div>
                {{--  Part 2--}}
                <div class="col-md-6 col-sm-6 col-xs-12 ">
                    <div class="form-group row">
                        <label for="first_name"
                               class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                        <div class="col-lg-12">
                            <input id="first_name" type="text"
                                   class="form-control input-lg  @error('first_name') is-invalid @enderror"
                                   name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name"
                                   autofocus>

                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="last_name"
                               class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                        <div class="col-lg-12">
                            <input id="last_name" type="text"
                                   class="form-control input-lg  @error('last_name') is-invalid @enderror"
                                   name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name"
                                   autofocus>

                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="other_name"
                               class="col-md-4 col-form-label text-md-right">{{ __('Other Name(s)') }}</label>

                        <div class="col-lg-12">
                            <input id="other_name" type="text"
                                   class="form-control input-lg  @error('other_name') is-invalid @enderror"
                                   name="other_name" value="{{ old('other_name') }}" required autocomplete="other_name"
                                   autofocus>

                            @error('other_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="input-group row">
                         <span class="input-group-addon">$</span>
                         <input type="text" class="form-control" aria-label="Amount (rounded to the nearest dollar)">
                         <span class="input-group-addon">.00</span>
                     </div>--}}


                    <div class="form-group row">
                        <label for="phone_number"
                               class="col-md-12 col-sm-12 col-form-label text-sm-right text-md-right">{{ __('Mobile Phone No.') }}
                            <a href="#" class="badge badge-info">To be used for login and subscription</a>
                        </label>

                        <div class="col-md-12 col-sm-12">

                            <div class="row" >
                                <div class="col-md-3 col-sm-3 col-xs-4" >

                                    <input type="text" class="form-control" disabled value="+233" >
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-8" >
                                    <input type="tel" class="form-control  @error('phone_number') is-invalid @enderror"
                                           aria-label="Phone Number"  name="phone_number" value="{{ old('phone_number') }}"
                                           required autocomplete="phone_number"
                                           autofocus>
                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{--<div class="row" >
                                <div class="col-md-3 col-sm-3" >
                                    +233
                                </div>
                                <div class="col-md-9 col-sm-9" >
                                    <input type="tel" class="form-control  @error('phone_number') is-invalid @enderror"
                                           aria-label="Phone Number"  name="phone_number" value="{{ old('phone_number') }}"
                                           required autocomplete="phone_number"
                                           autofocus>
                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>--}}

                        </div>
                    </div>

                </div>
                <p>{{ __('Remember Me') }}

                    <input class="form-check-input" type="checkbox" name="remember"
                           id="remember" {{ old('remember') ? 'checked' : '' }}>
                </p>

                <label><a href="">Forget Password?</a></label>

                <button type="submit" class="btn btn-primary">Sign up</button>
                <p>Already Have An Account <a
                        href="{{route('subscriber-login-form', \App\Helpers\BergyUtils::uuid())}}">Sign In</a></p>
            </form>
        </div>
    </section>
    <!-- login section End -->
@stop
