@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.upload.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.uploads.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('accounting') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="accounting" value="0">
                                <input type="checkbox" name="accounting" id="accounting" value="1" {{ old('accounting', 0) == 1 || old('accounting') === null ? 'checked' : '' }}>
                                <label for="accounting" style="font-weight: 400">{{ trans('cruds.upload.fields.accounting') }}</label>
                            </div>
                            @if($errors->has('accounting'))
                                <span class="help-block" role="alert">{{ $errors->first('accounting') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.upload.fields.accounting_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('archive') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="archive" value="0">
                                <input type="checkbox" name="archive" id="archive" value="1" {{ old('archive', 0) == 1 ? 'checked' : '' }}>
                                <label for="archive" style="font-weight: 400">{{ trans('cruds.upload.fields.archive') }}</label>
                            </div>
                            @if($errors->has('archive'))
                                <span class="help-block" role="alert">{{ $errors->first('archive') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.upload.fields.archive_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('closed') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="closed" value="0">
                                <input type="checkbox" name="closed" id="closed" value="1" {{ old('closed', 0) == 1 ? 'checked' : '' }}>
                                <label for="closed" style="font-weight: 400">{{ trans('cruds.upload.fields.closed') }}</label>
                            </div>
                            @if($errors->has('closed'))
                                <span class="help-block" role="alert">{{ $errors->first('closed') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.upload.fields.closed_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                            <label class="required" for="date">{{ trans('cruds.upload.fields.date') }}</label>
                            <input class="form-control date" type="text" name="date" id="date" value="{{ old('date') }}" required>
                            @if($errors->has('date'))
                                <span class="help-block" role="alert">{{ $errors->first('date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.upload.fields.date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('team') ? 'has-error' : '' }}">
                            <label class="required" for="team_id">{{ trans('cruds.upload.fields.team') }}</label>
                            <select class="form-control select2" name="team_id" id="team_id" required>
                                @foreach($teams as $id => $entry)
                                    <option value="{{ $id }}" {{ old('team_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('team'))
                                <span class="help-block" role="alert">{{ $errors->first('team') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.upload.fields.team_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('notice') ? 'has-error' : '' }}">
                            <label for="notice">{{ trans('cruds.upload.fields.notice') }}</label>
                            <input class="form-control" type="text" name="notice" id="notice" value="{{ old('notice', '') }}">
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
                            <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>
                            @if($errors->has('description'))
                                <span class="help-block" role="alert">{{ $errors->first('description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.upload.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('reply') ? 'has-error' : '' }}">
                            <label for="reply">{{ trans('cruds.upload.fields.reply') }}</label>
                            <textarea class="form-control ckeditor" name="reply" id="reply">{!! old('reply') !!}</textarea>
                            @if($errors->has('reply'))
                                <span class="help-block" role="alert">{{ $errors->first('reply') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.upload.fields.reply_helper') }}</span>
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
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.uploads.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $upload->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection