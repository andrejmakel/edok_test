@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.status.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.statuses.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.status.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $status->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.status.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $status->status }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.status.fields.status_icon') }}
                                    </th>
                                    <td>
                                        {{ $status->status_icon }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.status.fields.title_de') }}
                                    </th>
                                    <td>
                                        {{ $status->title_de }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.status.fields.title_sk') }}
                                    </th>
                                    <td>
                                        {{ $status->title_sk }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.status.fields.title_en') }}
                                    </th>
                                    <td>
                                        {{ $status->title_en }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.statuses.index') }}">
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
                        <a href="#status_posts" aria-controls="status_posts" role="tab" data-toggle="tab">
                            {{ trans('cruds.post.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="status_posts">
                        @includeIf('admin.statuses.relationships.statusPosts', ['posts' => $status->statusPosts])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection