@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.input.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.inputs.update", [$input->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('zadal') ? 'has-error' : '' }}">
                            <label for="zadal">{{ trans('cruds.input.fields.zadal') }}</label>
                            <input class="form-control" type="text" name="zadal" id="zadal" value="{{ old('zadal', $input->zadal) }}">
                            @if($errors->has('zadal'))
                                <span class="help-block" role="alert">{{ $errors->first('zadal') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.input.fields.zadal_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection