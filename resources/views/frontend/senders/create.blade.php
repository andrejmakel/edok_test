@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.sender.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.senders.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="sender">{{ trans('cruds.sender.fields.sender') }}</label>
                            <input class="form-control" type="text" name="sender" id="sender" value="{{ old('sender', '') }}">
                            @if($errors->has('sender'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sender') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.sender.fields.sender_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="sender_de">{{ trans('cruds.sender.fields.sender_de') }}</label>
                            <input class="form-control" type="text" name="sender_de" id="sender_de" value="{{ old('sender_de', '') }}">
                            @if($errors->has('sender_de'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sender_de') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.sender.fields.sender_de_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="sender_en">{{ trans('cruds.sender.fields.sender_en') }}</label>
                            <input class="form-control" type="text" name="sender_en" id="sender_en" value="{{ old('sender_en', '') }}">
                            @if($errors->has('sender_en'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sender_en') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.sender.fields.sender_en_helper') }}</span>
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