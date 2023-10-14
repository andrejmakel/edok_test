<div class="content">
    @can('outgoing_post_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.outgoing-posts.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.outgoingPost.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.outgoingPost.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-recipientOutgoingPosts">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.outgoingPost.fields.date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.outgoingPost.fields.team') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.outgoingPost.fields.recipient') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.outgoingPost.fields.out_envelope') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.outgoingPost.fields.out_scan') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.outgoingPost.fields.cost') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($outgoingPosts as $key => $outgoingPost)
                                    <tr data-entry-id="{{ $outgoingPost->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $outgoingPost->date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $outgoingPost->team->nazov ?? '' }}
                                        </td>
                                        <td>
                                            {{ $outgoingPost->recipient->name ?? '' }}
                                        </td>
                                        <td>
                                            @if($outgoingPost->out_envelope)
                                                <a href="{{ $outgoingPost->out_envelope->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($outgoingPost->out_scan)
                                                <a href="{{ $outgoingPost->out_scan->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $outgoingPost->cost ?? '' }}
                                        </td>
                                        <td>
                                            @can('outgoing_post_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.outgoing-posts.show', $outgoingPost->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('outgoing_post_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.outgoing-posts.edit', $outgoingPost->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('outgoing_post_delete')
                                                <form action="{{ route('admin.outgoing-posts.destroy', $outgoingPost->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('outgoing_post_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.outgoing-posts.massDestroy') }}",
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
  let table = $('.datatable-recipientOutgoingPosts:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection