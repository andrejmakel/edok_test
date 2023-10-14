@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.spracovany.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.spracovanies.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('popis') ? 'has-error' : '' }}">
                            <label for="popis">{{ trans('cruds.spracovany.fields.popis') }}</label>
                            <input class="form-control" type="text" name="popis" id="popis" value="{{ old('popis', '') }}">
                            @if($errors->has('popis'))
                                <span class="help-block" role="alert">{{ $errors->first('popis') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.spracovany.fields.popis_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('popis_de') ? 'has-error' : '' }}">
                            <label for="popis_de">{{ trans('cruds.spracovany.fields.popis_de') }}</label>
                            <input class="form-control" type="text" name="popis_de" id="popis_de" value="{{ old('popis_de', '') }}">
                            @if($errors->has('popis_de'))
                                <span class="help-block" role="alert">{{ $errors->first('popis_de') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.spracovany.fields.popis_de_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('popis_en') ? 'has-error' : '' }}">
                            <label for="popis_en">{{ trans('cruds.spracovany.fields.popis_en') }}</label>
                            <input class="form-control" type="text" name="popis_en" id="popis_en" value="{{ old('popis_en', '') }}">
                            @if($errors->has('popis_en'))
                                <span class="help-block" role="alert">{{ $errors->first('popis_en') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.spracovany.fields.popis_en_helper') }}</span>
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