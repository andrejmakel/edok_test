@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.insurance.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.insurances.update", [$insurance->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="nazov">{{ trans('cruds.insurance.fields.nazov') }}</label>
                            <input class="form-control" type="text" name="nazov" id="nazov" value="{{ old('nazov', $insurance->nazov) }}">
                            @if($errors->has('nazov'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nazov') }}
                                </div>
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