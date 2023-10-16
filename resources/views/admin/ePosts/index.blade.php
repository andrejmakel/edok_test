@extends('layouts.admin')
@section('content')
<div class="content">
    @can('e_post_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.e-posts.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.ePost.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.ePost.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-EPost">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.ePost.fields.date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.ePost.fields.team') }}
                                </th>
                                <th>
                                    {{ trans('cruds.ePost.fields.sender') }}
                                </th>
                                <th>
                                    {{ trans('cruds.ePost.fields.scan') }}
                                </th>
                                <th>
                                    {{ trans('cruds.ePost.fields.annex') }}
                                </th>
                                <th>
                                    {{ trans('cruds.ePost.fields.file_short_text') }}
                                </th>
                                <th>
                                    {{ trans('cruds.ePost.fields.zadal') }}
                                </th>
                                <th>
                                    {{ trans('cruds.ePost.fields.accounting') }}
                                </th>
                                <th>
                                    {{ trans('cruds.ePost.fields.title') }}
                                </th>
                                <th>
                                    {{ trans('cruds.ePost.fields.dok_typ') }}
                                </th>
                                <th>
                                    {{ trans('cruds.ePost.fields.payment_info') }}
                                </th>
                                <th>
                                    {{ trans('cruds.ePost.fields.amount') }}
                                </th>
                                <th>
                                    {{ trans('cruds.ePost.fields.for_recipient') }}
                                </th>
                                <th>
                                    {{ trans('cruds.ePost.fields.paid') }}
                                </th>
                                <th>
                                    {{ trans('cruds.ePost.fields.due_date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.ePost.fields.send_email') }}
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                            <tr>
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
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($senders as $key => $item)
                                            <option value="{{ $item->sender }}">{{ $item->sender }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                </td>
                                <td>
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
                            </tr>
                        </thead>
                    </table>
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
@can('e_post_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.e-posts.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.e-posts.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'date', name: 'date' },
{ data: 'team_nazov', name: 'team.nazov' },
{ data: 'sender_sender', name: 'sender.sender' },
{ data: 'scan', name: 'scan', sortable: false, searchable: false },
{ data: 'annex', name: 'annex', sortable: false, searchable: false },
{ data: 'file_short_text', name: 'file_short_text' },
{ data: 'zadal_zadal', name: 'zadal.zadal' },
{ data: 'accounting', name: 'accounting' },
{ data: 'title', name: 'title' },
{ data: 'dok_typ_dok_typ_sk', name: 'dok_typ.dok_typ_sk' },
{ data: 'payment_info', name: 'payment_info' },
{ data: 'amount', name: 'amount' },
{ data: 'for_recipient', name: 'for_recipient' },
{ data: 'paid', name: 'paid' },
{ data: 'due_date', name: 'due_date' },
{ data: 'send_email', name: 'send_email' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-EPost').DataTable(dtOverrideGlobals);
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
});

</script>
@endsection