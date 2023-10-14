@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.team.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.teams.update", [$team->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="nazov">{{ trans('cruds.team.fields.nazov') }}</label>
                            <input class="form-control" type="text" name="nazov" id="nazov" value="{{ old('nazov', $team->nazov) }}">
                            @if($errors->has('nazov'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nazov') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.nazov_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="short_name">{{ trans('cruds.team.fields.short_name') }}</label>
                            <input class="form-control" type="text" name="short_name" id="short_name" value="{{ old('short_name', $team->short_name) }}">
                            @if($errors->has('short_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('short_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.short_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="activ" value="0">
                                <input type="checkbox" name="activ" id="activ" value="1" {{ $team->activ || old('activ', 0) === 1 ? 'checked' : '' }}>
                                <label for="activ">{{ trans('cruds.team.fields.activ') }}</label>
                            </div>
                            @if($errors->has('activ'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('activ') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.activ_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="date">{{ trans('cruds.team.fields.date') }}</label>
                            <input class="form-control date" type="text" name="date" id="date" value="{{ old('date', $team->date) }}">
                            @if($errors->has('date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="mmc">{{ trans('cruds.team.fields.mmc') }}</label>
                            <input class="form-control" type="text" name="mmc" id="mmc" value="{{ old('mmc', $team->mmc) }}">
                            @if($errors->has('mmc'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mmc') }}
                                </div>
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