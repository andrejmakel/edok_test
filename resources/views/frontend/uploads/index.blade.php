@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('upload_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.uploads.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.upload.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.upload.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Upload">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.upload.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.upload.fields.accounting') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.upload.fields.archive') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.upload.fields.closed') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.upload.fields.date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.upload.fields.team') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.upload.fields.notice') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.upload.fields.upload_file') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.upload.fields.description') }}
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
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($uploads as $key => $upload)
                                    <tr data-entry-id="{{ $upload->id }}">
                                        <td>
                                            {{ $upload->id ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $upload->accounting ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $upload->accounting ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $upload->archive ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $upload->archive ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $upload->closed ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $upload->closed ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $upload->date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $upload->team->nazov ?? '' }}
                                        </td>
                                        <td>
                                            {{ $upload->notice ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($upload->upload_file as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $upload->description ?? '' }}
                                        </td>
                                        <td>
                                            @can('upload_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.uploads.show', $upload->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('upload_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.uploads.edit', $upload->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('upload_delete')
                                                <form action="{{ route('frontend.uploads.destroy', $upload->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('upload_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.uploads.massDestroy') }}",
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
  let table = $('.datatable-Upload:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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