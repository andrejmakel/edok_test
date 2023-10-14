<div class="content">
    @can('firma_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.firmas.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.firma.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.firma.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-kontaktFirmas">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.nasa') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.nazov') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.activ') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.idmmc') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.short_address') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.ic_dph_form') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.kontakt') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.telefon') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.firma.fields.e_schranka') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($firmas as $key => $firma)
                                    <tr data-entry-id="{{ $firma->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $firma->nasa->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $firma->nazov ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $firma->activ ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $firma->activ ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $firma->idmmc ?? '' }}
                                        </td>
                                        <td>
                                            {{ $firma->short_address ?? '' }}
                                        </td>
                                        <td>
                                            {{ $firma->ic_dph_form ?? '' }}
                                        </td>
                                        <td>
                                            {{ $firma->kontakt->priezvisko ?? '' }}
                                        </td>
                                        <td>
                                            {{ $firma->telefon ?? '' }}
                                        </td>
                                        <td>
                                            {{ $firma->e_schranka->splnomocnenec ?? '' }}
                                        </td>
                                        <td>
                                            @can('firma_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.firmas.show', $firma->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('firma_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.firmas.edit', $firma->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('firma_delete')
                                                <form action="{{ route('admin.firmas.destroy', $firma->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('firma_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.firmas.massDestroy') }}",
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
  let table = $('.datatable-kontaktFirmas:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection