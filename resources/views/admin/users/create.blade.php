@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.users.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('greeting') ? 'has-error' : '' }}">
                            <label for="greeting">{{ trans('cruds.user.fields.greeting') }}</label>
                            <input class="form-control" type="text" name="greeting" id="greeting" value="{{ old('greeting', '') }}">
                            @if($errors->has('greeting'))
                                <span class="help-block" role="alert">{{ $errors->first('greeting') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.greeting_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" required>
                            @if($errors->has('email'))
                                <span class="help-block" role="alert">{{ $errors->first('email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('notifications') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="notifications" value="0">
                                <input type="checkbox" name="notifications" id="notifications" value="1" {{ old('notifications', 0) == 1 ? 'checked' : '' }}>
                                <label for="notifications" style="font-weight: 400">{{ trans('cruds.user.fields.notifications') }}</label>
                            </div>
                            @if($errors->has('notifications'))
                                <span class="help-block" role="alert">{{ $errors->first('notifications') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.notifications_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                            <input class="form-control" type="password" name="password" id="password" required>
                            @if($errors->has('password'))
                                <span class="help-block" role="alert">{{ $errors->first('password') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('approved') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="approved" value="0">
                                <input type="checkbox" name="approved" id="approved" value="1" {{ old('approved', 0) == 1 ? 'checked' : '' }}>
                                <label for="approved" style="font-weight: 400">{{ trans('cruds.user.fields.approved') }}</label>
                            </div>
                            @if($errors->has('approved'))
                                <span class="help-block" role="alert">{{ $errors->first('approved') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.approved_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                            <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="roles[]" id="roles" multiple required>
                                @foreach($roles as $id => $role)
                                    <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $role }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('roles'))
                                <span class="help-block" role="alert">{{ $errors->first('roles') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('teams') ? 'has-error' : '' }}">
                            <label for="teams">{{ trans('cruds.user.fields.team') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="teams[]" id="teams" multiple>
                                @foreach($teams as $id => $team)
                                    <option value="{{ $id }}" {{ in_array($id, old('teams', [])) ? 'selected' : '' }}>{{ $team }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('teams'))
                                <span class="help-block" role="alert">{{ $errors->first('teams') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.team_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('lang') ? 'has-error' : '' }}">
                            <label for="lang_id">{{ trans('cruds.user.fields.lang') }}</label>
                            <select class="form-control select2" name="lang_id" id="lang_id">
                                @foreach($langs as $id => $entry)
                                    <option value="{{ $id }}" {{ old('lang_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('lang'))
                                <span class="help-block" role="alert">{{ $errors->first('lang') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.lang_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label for="phone">{{ trans('cruds.user.fields.phone') }}</label>
                            <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                            @if($errors->has('phone'))
                                <span class="help-block" role="alert">{{ $errors->first('phone') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('notice') ? 'has-error' : '' }}">
                            <label for="notice">{{ trans('cruds.user.fields.notice') }}</label>
                            <textarea class="form-control ckeditor" name="notice" id="notice">{!! old('notice') !!}</textarea>
                            @if($errors->has('notice'))
                                <span class="help-block" role="alert">{{ $errors->first('notice') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.notice_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.users.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $user->id ?? 0 }}');
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