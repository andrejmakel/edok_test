@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.insurance.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.insurances.update", [$insurance->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('nazov') ? 'has-error' : '' }}">
                            <label for="nazov">{{ trans('cruds.insurance.fields.nazov') }}</label>
                            <input class="form-control" type="text" name="nazov" id="nazov" value="{{ old('nazov', $insurance->nazov) }}">
                            @if($errors->has('nazov'))
                                <span class="help-block" role="alert">{{ $errors->first('nazov') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.insurance.fields.nazov_helper') }}</span>
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