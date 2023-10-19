@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.postform.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.postforms.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.postform.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $postform->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.postform.fields.postform_sk') }}
                                    </th>
                                    <td>
                                        {{ $postform->postform_sk }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.postform.fields.postform_icon') }}
                                    </th>
                                    <td>
                                        {{ $postform->postform_icon }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.postform.fields.title_de') }}
                                    </th>
                                    <td>
                                        {{ $postform->title_de }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.postform.fields.title_sk') }}
                                    </th>
                                    <td>
                                        {{ $postform->title_sk }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.postform.fields.title_en') }}
                                    </th>
                                    <td>
                                        {{ $postform->title_en }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.postforms.index') }}">
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