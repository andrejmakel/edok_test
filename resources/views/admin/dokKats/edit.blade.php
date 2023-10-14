@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.dokKat.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.dok-kats.update", [$dokKat->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('dok_kat') ? 'has-error' : '' }}">
                            <label for="dok_kat">{{ trans('cruds.dokKat.fields.dok_kat') }}</label>
                            <input class="form-control" type="text" name="dok_kat" id="dok_kat" value="{{ old('dok_kat', $dokKat->dok_kat) }}">
                            @if($errors->has('dok_kat'))
                                <span class="help-block" role="alert">{{ $errors->first('dok_kat') }}</span>
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