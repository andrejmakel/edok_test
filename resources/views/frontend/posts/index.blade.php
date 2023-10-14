@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('post_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.posts.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.post.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.post.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Post">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.post.fields.date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.post.fields.team') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.post.fields.post_nr') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.post.fields.sender') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.post.fields.post_form') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.postform.fields.postform_sk') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.post.fields.envelope') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.post.fields.scan') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.post.fields.title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.post.fields.file_short_text') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.post.fields.accounting') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.post.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.post.fields.send_email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.post.fields.dok_typ') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.post.fields.payment_info') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.post.fields.paid') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.post.fields.due_date') }}
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
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
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
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($postforms as $key => $item)
                                                <option value="{{ $item->postform_sk }}">{{ $item->postform_sk }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
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
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($statuses as $key => $item)
                                                <option value="{{ $item->status }}">{{ $item->status }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
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
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $key => $post)
                                    <tr data-entry-id="{{ $post->id }}">
                                        <td>
                                            {{ $post->date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $post->team->nazov ?? '' }}
                                        </td>
                                        <td>
                                            {{ $post->post_nr ?? '' }}
                                        </td>
                                        <td>
                                            {{ $post->sender->sender ?? '' }}
                                        </td>
                                        <td>
                                            {{ $post->post_form->postform_sk ?? '' }}
                                        </td>
                                        <td>
                                            {{ $post->post_form->postform_sk ?? '' }}
                                        </td>
                                        <td>
                                            @if($post->envelope)
                                                <a href="{{ $post->envelope->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($post->scan)
                                                <a href="{{ $post->scan->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $post->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $post->file_short_text ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $post->accounting ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $post->accounting ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $post->status->status ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $post->send_email ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $post->send_email ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $post->dok_typ->dok_typ_sk ?? '' }}
                                        </td>
                                        <td>
                                            {{ $post->payment_info ?? '' }}
                                        </td>
                                        <td>
                                            {{ $post->paid ?? '' }}
                                        </td>
                                        <td>
                                            {{ $post->due_date ?? '' }}
                                        </td>
                                        <td>
                                            @can('post_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.posts.show', $post->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('post_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.posts.edit', $post->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('post_delete')
                                                <form action="{{ route('frontend.posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('post_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.posts.massDestroy') }}",
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
  let table = $('.datatable-Post:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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