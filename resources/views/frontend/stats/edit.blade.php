@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.stat.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.stats.update", [$stat->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="stat_sk">{{ trans('cruds.stat.fields.stat_sk') }}</label>
                            <input class="form-control" type="text" name="stat_sk" id="stat_sk" value="{{ old('stat_sk', $stat->stat_sk) }}">
                            @if($errors->has('stat_sk'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('stat_sk') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.stat.fields.stat_sk_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="stat_de">{{ trans('cruds.stat.fields.stat_de') }}</label>
                            <input class="form-control" type="text" name="stat_de" id="stat_de" value="{{ old('stat_de', $stat->stat_de) }}">
                            @if($errors->has('stat_de'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('stat_de') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.stat.fields.stat_de_helper') }}</span>
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