<div id="modal-address-create" class="modal">
	<div class="modal-dialog">
	    <div class="modal-content">
	        <div class="modal-header">
	            {{-- <button aria-hidden="true" class="close" data-dismiss="modal" type="button">×</button> --}}
	            <h4 class="modal-title">
	                @Lang('admin::userAddress.heading.create')
	            </h4>
	        </div>
	        <div class="modal-body">
	        	<form method="POST" class="form-horizontal" enctype="multipart/form-data">
			        {{ csrf_field() }}
			        <input type="hidden" class="form-control" name="user_id" value="{{ $user_id }}" >
		        	<div class="form-group required">
						<label class="col-sm-2 control-label">@Lang('admin::userAddress.form.name')</label>
						<div class="col-sm-10">
							<input id="input-name" type="text" class="form-control" name="name" value="" placeholder="@Lang('admin::userAddress.form.name')" required >
						</div>
					</div>
					<div class="form-group required">
						<label class="col-sm-2 control-label">@Lang('admin::userAddress.form.mobile')</label>
						<div class="col-sm-10">
							<input id="input-mobile" type="text" class="form-control" name="mobile" value="" placeholder="@Lang('admin::userAddress.form.mobile')" required >
						</div>
					</div>
					<div class="form-group ">
						<label class="col-sm-2 control-label">@Lang('admin::userAddress.form.geo')</label>
						<div class="col-sm-10">
							<div data-toggle="geo" class="form-inline"></div>
						</div>
					</div>
					
					<div class="form-group required">
						<label class="col-sm-2 control-label">@Lang('admin::userAddress.form.address')</label>
						<div class="col-sm-10">
							<input id="input-address" type="text" class="form-control" name="address" value="" placeholder="@Lang('admin::userAddress.form.address')" required >
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12 text-center">
			        		<button class="btn btn-primary" address-create=""><i class="fa fa-save"></i> @Lang('admin::app.button.save')</button>
			        		<button class="btn btn-default" aria-hidden="true" data-dismiss="modal"><i class="fa fa-reply"></i> @Lang('admin::app.button.cancel')</button>
			        	</div>
					</div>
				</form>
	        </div>
	    </div>
	</div>
</div>