@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.spracovany.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.spracovanies.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.spracovany.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $spracovany->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.spracovany.fields.popis') }}
                                    </th>
                                    <td>
                                        {{ $spracovany->popis }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.spracovany.fields.popis_de') }}
                                    </th>
                                    <td>
                                        {{ $spracovany->popis_de }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.spracovany.fields.popis_en') }}
                                    </th>
                                    <td>
                                        {{ $spracovany->popis_en }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.spracovanies.index') }}">
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