@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.accCompany.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.acc-companies.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="acc_company">{{ trans('cruds.accCompany.fields.acc_company') }}</label>
                            <input class="form-control" type="text" name="acc_company" id="acc_company" value="{{ old('acc_company', '') }}">
                            @if($errors->has('acc_company'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('acc_company') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.accCompany.fields.acc_company_helper') }}</span>
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