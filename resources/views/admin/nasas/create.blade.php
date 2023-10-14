@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.nasa.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.nasas.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('cruds.nasa.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}">
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.nasa.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('konto') ? 'has-error' : '' }}">
                            <label for="konto">{{ trans('cruds.nasa.fields.konto') }}</label>
                            <input class="form-control" type="text" name="konto" id="konto" value="{{ old('konto', '') }}">
                            @if($errors->has('konto'))
                                <span class="help-block" role="alert">{{ $errors->first('konto') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.nasa.fields.konto_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('iban') ? 'has-error' : '' }}">
                            <label for="iban">{{ trans('cruds.nasa.fields.iban') }}</label>
                            <input class="form-control" type="text" name="iban" id="iban" value="{{ old('iban', '') }}">
                            @if($errors->has('iban'))
                                <span class="help-block" role="alert">{{ $errors->first('iban') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.nasa.fields.iban_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('swift') ? 'has-error' : '' }}">
                            <label for="swift">{{ trans('cruds.nasa.fields.swift') }}</label>
                            <input class="form-control" type="text" name="swift" id="swift" value="{{ old('swift', '') }}">
                            @if($errors->has('swift'))
                                <span class="help-block" role="alert">{{ $errors->first('swift') }}</span>
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