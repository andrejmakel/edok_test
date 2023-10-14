@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.invoiceTyp.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.invoice-typs.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="shortcut">{{ trans('cruds.invoiceTyp.fields.shortcut') }}</label>
                            <input class="form-control" type="text" name="shortcut" id="shortcut" value="{{ old('shortcut', '') }}">
                            @if($errors->has('shortcut'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('shortcut') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoiceTyp.fields.shortcut_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="name">{{ trans('cruds.invoiceTyp.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}">
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoiceTyp.fields.name_helper') }}</span>
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