@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.recipient.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.recipients.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.recipient.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $recipient->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.recipient.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $recipient->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.recipient.fields.street_nr') }}
                                    </th>
                                    <td>
                                        {{ $recipient->street_nr }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.recipient.fields.psc') }}
                                    </th>
                                    <td>
                                        {{ $recipient->psc }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.recipient.fields.mesto_sk') }}
                                    </th>
                                    <td>
                                        {{ $recipient->mesto_sk }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.recipient.fields.mesto_de') }}
                                    </th>
                                    <td>
                                        {{ $recipient->mesto_de }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.recipient.fields.stat') }}
                                    </th>
                                    <td>
                                        {{ $recipient->stat->stat_sk ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.recipients.index') }}">
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