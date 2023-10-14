@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('e_post_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.e-posts.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.ePost.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.ePost.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-EPost">
                            <thead>
                                <tr>
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
                            <tbody>
                                @foreach($ePosts as $key => $ePost)
                                    <tr data-entry-id="{{ $ePost->id }}">
                                        <td>
                                            {{ $ePost->date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $ePost->team->nazov ?? '' }}
                                        </td>
                                        <td>
                                            {{ $ePost->sender->sender ?? '' }}
                                        </td>
                                        <td>
                                            @if($ePost->scan)
                                                <a href="{{ $ePost->scan->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @foreach($ePost->annex as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $ePost->file_short_text ?? '' }}
                                        </td>
                                        <td>
                                            {{ $ePost->zadal->zadal ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $ePost->accounting ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $ePost->accounting ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $ePost->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $ePost->dok_typ->dok_typ_sk ?? '' }}
                                        </td>
                                        <td>
                                            {{ $ePost->payment_info ?? '' }}
                                        </td>
                                        <td>
                                            {{ $ePost->amount ?? '' }}
                                        </td>
                                        <td>
                                            {{ $ePost->for_recipient ?? '' }}
                                        </td>
                                        <td>
                                            {{ $ePost->paid ?? '' }}
                                        </td>
                                        <td>
                                            {{ $ePost->due_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $ePost->send_email ?? '' }}
                                        </td>
                                        <td>
                                            @can('e_post_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.e-posts.show', $ePost->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('e_post_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.e-posts.edit', $ePost->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('e_post_delete')
                                                <form action="{{ route('frontend.e-posts.destroy', $ePost->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('e_post_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.e-posts.massDestroy') }}",
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
  let table = $('.datatable-EPost:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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