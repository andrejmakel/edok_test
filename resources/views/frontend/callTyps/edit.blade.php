@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.callTyp.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.call-typs.update", [$callTyp->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="call_typ">{{ trans('cruds.callTyp.fields.call_typ') }}</label>
                            <input class="form-control" type="text" name="call_typ" id="call_typ" value="{{ old('call_typ', $callTyp->call_typ) }}">
                            @if($errors->has('call_typ'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('call_typ') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.callTyp.fields.call_typ_helper') }}</span>
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