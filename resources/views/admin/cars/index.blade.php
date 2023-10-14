@extends('layouts.admin')
@section('content')
<div class="content">
    @can('car_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.cars.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.car.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.car.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Car">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.car.fields.team') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.car.fields.typ') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.car.fields.znacka') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.car.fields.model') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.car.fields.ecv') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.car.fields.stk_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.car.fields.pzp_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.car.fields.kasko_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.car.fields.pzp_poistovna') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.car.fields.kasko_poistovna') }}
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
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($typs as $key => $item)
                                                <option value="{{ $item->typ_sk }}">{{ $item->typ_sk }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($znackas as $key => $item)
                                                <option value="{{ $item->znacka }}">{{ $item->znacka }}</option>
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
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($insurances as $key => $item)
                                                <option value="{{ $item->nazov }}">{{ $item->nazov }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($insurances as $key => $item)
                                                <option value="{{ $item->nazov }}">{{ $item->nazov }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cars as $key => $car)
                                    <tr data-entry-id="{{ $car->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $car->team->nazov ?? '' }}
                                        </td>
                                        <td>
                                            {{ $car->typ->typ_sk ?? '' }}
                                        </td>
                                        <td>
                                            {{ $car->znacka->znacka ?? '' }}
                                        </td>
                                        <td>
                                            {{ $car->model ?? '' }}
                                        </td>
                                        <td>
                                            {{ $car->ecv ?? '' }}
                                        </td>
                                        <td>
                                            {{ $car->stk_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $car->pzp_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $car->kasko_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $car->pzp_poistovna->nazov ?? '' }}
                                        </td>
                                        <td>
                                            {{ $car->kasko_poistovna->nazov ?? '' }}
                                        </td>
                                        <td>
                                            @can('car_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.cars.show', $car->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('car_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.cars.edit', $car->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('car_delete')
                                                <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('car_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.cars.massDestroy') }}",
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
  let table = $('.datatable-Car:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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