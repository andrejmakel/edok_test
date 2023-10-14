@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.spracovany.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.spracovanies.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="popis">{{ trans('cruds.spracovany.fields.popis') }}</label>
                            <input class="form-control" type="text" name="popis" id="popis" value="{{ old('popis', '') }}">
                            @if($errors->has('popis'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('popis') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.spracovany.fields.popis_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="popis_de">{{ trans('cruds.spracovany.fields.popis_de') }}</label>
                            <input class="form-control" type="text" name="popis_de" id="popis_de" value="{{ old('popis_de', '') }}">
                            @if($errors->has('popis_de'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('popis_de') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.spracovany.fields.popis_de_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="popis_en">{{ trans('cruds.spracovany.fields.popis_en') }}</label>
                            <input class="form-control" type="text" name="popis_en" id="popis_en" value="{{ old('popis_en', '') }}">
                            @if($errors->has('popis_en'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('popis_en') }}
                                </div>
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