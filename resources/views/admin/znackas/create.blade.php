@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.znacka.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.znackas.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('znacka') ? 'has-error' : '' }}">
                            <label for="znacka">{{ trans('cruds.znacka.fields.znacka') }}</label>
                            <input class="form-control" type="text" name="znacka" id="znacka" value="{{ old('znacka', '') }}">
                            @if($errors->has('znacka'))
                                <span class="help-block" role="alert">{{ $errors->first('znacka') }}</span>
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