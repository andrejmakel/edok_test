@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.upload.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.uploads.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="date">{{ trans('cruds.upload.fields.date') }}</label>
                            <input class="form-control date" type="text" name="date" id="date" value="{{ old('date') }}">
                            @if($errors->has('date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.upload.fields.date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="team_id">{{ trans('cruds.upload.fields.team') }}</label>
                            <select class="form-control select2" name="team_id" id="team_id">
                                @foreach($teams as $id => $entry)
                                    <option value="{{ $id }}" {{ old('team_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('team'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('team') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.upload.fields.team_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="notice">{{ trans('cruds.upload.fields.notice') }}</label>
                            <input class="form-control" type="text" name="notice" id="notice" value="{{ old('notice', '') }}">
                            @if($errors->has('notice'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('notice') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.upload.fields.notice_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="upload_file">{{ trans('cruds.upload.fields.upload_file') }}</label>
                            <div class="needsclick dropzone" id="upload_file-dropzone">
                            </div>
                            @if($errors->has('upload_file'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('upload_file') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.upload.fields.upload_file_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ trans('cruds.upload.fields.description') }}</label>
                            <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>
                            @if($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.upload.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="accounting" value="0">
                                <input type="checkbox" name="accounting" id="accounting" value="1" {{ old('accounting', 0) == 1 || old('accounting') === null ? 'checked' : '' }}>
                                <label for="accounting">{{ trans('cruds.upload.fields.accounting') }}</label>
                            </div>
                            @if($errors->has('accounting'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('accounting') }}
                                </div>
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
    url: '{{ route('frontend.uploads.storeMedia') }}',
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