<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<td class="text-left">@Lang('admin::userAddress.form.name')</td>
				<td class="text-left">@Lang('admin::userAddress.form.mobile')</td>
				<td class="text-left">@Lang('admin::userAddress.form.address')</td>
				<td class="text-right">@Lang('admin::app.text.action')</td>
			</tr>
		</thead>
		<tbody>
    	@foreach($addresses as $value)
    		<tr>
    			<td>{{ $value->name }}</td>
    			<td>{{ $value->mobile }}</td>
    			<td>{{ $value->province.$value->city.$value->district.$value->address }}</td>
    			<td class="text-right">
    				<button onclick="$('#modal-address-edit-{{ $value->id }}').modal('show');" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="@Lang('admin::app.button.edit')"><i class="fa fa-pencil"></i></button>
					<button address-destroy="{{ $value->id }}" data-toggle="tooltip" title="" class="btn btn-warning" data-original-title="@Lang('admin::app.button.delete')" data-destroy-text="@Lang('desktop::app.confirm.delete')"><i class="fa fa-trash"></i></button>
    			</td>
    		</tr>
    	@endforeach
    	</tbody>
	</table>
</div>
<div class="clearfix">
	<div class="pull-right">
		<a class="btn btn-primary" onclick="$('#modal-address-create').modal('show');"><i class="fa fa-plus"></i> @Lang('admin::userAddress.button.create')</a>
	</div>
</div>
@include('admin::user.address.create',['user_id'=>$user_id])
@include('admin::user.address.edit',['addresses'=>$addresses])