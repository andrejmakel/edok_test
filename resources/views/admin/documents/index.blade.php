@extends('layouts.admin')
@section('content')
<div class="content">
    @can('document_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.documents.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.document.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.document.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Document">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.document.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.document.fields.date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.document.fields.team') }}
                                </th>
                                <th>
                                    {{ trans('cruds.document.fields.title') }}
                                </th>
                                <th>
                                    {{ trans('cruds.document.fields.document_code') }}
                                </th>
                                <th>
                                    {{ trans('cruds.document.fields.dok_typ') }}
                                </th>
                                <th>
                                    {{ trans('cruds.document.fields.dok_kat') }}
                                </th>
                                <th>
                                    {{ trans('cruds.document.fields.document') }}
                                </th>
                                <th>
                                    {{ trans('cruds.document.fields.file_short_text') }}
                                </th>
                                <th>
                                    {{ trans('cruds.document.fields.payment_info') }}
                                </th>
                                <th>
                                    {{ trans('cruds.document.fields.accounting') }}
                                </th>
                                <th>
                                    {{ trans('cruds.document.fields.amount') }}
                                </th>
                                <th>
                                    {{ trans('cruds.document.fields.paid') }}
                                </th>
                                <th>
                                    {{ trans('cruds.document.fields.due_date') }}
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
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($teams as $key => $item)
                                            <option value="{{ $item->nazov }}">{{ $item->nazov }}</option>
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
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($dok_typs as $key => $item)
                                            <option value="{{ $item->dok_typ_sk }}">{{ $item->dok_typ_sk }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($dok_kats as $key => $item)
                                            <option value="{{ $item->dok_kat }}">{{ $item->dok_kat }}</option>
                                        @endforeach
                                    </select>
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
                    </table>
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
@can('document_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.documents.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.documents.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'date', name: 'date' },
{ data: 'team_nazov', name: 'team.nazov' },
{ data: 'title', name: 'title' },
{ data: 'document_code', name: 'document_code' },
{ data: 'dok_typ_dok_typ_sk', name: 'dok_typ.dok_typ_sk' },
{ data: 'dok_kat_dok_kat', name: 'dok_kat.dok_kat' },
{ data: 'document', name: 'document', sortable: false, searchable: false },
{ data: 'file_short_text', name: 'file_short_text' },
{ data: 'payment_info', name: 'payment_info' },
{ data: 'accounting', name: 'accounting' },
{ data: 'amount', name: 'amount' },
{ data: 'paid', name: 'paid' },
{ data: 'due_date', name: 'due_date' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 2, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Document').DataTable(dtOverrideGlobals);
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
});

</script>
@endsection