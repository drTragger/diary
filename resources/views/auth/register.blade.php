@extends('templates.auth')

@section('content')
    <div class="wrapper">
        <div class="header">
            <h3 class="sign-in">Sign up</h3>
            <a class="btn  button" href="{{ url('/login') }}">Sign in</a>
        </div>
        <div class="clear"></div>
        <form method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="icons" for="name"><i class="far fa-user"></i></label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" autofocus
                       placeholder="Enter your name">
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="form-group">
                    <label class="icons" for="email"><i class="fas fa-at"></i></label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Email">
                    @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="icons" for="password"><i class="fas fa-lock"></i></label>
                <input id="password" type="password" name="password" placeholder="Password">
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label class="icons" for="password"><i class="fas fa-lock"></i></label>
                <input id="password-confirm" type="password" name="password_confirmation"
                       placeholder="Confirm password">
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
            <div>
                <input type="submit" value="Register"/>
            </div>
            <div class="clear"></div>
        </form>
    </div>
@endsection
