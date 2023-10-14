@extends('layouts.admin')
@section('content')
<div class="content">
    @can('firma_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.firmas.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.firma.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'Firma', 'route' => 'admin.firmas.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.firma.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Firma">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.nasa') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.nazov') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.activ') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.team') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.kontakt') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.idmmc') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.address') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.short_address') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.ico') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.dic') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.ic_dph') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.ic_dph_form') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.telefon') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.e_schranka') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.spracovanie') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.sprac_posty') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.ucto') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ucto.fields.tel') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ucto.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.bank') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.iban') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.swift_bic') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.orsr') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.zrsr') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.created_at') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.updated_at') }}
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
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($teams as $key => $item)
                                                <option value="{{ $item->nazov }}">{{ $item->nazov }}</option>
                                            @endforeach
                                        </select>
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
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
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
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($firmas as $key => $firma)
                                    <tr data-entry-id="{{ $firma->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $firma->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $firma->nasa->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $firma->nazov ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $firma->activ ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $firma->activ ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $firma->team->nazov ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($firma->kontakts as $key => $item)
                                                <span class="label label-info label-many">{{ $item->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $firma->idmmc ?? '' }}
                                        </td>
                                        <td>
                                            {{ $firma->address ?? '' }}
                                        </td>
                                        <td>
                                            {{ $firma->short_address ?? '' }}
                                        </td>
                                        <td>
                                            {{ $firma->ico ?? '' }}
                                        </td>
                                        <td>
                                            {{ $firma->dic ?? '' }}
                                        </td>
                                        <td>
                                            {{ $firma->ic_dph ?? '' }}
                                        </td>
                                        <td>
                                            {{ $firma->ic_dph_form ?? '' }}
                                        </td>
                                        <td>
                                            {{ $firma->telefon ?? '' }}
                                        </td>
                                        <td>
                                            {{ $firma->e_schranka->splnomocnenec ?? '' }}
                                        </td>
                                        <td>
                                            {{ $firma->spracovanie->popis ?? '' }}
                                        </td>
                                        <td>
                                            {{ $firma->sprac_posty ?? '' }}
                                        </td>
                                        <td>
                                            {{ $firma->ucto->uctuje ?? '' }}
                                        </td>
                                        <td>
                                            {{ $firma->ucto->tel ?? '' }}
                                        </td>
                                        <td>
                                            {{ $firma->ucto->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $firma->bank->bank ?? '' }}
                                        </td>
                                        <td>
                                            {{ $firma->iban ?? '' }}
                                        </td>
                                        <td>
                                            {{ $firma->swift_bic ?? '' }}
                                        </td>
                                        <td>
                                            @if($firma->orsr)
                                                <a href="{{ $firma->orsr->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($firma->zrsr)
                                                <a href="{{ $firma->zrsr->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $firma->created_at ?? '' }}
                                        </td>
                                        <td>
                                            {{ $firma->updated_at ?? '' }}
                                        </td>
                                        <td>
                                            @can('firma_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.firmas.show', $firma->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('firma_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.firmas.edit', $firma->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('firma_delete')
                                                <form action="{{ route('admin.firmas.destroy', $firma->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('firma_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.firmas.massDestroy') }}",
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
    order: [[ 2, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Firma:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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