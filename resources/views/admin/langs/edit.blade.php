@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.lang.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.langs.update", [$lang->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('lang') ? 'has-error' : '' }}">
                            <label class="required" for="lang">{{ trans('cruds.lang.fields.lang') }}</label>
                            <input class="form-control" type="text" name="lang" id="lang" value="{{ old('lang', $lang->lang) }}" required>
                            @if($errors->has('lang'))
                                <span class="help-block" role="alert">{{ $errors->first('lang') }}</span>
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