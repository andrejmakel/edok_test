@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.invoiceTyp.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.invoice-typs.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('shortcut') ? 'has-error' : '' }}">
                            <label for="shortcut">{{ trans('cruds.invoiceTyp.fields.shortcut') }}</label>
                            <input class="form-control" type="text" name="shortcut" id="shortcut" value="{{ old('shortcut', '') }}">
                            @if($errors->has('shortcut'))
                                <span class="help-block" role="alert">{{ $errors->first('shortcut') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoiceTyp.fields.shortcut_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('cruds.invoiceTyp.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}">
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
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