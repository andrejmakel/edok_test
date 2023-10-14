@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.recipient.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.recipients.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ trans('cruds.recipient.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}">
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.recipient.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="street_nr">{{ trans('cruds.recipient.fields.street_nr') }}</label>
                            <input class="form-control" type="text" name="street_nr" id="street_nr" value="{{ old('street_nr', '') }}">
                            @if($errors->has('street_nr'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('street_nr') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.recipient.fields.street_nr_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="psc">{{ trans('cruds.recipient.fields.psc') }}</label>
                            <input class="form-control" type="text" name="psc" id="psc" value="{{ old('psc', '') }}">
                            @if($errors->has('psc'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('psc') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.recipient.fields.psc_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="mesto_sk">{{ trans('cruds.recipient.fields.mesto_sk') }}</label>
                            <input class="form-control" type="text" name="mesto_sk" id="mesto_sk" value="{{ old('mesto_sk', '') }}">
                            @if($errors->has('mesto_sk'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mesto_sk') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.recipient.fields.mesto_sk_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="mesto_de">{{ trans('cruds.recipient.fields.mesto_de') }}</label>
                            <input class="form-control" type="text" name="mesto_de" id="mesto_de" value="{{ old('mesto_de', '') }}">
                            @if($errors->has('mesto_de'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mesto_de') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.recipient.fields.mesto_de_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="stat_id">{{ trans('cruds.recipient.fields.stat') }}</label>
                            <select class="form-control select2" name="stat_id" id="stat_id">
                                @foreach($stats as $id => $entry)
                                    <option value="{{ $id }}" {{ old('stat_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('stat'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('stat') }}
                                </div>
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