@extends('desktop::layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">@Lang('desktop::userEdit.heading.index')</div>
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
                    <form class="form-horizontal" method="POST" action="{{ route('desktop.user.edit') }}"  enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label">@Lang('desktop::userEdit.form.name')</label>

                            <div class="col-md-9">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name')?old('name'):Auth::guard('')->user()->name }}" placeholder="@Lang('desktop::userEdit.form.name')"  required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-image" class="col-md-3 control-label">@Lang('desktop::userEdit.form.image')</label>

                            <div class="col-md-9">
                                <input id="input-image" type="file" class="file" data-preview-file-type="text" name="image" value="" placeholder="@Lang('desktop::userEdit.form.image')"  >
                            </div>
                        </div>


                      
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    @Lang('desktop::app.button.continue')
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

@push('styles')
    <link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.min.css') }}" rel="stylesheet">
@endpush
@push('scripts')
    <script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
@endpush

@section('script')
<script>

$("#input-image").fileinput({
    maxFileSize: 500,
    showRemove: false,
    showClose: false,
    showUpload: false,
    initialPreview:[
        "{{ Auth::guard('user')->user()->portrait }}"
    ],
    initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
    initialPreviewFileType: 'image', // image is the default and can be overridden in config below
    allowedFileExtensions: ["jpg", "png", "gif"]
});
</script>
@endsection