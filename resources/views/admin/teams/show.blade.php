@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.team.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.teams.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $team->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.nazov') }}
                                    </th>
                                    <td>
                                        {{ $team->nazov }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.short_name') }}
                                    </th>
                                    <td>
                                        {{ $team->short_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.activ') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $team->activ ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.date') }}
                                    </th>
                                    <td>
                                        {{ $team->date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.team.fields.mmc') }}
                                    </th>
                                    <td>
                                        {{ $team->mmc }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.teams.index') }}">
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
                        <a href="#team_users" aria-controls="team_users" role="tab" data-toggle="tab">
                            {{ trans('cruds.user.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="team_users">
                        @includeIf('admin.teams.relationships.teamUsers', ['users' => $team->teamUsers])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection