@extends('templates.auth')

<!-- Main Content -->
@section('content')
    <h3 class="col-12">Recovery password</h3>
    <div class="panel-body col-12">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form class="col-12" role="form" method="POST" action="{{ url('/password/email') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">Email</label>

                <div class="col-12">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-envelope"></i> Recover password
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
