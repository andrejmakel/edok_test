@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.sender.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.senders.update", [$sender->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('sender') ? 'has-error' : '' }}">
                            <label for="sender">{{ trans('cruds.sender.fields.sender') }}</label>
                            <input class="form-control" type="text" name="sender" id="sender" value="{{ old('sender', $sender->sender) }}">
                            @if($errors->has('sender'))
                                <span class="help-block" role="alert">{{ $errors->first('sender') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.sender.fields.sender_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('sender_de') ? 'has-error' : '' }}">
                            <label for="sender_de">{{ trans('cruds.sender.fields.sender_de') }}</label>
                            <input class="form-control" type="text" name="sender_de" id="sender_de" value="{{ old('sender_de', $sender->sender_de) }}">
                            @if($errors->has('sender_de'))
                                <span class="help-block" role="alert">{{ $errors->first('sender_de') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.sender.fields.sender_de_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('sender_en') ? 'has-error' : '' }}">
                            <label for="sender_en">{{ trans('cruds.sender.fields.sender_en') }}</label>
                            <input class="form-control" type="text" name="sender_en" id="sender_en" value="{{ old('sender_en', $sender->sender_en) }}">
                            @if($errors->has('sender_en'))
                                <span class="help-block" role="alert">{{ $errors->first('sender_en') }}</span>
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