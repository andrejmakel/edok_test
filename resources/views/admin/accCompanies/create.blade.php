@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.accCompany.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.acc-companies.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('acc_company') ? 'has-error' : '' }}">
                            <label for="acc_company">{{ trans('cruds.accCompany.fields.acc_company') }}</label>
                            <input class="form-control" type="text" name="acc_company" id="acc_company" value="{{ old('acc_company', '') }}">
                            @if($errors->has('acc_company'))
                                <span class="help-block" role="alert">{{ $errors->first('acc_company') }}</span>
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