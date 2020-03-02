@extends('layouts.app')

@section('content')
<div class="login-container">
    <div class="login-logo">
        <img src="{{ asset('images/image-logo-dark.png') }}" alt="">
    </div>
    <div class="login-form">
        <form class="login-form" role="form" method="POST" action="{{ url('/password/reset') }}">
            {!! csrf_field() !!}
            <!-- Form group wrapper -->
            <div class="form-group-wrapper">

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                    <span class="fg-title">Еmail address</span>
                    <div class="fg-field">
                        <input type="email" class="fg-input-field" name="email" value="{{ $email or old('email') }}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong class="red-error">{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <span class="fg-title">Password</span>
                    <div class="fg-field">
                        <input type="password" class="fg-input-field" name="password">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong class="red-error">{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <span class="fg-title">Repeat password</span>
                    <div class="fg-field">
                        <input type="password" class="fg-input-field" name="password_confirmation">
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong class="red-error">{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group login-form-group">
                    <button type="submit" class="default-button red">Change password</button>
                </div>
            </div>
            <!-- Form group wrapper -->
        </form>
    </div>
</div>
@endsection
