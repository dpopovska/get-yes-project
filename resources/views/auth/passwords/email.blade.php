@extends('layouts.app')

<!-- Main Content -->
@section('content')
<div class="login-container">
    <div class="login-logo">
        <img src="{{ asset('images/image-logo-dark.png') }}" alt="">
    </div>
    <div class="login-form">
    @if (session('status'))
        <div class="large-notification success">
            <p>{{ session('status') }}</p>
            <a class="ln-close" href="javascript:;"></a>
        </div>
    @endif
    @if($errors->has('email'))
        <div class="large-notification error">
            <p>{{ $errors->first('email') }}</p>
            <a class="ln-close" href="javascript:;"></a>
        </div>
    @endif
    <form class="login-form" role="form" method="POST" action="{{ url('/password/email') }}">
            {!! csrf_field() !!}
            <!-- Form group wrapper -->
            <div class="form-group-wrapper">
                <div class="form-group">
                    <span class="fg-title">Еmail address</span>
                    <div class="fg-field">
                        <input type="email" class="fg-input-field" name="email" value="{{ old('email') }}">
                    </div>
                </div>

                <div class="form-group login-form-group">
                    <button type="submit" class="default-button red">Send me an email</button>
                </div>
            </div>
            <!-- Form group wrapper -->
        </form>
    </div>
</div>
@endsection
