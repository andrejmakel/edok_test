@extends('layouts.admin')
@section('content')
<div class="content">
    @can('status_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.statuses.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.status.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'Status', 'route' => 'admin.statuses.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.status.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Status">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.status.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.status.fields.status_icon') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.status.fields.title_de') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.status.fields.title_sk') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.status.fields.title_en') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($statuses as $key => $status)
                                    <tr data-entry-id="{{ $status->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $status->status ?? '' }}
                                        </td>
                                        <td>
                                            {{ $status->status_icon ?? '' }}
                                        </td>
                                        <td>
                                            {{ $status->title_de ?? '' }}
                                        </td>
                                        <td>
                                            {{ $status->title_sk ?? '' }}
                                        </td>
                                        <td>
                                            {{ $status->title_en ?? '' }}
                                        </td>
                                        <td>
                                            @can('status_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.statuses.show', $status->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('status_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.statuses.edit', $status->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('status_delete')
                                                <form action="{{ route('admin.statuses.destroy', $status->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('status_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.statuses.massDestroy') }}",
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
  let table = $('.datatable-Status:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection