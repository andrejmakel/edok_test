@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.query.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.queries.update", [$query->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="customer_query">{{ trans('cruds.query.fields.customer_query') }}</label>
                            <input class="form-control" type="text" name="customer_query" id="customer_query" value="{{ old('customer_query', $query->customer_query) }}">
                            @if($errors->has('customer_query'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('customer_query') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.query.fields.customer_query_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="long_text">{{ trans('cruds.query.fields.long_text') }}</label>
                            <input class="form-control" type="text" name="long_text" id="long_text" value="{{ old('long_text', $query->long_text) }}">
                            @if($errors->has('long_text'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('long_text') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.query.fields.long_text_helper') }}</span>
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