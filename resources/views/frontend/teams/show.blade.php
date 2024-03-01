@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.team.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.teams.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $team->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.active') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $team->active ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.archive') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $team->archive ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.nazov') }}
                                    </th>
                                    <td>
                                        {{ $team->nazov }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.short_name') }}
                                    </th>
                                    <td>
                                        {{ $team->short_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.superfaktura') }}
                                    </th>
                                    <td>
                                        {{ $team->superfaktura }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.nasa') }}
                                    </th>
                                    <td>
                                        {{ $team->nasa->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.id_mmc') }}
                                    </th>
                                    <td>
                                        {{ $team->id_mmc }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.id_pohoda') }}
                                    </th>
                                    <td>
                                        {{ $team->id_pohoda }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.date') }}
                                    </th>
                                    <td>
                                        {{ $team->date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.contact') }}
                                    </th>
                                    <td>
                                        @foreach($team->contacts as $key => $contact)
                                            <span class="label label-info">{{ $contact->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.address') }}
                                    </th>
                                    <td>
                                        {{ $team->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.sidlo') }}
                                    </th>
                                    <td>
                                        {{ $team->sidlo->sidlo ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.ico') }}
                                    </th>
                                    <td>
                                        {{ $team->ico }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.dic') }}
                                    </th>
                                    <td>
                                        {{ $team->dic }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.ic_dph') }}
                                    </th>
                                    <td>
                                        {{ $team->ic_dph }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.ic_dph_7_a') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $team->ic_dph_7_a ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.phone') }}
                                    </th>
                                    <td>
                                        {{ $team->phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.e_schranka') }}
                                    </th>
                                    <td>
                                        {{ $team->e_schranka->splnomocnenec ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.spracovanie') }}
                                    </th>
                                    <td>
                                        {{ $team->spracovanie->popis ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.send_address') }}
                                    </th>
                                    <td>
                                        {{ $team->send_address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.acc_company') }}
                                    </th>
                                    <td>
                                        {{ $team->acc_company->acc_company ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.ucto') }}
                                    </th>
                                    <td>
                                        {{ $team->ucto->uctuje ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.bank') }}
                                    </th>
                                    <td>
                                        {{ $team->bank->bank ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.iban') }}
                                    </th>
                                    <td>
                                        {{ $team->iban }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.swift_bic') }}
                                    </th>
                                    <td>
                                        {{ $team->swift_bic }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.popis') }}
                                    </th>
                                    <td>
                                        {!! $team->popis !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.orsr') }}
                                    </th>
                                    <td>
                                        @if($team->orsr)
                                            <a href="{{ $team->orsr->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.zrsr') }}
                                    </th>
                                    <td>
                                        @if($team->zrsr)
                                            <a href="{{ $team->zrsr->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.teams.index') }}">
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