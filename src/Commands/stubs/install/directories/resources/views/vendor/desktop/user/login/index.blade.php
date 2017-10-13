@extends('desktop::layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">@Lang('desktop::userLogin.heading.index')</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger"  role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('account') ? ' has-error' : '' }}">
                            <label for="account" class="col-md-3 control-label">@Lang('desktop::userLogin.form.account')</label>

                            <div class="col-md-9">
                                <input id="account" type="text" class="form-control" name="account" value="{{ old('account') }}" placeholder="@Lang('desktop::userLogin.form.account')" required autofocus>

                                @if ($errors->has('account'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('account') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-3 control-label">@Lang('desktop::userLogin.form.password')</label>

                            <div class="col-md-9">
                                <input id="password" type="password" class="form-control" name="password"  placeholder="@Lang('desktop::userLogin.form.password')" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <div class="checkbox pull-left">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> @Lang('desktop::userLogin.form.remember')
                                    </label>
                                </div>
                                <a class="btn btn-link pull-right" href="{{ route('forgot') }}">
                                    @Lang('desktop::userLogin.text.forgot')
                                </a>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    @Lang('desktop::app.button.login')
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
