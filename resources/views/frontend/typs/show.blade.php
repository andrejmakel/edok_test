@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.typ.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.typs.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.typ.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $typ->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.typ.fields.typ_sk') }}
                                    </th>
                                    <td>
                                        {{ $typ->typ_sk }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.typ.fields.typ_de') }}
                                    </th>
                                    <td>
                                        {{ $typ->typ_de }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.typ.fields.typ_en') }}
                                    </th>
                                    <td>
                                        {{ $typ->typ_en }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.typs.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection