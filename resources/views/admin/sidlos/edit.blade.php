@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.sidlo.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.sidlos.update", [$sidlo->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('sidlo') ? 'has-error' : '' }}">
                            <label for="sidlo">{{ trans('cruds.sidlo.fields.sidlo') }}</label>
                            <input class="form-control" type="text" name="sidlo" id="sidlo" value="{{ old('sidlo', $sidlo->sidlo) }}">
                            @if($errors->has('sidlo'))
                                <span class="help-block" role="alert">{{ $errors->first('sidlo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.sidlo.fields.sidlo_helper') }}</span>
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