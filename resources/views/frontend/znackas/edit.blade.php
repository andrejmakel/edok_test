@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.znacka.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.znackas.update", [$znacka->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="znacka">{{ trans('cruds.znacka.fields.znacka') }}</label>
                            <input class="form-control" type="text" name="znacka" id="znacka" value="{{ old('znacka', $znacka->znacka) }}">
                            @if($errors->has('znacka'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('znacka') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.znacka.fields.znacka_helper') }}</span>
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