@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.dokTyp.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.dok-typs.update", [$dokTyp->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('dok_typ_sk') ? 'has-error' : '' }}">
                            <label for="dok_typ_sk">{{ trans('cruds.dokTyp.fields.dok_typ_sk') }}</label>
                            <input class="form-control" type="text" name="dok_typ_sk" id="dok_typ_sk" value="{{ old('dok_typ_sk', $dokTyp->dok_typ_sk) }}">
                            @if($errors->has('dok_typ_sk'))
                                <span class="help-block" role="alert">{{ $errors->first('dok_typ_sk') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.dokTyp.fields.dok_typ_sk_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dok_typ_de') ? 'has-error' : '' }}">
                            <label for="dok_typ_de">{{ trans('cruds.dokTyp.fields.dok_typ_de') }}</label>
                            <input class="form-control" type="text" name="dok_typ_de" id="dok_typ_de" value="{{ old('dok_typ_de', $dokTyp->dok_typ_de) }}">
                            @if($errors->has('dok_typ_de'))
                                <span class="help-block" role="alert">{{ $errors->first('dok_typ_de') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.dokTyp.fields.dok_typ_de_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dok_typ_en') ? 'has-error' : '' }}">
                            <label for="dok_typ_en">{{ trans('cruds.dokTyp.fields.dok_typ_en') }}</label>
                            <input class="form-control" type="text" name="dok_typ_en" id="dok_typ_en" value="{{ old('dok_typ_en', $dokTyp->dok_typ_en) }}">
                            @if($errors->has('dok_typ_en'))
                                <span class="help-block" role="alert">{{ $errors->first('dok_typ_en') }}</span>
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