@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.typ.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.typs.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="typ_sk">{{ trans('cruds.typ.fields.typ_sk') }}</label>
                            <input class="form-control" type="text" name="typ_sk" id="typ_sk" value="{{ old('typ_sk', '') }}">
                            @if($errors->has('typ_sk'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('typ_sk') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.typ.fields.typ_sk_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="typ_de">{{ trans('cruds.typ.fields.typ_de') }}</label>
                            <input class="form-control" type="text" name="typ_de" id="typ_de" value="{{ old('typ_de', '') }}">
                            @if($errors->has('typ_de'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('typ_de') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.typ.fields.typ_de_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="typ_en">{{ trans('cruds.typ.fields.typ_en') }}</label>
                            <input class="form-control" type="text" name="typ_en" id="typ_en" value="{{ old('typ_en', '') }}">
                            @if($errors->has('typ_en'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('typ_en') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.typ.fields.typ_en_helper') }}</span>
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