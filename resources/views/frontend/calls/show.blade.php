@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.call.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.calls.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.call.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $call->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.call.fields.date_time') }}
                                    </th>
                                    <td>
                                        {{ $call->date_time }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.call.fields.duration') }}
                                    </th>
                                    <td>
                                        {{ $call->duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.call.fields.team') }}
                                    </th>
                                    <td>
                                        {{ $call->team->nazov ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.call.fields.call_typ') }}
                                    </th>
                                    <td>
                                        {{ $call->call_typ->call_typ ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.call.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $call->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.call.fields.company') }}
                                    </th>
                                    <td>
                                        {{ $call->company }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.call.fields.call_nr') }}
                                    </th>
                                    <td>
                                        {{ $call->call_nr }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.call.fields.short_notice') }}
                                    </th>
                                    <td>
                                        {{ $call->short_notice }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.call.fields.notice') }}
                                    </th>
                                    <td>
                                        {!! $call->notice !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.call.fields.zadal') }}
                                    </th>
                                    <td>
                                        {{ $call->zadal->zadal ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.call.fields.send_email') }}
                                    </th>
                                    <td>
                                        {{ $call->send_email }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.calls.index') }}">
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