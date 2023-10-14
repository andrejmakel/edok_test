@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.lang.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.langs.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="lang">{{ trans('cruds.lang.fields.lang') }}</label>
                            <input class="form-control" type="text" name="lang" id="lang" value="{{ old('lang', '') }}" required>
                            @if($errors->has('lang'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('lang') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.lang.fields.lang_helper') }}</span>
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