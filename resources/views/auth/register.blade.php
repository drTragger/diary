@extends('templates.auth')

@section('content')

    {{--    <div class="panel-heading">Registration</div>--}}

    {{--    <form class="form-horizontal auth-form-width" role="form" method="POST" action="{{ url('/register') }}">--}}
    {{--        {{ csrf_field() }}--}}

    {{--        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">--}}
    {{--            <label for="name" class="col-md-4 control-label">Name</label>--}}

    {{--            <div>--}}
    {{--                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>--}}

    {{--                @if ($errors->has('name'))--}}
    {{--                    <span class="help-block">--}}
    {{--                                        <strong>{{ $errors->first('name') }}</strong>--}}
    {{--                                    </span>--}}
    {{--                @endif--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
    {{--            <label for="email" class="col-md-4 control-label">Email</label>--}}

    {{--            <div>--}}
    {{--                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">--}}

    {{--                @if ($errors->has('email'))--}}
    {{--                    <span class="help-block">--}}
    {{--                                        <strong>{{ $errors->first('email') }}</strong>--}}
    {{--                                    </span>--}}
    {{--                @endif--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
    {{--            <label for="password" class="col-md-4 control-label">Password</label>--}}

    {{--            <div>--}}
    {{--                <input id="password" type="password" class="form-control" name="password">--}}

    {{--                @if ($errors->has('password'))--}}
    {{--                    <span class="help-block">--}}
    {{--                                        <strong>{{ $errors->first('password') }}</strong>--}}
    {{--                                    </span>--}}
    {{--                @endif--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">--}}
    {{--            <label for="password-confirm" class="col-md-10 control-label">Confirm password</label>--}}

    {{--            <div>--}}
    {{--                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">--}}

    {{--                @if ($errors->has('password_confirmation'))--}}
    {{--                    <span class="help-block">--}}
    {{--                                        <strong>{{ $errors->first('password_confirmation') }}</strong>--}}
    {{--                                    </span>--}}
    {{--                @endif--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--        <div class="form-group">--}}
    {{--            <div class="d-flex justify-center">--}}
    {{--                <button type="submit" class="btn btn-primary">--}}
    {{--                    <i class="fa fa-btn fa-user"></i> Sign in--}}
    {{--                </button>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </form>--}}
    {{--==============--}}

    {{--======================================--}}
    <div role="tabpanel" class="tab-pane fade" id="Section2">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">Name</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">--}}
                    @if ($errors->has('email'))--}}
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" name="password">
                    @if ($errors->has('password'))--}}
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="password-confirm">Confirm password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                    @if ($errors->has('password_confirmation'))--}}
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Sign up</button>
                </div>
            </div>
        </form>
    </div>
@endsection
