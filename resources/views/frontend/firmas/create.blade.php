@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.firma.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.firmas.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="nasa_id">{{ trans('cruds.firma.fields.nasa') }}</label>
                            <select class="form-control select2" name="nasa_id" id="nasa_id">
                                @foreach($nasas as $id => $entry)
                                    <option value="{{ $id }}" {{ old('nasa_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('nasa'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nasa') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.nasa_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="nazov">{{ trans('cruds.firma.fields.nazov') }}</label>
                            <input class="form-control" type="text" name="nazov" id="nazov" value="{{ old('nazov', '') }}">
                            @if($errors->has('nazov'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nazov') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.nazov_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="activ" value="0">
                                <input type="checkbox" name="activ" id="activ" value="1" {{ old('activ', 0) == 1 || old('activ') === null ? 'checked' : '' }}>
                                <label for="activ">{{ trans('cruds.firma.fields.activ') }}</label>
                            </div>
                            @if($errors->has('activ'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('activ') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.activ_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="team_id">{{ trans('cruds.firma.fields.team') }}</label>
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
                            <span class="help-block">{{ trans('cruds.firma.fields.team_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="kontakts">{{ trans('cruds.firma.fields.kontakt') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="kontakts[]" id="kontakts" multiple>
                                @foreach($kontakts as $id => $kontakt)
                                    <option value="{{ $id }}" {{ in_array($id, old('kontakts', [])) ? 'selected' : '' }}>{{ $kontakt }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('kontakts'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('kontakts') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.kontakt_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="idmmc">{{ trans('cruds.firma.fields.idmmc') }}</label>
                            <input class="form-control" type="text" name="idmmc" id="idmmc" value="{{ old('idmmc', '') }}">
                            @if($errors->has('idmmc'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('idmmc') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.idmmc_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="id_pohoda">{{ trans('cruds.firma.fields.id_pohoda') }}</label>
                            <input class="form-control" type="text" name="id_pohoda" id="id_pohoda" value="{{ old('id_pohoda', '') }}">
                            @if($errors->has('id_pohoda'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('id_pohoda') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.id_pohoda_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="address">{{ trans('cruds.firma.fields.address') }}</label>
                            <input class="form-control" type="text" name="address" id="address" value="{{ old('address', '') }}">
                            @if($errors->has('address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="short_address">{{ trans('cruds.firma.fields.short_address') }}</label>
                            <input class="form-control" type="text" name="short_address" id="short_address" value="{{ old('short_address', '') }}">
                            @if($errors->has('short_address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('short_address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.short_address_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="ico">{{ trans('cruds.firma.fields.ico') }}</label>
                            <input class="form-control" type="text" name="ico" id="ico" value="{{ old('ico', '') }}">
                            @if($errors->has('ico'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('ico') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.ico_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="dic">{{ trans('cruds.firma.fields.dic') }}</label>
                            <input class="form-control" type="text" name="dic" id="dic" value="{{ old('dic', '') }}">
                            @if($errors->has('dic'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('dic') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.dic_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="ic_dph">{{ trans('cruds.firma.fields.ic_dph') }}</label>
                            <input class="form-control" type="text" name="ic_dph" id="ic_dph" value="{{ old('ic_dph', '') }}">
                            @if($errors->has('ic_dph'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('ic_dph') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.ic_dph_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="ic_dph_form">{{ trans('cruds.firma.fields.ic_dph_form') }}</label>
                            <input class="form-control" type="text" name="ic_dph_form" id="ic_dph_form" value="{{ old('ic_dph_form', '') }}">
                            @if($errors->has('ic_dph_form'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('ic_dph_form') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.ic_dph_form_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="telefon">{{ trans('cruds.firma.fields.telefon') }}</label>
                            <input class="form-control" type="text" name="telefon" id="telefon" value="{{ old('telefon', '') }}">
                            @if($errors->has('telefon'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('telefon') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.telefon_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="e_schranka_id">{{ trans('cruds.firma.fields.e_schranka') }}</label>
                            <select class="form-control select2" name="e_schranka_id" id="e_schranka_id">
                                @foreach($e_schrankas as $id => $entry)
                                    <option value="{{ $id }}" {{ old('e_schranka_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('e_schranka'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('e_schranka') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.e_schranka_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="spracovanie_id">{{ trans('cruds.firma.fields.spracovanie') }}</label>
                            <select class="form-control select2" name="spracovanie_id" id="spracovanie_id">
                                @foreach($spracovanies as $id => $entry)
                                    <option value="{{ $id }}" {{ old('spracovanie_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('spracovanie'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('spracovanie') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.spracovanie_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="sprac_posty">{{ trans('cruds.firma.fields.sprac_posty') }}</label>
                            <input class="form-control" type="text" name="sprac_posty" id="sprac_posty" value="{{ old('sprac_posty', '') }}">
                            @if($errors->has('sprac_posty'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sprac_posty') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.sprac_posty_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="ucto_id">{{ trans('cruds.firma.fields.ucto') }}</label>
                            <select class="form-control select2" name="ucto_id" id="ucto_id">
                                @foreach($uctos as $id => $entry)
                                    <option value="{{ $id }}" {{ old('ucto_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('ucto'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('ucto') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.ucto_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="bank_id">{{ trans('cruds.firma.fields.bank') }}</label>
                            <select class="form-control select2" name="bank_id" id="bank_id">
                                @foreach($banks as $id => $entry)
                                    <option value="{{ $id }}" {{ old('bank_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('bank'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('bank') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.bank_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="iban">{{ trans('cruds.firma.fields.iban') }}</label>
                            <input class="form-control" type="text" name="iban" id="iban" value="{{ old('iban', '') }}">
                            @if($errors->has('iban'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('iban') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.iban_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="swift_bic">{{ trans('cruds.firma.fields.swift_bic') }}</label>
                            <input class="form-control" type="text" name="swift_bic" id="swift_bic" value="{{ old('swift_bic', '') }}">
                            @if($errors->has('swift_bic'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('swift_bic') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.swift_bic_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="popis">{{ trans('cruds.firma.fields.popis') }}</label>
                            <textarea class="form-control ckeditor" name="popis" id="popis">{!! old('popis') !!}</textarea>
                            @if($errors->has('popis'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('popis') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.popis_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="orsr">{{ trans('cruds.firma.fields.orsr') }}</label>
                            <div class="needsclick dropzone" id="orsr-dropzone">
                            </div>
                            @if($errors->has('orsr'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('orsr') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.orsr_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="zrsr">{{ trans('cruds.firma.fields.zrsr') }}</label>
                            <div class="needsclick dropzone" id="zrsr-dropzone">
                            </div>
                            @if($errors->has('zrsr'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('zrsr') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.zrsr_helper') }}</span>
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
                xhr.open('POST', '{{ route('frontend.firmas.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $firma->id ?? 0 }}');
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

<script>
    Dropzone.options.orsrDropzone = {
    url: '{{ route('frontend.firmas.storeMedia') }}',
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
      $('form').find('input[name="orsr"]').remove()
      $('form').append('<input type="hidden" name="orsr" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="orsr"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($firma) && $firma->orsr)
      var file = {!! json_encode($firma->orsr) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="orsr" value="' + file.file_name + '">')
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
    Dropzone.options.zrsrDropzone = {
    url: '{{ route('frontend.firmas.storeMedia') }}',
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
      $('form').find('input[name="zrsr"]').remove()
      $('form').append('<input type="hidden" name="zrsr" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="zrsr"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($firma) && $firma->zrsr)
      var file = {!! json_encode($firma->zrsr) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="zrsr" value="' + file.file_name + '">')
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