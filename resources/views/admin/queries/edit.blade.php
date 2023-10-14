@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.query.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.queries.update", [$query->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('customer_query') ? 'has-error' : '' }}">
                            <label for="customer_query">{{ trans('cruds.query.fields.customer_query') }}</label>
                            <input class="form-control" type="text" name="customer_query" id="customer_query" value="{{ old('customer_query', $query->customer_query) }}">
                            @if($errors->has('customer_query'))
                                <span class="help-block" role="alert">{{ $errors->first('customer_query') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.query.fields.customer_query_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('long_text') ? 'has-error' : '' }}">
                            <label for="long_text">{{ trans('cruds.query.fields.long_text') }}</label>
                            <input class="form-control" type="text" name="long_text" id="long_text" value="{{ old('long_text', $query->long_text) }}">
                            @if($errors->has('long_text'))
                                <span class="help-block" role="alert">{{ $errors->first('long_text') }}</span>
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