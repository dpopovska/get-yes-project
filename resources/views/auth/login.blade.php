@extends('layouts.app')

@section('content')
<div class="login-container">
    <div class="login-logo">
        <img src="{{ asset('images/image-logo-dark.png') }}" alt="">
    </div>
    <div class="login-form">
        <form class="login-form" method="POST" action="{{ url('/login') }}">
            {!! csrf_field() !!}
            <!-- Form group wrapper -->
            <div class="form-group-wrapper">
                <!-- Form group -->
                <div class="form-group">
                    <span class="fg-title">Еmail address</span>
                    <div class="fg-field">
                        <input class="fg-input-field" type="email" name="email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong class="red-error">{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <!-- Form group -->
              <!-- Form group -->
                <div class="form-group">
                    <span class="fg-title">Password</span>
                    <div class="fg-field">
                        <input class="fg-input-field" type="password" name="password">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong class="red-error">{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <!-- Form group -->
                <!-- Form group -->
                <div class="form-group login-form-group">
                    <button type="submit" class="default-button red">Log In</button>
                    <a class="login-forgot-password-link" href="{{ url('/password/reset') }}">Forgot your password?</a>
                </div>
                <!-- Form group -->
            </div>
            <!-- Form group wrapper -->
        </form>
    </div>
</div>
@endsection
