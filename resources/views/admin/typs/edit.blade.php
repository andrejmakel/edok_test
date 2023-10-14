@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.typ.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.typs.update", [$typ->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('typ_sk') ? 'has-error' : '' }}">
                            <label for="typ_sk">{{ trans('cruds.typ.fields.typ_sk') }}</label>
                            <input class="form-control" type="text" name="typ_sk" id="typ_sk" value="{{ old('typ_sk', $typ->typ_sk) }}">
                            @if($errors->has('typ_sk'))
                                <span class="help-block" role="alert">{{ $errors->first('typ_sk') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.typ.fields.typ_sk_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('typ_de') ? 'has-error' : '' }}">
                            <label for="typ_de">{{ trans('cruds.typ.fields.typ_de') }}</label>
                            <input class="form-control" type="text" name="typ_de" id="typ_de" value="{{ old('typ_de', $typ->typ_de) }}">
                            @if($errors->has('typ_de'))
                                <span class="help-block" role="alert">{{ $errors->first('typ_de') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.typ.fields.typ_de_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('typ_en') ? 'has-error' : '' }}">
                            <label for="typ_en">{{ trans('cruds.typ.fields.typ_en') }}</label>
                            <input class="form-control" type="text" name="typ_en" id="typ_en" value="{{ old('typ_en', $typ->typ_en) }}">
                            @if($errors->has('typ_en'))
                                <span class="help-block" role="alert">{{ $errors->first('typ_en') }}</span>
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