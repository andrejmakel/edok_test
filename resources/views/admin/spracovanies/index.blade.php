@extends('layouts.admin')
@section('content')
<div class="content">
    @can('spracovany_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.spracovanies.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.spracovany.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'Spracovany', 'route' => 'admin.spracovanies.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.spracovany.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Spracovany">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.spracovany.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.spracovany.fields.popis') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.spracovany.fields.popis_de') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.spracovany.fields.popis_en') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($spracovanies as $key => $spracovany)
                                    <tr data-entry-id="{{ $spracovany->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $spracovany->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $spracovany->popis ?? '' }}
                                        </td>
                                        <td>
                                            {{ $spracovany->popis_de ?? '' }}
                                        </td>
                                        <td>
                                            {{ $spracovany->popis_en ?? '' }}
                                        </td>
                                        <td>
                                            @can('spracovany_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.spracovanies.show', $spracovany->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('spracovany_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.spracovanies.edit', $spracovany->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('spracovany_delete')
                                                <form action="{{ route('admin.spracovanies.destroy', $spracovany->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('spracovany_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.spracovanies.massDestroy') }}",
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
  let table = $('.datatable-Spracovany:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection