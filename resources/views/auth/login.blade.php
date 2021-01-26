@extends('templates.auth')

@section('content')

    <div class="wrapper">
        <div class="header">
            <h3 class="sign-in">Sign in</h3>
            <a class="btn  button" href="{{ url('/register') }}">Register</a>
        </div>
        <div class="clear"></div>
        <form method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
            <div>
                <label class="icons" for="email">
                    <i class="fas fa-at"></i>
                </label>
                <input id="email" type="email" class="user-input" name="email" value="{{ old('email') }}" autofocus
                       placeholder="Email">
                @if ($errors->has('email'))
                    <span class="help-block">
                    {{ $errors->first('email') }}
                </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="icons" for="password"><i class="fas fa-lock"></i></label>
                <input type="password" id="password" name="password">
                @if ($errors->has('password'))
                    <span class="help-block">
                    {{ $errors->first('password') }}
                </span>
                @endif
            </div>
            <div>
                <input type="submit" value="Sign in"/>
            </div>
            <div id="remember-container">
                <input type="checkbox" id="checkbox-2-1" class="checkbox" checked="checked"/>
                <span id="remember">Remember me</span>
                <span class="forgot-label">Lost your password?</span>
            </div>

            <div class="clear"></div>
        </form>
    </div>
@endsection