@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('call_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.calls.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.call.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.call.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Call">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.call.fields.date_time') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.call.fields.duration') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.call.fields.team') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.call.fields.call_typ') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.call.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.call.fields.company') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.call.fields.call_nr') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.call.fields.short_notice') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.call.fields.zadal') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.call.fields.send_email') }}
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
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
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
                                            @foreach($call_typs as $key => $item)
                                                <option value="{{ $item->call_typ }}">{{ $item->call_typ }}</option>
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
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($inputs as $key => $item)
                                                <option value="{{ $item->zadal }}">{{ $item->zadal }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($calls as $key => $call)
                                    <tr data-entry-id="{{ $call->id }}">
                                        <td>
                                            {{ $call->date_time ?? '' }}
                                        </td>
                                        <td>
                                            {{ $call->duration ?? '' }}
                                        </td>
                                        <td>
                                            {{ $call->team->nazov ?? '' }}
                                        </td>
                                        <td>
                                            {{ $call->call_typ->call_typ ?? '' }}
                                        </td>
                                        <td>
                                            {{ $call->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $call->company ?? '' }}
                                        </td>
                                        <td>
                                            {{ $call->call_nr ?? '' }}
                                        </td>
                                        <td>
                                            {{ $call->short_notice ?? '' }}
                                        </td>
                                        <td>
                                            {{ $call->zadal->zadal ?? '' }}
                                        </td>
                                        <td>
                                            {{ $call->send_email ?? '' }}
                                        </td>
                                        <td>
                                            @can('call_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.calls.show', $call->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('call_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.calls.edit', $call->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('call_delete')
                                                <form action="{{ route('frontend.calls.destroy', $call->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('call_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.calls.massDestroy') }}",
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
  let table = $('.datatable-Call:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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