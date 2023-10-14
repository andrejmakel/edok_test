@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.outgoingPost.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.outgoing-posts.update", [$outgoingPost->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                            <label for="date">{{ trans('cruds.outgoingPost.fields.date') }}</label>
                            <input class="form-control date" type="text" name="date" id="date" value="{{ old('date', $outgoingPost->date) }}">
                            @if($errors->has('date'))
                                <span class="help-block" role="alert">{{ $errors->first('date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.outgoingPost.fields.date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('team') ? 'has-error' : '' }}">
                            <label for="team_id">{{ trans('cruds.outgoingPost.fields.team') }}</label>
                            <select class="form-control select2" name="team_id" id="team_id">
                                @foreach($teams as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('team_id') ? old('team_id') : $outgoingPost->team->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('team'))
                                <span class="help-block" role="alert">{{ $errors->first('team') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.outgoingPost.fields.team_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('recipient') ? 'has-error' : '' }}">
                            <label for="recipient_id">{{ trans('cruds.outgoingPost.fields.recipient') }}</label>
                            <select class="form-control select2" name="recipient_id" id="recipient_id">
                                @foreach($recipients as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('recipient_id') ? old('recipient_id') : $outgoingPost->recipient->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('recipient'))
                                <span class="help-block" role="alert">{{ $errors->first('recipient') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.outgoingPost.fields.recipient_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('out_envelope') ? 'has-error' : '' }}">
                            <label for="out_envelope">{{ trans('cruds.outgoingPost.fields.out_envelope') }}</label>
                            <div class="needsclick dropzone" id="out_envelope-dropzone">
                            </div>
                            @if($errors->has('out_envelope'))
                                <span class="help-block" role="alert">{{ $errors->first('out_envelope') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.outgoingPost.fields.out_envelope_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('out_scan') ? 'has-error' : '' }}">
                            <label for="out_scan">{{ trans('cruds.outgoingPost.fields.out_scan') }}</label>
                            <div class="needsclick dropzone" id="out_scan-dropzone">
                            </div>
                            @if($errors->has('out_scan'))
                                <span class="help-block" role="alert">{{ $errors->first('out_scan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.outgoingPost.fields.out_scan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('cost') ? 'has-error' : '' }}">
                            <label for="cost">{{ trans('cruds.outgoingPost.fields.cost') }}</label>
                            <input class="form-control" type="number" name="cost" id="cost" value="{{ old('cost', $outgoingPost->cost) }}" step="0.01">
                            @if($errors->has('cost'))
                                <span class="help-block" role="alert">{{ $errors->first('cost') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.outgoingPost.fields.cost_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('notify') ? 'has-error' : '' }}">
                            <label for="notify">{{ trans('cruds.outgoingPost.fields.notify') }}</label>
                            <textarea class="form-control" name="notify" id="notify">{{ old('notify', $outgoingPost->notify) }}</textarea>
                            @if($errors->has('notify'))
                                <span class="help-block" role="alert">{{ $errors->first('notify') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.outgoingPost.fields.notify_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    Dropzone.options.outEnvelopeDropzone = {
    url: '{{ route('admin.outgoing-posts.storeMedia') }}',
    maxFilesize: 4, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 4
    },
    success: function (file, response) {
      $('form').find('input[name="out_envelope"]').remove()
      $('form').append('<input type="hidden" name="out_envelope" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="out_envelope"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($outgoingPost) && $outgoingPost->out_envelope)
      var file = {!! json_encode($outgoingPost->out_envelope) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="out_envelope" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<script>
    Dropzone.options.outScanDropzone = {
    url: '{{ route('admin.outgoing-posts.storeMedia') }}',
    maxFilesize: 4, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 4
    },
    success: function (file, response) {
      $('form').find('input[name="out_scan"]').remove()
      $('form').append('<input type="hidden" name="out_scan" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="out_scan"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($outgoingPost) && $outgoingPost->out_scan)
      var file = {!! json_encode($outgoingPost->out_scan) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="out_scan" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection