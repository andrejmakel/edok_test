@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.ucto.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.uctos.update", [$ucto->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="acc_company_id">{{ trans('cruds.ucto.fields.acc_company') }}</label>
                            <select class="form-control select2" name="acc_company_id" id="acc_company_id">
                                @foreach($acc_companies as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('acc_company_id') ? old('acc_company_id') : $ucto->acc_company->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('acc_company'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('acc_company') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ucto.fields.acc_company_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="uctuje">{{ trans('cruds.ucto.fields.uctuje') }}</label>
                            <input class="form-control" type="text" name="uctuje" id="uctuje" value="{{ old('uctuje', $ucto->uctuje) }}">
                            @if($errors->has('uctuje'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('uctuje') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ucto.fields.uctuje_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="tel">{{ trans('cruds.ucto.fields.tel') }}</label>
                            <input class="form-control" type="text" name="tel" id="tel" value="{{ old('tel', $ucto->tel) }}">
                            @if($errors->has('tel'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tel') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ucto.fields.tel_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="mobil">{{ trans('cruds.ucto.fields.mobil') }}</label>
                            <input class="form-control" type="text" name="mobil" id="mobil" value="{{ old('mobil', $ucto->mobil) }}">
                            @if($errors->has('mobil'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mobil') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ucto.fields.mobil_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="email">{{ trans('cruds.ucto.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email', $ucto->email) }}">
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ucto.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="poznamka">{{ trans('cruds.ucto.fields.poznamka') }}</label>
                            <textarea class="form-control ckeditor" name="poznamka" id="poznamka">{!! old('poznamka', $ucto->poznamka) !!}</textarea>
                            @if($errors->has('poznamka'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('poznamka') }}
                                </div>
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
                xhr.open('POST', '{{ route('frontend.uctos.storeCKEditorImages') }}', true);
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