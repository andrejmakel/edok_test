@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.status.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.statuses.update", [$status->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label for="status">{{ trans('cruds.status.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', $status->status) }}">
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.status.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status_icon') ? 'has-error' : '' }}">
                            <label for="status_icon">{{ trans('cruds.status.fields.status_icon') }}</label>
                            <input class="form-control" type="text" name="status_icon" id="status_icon" value="{{ old('status_icon', $status->status_icon) }}">
                            @if($errors->has('status_icon'))
                                <span class="help-block" role="alert">{{ $errors->first('status_icon') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.status.fields.status_icon_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('title_de') ? 'has-error' : '' }}">
                            <label for="title_de">{{ trans('cruds.status.fields.title_de') }}</label>
                            <input class="form-control" type="text" name="title_de" id="title_de" value="{{ old('title_de', $status->title_de) }}">
                            @if($errors->has('title_de'))
                                <span class="help-block" role="alert">{{ $errors->first('title_de') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.status.fields.title_de_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('title_sk') ? 'has-error' : '' }}">
                            <label for="title_sk">{{ trans('cruds.status.fields.title_sk') }}</label>
                            <input class="form-control" type="text" name="title_sk" id="title_sk" value="{{ old('title_sk', $status->title_sk) }}">
                            @if($errors->has('title_sk'))
                                <span class="help-block" role="alert">{{ $errors->first('title_sk') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.status.fields.title_sk_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('title_en') ? 'has-error' : '' }}">
                            <label for="title_en">{{ trans('cruds.status.fields.title_en') }}</label>
                            <input class="form-control" type="text" name="title_en" id="title_en" value="{{ old('title_en', $status->title_en) }}">
                            @if($errors->has('title_en'))
                                <span class="help-block" role="alert">{{ $errors->first('title_en') }}</span>
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