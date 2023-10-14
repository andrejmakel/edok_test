@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.eSchranka.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.e-schrankas.update", [$eSchranka->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('splnomocnenec') ? 'has-error' : '' }}">
                            <label for="splnomocnenec">{{ trans('cruds.eSchranka.fields.splnomocnenec') }}</label>
                            <input class="form-control" type="text" name="splnomocnenec" id="splnomocnenec" value="{{ old('splnomocnenec', $eSchranka->splnomocnenec) }}">
                            @if($errors->has('splnomocnenec'))
                                <span class="help-block" role="alert">{{ $errors->first('splnomocnenec') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.eSchranka.fields.splnomocnenec_helper') }}</span>
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