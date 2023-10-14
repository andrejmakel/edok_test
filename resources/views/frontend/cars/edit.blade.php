@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.car.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.cars.update", [$car->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="team_id">{{ trans('cruds.car.fields.team') }}</label>
                            <select class="form-control select2" name="team_id" id="team_id">
                                @foreach($teams as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('team_id') ? old('team_id') : $car->team->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('team'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('team') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.car.fields.team_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="typ_id">{{ trans('cruds.car.fields.typ') }}</label>
                            <select class="form-control select2" name="typ_id" id="typ_id">
                                @foreach($typs as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('typ_id') ? old('typ_id') : $car->typ->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('typ'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('typ') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.car.fields.typ_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="znacka_id">{{ trans('cruds.car.fields.znacka') }}</label>
                            <select class="form-control select2" name="znacka_id" id="znacka_id">
                                @foreach($znackas as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('znacka_id') ? old('znacka_id') : $car->znacka->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('znacka'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('znacka') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.car.fields.znacka_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="model">{{ trans('cruds.car.fields.model') }}</label>
                            <input class="form-control" type="text" name="model" id="model" value="{{ old('model', $car->model) }}">
                            @if($errors->has('model'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('model') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.car.fields.model_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="ecv">{{ trans('cruds.car.fields.ecv') }}</label>
                            <input class="form-control" type="text" name="ecv" id="ecv" value="{{ old('ecv', $car->ecv) }}">
                            @if($errors->has('ecv'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('ecv') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.car.fields.ecv_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="vin">{{ trans('cruds.car.fields.vin') }}</label>
                            <input class="form-control" type="text" name="vin" id="vin" value="{{ old('vin', $car->vin) }}">
                            @if($errors->has('vin'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('vin') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.car.fields.vin_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="sk_register">{{ trans('cruds.car.fields.sk_register') }}</label>
                            <input class="form-control date" type="text" name="sk_register" id="sk_register" value="{{ old('sk_register', $car->sk_register) }}">
                            @if($errors->has('sk_register'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sk_register') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.car.fields.sk_register_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="stk_date">{{ trans('cruds.car.fields.stk_date') }}</label>
                            <input class="form-control date" type="text" name="stk_date" id="stk_date" value="{{ old('stk_date', $car->stk_date) }}">
                            @if($errors->has('stk_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('stk_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.car.fields.stk_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="pzp_date">{{ trans('cruds.car.fields.pzp_date') }}</label>
                            <input class="form-control date" type="text" name="pzp_date" id="pzp_date" value="{{ old('pzp_date', $car->pzp_date) }}">
                            @if($errors->has('pzp_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('pzp_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.car.fields.pzp_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="pzp_cislo">{{ trans('cruds.car.fields.pzp_cislo') }}</label>
                            <input class="form-control" type="text" name="pzp_cislo" id="pzp_cislo" value="{{ old('pzp_cislo', $car->pzp_cislo) }}">
                            @if($errors->has('pzp_cislo'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('pzp_cislo') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.car.fields.pzp_cislo_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="pzp_documents">{{ trans('cruds.car.fields.pzp_documents') }}</label>
                            <div class="needsclick dropzone" id="pzp_documents-dropzone">
                            </div>
                            @if($errors->has('pzp_documents'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('pzp_documents') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.car.fields.pzp_documents_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="kasko_date">{{ trans('cruds.car.fields.kasko_date') }}</label>
                            <input class="form-control date" type="text" name="kasko_date" id="kasko_date" value="{{ old('kasko_date', $car->kasko_date) }}">
                            @if($errors->has('kasko_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('kasko_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.car.fields.kasko_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="kasko_cislo">{{ trans('cruds.car.fields.kasko_cislo') }}</label>
                            <input class="form-control" type="text" name="kasko_cislo" id="kasko_cislo" value="{{ old('kasko_cislo', $car->kasko_cislo) }}">
                            @if($errors->has('kasko_cislo'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('kasko_cislo') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.car.fields.kasko_cislo_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="kasko_dokuments">{{ trans('cruds.car.fields.kasko_dokuments') }}</label>
                            <div class="needsclick dropzone" id="kasko_dokuments-dropzone">
                            </div>
                            @if($errors->has('kasko_dokuments'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('kasko_dokuments') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.car.fields.kasko_dokuments_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="poist_notice">{{ trans('cruds.car.fields.poist_notice') }}</label>
                            <textarea class="form-control ckeditor" name="poist_notice" id="poist_notice">{!! old('poist_notice', $car->poist_notice) !!}</textarea>
                            @if($errors->has('poist_notice'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('poist_notice') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.car.fields.poist_notice_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="pzp_poistovna_id">{{ trans('cruds.car.fields.pzp_poistovna') }}</label>
                            <select class="form-control select2" name="pzp_poistovna_id" id="pzp_poistovna_id">
                                @foreach($pzp_poistovnas as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('pzp_poistovna_id') ? old('pzp_poistovna_id') : $car->pzp_poistovna->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('pzp_poistovna'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('pzp_poistovna') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.car.fields.pzp_poistovna_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="kasko_poistovna_id">{{ trans('cruds.car.fields.kasko_poistovna') }}</label>
                            <select class="form-control select2" name="kasko_poistovna_id" id="kasko_poistovna_id">
                                @foreach($kasko_poistovnas as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('kasko_poistovna_id') ? old('kasko_poistovna_id') : $car->kasko_poistovna->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('kasko_poistovna'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('kasko_poistovna') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.car.fields.kasko_poistovna_helper') }}</span>
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
    var uploadedPzpDocumentsMap = {}
Dropzone.options.pzpDocumentsDropzone = {
    url: '{{ route('frontend.cars.storeMedia') }}',
    maxFilesize: 8, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 8
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="pzp_documents[]" value="' + response.name + '">')
      uploadedPzpDocumentsMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPzpDocumentsMap[file.name]
      }
      $('form').find('input[name="pzp_documents[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($car) && $car->pzp_documents)
          var files =
            {!! json_encode($car->pzp_documents) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="pzp_documents[]" value="' + file.file_name + '">')
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
    var uploadedKaskoDokumentsMap = {}
Dropzone.options.kaskoDokumentsDropzone = {
    url: '{{ route('frontend.cars.storeMedia') }}',
    maxFilesize: 8, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 8
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="kasko_dokuments[]" value="' + response.name + '">')
      uploadedKaskoDokumentsMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedKaskoDokumentsMap[file.name]
      }
      $('form').find('input[name="kasko_dokuments[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($car) && $car->kasko_dokuments)
          var files =
            {!! json_encode($car->kasko_dokuments) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="kasko_dokuments[]" value="' + file.file_name + '">')
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
                xhr.open('POST', '{{ route('frontend.cars.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $car->id ?? 0 }}');
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