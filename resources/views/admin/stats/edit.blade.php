@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.stat.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.stats.update", [$stat->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('stat_sk') ? 'has-error' : '' }}">
                            <label for="stat_sk">{{ trans('cruds.stat.fields.stat_sk') }}</label>
                            <input class="form-control" type="text" name="stat_sk" id="stat_sk" value="{{ old('stat_sk', $stat->stat_sk) }}">
                            @if($errors->has('stat_sk'))
                                <span class="help-block" role="alert">{{ $errors->first('stat_sk') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.stat.fields.stat_sk_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('stat_de') ? 'has-error' : '' }}">
                            <label for="stat_de">{{ trans('cruds.stat.fields.stat_de') }}</label>
                            <input class="form-control" type="text" name="stat_de" id="stat_de" value="{{ old('stat_de', $stat->stat_de) }}">
                            @if($errors->has('stat_de'))
                                <span class="help-block" role="alert">{{ $errors->first('stat_de') }}</span>
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