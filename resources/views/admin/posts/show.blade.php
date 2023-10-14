@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.post.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.posts.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.post.fields.date') }}
                                    </th>
                                    <td>
                                        {{ $post->date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.post.fields.team') }}
                                    </th>
                                    <td>
                                        {{ $post->team->nazov ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.post.fields.post_nr') }}
                                    </th>
                                    <td>
                                        {{ $post->post_nr }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.post.fields.sender') }}
                                    </th>
                                    <td>
                                        {{ $post->sender->sender ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.post.fields.post_form') }}
                                    </th>
                                    <td>
                                        {{ $post->post_form->postform_sk ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.post.fields.envelope') }}
                                    </th>
                                    <td>
                                        @if($post->envelope)
                                            <a href="{{ $post->envelope->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.post.fields.scan') }}
                                    </th>
                                    <td>
                                        @if($post->scan)
                                            <a href="{{ $post->scan->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.post.fields.title') }}
                                    </th>
                                    <td>
                                        {{ $post->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.post.fields.file_short_text') }}
                                    </th>
                                    <td>
                                        {{ $post->file_short_text }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.post.fields.notice') }}
                                    </th>
                                    <td>
                                        {!! $post->notice !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.post.fields.zadal') }}
                                    </th>
                                    <td>
                                        {{ $post->zadal->zadal ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.post.fields.accounting') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $post->accounting ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.post.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $post->status->status ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.post.fields.status_date') }}
                                    </th>
                                    <td>
                                        {{ $post->status_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.post.fields.customer_query') }}
                                    </th>
                                    <td>
                                        {{ $post->customer_query->customer_query ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.post.fields.customer_notice') }}
                                    </th>
                                    <td>
                                        {{ $post->customer_notice }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.post.fields.processed') }}
                                    </th>
                                    <td>
                                        {{ $post->processed->processed ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.post.fields.processed_at') }}
                                    </th>
                                    <td>
                                        {{ $post->processed_at }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.post.fields.send_email') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $post->send_email ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.post.fields.dok_typ') }}
                                    </th>
                                    <td>
                                        {{ $post->dok_typ->dok_typ_sk ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.post.fields.payment_info') }}
                                    </th>
                                    <td>
                                        {{ $post->payment_info }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.post.fields.amount') }}
                                    </th>
                                    <td>
                                        {{ $post->amount }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.post.fields.iban') }}
                                    </th>
                                    <td>
                                        {{ $post->iban }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.post.fields.swift') }}
                                    </th>
                                    <td>
                                        {{ $post->swift }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.post.fields.vs') }}
                                    </th>
                                    <td>
                                        {{ $post->vs }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.post.fields.ss') }}
                                    </th>
                                    <td>
                                        {{ $post->ss }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.post.fields.ks') }}
                                    </th>
                                    <td>
                                        {{ $post->ks }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.post.fields.for_recipient') }}
                                    </th>
                                    <td>
                                        {{ $post->for_recipient }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.post.fields.paid') }}
                                    </th>
                                    <td>
                                        {{ $post->paid }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.post.fields.due_date') }}
                                    </th>
                                    <td>
                                        {{ $post->due_date }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.posts.index') }}">
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