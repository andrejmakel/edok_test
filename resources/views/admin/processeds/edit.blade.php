@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.processed.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.processeds.update", [$processed->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('processed') ? 'has-error' : '' }}">
                            <label for="processed">{{ trans('cruds.processed.fields.processed') }}</label>
                            <input class="form-control" type="text" name="processed" id="processed" value="{{ old('processed', $processed->processed) }}">
                            @if($errors->has('processed'))
                                <span class="help-block" role="alert">{{ $errors->first('processed') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.processed.fields.processed_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('processed_de') ? 'has-error' : '' }}">
                            <label for="processed_de">{{ trans('cruds.processed.fields.processed_de') }}</label>
                            <input class="form-control" type="text" name="processed_de" id="processed_de" value="{{ old('processed_de', $processed->processed_de) }}">
                            @if($errors->has('processed_de'))
                                <span class="help-block" role="alert">{{ $errors->first('processed_de') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.processed.fields.processed_de_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('processed_en') ? 'has-error' : '' }}">
                            <label for="processed_en">{{ trans('cruds.processed.fields.processed_en') }}</label>
                            <input class="form-control" type="text" name="processed_en" id="processed_en" value="{{ old('processed_en', $processed->processed_en) }}">
                            @if($errors->has('processed_en'))
                                <span class="help-block" role="alert">{{ $errors->first('processed_en') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.processed.fields.processed_en_helper') }}</span>
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