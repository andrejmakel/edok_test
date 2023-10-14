@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.bank.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.banks.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="bank">{{ trans('cruds.bank.fields.bank') }}</label>
                            <input class="form-control" type="text" name="bank" id="bank" value="{{ old('bank', '') }}">
                            @if($errors->has('bank'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('bank') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.bank.fields.bank_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="swift">{{ trans('cruds.bank.fields.swift') }}</label>
                            <input class="form-control" type="text" name="swift" id="swift" value="{{ old('swift', '') }}">
                            @if($errors->has('swift'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('swift') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.bank.fields.swift_helper') }}</span>
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