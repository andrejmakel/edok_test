@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('document_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.documents.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.document.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.document.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Document">
                            <thead>
                                <tr>
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
                            <tbody>
                                @foreach($documents as $key => $document)
                                    <tr data-entry-id="{{ $document->id }}">
                                        <td>
                                            {{ $document->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $document->date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $document->team->nazov ?? '' }}
                                        </td>
                                        <td>
                                            {{ $document->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $document->document_code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $document->dok_typ->dok_typ_sk ?? '' }}
                                        </td>
                                        <td>
                                            {{ $document->dok_kat->dok_kat ?? '' }}
                                        </td>
                                        <td>
                                            @if($document->document)
                                                <a href="{{ $document->document->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $document->file_short_text ?? '' }}
                                        </td>
                                        <td>
                                            {{ $document->payment_info ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $document->accounting ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $document->accounting ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $document->amount ?? '' }}
                                        </td>
                                        <td>
                                            {{ $document->paid ?? '' }}
                                        </td>
                                        <td>
                                            {{ $document->due_date ?? '' }}
                                        </td>
                                        <td>
                                            @can('document_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.documents.show', $document->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('document_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.documents.edit', $document->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('document_delete')
                                                <form action="{{ route('frontend.documents.destroy', $document->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('document_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.documents.massDestroy') }}",
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
  let table = $('.datatable-Document:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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