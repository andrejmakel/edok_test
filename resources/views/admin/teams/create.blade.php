@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.team.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.teams.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('nazov') ? 'has-error' : '' }}">
                            <label for="nazov">{{ trans('cruds.team.fields.nazov') }}</label>
                            <input class="form-control" type="text" name="nazov" id="nazov" value="{{ old('nazov', '') }}">
                            @if($errors->has('nazov'))
                                <span class="help-block" role="alert">{{ $errors->first('nazov') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.nazov_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('short_name') ? 'has-error' : '' }}">
                            <label for="short_name">{{ trans('cruds.team.fields.short_name') }}</label>
                            <input class="form-control" type="text" name="short_name" id="short_name" value="{{ old('short_name', '') }}">
                            @if($errors->has('short_name'))
                                <span class="help-block" role="alert">{{ $errors->first('short_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.short_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('activ') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="activ" value="0">
                                <input type="checkbox" name="activ" id="activ" value="1" {{ old('activ', 0) == 1 || old('activ') === null ? 'checked' : '' }}>
                                <label for="activ" style="font-weight: 400">{{ trans('cruds.team.fields.activ') }}</label>
                            </div>
                            @if($errors->has('activ'))
                                <span class="help-block" role="alert">{{ $errors->first('activ') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.activ_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                            <label for="date">{{ trans('cruds.team.fields.date') }}</label>
                            <input class="form-control date" type="text" name="date" id="date" value="{{ old('date') }}">
                            @if($errors->has('date'))
                                <span class="help-block" role="alert">{{ $errors->first('date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mmc') ? 'has-error' : '' }}">
                            <label for="mmc">{{ trans('cruds.team.fields.mmc') }}</label>
                            <input class="form-control" type="text" name="mmc" id="mmc" value="{{ old('mmc', '') }}">
                            @if($errors->has('mmc'))
                                <span class="help-block" role="alert">{{ $errors->first('mmc') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.mmc_helper') }}</span>
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