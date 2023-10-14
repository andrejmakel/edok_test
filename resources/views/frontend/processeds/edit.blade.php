@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.processed.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.processeds.update", [$processed->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="processed">{{ trans('cruds.processed.fields.processed') }}</label>
                            <input class="form-control" type="text" name="processed" id="processed" value="{{ old('processed', $processed->processed) }}">
                            @if($errors->has('processed'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('processed') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.processed.fields.processed_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="processed_de">{{ trans('cruds.processed.fields.processed_de') }}</label>
                            <input class="form-control" type="text" name="processed_de" id="processed_de" value="{{ old('processed_de', $processed->processed_de) }}">
                            @if($errors->has('processed_de'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('processed_de') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.processed.fields.processed_de_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="processed_en">{{ trans('cruds.processed.fields.processed_en') }}</label>
                            <input class="form-control" type="text" name="processed_en" id="processed_en" value="{{ old('processed_en', $processed->processed_en) }}">
                            @if($errors->has('processed_en'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('processed_en') }}
                                </div>
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