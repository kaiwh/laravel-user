@extends('admin::layouts.app')

@section('content')
<div id="content">
	<div class="container-fluid">
		
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-header">
					<h1>@Lang('admin::user.heading.edit')</h1>
					<ul class="breadcrumb">
						<li><a href="{{ route('admin') }}">@Lang('admin::home.heading.title')</a></li>
						<li><a href="{{ route('admin.user.index') }}">@Lang('admin::user.heading.index')</a></li>
						<li><a href="{{ route('admin.user.edit',['id'=>$user->id]) }}">@Lang('admin::user.heading.edit')</a></li>
					</ul>
					<div class="pull-right">
						<button type="submit" form="form" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="@Lang('admin::app.button.save')"><i class="fa fa-save"></i></button>
						<a href="{{ route('admin.user.index') }}" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="@Lang('admin::app.button.cancel')"><i class="fa fa-reply"></i></a>
					</div>
				</div>
			</div>
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
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab-general" data-toggle="tab">@Lang('admin::app.tab.general')</a></li>
					<li><a href="#tab-address" data-toggle="tab">@Lang('admin::app.tab.address')</a></li>
				</ul>
				<div class="tab-content">
		            <div class="tab-pane active" id="tab-general">
		            	<form method="POST" action="{{ route('admin.user.edit',['id'=>$user->id]) }}" class="form-horizontal" id="form"  enctype="multipart/form-data">
		            	{{ csrf_field() }}
			            	@if($user->email)
			            	<div class="form-group ">
								<label class="col-sm-2 control-label">@Lang('admin::user.form.email')</label>
								<div class="col-sm-10">
									<div class="form-control" >{{ $user->email }}</div>
								</div>
							</div>
							@endif
							@if($user->mobile)
			            	<div class="form-group ">
								<label class="col-sm-2 control-label">@Lang('admin::user.form.mobile')</label>
								<div class="col-sm-10">
									<div class="form-control" >{{ $user->mobile }}</div>
								</div>
							</div>
							@endif

			            	<div class="form-group ">
								<label class="col-sm-2 control-label">@Lang('admin::user.form.image')</label>
								<div class="col-sm-10">
									<input id="input-image" type="file" class="file" data-preview-file-type="text" name="image" value="" placeholder="@Lang('admin::user.form.image')"  >
								</div>
							</div>
							
							<div class="form-group required">
								<label class="col-sm-2 control-label" for="input-name">@Lang('admin::user.form.name')</label>
								<div class="col-sm-10">
									<input name="name" value="{{ old('name')?old('name'):$user->name }}" placeholder="@Lang('admin::user.form.name')" id="input-name" class="form-control" type="text">
								</div>
							</div>
							<div class="form-group required">
								<label class="col-sm-2 control-label" for="input-password">@Lang('admin::user.form.password')</label>
								<div class="col-sm-10">
									<input name="password" value="{{ old('password') }}" placeholder="@Lang('admin::user.form.password')" id="input-password" class="form-control" type="password">
								</div>
							</div>
							<div class="form-group required">
								<label class="col-sm-2 control-label" for="input-password_confirmation">@Lang('admin::user.form.password_confirmation')</label>
								<div class="col-sm-10">
									<input name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="@Lang('admin::user.form.password_confirmation')" id="input-password_confirmation" class="form-control" type="password">
								</div>
							</div>
						</form>
		            </div>
		            {{-- End Tag General --}}
		            <div class="tab-pane" id="tab-address">
		            	
		            	
		            </div>
		            {{-- End Tag Address --}}
   				</div>
			</div>			
		</div>
		
    </div>
</div>

@endsection

@push('styles')
    <link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.min.css') }}" rel="stylesheet">
@endpush
@push('scripts')
    <script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('vendor/geo/js/geo.js') }}"></script>
    <script src="{{ asset('vendor/admin/js/userAddress.js') }}"></script>
@endpush

@section('script')
<script>
$("#input-image").fileinput({
    maxFileSize: 500,
    showRemove: false,
    showClose: false,
    showUpload: false,
    initialPreview:[
        "{{ $user->portrait }}"
    ],
    initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
    initialPreviewFileType: 'image', // image is the default and can be overridden in config below
    allowedFileExtensions: ["jpg", "png", "gif"]
});
$('#tab-address').userAddress({
	user_id:{{ $user->id }}
});
</script>
@endsection