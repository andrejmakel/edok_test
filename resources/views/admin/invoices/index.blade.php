@extends('layouts.admin')
@section('content')
<div class="content">
    @can('invoice_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.invoices.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.invoice.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'Invoice', 'route' => 'admin.invoices.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.invoice.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Invoice">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.invoice.fields.team') }}
                                </th>
                                <th>
                                    {{ trans('cruds.invoice.fields.visible') }}
                                </th>
                                <th>
                                    {{ trans('cruds.invoice.fields.date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.invoice.fields.nasa') }}
                                </th>
                                <th>
                                    {{ trans('cruds.nasa.fields.konto') }}
                                </th>
                                <th>
                                    {{ trans('cruds.nasa.fields.iban') }}
                                </th>
                                <th>
                                    {{ trans('cruds.nasa.fields.swift') }}
                                </th>
                                <th>
                                    {{ trans('cruds.invoice.fields.typ') }}
                                </th>
                                <th>
                                    {{ trans('cruds.invoice.fields.number') }}
                                </th>
                                <th>
                                    {{ trans('cruds.invoice.fields.name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.invoice.fields.amount') }}
                                </th>
                                <th>
                                    {{ trans('cruds.invoice.fields.payment_term') }}
                                </th>
                                <th>
                                    {{ trans('cruds.invoice.fields.file') }}
                                </th>
                                <th>
                                    {{ trans('cruds.invoice.fields.pay_date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.invoice.fields.accounting_date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.invoice.fields.send_email') }}
                                </th>
                                <th>
                                    {{ trans('cruds.invoice.fields.paid') }}
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                            <tr>
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
                                </td>
                                <td>
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
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($invoice_typs as $key => $item)
                                            <option value="{{ $item->shortcut }}">{{ $item->shortcut }}</option>
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
                                </td>
                                <td>
                                </td>
                                <td>
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
@can('invoice_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.invoices.massDestroy') }}",
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
    ajax: "{{ route('admin.invoices.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'team_nazov', name: 'team.nazov' },
{ data: 'visible', name: 'visible' },
{ data: 'date', name: 'date' },
{ data: 'nasa_name', name: 'nasa.name' },
{ data: 'nasa.konto', name: 'nasa.konto' },
{ data: 'nasa.iban', name: 'nasa.iban' },
{ data: 'nasa.swift', name: 'nasa.swift' },
{ data: 'typ_shortcut', name: 'typ.shortcut' },
{ data: 'number', name: 'number' },
{ data: 'name', name: 'name' },
{ data: 'amount', name: 'amount' },
{ data: 'payment_term', name: 'payment_term' },
{ data: 'file', name: 'file', sortable: false, searchable: false },
{ data: 'pay_date', name: 'pay_date' },
{ data: 'accounting_date', name: 'accounting_date' },
{ data: 'send_email', name: 'send_email' },
{ data: 'paid', name: 'paid' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 3, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Invoice').DataTable(dtOverrideGlobals);
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