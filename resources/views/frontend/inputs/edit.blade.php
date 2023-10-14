@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.input.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.inputs.update", [$input->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="zadal">{{ trans('cruds.input.fields.zadal') }}</label>
                            <input class="form-control" type="text" name="zadal" id="zadal" value="{{ old('zadal', $input->zadal) }}">
                            @if($errors->has('zadal'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('zadal') }}
                                </div>
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