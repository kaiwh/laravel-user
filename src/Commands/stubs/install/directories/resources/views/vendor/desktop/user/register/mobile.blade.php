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
                        <li class=""><a href="{{ url('register') }}">@Lang('desktop::userRegister.heading.email')</a></li>
                        <li class="active"><a >@Lang('desktop::userRegister.heading.mobile')</a></li>
                    </ul>
                    <form class="form-horizontal" method="POST" action="{{ route('register.mobile') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label">@Lang('desktop::userRegister.form.name')</label>

                            <div class="col-md-9">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="@Lang('desktop::userRegister.form.name')">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label for="mobile" class="col-md-3 control-label">@Lang('desktop::userRegister.form.mobile')</label>

                            <div class="col-md-9">
                                <input id="mobile" type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" required  placeholder="@Lang('desktop::userRegister.form.mobile')">
                                @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-3 control-label">@Lang('desktop::userRegister.form.password')</label>

                            <div class="col-md-9">
                                
                                <input id="password" type="password" value="{{ old('password') }}" class="form-control" name="password" required placeholder="@Lang('desktop::userRegister.form.password')">
                                
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
                                <input id="password-confirm" type="password" value="{{ old('password_confirmation') }}" class="form-control" name="password_confirmation" required placeholder="@Lang('desktop::userRegister.form.confirm')">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="captcha" class="col-md-3 control-label">@Lang('desktop::userRegister.form.captcha')</label>

                            <div class="col-md-9">
                                <div class="input-group">
                                    <input id="captcha" type="text" class="form-control" name="captcha" required  placeholder="@Lang('desktop::userRegister.form.captcha')">
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
