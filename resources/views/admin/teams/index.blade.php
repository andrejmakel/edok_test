@extends('layouts.admin')
@section('content')
<div class="content">
    @can('team_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.teams.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.team.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'Team', 'route' => 'admin.teams.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.team.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Team">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.team.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.team.fields.active') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.team.fields.archiv') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.team.fields.nazov') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.team.fields.short_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.team.fields.superfaktura') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.team.fields.nasa') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.team.fields.id_mmc') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.team.fields.id_pohoda') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.team.fields.date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.team.fields.contact') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.team.fields.address') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.team.fields.sidlo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.team.fields.ico') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.team.fields.dic') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.team.fields.ic_dph') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.team.fields.ic_dph_7_a') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.team.fields.phone') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.team.fields.e_schranka') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.team.fields.spracovanie') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.team.fields.send_address') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.team.fields.acc_company') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.team.fields.ucto') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ucto.fields.tel') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ucto.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.team.fields.bank') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.team.fields.iban') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.team.fields.swift_bic') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.team.fields.orsr') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.team.fields.zrsr') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($nasas as $key => $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($users as $key => $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($sidlos as $key => $item)
                                                <option value="{{ $item->sidlo }}">{{ $item->sidlo }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($e_schrankas as $key => $item)
                                                <option value="{{ $item->splnomocnenec }}">{{ $item->splnomocnenec }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($spracovanies as $key => $item)
                                                <option value="{{ $item->popis }}">{{ $item->popis }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($acc_companies as $key => $item)
                                                <option value="{{ $item->acc_company }}">{{ $item->acc_company }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($uctos as $key => $item)
                                                <option value="{{ $item->uctuje }}">{{ $item->uctuje }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($banks as $key => $item)
                                                <option value="{{ $item->bank }}">{{ $item->bank }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($teams as $key => $team)
                                    <tr data-entry-id="{{ $team->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $team->id ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $team->active ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $team->active ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $team->archiv ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $team->archiv ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $team->nazov ?? '' }}
                                        </td>
                                        <td>
                                            {{ $team->short_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $team->superfaktura ?? '' }}
                                        </td>
                                        <td>
                                            {{ $team->nasa->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $team->id_mmc ?? '' }}
                                        </td>
                                        <td>
                                            {{ $team->id_pohoda ?? '' }}
                                        </td>
                                        <td>
                                            {{ $team->date ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($team->contacts as $key => $item)
                                                <span class="label label-info label-many">{{ $item->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $team->address ?? '' }}
                                        </td>
                                        <td>
                                            {{ $team->sidlo->sidlo ?? '' }}
                                        </td>
                                        <td>
                                            {{ $team->ico ?? '' }}
                                        </td>
                                        <td>
                                            {{ $team->dic ?? '' }}
                                        </td>
                                        <td>
                                            {{ $team->ic_dph ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $team->ic_dph_7_a ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $team->ic_dph_7_a ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $team->phone ?? '' }}
                                        </td>
                                        <td>
                                            {{ $team->e_schranka->splnomocnenec ?? '' }}
                                        </td>
                                        <td>
                                            {{ $team->spracovanie->popis ?? '' }}
                                        </td>
                                        <td>
                                            {{ $team->send_address ?? '' }}
                                        </td>
                                        <td>
                                            {{ $team->acc_company->acc_company ?? '' }}
                                        </td>
                                        <td>
                                            {{ $team->ucto->uctuje ?? '' }}
                                        </td>
                                        <td>
                                            {{ $team->ucto->tel ?? '' }}
                                        </td>
                                        <td>
                                            {{ $team->ucto->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $team->bank->bank ?? '' }}
                                        </td>
                                        <td>
                                            {{ $team->iban ?? '' }}
                                        </td>
                                        <td>
                                            {{ $team->swift_bic ?? '' }}
                                        </td>
                                        <td>
                                            @if($team->orsr)
                                                <a href="{{ $team->orsr->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($team->zrsr)
                                                <a href="{{ $team->zrsr->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @can('team_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.teams.show', $team->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('team_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.teams.edit', $team->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('team_delete')
                                                <form action="{{ route('admin.teams.destroy', $team->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('team_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.teams.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Team:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection