@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.upload.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.uploads.update", [$upload->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                            <label for="date">{{ trans('cruds.upload.fields.date') }}</label>
                            <input class="form-control date" type="text" name="date" id="date" value="{{ old('date', $upload->date) }}">
                            @if($errors->has('date'))
                                <span class="help-block" role="alert">{{ $errors->first('date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.upload.fields.date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('team') ? 'has-error' : '' }}">
                            <label for="team_id">{{ trans('cruds.upload.fields.team') }}</label>
                            <select class="form-control select2" name="team_id" id="team_id">
                                @foreach($teams as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('team_id') ? old('team_id') : $upload->team->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('team'))
                                <span class="help-block" role="alert">{{ $errors->first('team') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.upload.fields.team_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('notice') ? 'has-error' : '' }}">
                            <label for="notice">{{ trans('cruds.upload.fields.notice') }}</label>
                            <input class="form-control" type="text" name="notice" id="notice" value="{{ old('notice', $upload->notice) }}">
                            @if($errors->has('notice'))
                                <span class="help-block" role="alert">{{ $errors->first('notice') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.upload.fields.notice_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('upload_file') ? 'has-error' : '' }}">
                            <label for="upload_file">{{ trans('cruds.upload.fields.upload_file') }}</label>
                            <div class="needsclick dropzone" id="upload_file-dropzone">
                            </div>
                            @if($errors->has('upload_file'))
                                <span class="help-block" role="alert">{{ $errors->first('upload_file') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.upload.fields.upload_file_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description">{{ trans('cruds.upload.fields.description') }}</label>
                            <textarea class="form-control" name="description" id="description">{{ old('description', $upload->description) }}</textarea>
                            @if($errors->has('description'))
                                <span class="help-block" role="alert">{{ $errors->first('description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.upload.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('accounting') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="accounting" value="0">
                                <input type="checkbox" name="accounting" id="accounting" value="1" {{ $upload->accounting || old('accounting', 0) === 1 ? 'checked' : '' }}>
                                <label for="accounting" style="font-weight: 400">{{ trans('cruds.upload.fields.accounting') }}</label>
                            </div>
                            @if($errors->has('accounting'))
                                <span class="help-block" role="alert">{{ $errors->first('accounting') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.upload.fields.accounting_helper') }}</span>
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
    var uploadedUploadFileMap = {}
Dropzone.options.uploadFileDropzone = {
    url: '{{ route('admin.uploads.storeMedia') }}',
    maxFilesize: 4, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 4
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="upload_file[]" value="' + response.name + '">')
      uploadedUploadFileMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedUploadFileMap[file.name]
      }
      $('form').find('input[name="upload_file[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($upload) && $upload->upload_file)
          var files =
            {!! json_encode($upload->upload_file) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="upload_file[]" value="' + file.file_name + '">')
            }
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