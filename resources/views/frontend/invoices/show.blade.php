@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.invoice.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.invoices.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.invoice.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $invoice->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.invoice.fields.team') }}
                                    </th>
                                    <td>
                                        {{ $invoice->team->nazov ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.invoice.fields.visible') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $invoice->visible ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.invoice.fields.date') }}
                                    </th>
                                    <td>
                                        {{ $invoice->date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.invoice.fields.nasa') }}
                                    </th>
                                    <td>
                                        {{ $invoice->nasa->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.invoice.fields.typ') }}
                                    </th>
                                    <td>
                                        {{ $invoice->typ->shortcut ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.invoice.fields.number') }}
                                    </th>
                                    <td>
                                        {{ $invoice->number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.invoice.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $invoice->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.invoice.fields.amount') }}
                                    </th>
                                    <td>
                                        {{ $invoice->amount }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.invoice.fields.payment_term') }}
                                    </th>
                                    <td>
                                        {{ $invoice->payment_term }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.invoice.fields.file') }}
                                    </th>
                                    <td>
                                        @if($invoice->file)
                                            <a href="{{ $invoice->file->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.invoice.fields.pay_date') }}
                                    </th>
                                    <td>
                                        {{ $invoice->pay_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.invoice.fields.accounting_date') }}
                                    </th>
                                    <td>
                                        {{ $invoice->accounting_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.invoice.fields.send_email') }}
                                    </th>
                                    <td>
                                        {{ $invoice->send_email }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.invoices.index') }}">
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