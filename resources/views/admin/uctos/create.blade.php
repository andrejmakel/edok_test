@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.ucto.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.uctos.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('acc_company') ? 'has-error' : '' }}">
                            <label for="acc_company_id">{{ trans('cruds.ucto.fields.acc_company') }}</label>
                            <select class="form-control select2" name="acc_company_id" id="acc_company_id">
                                @foreach($acc_companies as $id => $entry)
                                    <option value="{{ $id }}" {{ old('acc_company_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('acc_company'))
                                <span class="help-block" role="alert">{{ $errors->first('acc_company') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.ucto.fields.acc_company_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('uctuje') ? 'has-error' : '' }}">
                            <label for="uctuje">{{ trans('cruds.ucto.fields.uctuje') }}</label>
                            <input class="form-control" type="text" name="uctuje" id="uctuje" value="{{ old('uctuje', '') }}">
                            @if($errors->has('uctuje'))
                                <span class="help-block" role="alert">{{ $errors->first('uctuje') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.ucto.fields.uctuje_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tel') ? 'has-error' : '' }}">
                            <label for="tel">{{ trans('cruds.ucto.fields.tel') }}</label>
                            <input class="form-control" type="text" name="tel" id="tel" value="{{ old('tel', '') }}">
                            @if($errors->has('tel'))
                                <span class="help-block" role="alert">{{ $errors->first('tel') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.ucto.fields.tel_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mobil') ? 'has-error' : '' }}">
                            <label for="mobil">{{ trans('cruds.ucto.fields.mobil') }}</label>
                            <input class="form-control" type="text" name="mobil" id="mobil" value="{{ old('mobil', '') }}">
                            @if($errors->has('mobil'))
                                <span class="help-block" role="alert">{{ $errors->first('mobil') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.ucto.fields.mobil_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">{{ trans('cruds.ucto.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}">
                            @if($errors->has('email'))
                                <span class="help-block" role="alert">{{ $errors->first('email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.ucto.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('poznamka') ? 'has-error' : '' }}">
                            <label for="poznamka">{{ trans('cruds.ucto.fields.poznamka') }}</label>
                            <textarea class="form-control ckeditor" name="poznamka" id="poznamka">{!! old('poznamka') !!}</textarea>
                            @if($errors->has('poznamka'))
                                <span class="help-block" role="alert">{{ $errors->first('poznamka') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.ucto.fields.poznamka_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.uctos.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $ucto->id ?? 0 }}');
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