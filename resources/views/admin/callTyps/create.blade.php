@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.callTyp.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.call-typs.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('call_typ') ? 'has-error' : '' }}">
                            <label for="call_typ">{{ trans('cruds.callTyp.fields.call_typ') }}</label>
                            <input class="form-control" type="text" name="call_typ" id="call_typ" value="{{ old('call_typ', '') }}">
                            @if($errors->has('call_typ'))
                                <span class="help-block" role="alert">{{ $errors->first('call_typ') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.callTyp.fields.call_typ_helper') }}</span>
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