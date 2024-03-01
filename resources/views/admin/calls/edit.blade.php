@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.call.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.calls.update", [$call->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('date_time') ? 'has-error' : '' }}">
                            <label class="required" for="date_time">{{ trans('cruds.call.fields.date_time') }}</label>
                            <input class="form-control datetime" type="text" name="date_time" id="date_time" value="{{ old('date_time', $call->date_time) }}" required>
                            @if($errors->has('date_time'))
                                <span class="help-block" role="alert">{{ $errors->first('date_time') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.call.fields.date_time_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('duration') ? 'has-error' : '' }}">
                            <label for="duration">{{ trans('cruds.call.fields.duration') }}</label>
                            <input class="form-control" type="number" name="duration" id="duration" value="{{ old('duration', $call->duration) }}" step="1">
                            @if($errors->has('duration'))
                                <span class="help-block" role="alert">{{ $errors->first('duration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.call.fields.duration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('team') ? 'has-error' : '' }}">
                            <label for="team_id">{{ trans('cruds.call.fields.team') }}</label>
                            <select class="form-control select2" name="team_id" id="team_id">
                                @foreach($teams as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('team_id') ? old('team_id') : $call->team->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('team'))
                                <span class="help-block" role="alert">{{ $errors->first('team') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.call.fields.team_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('call_typ') ? 'has-error' : '' }}">
                            <label for="call_typ_id">{{ trans('cruds.call.fields.call_typ') }}</label>
                            <select class="form-control select2" name="call_typ_id" id="call_typ_id">
                                @foreach($call_typs as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('call_typ_id') ? old('call_typ_id') : $call->call_typ->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('call_typ'))
                                <span class="help-block" role="alert">{{ $errors->first('call_typ') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.call.fields.call_typ_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('cruds.call.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $call->name) }}">
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.call.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('company') ? 'has-error' : '' }}">
                            <label for="company">{{ trans('cruds.call.fields.company') }}</label>
                            <input class="form-control" type="text" name="company" id="company" value="{{ old('company', $call->company) }}">
                            @if($errors->has('company'))
                                <span class="help-block" role="alert">{{ $errors->first('company') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.call.fields.company_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('call_nr') ? 'has-error' : '' }}">
                            <label for="call_nr">{{ trans('cruds.call.fields.call_nr') }}</label>
                            <input class="form-control" type="text" name="call_nr" id="call_nr" value="{{ old('call_nr', $call->call_nr) }}">
                            @if($errors->has('call_nr'))
                                <span class="help-block" role="alert">{{ $errors->first('call_nr') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.call.fields.call_nr_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('short_notice') ? 'has-error' : '' }}">
                            <label for="short_notice">{{ trans('cruds.call.fields.short_notice') }}</label>
                            <input class="form-control" type="text" name="short_notice" id="short_notice" value="{{ old('short_notice', $call->short_notice) }}">
                            @if($errors->has('short_notice'))
                                <span class="help-block" role="alert">{{ $errors->first('short_notice') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.call.fields.short_notice_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('notice') ? 'has-error' : '' }}">
                            <label for="notice">{{ trans('cruds.call.fields.notice') }}</label>
                            <textarea class="form-control ckeditor" name="notice" id="notice">{!! old('notice', $call->notice) !!}</textarea>
                            @if($errors->has('notice'))
                                <span class="help-block" role="alert">{{ $errors->first('notice') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.call.fields.notice_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('zadal') ? 'has-error' : '' }}">
                            <label for="zadal_id">{{ trans('cruds.call.fields.zadal') }}</label>
                            <select class="form-control select2" name="zadal_id" id="zadal_id">
                                @foreach($zadals as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('zadal_id') ? old('zadal_id') : $call->zadal->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('zadal'))
                                <span class="help-block" role="alert">{{ $errors->first('zadal') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.call.fields.zadal_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('send_email') ? 'has-error' : '' }}">
                            <label for="send_email">{{ trans('cruds.call.fields.send_email') }}</label>
                            <input class="form-control date" type="text" name="send_email" id="send_email" value="{{ old('send_email', $call->send_email) }}">
                            @if($errors->has('send_email'))
                                <span class="help-block" role="alert">{{ $errors->first('send_email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.call.fields.send_email_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('reads') ? 'has-error' : '' }}">
                            <label for="reads">{{ trans('cruds.call.fields.read') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="reads[]" id="reads" multiple>
                                @foreach($reads as $id => $read)
                                    <option value="{{ $id }}" {{ (in_array($id, old('reads', [])) || $call->reads->contains($id)) ? 'selected' : '' }}>{{ $read }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('reads'))
                                <span class="help-block" role="alert">{{ $errors->first('reads') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.call.fields.read_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.calls.storeCKEditorImages') }}', true);
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