@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.dokKat.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.dok-kats.update", [$dokKat->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="dok_kat">{{ trans('cruds.dokKat.fields.dok_kat') }}</label>
                            <input class="form-control" type="text" name="dok_kat" id="dok_kat" value="{{ old('dok_kat', $dokKat->dok_kat) }}">
                            @if($errors->has('dok_kat'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('dok_kat') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.dokKat.fields.dok_kat_helper') }}</span>
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