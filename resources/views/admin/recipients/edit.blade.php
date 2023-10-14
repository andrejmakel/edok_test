@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.recipient.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.recipients.update", [$recipient->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('cruds.recipient.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $recipient->name) }}">
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.recipient.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('street_nr') ? 'has-error' : '' }}">
                            <label for="street_nr">{{ trans('cruds.recipient.fields.street_nr') }}</label>
                            <input class="form-control" type="text" name="street_nr" id="street_nr" value="{{ old('street_nr', $recipient->street_nr) }}">
                            @if($errors->has('street_nr'))
                                <span class="help-block" role="alert">{{ $errors->first('street_nr') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.recipient.fields.street_nr_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('psc') ? 'has-error' : '' }}">
                            <label for="psc">{{ trans('cruds.recipient.fields.psc') }}</label>
                            <input class="form-control" type="text" name="psc" id="psc" value="{{ old('psc', $recipient->psc) }}">
                            @if($errors->has('psc'))
                                <span class="help-block" role="alert">{{ $errors->first('psc') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.recipient.fields.psc_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mesto_sk') ? 'has-error' : '' }}">
                            <label for="mesto_sk">{{ trans('cruds.recipient.fields.mesto_sk') }}</label>
                            <input class="form-control" type="text" name="mesto_sk" id="mesto_sk" value="{{ old('mesto_sk', $recipient->mesto_sk) }}">
                            @if($errors->has('mesto_sk'))
                                <span class="help-block" role="alert">{{ $errors->first('mesto_sk') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.recipient.fields.mesto_sk_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mesto_de') ? 'has-error' : '' }}">
                            <label for="mesto_de">{{ trans('cruds.recipient.fields.mesto_de') }}</label>
                            <input class="form-control" type="text" name="mesto_de" id="mesto_de" value="{{ old('mesto_de', $recipient->mesto_de) }}">
                            @if($errors->has('mesto_de'))
                                <span class="help-block" role="alert">{{ $errors->first('mesto_de') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.recipient.fields.mesto_de_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('stat') ? 'has-error' : '' }}">
                            <label for="stat_id">{{ trans('cruds.recipient.fields.stat') }}</label>
                            <select class="form-control select2" name="stat_id" id="stat_id">
                                @foreach($stats as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('stat_id') ? old('stat_id') : $recipient->stat->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('stat'))
                                <span class="help-block" role="alert">{{ $errors->first('stat') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.recipient.fields.stat_helper') }}</span>
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