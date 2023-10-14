@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.spracovany.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.spracovanies.index') }}">
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
                            <a class="btn btn-default" href="{{ route('admin.spracovanies.index') }}">
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