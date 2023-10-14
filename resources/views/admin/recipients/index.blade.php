@extends('layouts.admin')
@section('content')
<div class="content">
    @can('recipient_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.recipients.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.recipient.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'Recipient', 'route' => 'admin.recipients.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.recipient.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Recipient">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.recipient.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.recipient.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.recipient.fields.street_nr') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.recipient.fields.psc') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.recipient.fields.mesto_sk') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.recipient.fields.stat') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recipients as $key => $recipient)
                                    <tr data-entry-id="{{ $recipient->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $recipient->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $recipient->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $recipient->street_nr ?? '' }}
                                        </td>
                                        <td>
                                            {{ $recipient->psc ?? '' }}
                                        </td>
                                        <td>
                                            {{ $recipient->mesto_sk ?? '' }}
                                        </td>
                                        <td>
                                            {{ $recipient->stat->stat_sk ?? '' }}
                                        </td>
                                        <td>
                                            @can('recipient_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.recipients.show', $recipient->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('recipient_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.recipients.edit', $recipient->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('recipient_delete')
                                                <form action="{{ route('admin.recipients.destroy', $recipient->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('recipient_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.recipients.massDestroy') }}",
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
  let table = $('.datatable-Recipient:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection