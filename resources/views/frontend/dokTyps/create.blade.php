@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.dokTyp.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.dok-typs.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="dok_typ_sk">{{ trans('cruds.dokTyp.fields.dok_typ_sk') }}</label>
                            <input class="form-control" type="text" name="dok_typ_sk" id="dok_typ_sk" value="{{ old('dok_typ_sk', '') }}">
                            @if($errors->has('dok_typ_sk'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('dok_typ_sk') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.dokTyp.fields.dok_typ_sk_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="dok_typ_de">{{ trans('cruds.dokTyp.fields.dok_typ_de') }}</label>
                            <input class="form-control" type="text" name="dok_typ_de" id="dok_typ_de" value="{{ old('dok_typ_de', '') }}">
                            @if($errors->has('dok_typ_de'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('dok_typ_de') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.dokTyp.fields.dok_typ_de_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="dok_typ_en">{{ trans('cruds.dokTyp.fields.dok_typ_en') }}</label>
                            <input class="form-control" type="text" name="dok_typ_en" id="dok_typ_en" value="{{ old('dok_typ_en', '') }}">
                            @if($errors->has('dok_typ_en'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('dok_typ_en') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.dokTyp.fields.dok_typ_en_helper') }}</span>
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