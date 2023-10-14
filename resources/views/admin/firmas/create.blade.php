@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.firma.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.firmas.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('nasa') ? 'has-error' : '' }}">
                            <label for="nasa_id">{{ trans('cruds.firma.fields.nasa') }}</label>
                            <select class="form-control select2" name="nasa_id" id="nasa_id">
                                @foreach($nasas as $id => $entry)
                                    <option value="{{ $id }}" {{ old('nasa_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('nasa'))
                                <span class="help-block" role="alert">{{ $errors->first('nasa') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.nasa_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nazov') ? 'has-error' : '' }}">
                            <label for="nazov">{{ trans('cruds.firma.fields.nazov') }}</label>
                            <input class="form-control" type="text" name="nazov" id="nazov" value="{{ old('nazov', '') }}">
                            @if($errors->has('nazov'))
                                <span class="help-block" role="alert">{{ $errors->first('nazov') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.nazov_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('activ') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="activ" value="0">
                                <input type="checkbox" name="activ" id="activ" value="1" {{ old('activ', 0) == 1 || old('activ') === null ? 'checked' : '' }}>
                                <label for="activ" style="font-weight: 400">{{ trans('cruds.firma.fields.activ') }}</label>
                            </div>
                            @if($errors->has('activ'))
                                <span class="help-block" role="alert">{{ $errors->first('activ') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.activ_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('team') ? 'has-error' : '' }}">
                            <label for="team_id">{{ trans('cruds.firma.fields.team') }}</label>
                            <select class="form-control select2" name="team_id" id="team_id">
                                @foreach($teams as $id => $entry)
                                    <option value="{{ $id }}" {{ old('team_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('team'))
                                <span class="help-block" role="alert">{{ $errors->first('team') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.team_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('kontakts') ? 'has-error' : '' }}">
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
                                <span class="help-block" role="alert">{{ $errors->first('kontakts') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.kontakt_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('idmmc') ? 'has-error' : '' }}">
                            <label for="idmmc">{{ trans('cruds.firma.fields.idmmc') }}</label>
                            <input class="form-control" type="text" name="idmmc" id="idmmc" value="{{ old('idmmc', '') }}">
                            @if($errors->has('idmmc'))
                                <span class="help-block" role="alert">{{ $errors->first('idmmc') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.idmmc_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('id_pohoda') ? 'has-error' : '' }}">
                            <label for="id_pohoda">{{ trans('cruds.firma.fields.id_pohoda') }}</label>
                            <input class="form-control" type="text" name="id_pohoda" id="id_pohoda" value="{{ old('id_pohoda', '') }}">
                            @if($errors->has('id_pohoda'))
                                <span class="help-block" role="alert">{{ $errors->first('id_pohoda') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.id_pohoda_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                            <label for="address">{{ trans('cruds.firma.fields.address') }}</label>
                            <input class="form-control" type="text" name="address" id="address" value="{{ old('address', '') }}">
                            @if($errors->has('address'))
                                <span class="help-block" role="alert">{{ $errors->first('address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('short_address') ? 'has-error' : '' }}">
                            <label for="short_address">{{ trans('cruds.firma.fields.short_address') }}</label>
                            <input class="form-control" type="text" name="short_address" id="short_address" value="{{ old('short_address', '') }}">
                            @if($errors->has('short_address'))
                                <span class="help-block" role="alert">{{ $errors->first('short_address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.short_address_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ico') ? 'has-error' : '' }}">
                            <label for="ico">{{ trans('cruds.firma.fields.ico') }}</label>
                            <input class="form-control" type="text" name="ico" id="ico" value="{{ old('ico', '') }}">
                            @if($errors->has('ico'))
                                <span class="help-block" role="alert">{{ $errors->first('ico') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.ico_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dic') ? 'has-error' : '' }}">
                            <label for="dic">{{ trans('cruds.firma.fields.dic') }}</label>
                            <input class="form-control" type="text" name="dic" id="dic" value="{{ old('dic', '') }}">
                            @if($errors->has('dic'))
                                <span class="help-block" role="alert">{{ $errors->first('dic') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.dic_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ic_dph') ? 'has-error' : '' }}">
                            <label for="ic_dph">{{ trans('cruds.firma.fields.ic_dph') }}</label>
                            <input class="form-control" type="text" name="ic_dph" id="ic_dph" value="{{ old('ic_dph', '') }}">
                            @if($errors->has('ic_dph'))
                                <span class="help-block" role="alert">{{ $errors->first('ic_dph') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.ic_dph_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ic_dph_form') ? 'has-error' : '' }}">
                            <label for="ic_dph_form">{{ trans('cruds.firma.fields.ic_dph_form') }}</label>
                            <input class="form-control" type="text" name="ic_dph_form" id="ic_dph_form" value="{{ old('ic_dph_form', '') }}">
                            @if($errors->has('ic_dph_form'))
                                <span class="help-block" role="alert">{{ $errors->first('ic_dph_form') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.ic_dph_form_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('telefon') ? 'has-error' : '' }}">
                            <label for="telefon">{{ trans('cruds.firma.fields.telefon') }}</label>
                            <input class="form-control" type="text" name="telefon" id="telefon" value="{{ old('telefon', '') }}">
                            @if($errors->has('telefon'))
                                <span class="help-block" role="alert">{{ $errors->first('telefon') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.telefon_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('e_schranka') ? 'has-error' : '' }}">
                            <label for="e_schranka_id">{{ trans('cruds.firma.fields.e_schranka') }}</label>
                            <select class="form-control select2" name="e_schranka_id" id="e_schranka_id">
                                @foreach($e_schrankas as $id => $entry)
                                    <option value="{{ $id }}" {{ old('e_schranka_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('e_schranka'))
                                <span class="help-block" role="alert">{{ $errors->first('e_schranka') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.e_schranka_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('spracovanie') ? 'has-error' : '' }}">
                            <label for="spracovanie_id">{{ trans('cruds.firma.fields.spracovanie') }}</label>
                            <select class="form-control select2" name="spracovanie_id" id="spracovanie_id">
                                @foreach($spracovanies as $id => $entry)
                                    <option value="{{ $id }}" {{ old('spracovanie_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('spracovanie'))
                                <span class="help-block" role="alert">{{ $errors->first('spracovanie') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.spracovanie_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('sprac_posty') ? 'has-error' : '' }}">
                            <label for="sprac_posty">{{ trans('cruds.firma.fields.sprac_posty') }}</label>
                            <input class="form-control" type="text" name="sprac_posty" id="sprac_posty" value="{{ old('sprac_posty', '') }}">
                            @if($errors->has('sprac_posty'))
                                <span class="help-block" role="alert">{{ $errors->first('sprac_posty') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.sprac_posty_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ucto') ? 'has-error' : '' }}">
                            <label for="ucto_id">{{ trans('cruds.firma.fields.ucto') }}</label>
                            <select class="form-control select2" name="ucto_id" id="ucto_id">
                                @foreach($uctos as $id => $entry)
                                    <option value="{{ $id }}" {{ old('ucto_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('ucto'))
                                <span class="help-block" role="alert">{{ $errors->first('ucto') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.ucto_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bank') ? 'has-error' : '' }}">
                            <label for="bank_id">{{ trans('cruds.firma.fields.bank') }}</label>
                            <select class="form-control select2" name="bank_id" id="bank_id">
                                @foreach($banks as $id => $entry)
                                    <option value="{{ $id }}" {{ old('bank_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('bank'))
                                <span class="help-block" role="alert">{{ $errors->first('bank') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.bank_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('iban') ? 'has-error' : '' }}">
                            <label for="iban">{{ trans('cruds.firma.fields.iban') }}</label>
                            <input class="form-control" type="text" name="iban" id="iban" value="{{ old('iban', '') }}">
                            @if($errors->has('iban'))
                                <span class="help-block" role="alert">{{ $errors->first('iban') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.iban_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('swift_bic') ? 'has-error' : '' }}">
                            <label for="swift_bic">{{ trans('cruds.firma.fields.swift_bic') }}</label>
                            <input class="form-control" type="text" name="swift_bic" id="swift_bic" value="{{ old('swift_bic', '') }}">
                            @if($errors->has('swift_bic'))
                                <span class="help-block" role="alert">{{ $errors->first('swift_bic') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.swift_bic_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('popis') ? 'has-error' : '' }}">
                            <label for="popis">{{ trans('cruds.firma.fields.popis') }}</label>
                            <textarea class="form-control ckeditor" name="popis" id="popis">{!! old('popis') !!}</textarea>
                            @if($errors->has('popis'))
                                <span class="help-block" role="alert">{{ $errors->first('popis') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.popis_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('orsr') ? 'has-error' : '' }}">
                            <label for="orsr">{{ trans('cruds.firma.fields.orsr') }}</label>
                            <div class="needsclick dropzone" id="orsr-dropzone">
                            </div>
                            @if($errors->has('orsr'))
                                <span class="help-block" role="alert">{{ $errors->first('orsr') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.firma.fields.orsr_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('zrsr') ? 'has-error' : '' }}">
                            <label for="zrsr">{{ trans('cruds.firma.fields.zrsr') }}</label>
                            <div class="needsclick dropzone" id="zrsr-dropzone">
                            </div>
                            @if($errors->has('zrsr'))
                                <span class="help-block" role="alert">{{ $errors->first('zrsr') }}</span>
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
                xhr.open('POST', '{{ route('admin.firmas.storeCKEditorImages') }}', true);
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
    url: '{{ route('admin.firmas.storeMedia') }}',
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
    url: '{{ route('admin.firmas.storeMedia') }}',
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