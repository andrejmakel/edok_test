@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('invoice_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.invoices.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.invoice.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'Invoice', 'route' => 'admin.invoices.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.invoice.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Invoice">
                            <thead>
                                <tr>
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invoices as $key => $invoice)
                                    <tr data-entry-id="{{ $invoice->id }}">
                                        <td>
                                            {{ $invoice->team->nazov ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $invoice->visible ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $invoice->visible ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $invoice->date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $invoice->nasa->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $invoice->nasa->konto ?? '' }}
                                        </td>
                                        <td>
                                            {{ $invoice->nasa->iban ?? '' }}
                                        </td>
                                        <td>
                                            {{ $invoice->nasa->swift ?? '' }}
                                        </td>
                                        <td>
                                            {{ $invoice->typ->shortcut ?? '' }}
                                        </td>
                                        <td>
                                            {{ $invoice->number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $invoice->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $invoice->amount ?? '' }}
                                        </td>
                                        <td>
                                            {{ $invoice->payment_term ?? '' }}
                                        </td>
                                        <td>
                                            @if($invoice->file)
                                                <a href="{{ $invoice->file->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $invoice->pay_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $invoice->accounting_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $invoice->send_email ?? '' }}
                                        </td>
                                        <td>
                                            @can('invoice_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.invoices.show', $invoice->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('invoice_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.invoices.edit', $invoice->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('invoice_delete')
                                                <form action="{{ route('frontend.invoices.destroy', $invoice->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('invoice_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.invoices.massDestroy') }}",
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
  let table = $('.datatable-Invoice:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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