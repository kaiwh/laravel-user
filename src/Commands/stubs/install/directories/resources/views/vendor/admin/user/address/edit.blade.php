@foreach($addresses as $value)
<div id="modal-address-edit-{{ $value->id }}" class="modal">
	<div class="modal-dialog">
	    <div class="modal-content">
	        <div class="modal-header">
	            {{-- <button aria-hidden="true" class="close" data-dismiss="modal" type="button">×</button> --}}
	            <h4 class="modal-title">
	                @Lang('admin::userAddress.heading.edit')
	            </h4>
	        </div>
	        <div class="modal-body">
	        	<form method="POST" class="form-horizontal" enctype="multipart/form-data">
			        {{ csrf_field() }}
		        	<div class="form-group required">
						<label class="col-sm-2 control-label">@Lang('admin::userAddress.form.name')</label>
						<div class="col-sm-10">
							<input id="input-name" type="text" class="form-control" name="name" value="{{ $value->name }}" placeholder="@Lang('admin::userAddress.form.name')" required >
						</div>
					</div>
					<div class="form-group required">
						<label class="col-sm-2 control-label">@Lang('admin::userAddress.form.mobile')</label>
						<div class="col-sm-10">
							<input id="input-mobile" type="text" class="form-control" name="mobile" value="{{ $value->mobile }}" placeholder="@Lang('admin::userAddress.form.mobile')" required >
						</div>
					</div>
					<div class="form-group ">
						<label class="col-sm-2 control-label">@Lang('admin::userAddress.form.geo')</label>
						<div class="col-sm-10">
							<div data-toggle="geo" class="form-inline"  province_id="{{ $value->province_id }}" city_id="{{ $value->city_id }}" district_id="{{ $value->district_id }}"></div>
						</div>
					</div>
					
					<div class="form-group required">
						<label class="col-sm-2 control-label">@Lang('admin::userAddress.form.address')</label>
						<div class="col-sm-10">
							<input id="input-address" type="text" class="form-control" name="address" value="{{ $value->address }}" placeholder="@Lang('admin::userAddress.form.address')" required >
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12 text-center">
			        		<button class="btn btn-primary" address-edit="{{ $value->id }}"><i class="fa fa-save"></i> @Lang('admin::app.button.save')</button>
			        		<button class="btn btn-default" aria-hidden="true" data-dismiss="modal"><i class="fa fa-reply"></i> @Lang('admin::app.button.cancel')</button>
			        	</div>
					</div>
				</form>
	        </div>
	    </div>
	</div>
</div>
@endforeach