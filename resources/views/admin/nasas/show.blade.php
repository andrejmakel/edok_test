@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.nasa.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.nasas.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.nasa.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $nasa->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.nasa.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $nasa->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.nasa.fields.konto') }}
                                    </th>
                                    <td>
                                        {{ $nasa->konto }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.nasa.fields.iban') }}
                                    </th>
                                    <td>
                                        {{ $nasa->iban }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.nasa.fields.swift') }}
                                    </th>
                                    <td>
                                        {{ $nasa->swift }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.nasas.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#nasa_invoices" aria-controls="nasa_invoices" role="tab" data-toggle="tab">
                            {{ trans('cruds.invoice.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="nasa_invoices">
                        @includeIf('admin.nasas.relationships.nasaInvoices', ['invoices' => $nasa->nasaInvoices])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection