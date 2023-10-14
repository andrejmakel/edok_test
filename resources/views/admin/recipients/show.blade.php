@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.recipient.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.recipients.index') }}">
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
                            <a class="btn btn-default" href="{{ route('admin.recipients.index') }}">
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
                        <a href="#recipient_outgoing_posts" aria-controls="recipient_outgoing_posts" role="tab" data-toggle="tab">
                            {{ trans('cruds.outgoingPost.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="recipient_outgoing_posts">
                        @includeIf('admin.recipients.relationships.recipientOutgoingPosts', ['outgoingPosts' => $recipient->recipientOutgoingPosts])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection