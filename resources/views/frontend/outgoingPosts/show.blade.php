@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.outgoingPost.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.outgoing-posts.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.outgoingPost.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $outgoingPost->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.outgoingPost.fields.date') }}
                                    </th>
                                    <td>
                                        {{ $outgoingPost->date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.outgoingPost.fields.team') }}
                                    </th>
                                    <td>
                                        {{ $outgoingPost->team->nazov ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.outgoingPost.fields.recipient') }}
                                    </th>
                                    <td>
                                        {{ $outgoingPost->recipient->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.outgoingPost.fields.out_envelope') }}
                                    </th>
                                    <td>
                                        @if($outgoingPost->out_envelope)
                                            <a href="{{ $outgoingPost->out_envelope->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.outgoingPost.fields.out_scan') }}
                                    </th>
                                    <td>
                                        @if($outgoingPost->out_scan)
                                            <a href="{{ $outgoingPost->out_scan->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.outgoingPost.fields.cost') }}
                                    </th>
                                    <td>
                                        {{ $outgoingPost->cost }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.outgoingPost.fields.notify') }}
                                    </th>
                                    <td>
                                        {{ $outgoingPost->notify }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.outgoing-posts.index') }}">
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