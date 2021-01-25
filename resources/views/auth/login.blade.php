@extends('templates.auth')

@section('content')
{{--    <div class="panel-heading">Authorisation</div>--}}
{{--    <form class="form-horizontal auth-form-width" role="form" method="POST" action="{{ url('/login') }}">--}}
{{--        {{ csrf_field() }}--}}

{{--        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
{{--            <label for="email" class="col-md-4 control-label">Email</label>--}}

{{--            <div>--}}
{{--                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>--}}

{{--                @if ($errors->has('email'))--}}
{{--                    <span class="help-block">--}}
{{--                                            <strong>{{ $errors->first('email') }}</strong>--}}
{{--                                        </span>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
{{--            <label for="password" class="col-md-4 control-label">Password</label>--}}

{{--            <div>--}}
{{--                <input id="password" type="password" class="form-control" name="password">--}}

{{--                @if ($errors->has('password'))--}}
{{--                    <span class="help-block">--}}
{{--                                            <strong>{{ $errors->first('password') }}</strong>--}}
{{--                                        </span>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <div class="col-md-6 col-md-offset-4">--}}
{{--                <div class="checkbox">--}}
{{--                    <label>--}}
{{--                        <input type="checkbox" name="remember"> Remember me--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <div class="d-flex justify-center">--}}
{{--                <button type="submit" class="btn btn-primary">--}}
{{--                    <i class="fa fa-btn fa-sign-in"></i> Log in--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="d-flex justify-space-around">--}}
{{--            <a class="btn btn-primary" href="{{ url('/register') }}">Registration</a>--}}
{{--            <a class="btn btn-primary" href="{{ url('/password/reset') }}">Forgot password?</a>--}}
{{--        </div>--}}
{{--    </form>--}}

    <div class="tab-content tabs">
        <div role="tabpanel" class="tab-pane fade in active" id="Section1">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email"  value="{{ old('email') }}" autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="main-checkbox">
                        <input id="checkbox1" name="remember" type="checkbox">
                        <label for="checkbox1"></label>
                    </div>
                    <span class="text">Remember me</span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Sign in</button>
                </div>
                <div class="form-group forgot-pass">
                    <a class="btn btn-default" href="{{ url('/password/reset') }}">Forgot password?</a>
                </div>
            </form>
        </div>
    </div>
@endsection