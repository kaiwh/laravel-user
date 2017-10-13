@extends('desktop::layouts.app')

@section('title',trans('desktop::register.heading.title') . '-' . trans('desktop::register.heading.mobile'))
@section('meta_description',trans('desktop::register.heading.title'))
@section('meta_keywords',trans('desktop::register.heading.title'))

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">@Lang('desktop::userRegister.heading.index')</div>
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a>@Lang('desktop::userRegister.heading.email')</a></li>
                        <li class=""><a href="{{ url('register/mobile') }}">@Lang('desktop::userRegister.heading.mobile')</a></li>
                    </ul>
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label">@Lang('desktop::userRegister.form.name')</label>

                            <div class="col-md-9">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-3 control-label">@Lang('desktop::userRegister.form.email')</label>

                            <div class="col-md-9">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-3 control-label">@Lang('desktop::userRegister.form.password')</label>

                            <div class="col-md-9">
                                <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-3 control-label">@Lang('desktop::userRegister.form.confirm')</label>

                            <div class="col-md-9">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="captcha" class="col-md-3 control-label">@Lang('desktop::userRegister.form.captcha')</label>

                            <div class="col-md-9">
                                <div class="input-group">
                                    <input id="captcha" type="text" class="form-control" name="captcha" required>
                                    <span class="input-group-addon" style="padding:0;">
                                        <a href="javascript:;" onclick="$(this).find('img').attr('src','{{ url('captcha/default') }}?'+new Date().getTime())">{!! captcha_img() !!}</a>
                                    </span>
                                </div>
                                @if ($errors->has('captcha'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('captcha') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    @Lang('desktop::app.button.register')
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
