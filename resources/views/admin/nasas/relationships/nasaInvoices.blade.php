<div class="content">
    @can('invoice_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.invoices.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.invoice.title_singular') }}
                </a>
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

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-nasaInvoices">
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
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invoices as $key => $invoice)
                                    <tr data-entry-id="{{ $invoice->id }}">
                                        <td>

                                        </td>
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
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.invoices.show', $invoice->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('invoice_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.invoices.edit', $invoice->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('invoice_delete')
                                                <form action="{{ route('admin.invoices.destroy', $invoice->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('invoice_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.invoices.massDestroy') }}",
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
    order: [[ 3, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-nasaInvoices:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection