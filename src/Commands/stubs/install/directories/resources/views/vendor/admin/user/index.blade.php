@extends('admin::layouts.app')

@section('content')
    <div id="content">
		<div class="container-fluid">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="page-header">
						<h1>@Lang('admin::user.heading.index')</h1>
						<ul class="breadcrumb">
							<li><a href="{{ route('admin') }}">@Lang('admin::home.heading.title')</a></li>
							<li><a href="{{ route('admin.user.index') }}">@Lang('admin::user.heading.index')</a></li>
						</ul>
						<div class="pull-right">
							<a href="{{ route('admin.user.create') }}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="@Lang('admin::app.button.create')"><i class="fa fa-plus"></i></a>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<td class="text-left">@Lang('admin::user.form.account')</td>
									<td class="text-left">@Lang('admin::user.form.name')</td>
									<td class="text-right">@Lang('admin::app.text.action')</td>
								</tr>
							</thead>
							<tbody>
								@foreach ($users as $value)
								<tr>
									<td class="text-left">
										@if($value->email)
											@Lang('admin::user.form.email')：{{ $value->email }}
										@endif
										@if($value->mobile)
											<br/>
											@Lang('admin::user.form.mobile')：{{ $value->mobile }}
										@endif
									</td>
									<td class="text-left">{{ $value->name }}</td>
									<td class="text-right">
										<a href="{{ route('admin.user.edit',['id'=>$value->id]) }}" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="@Lang('admin::app.button.edit')"><i class="fa fa-pencil"></i></a>
										<a href="{{ route('admin.user.destroy',$value->id) }}" data-toggle="tooltip" title="" class="btn btn-warning" data-original-title="@Lang('admin::app.button.delete')" onclick="return confirm('@Lang('desktop::app.confirm.delete')')?true:false"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="text-right">
						{{ $users->links() }}
					</div>
				</div>
			</div>
	    </div>
	</div>
    
@endsection
