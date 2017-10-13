@extends('desktop::layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">@Lang('desktop::userAddress.heading.index')</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <td class="text-left">@lang('desktop::userAddress.form.name')</td>
                                    <td class="text-left">@lang('desktop::userAddress.form.mobile')</td>
                                    <td class="text-left">@lang('desktop::userAddress.form.address')</td>
                                    <td class="text-right">@lang('desktop::app.text.action')</td>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach(Auth::user()->addresses as $value)
                                <tr>
                                    <td class="text-left">
                                        {{ $value->name }}
                                        @if($value->id==Auth::user()->address_id)
                                        <span class="label label-default">@lang('desktop::userAddress.form.default')</span>
                                        @endif
                                    </td>
                                    <td class="text-left">{{ $value->mobile }}</td>
                                    <td class="text-left">
                                        {{ $value->province }}
                                        {{ $value->city }}
                                        {{ $value->district }}
                                        {{ $value->address }}
                                    </td>
                                    <td class="text-right">
                                        @if($value->id!=Auth::user()->address_id)
                                        <a href="{{ route('desktop.user.address.setDefault',['id'=>$value->id]) }}" data-toggle="tooltip" title="" class="btn btn-success" data-original-title="@lang('desktop::userAddress.button.setDefault')"><i class="fa fa-pencil"></i></a>
                                        @endif
                                        <a href="{{ route('desktop.user.address.edit',['id'=>$value->id]) }}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="@lang('desktop::userAddress.button.edit')"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('desktop.user.address.destroy',['id'=>$value->id]) }}" data-toggle="tooltip" title="" class="btn btn-warning" data-original-title="@lang('desktop::userAddress.button.destroy')" onclick="return confirm('@Lang('desktop::app.confirm.destroy')')?true:false"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix">
                        <div class="pull-right">
                            <a href="{{ route('desktop.user.address.create') }}" class="btn btn-primary" ><i class="fa fa-plus"></i> @Lang('desktop::userAddress.button.create')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
    
@endpush
@push('scripts')
    
@endpush

@section('script')

@endsection