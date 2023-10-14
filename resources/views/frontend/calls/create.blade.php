@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.call.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.calls.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="date_time">{{ trans('cruds.call.fields.date_time') }}</label>
                            <input class="form-control datetime" type="text" name="date_time" id="date_time" value="{{ old('date_time') }}" required>
                            @if($errors->has('date_time'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date_time') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.call.fields.date_time_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="duration">{{ trans('cruds.call.fields.duration') }}</label>
                            <input class="form-control" type="number" name="duration" id="duration" value="{{ old('duration', '') }}" step="1">
                            @if($errors->has('duration'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('duration') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.call.fields.duration_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="team_id">{{ trans('cruds.call.fields.team') }}</label>
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
                            <span class="help-block">{{ trans('cruds.call.fields.team_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="call_typ_id">{{ trans('cruds.call.fields.call_typ') }}</label>
                            <select class="form-control select2" name="call_typ_id" id="call_typ_id">
                                @foreach($call_typs as $id => $entry)
                                    <option value="{{ $id }}" {{ old('call_typ_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('call_typ'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('call_typ') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.call.fields.call_typ_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="name">{{ trans('cruds.call.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}">
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.call.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="company">{{ trans('cruds.call.fields.company') }}</label>
                            <input class="form-control" type="text" name="company" id="company" value="{{ old('company', '') }}">
                            @if($errors->has('company'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('company') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.call.fields.company_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="call_nr">{{ trans('cruds.call.fields.call_nr') }}</label>
                            <input class="form-control" type="text" name="call_nr" id="call_nr" value="{{ old('call_nr', '') }}">
                            @if($errors->has('call_nr'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('call_nr') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.call.fields.call_nr_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="short_notice">{{ trans('cruds.call.fields.short_notice') }}</label>
                            <input class="form-control" type="text" name="short_notice" id="short_notice" value="{{ old('short_notice', '') }}">
                            @if($errors->has('short_notice'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('short_notice') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.call.fields.short_notice_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="notice">{{ trans('cruds.call.fields.notice') }}</label>
                            <textarea class="form-control ckeditor" name="notice" id="notice">{!! old('notice') !!}</textarea>
                            @if($errors->has('notice'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('notice') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.call.fields.notice_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="zadal_id">{{ trans('cruds.call.fields.zadal') }}</label>
                            <select class="form-control select2" name="zadal_id" id="zadal_id">
                                @foreach($zadals as $id => $entry)
                                    <option value="{{ $id }}" {{ old('zadal_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('zadal'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('zadal') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.call.fields.zadal_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="send_email">{{ trans('cruds.call.fields.send_email') }}</label>
                            <input class="form-control date" type="text" name="send_email" id="send_email" value="{{ old('send_email') }}">
                            @if($errors->has('send_email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('send_email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.call.fields.send_email_helper') }}</span>
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
                xhr.open('POST', '{{ route('frontend.calls.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $call->id ?? 0 }}');
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