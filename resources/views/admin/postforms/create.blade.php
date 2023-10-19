@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.postform.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.postforms.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('postform_sk') ? 'has-error' : '' }}">
                            <label for="postform_sk">{{ trans('cruds.postform.fields.postform_sk') }}</label>
                            <input class="form-control" type="text" name="postform_sk" id="postform_sk" value="{{ old('postform_sk', '') }}">
                            @if($errors->has('postform_sk'))
                                <span class="help-block" role="alert">{{ $errors->first('postform_sk') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.postform.fields.postform_sk_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('postform_icon') ? 'has-error' : '' }}">
                            <label for="postform_icon">{{ trans('cruds.postform.fields.postform_icon') }}</label>
                            <input class="form-control" type="text" name="postform_icon" id="postform_icon" value="{{ old('postform_icon', '') }}">
                            @if($errors->has('postform_icon'))
                                <span class="help-block" role="alert">{{ $errors->first('postform_icon') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.postform.fields.postform_icon_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('title_de') ? 'has-error' : '' }}">
                            <label for="title_de">{{ trans('cruds.postform.fields.title_de') }}</label>
                            <input class="form-control" type="text" name="title_de" id="title_de" value="{{ old('title_de', '') }}">
                            @if($errors->has('title_de'))
                                <span class="help-block" role="alert">{{ $errors->first('title_de') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.postform.fields.title_de_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('title_sk') ? 'has-error' : '' }}">
                            <label for="title_sk">{{ trans('cruds.postform.fields.title_sk') }}</label>
                            <input class="form-control" type="text" name="title_sk" id="title_sk" value="{{ old('title_sk', '') }}">
                            @if($errors->has('title_sk'))
                                <span class="help-block" role="alert">{{ $errors->first('title_sk') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.postform.fields.title_sk_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('title_en') ? 'has-error' : '' }}">
                            <label for="title_en">{{ trans('cruds.postform.fields.title_en') }}</label>
                            <input class="form-control" type="text" name="title_en" id="title_en" value="{{ old('title_en', '') }}">
                            @if($errors->has('title_en'))
                                <span class="help-block" role="alert">{{ $errors->first('title_en') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.postform.fields.title_en_helper') }}</span>
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