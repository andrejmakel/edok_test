@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.nasa.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.nasas.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ trans('cruds.nasa.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}">
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.nasa.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="konto">{{ trans('cruds.nasa.fields.konto') }}</label>
                            <input class="form-control" type="text" name="konto" id="konto" value="{{ old('konto', '') }}">
                            @if($errors->has('konto'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('konto') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.nasa.fields.konto_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="iban">{{ trans('cruds.nasa.fields.iban') }}</label>
                            <input class="form-control" type="text" name="iban" id="iban" value="{{ old('iban', '') }}">
                            @if($errors->has('iban'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('iban') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.nasa.fields.iban_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="swift">{{ trans('cruds.nasa.fields.swift') }}</label>
                            <input class="form-control" type="text" name="swift" id="swift" value="{{ old('swift', '') }}">
                            @if($errors->has('swift'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('swift') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.nasa.fields.swift_helper') }}</span>
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