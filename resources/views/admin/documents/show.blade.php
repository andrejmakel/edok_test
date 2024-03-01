@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.document.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.documents.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.document.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $document->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.document.fields.date') }}
                                    </th>
                                    <td>
                                        {{ $document->date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.document.fields.team') }}
                                    </th>
                                    <td>
                                        {{ $document->team->nazov ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.document.fields.title') }}
                                    </th>
                                    <td>
                                        {{ $document->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.document.fields.document_code') }}
                                    </th>
                                    <td>
                                        {{ $document->document_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.document.fields.notice') }}
                                    </th>
                                    <td>
                                        {!! $document->notice !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.document.fields.dok_typ') }}
                                    </th>
                                    <td>
                                        {{ $document->dok_typ->dok_typ_sk ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.document.fields.dok_kat') }}
                                    </th>
                                    <td>
                                        {{ $document->dok_kat->dok_kat ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.document.fields.document') }}
                                    </th>
                                    <td>
                                        @if($document->document)
                                            <a href="{{ $document->document->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.document.fields.file_short_text') }}
                                    </th>
                                    <td>
                                        {{ $document->file_short_text }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.document.fields.payment_info') }}
                                    </th>
                                    <td>
                                        {{ $document->payment_info }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.document.fields.accounting') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $document->accounting ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.document.fields.amount') }}
                                    </th>
                                    <td>
                                        {{ $document->amount }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.document.fields.iban') }}
                                    </th>
                                    <td>
                                        {{ $document->iban }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.document.fields.swift') }}
                                    </th>
                                    <td>
                                        {{ $document->swift }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.document.fields.vs') }}
                                    </th>
                                    <td>
                                        {{ $document->vs }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.document.fields.ss') }}
                                    </th>
                                    <td>
                                        {{ $document->ss }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.document.fields.ks') }}
                                    </th>
                                    <td>
                                        {{ $document->ks }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.document.fields.paid') }}
                                    </th>
                                    <td>
                                        {{ $document->paid }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.document.fields.due_date') }}
                                    </th>
                                    <td>
                                        {{ $document->due_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.document.fields.read') }}
                                    </th>
                                    <td>
                                        @foreach($document->reads as $key => $read)
                                            <span class="label label-info">{{ $read->email }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.documents.index') }}">
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