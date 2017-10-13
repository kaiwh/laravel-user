@extends('desktop::layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">@Lang('desktop::userAddress.heading.create')</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('desktop.user.address.edit',['id'=>$address->id]) }}"  enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label">@Lang('desktop::userAddress.form.name')</label>

                            <div class="col-md-9">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name')?old('name'):$address->name }}" placeholder="@Lang('desktop::userAddress.form.name')"  required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label for="mobile" class="col-md-3 control-label">@Lang('desktop::userAddress.form.mobile')</label>

                            <div class="col-md-9">
                                <input id="mobile" type="text" class="form-control" name="mobile" value="{{ old('mobile')?old('mobile'):$address->mobile }}" placeholder="@Lang('desktop::userAddress.form.mobile')"  required>

                                @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-3 control-label">@Lang('desktop::userAddress.form.geo')</label>

                            <div class="col-md-9 ">
                                <div data-toggle="geo" class="form-inline" province_id="{{ old('province_id')?old('province_id'):$address->province_id }}" city_id="{{ old('city_id')?old('city_id'):$address->city_id }}" district_id="{{ old('district_id')?old('district_id'):$address->district_id }}"></div>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-3 control-label">@Lang('desktop::userAddress.form.address')</label>

                            <div class="col-md-9">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address')?old('address'):$address->address }}" placeholder="@Lang('desktop::userAddress.form.address')"  required>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> @Lang('desktop::app.button.continue')
                                </button>
                                <a href="{{ route('desktop.user.address') }}" class="btn btn-default">
                                    <i class="fa fa-reply"></i> @Lang('desktop::app.button.cancel')
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
    {{-- <link href="{{ asset('vendor/geo/css/geo.css') }}" rel="stylesheet"> --}}
@endpush
@push('scripts')
     <script src="{{ asset('vendor/geo/js/geo.js') }}"></script>
@endpush

@section('script')
<script>


</script>
@endsection