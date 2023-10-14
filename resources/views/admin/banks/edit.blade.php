@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.bank.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.banks.update", [$bank->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('bank') ? 'has-error' : '' }}">
                            <label for="bank">{{ trans('cruds.bank.fields.bank') }}</label>
                            <input class="form-control" type="text" name="bank" id="bank" value="{{ old('bank', $bank->bank) }}">
                            @if($errors->has('bank'))
                                <span class="help-block" role="alert">{{ $errors->first('bank') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.bank.fields.bank_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('swift') ? 'has-error' : '' }}">
                            <label for="swift">{{ trans('cruds.bank.fields.swift') }}</label>
                            <input class="form-control" type="text" name="swift" id="swift" value="{{ old('swift', $bank->swift) }}">
                            @if($errors->has('swift'))
                                <span class="help-block" role="alert">{{ $errors->first('swift') }}</span>
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