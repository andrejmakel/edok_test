@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.status.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.statuses.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.status.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', '') }}">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.status.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status_icon">{{ trans('cruds.status.fields.status_icon') }}</label>
                            <input class="form-control" type="text" name="status_icon" id="status_icon" value="{{ old('status_icon', '') }}">
                            @if($errors->has('status_icon'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status_icon') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.status.fields.status_icon_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="title_de">{{ trans('cruds.status.fields.title_de') }}</label>
                            <input class="form-control" type="text" name="title_de" id="title_de" value="{{ old('title_de', '') }}">
                            @if($errors->has('title_de'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title_de') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.status.fields.title_de_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="title_sk">{{ trans('cruds.status.fields.title_sk') }}</label>
                            <input class="form-control" type="text" name="title_sk" id="title_sk" value="{{ old('title_sk', '') }}">
                            @if($errors->has('title_sk'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title_sk') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.status.fields.title_sk_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="title_en">{{ trans('cruds.status.fields.title_en') }}</label>
                            <input class="form-control" type="text" name="title_en" id="title_en" value="{{ old('title_en', '') }}">
                            @if($errors->has('title_en'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title_en') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.status.fields.title_en_helper') }}</span>
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