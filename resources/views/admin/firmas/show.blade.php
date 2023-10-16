@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.firma.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.firmas.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.firma.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $firma->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.firma.fields.nasa') }}
                                    </th>
                                    <td>
                                        {{ $firma->nasa->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.firma.fields.nazov') }}
                                    </th>
                                    <td>
                                        {{ $firma->nazov }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.firma.fields.activ') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $firma->activ ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.firma.fields.team') }}
                                    </th>
                                    <td>
                                        {{ $firma->team->nazov ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.firma.fields.kontakt') }}
                                    </th>
                                    <td>
                                        @foreach($firma->kontakts as $key => $kontakt)
                                            <span class="label label-info">{{ $kontakt->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.firma.fields.idmmc') }}
                                    </th>
                                    <td>
                                        {{ $firma->idmmc }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.firma.fields.id_pohoda') }}
                                    </th>
                                    <td>
                                        {{ $firma->id_pohoda }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.firma.fields.address') }}
                                    </th>
                                    <td>
                                        {{ $firma->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.firma.fields.ico') }}
                                    </th>
                                    <td>
                                        {{ $firma->ico }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.firma.fields.dic') }}
                                    </th>
                                    <td>
                                        {{ $firma->dic }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.firma.fields.ic_dph') }}
                                    </th>
                                    <td>
                                        {{ $firma->ic_dph }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.firma.fields.ic_dph_form') }}
                                    </th>
                                    <td>
                                        {{ $firma->ic_dph_form }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.firma.fields.telefon') }}
                                    </th>
                                    <td>
                                        {{ $firma->telefon }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.firma.fields.e_schranka') }}
                                    </th>
                                    <td>
                                        {{ $firma->e_schranka->splnomocnenec ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.firma.fields.spracovanie') }}
                                    </th>
                                    <td>
                                        {{ $firma->spracovanie->popis ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.firma.fields.sprac_posty') }}
                                    </th>
                                    <td>
                                        {{ $firma->sprac_posty }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.firma.fields.ucto') }}
                                    </th>
                                    <td>
                                        {{ $firma->ucto->uctuje ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.firma.fields.bank') }}
                                    </th>
                                    <td>
                                        {{ $firma->bank->bank ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.firma.fields.iban') }}
                                    </th>
                                    <td>
                                        {{ $firma->iban }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.firma.fields.swift_bic') }}
                                    </th>
                                    <td>
                                        {{ $firma->swift_bic }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.firma.fields.popis') }}
                                    </th>
                                    <td>
                                        {!! $firma->popis !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.firma.fields.orsr') }}
                                    </th>
                                    <td>
                                        @if($firma->orsr)
                                            <a href="{{ $firma->orsr->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.firma.fields.zrsr') }}
                                    </th>
                                    <td>
                                        @if($firma->zrsr)
                                            <a href="{{ $firma->zrsr->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.firmas.index') }}">
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