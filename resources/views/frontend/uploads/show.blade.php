@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.upload.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.uploads.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.upload.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $upload->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.upload.fields.date') }}
                                    </th>
                                    <td>
                                        {{ $upload->date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.upload.fields.team') }}
                                    </th>
                                    <td>
                                        {{ $upload->team->nazov ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.upload.fields.notice') }}
                                    </th>
                                    <td>
                                        {{ $upload->notice }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.upload.fields.upload_file') }}
                                    </th>
                                    <td>
                                        @foreach($upload->upload_file as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.upload.fields.description') }}
                                    </th>
                                    <td>
                                        {{ $upload->description }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.upload.fields.accounting') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $upload->accounting ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.uploads.index') }}">
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