@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.invoiceTyp.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.invoice-typs.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.invoiceTyp.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $invoiceTyp->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.invoiceTyp.fields.shortcut') }}
                                    </th>
                                    <td>
                                        {{ $invoiceTyp->shortcut }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.invoiceTyp.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $invoiceTyp->name }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.invoice-typs.index') }}">
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