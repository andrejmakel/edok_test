@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.sender.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.senders.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sender.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $sender->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sender.fields.sender') }}
                                    </th>
                                    <td>
                                        {{ $sender->sender }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sender.fields.sender_de') }}
                                    </th>
                                    <td>
                                        {{ $sender->sender_de }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sender.fields.sender_en') }}
                                    </th>
                                    <td>
                                        {{ $sender->sender_en }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.senders.index') }}">
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
                        <a href="#sender_posts" aria-controls="sender_posts" role="tab" data-toggle="tab">
                            {{ trans('cruds.post.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#sender_e_posts" aria-controls="sender_e_posts" role="tab" data-toggle="tab">
                            {{ trans('cruds.ePost.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="sender_posts">
                        @includeIf('admin.senders.relationships.senderPosts', ['posts' => $sender->senderPosts])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="sender_e_posts">
                        @includeIf('admin.senders.relationships.senderEPosts', ['ePosts' => $sender->senderEPosts])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection