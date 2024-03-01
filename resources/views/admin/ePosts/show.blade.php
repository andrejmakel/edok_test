@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.ePost.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.e-posts.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ePost.fields.date') }}
                                    </th>
                                    <td>
                                        {{ $ePost->date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ePost.fields.team') }}
                                    </th>
                                    <td>
                                        {{ $ePost->team->nazov ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ePost.fields.sender') }}
                                    </th>
                                    <td>
                                        {{ $ePost->sender->sender ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ePost.fields.scan') }}
                                    </th>
                                    <td>
                                        @if($ePost->scan)
                                            <a href="{{ $ePost->scan->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ePost.fields.annex') }}
                                    </th>
                                    <td>
                                        @foreach($ePost->annex as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ePost.fields.file_short_text') }}
                                    </th>
                                    <td>
                                        {{ $ePost->file_short_text }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ePost.fields.zadal') }}
                                    </th>
                                    <td>
                                        {{ $ePost->zadal->zadal ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ePost.fields.accounting') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $ePost->accounting ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ePost.fields.title') }}
                                    </th>
                                    <td>
                                        {{ $ePost->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ePost.fields.notice') }}
                                    </th>
                                    <td>
                                        {!! $ePost->notice !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ePost.fields.dok_typ') }}
                                    </th>
                                    <td>
                                        {{ $ePost->dok_typ->dok_typ_sk ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ePost.fields.payment_info') }}
                                    </th>
                                    <td>
                                        {{ $ePost->payment_info }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ePost.fields.amount') }}
                                    </th>
                                    <td>
                                        {{ $ePost->amount }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ePost.fields.iban') }}
                                    </th>
                                    <td>
                                        {{ $ePost->iban }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ePost.fields.swift') }}
                                    </th>
                                    <td>
                                        {{ $ePost->swift }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ePost.fields.vs') }}
                                    </th>
                                    <td>
                                        {{ $ePost->vs }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ePost.fields.ss') }}
                                    </th>
                                    <td>
                                        {{ $ePost->ss }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ePost.fields.ks') }}
                                    </th>
                                    <td>
                                        {{ $ePost->ks }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ePost.fields.for_recipient') }}
                                    </th>
                                    <td>
                                        {{ $ePost->for_recipient }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ePost.fields.paid') }}
                                    </th>
                                    <td>
                                        {{ $ePost->paid }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ePost.fields.due_date') }}
                                    </th>
                                    <td>
                                        {{ $ePost->due_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ePost.fields.send_email') }}
                                    </th>
                                    <td>
                                        {{ $ePost->send_email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ePost.fields.read') }}
                                    </th>
                                    <td>
                                        @foreach($ePost->reads as $key => $read)
                                            <span class="label label-info">{{ $read->email }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.e-posts.index') }}">
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