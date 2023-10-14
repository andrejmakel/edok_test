@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.eSchranka.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.e-schrankas.update", [$eSchranka->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="splnomocnenec">{{ trans('cruds.eSchranka.fields.splnomocnenec') }}</label>
                            <input class="form-control" type="text" name="splnomocnenec" id="splnomocnenec" value="{{ old('splnomocnenec', $eSchranka->splnomocnenec) }}">
                            @if($errors->has('splnomocnenec'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('splnomocnenec') }}
                                </div>
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