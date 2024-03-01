@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.team.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.teams.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('active') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="active" value="0">
                                <input type="checkbox" name="active" id="active" value="1" {{ old('active', 0) == 1 || old('active') === null ? 'checked' : '' }}>
                                <label for="active" style="font-weight: 400">{{ trans('cruds.team.fields.active') }}</label>
                            </div>
                            @if($errors->has('active'))
                                <span class="help-block" role="alert">{{ $errors->first('active') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.active_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('archive') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="archive" value="0">
                                <input type="checkbox" name="archive" id="archive" value="1" {{ old('archive', 0) == 1 ? 'checked' : '' }}>
                                <label for="archive" style="font-weight: 400">{{ trans('cruds.team.fields.archive') }}</label>
                            </div>
                            @if($errors->has('archive'))
                                <span class="help-block" role="alert">{{ $errors->first('archive') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.archive_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nazov') ? 'has-error' : '' }}">
                            <label for="nazov">{{ trans('cruds.team.fields.nazov') }}</label>
                            <input class="form-control" type="text" name="nazov" id="nazov" value="{{ old('nazov', '') }}">
                            @if($errors->has('nazov'))
                                <span class="help-block" role="alert">{{ $errors->first('nazov') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.nazov_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('short_name') ? 'has-error' : '' }}">
                            <label for="short_name">{{ trans('cruds.team.fields.short_name') }}</label>
                            <input class="form-control" type="text" name="short_name" id="short_name" value="{{ old('short_name', '') }}">
                            @if($errors->has('short_name'))
                                <span class="help-block" role="alert">{{ $errors->first('short_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.short_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('superfaktura') ? 'has-error' : '' }}">
                            <label for="superfaktura">{{ trans('cruds.team.fields.superfaktura') }}</label>
                            <input class="form-control" type="text" name="superfaktura" id="superfaktura" value="{{ old('superfaktura', '') }}">
                            @if($errors->has('superfaktura'))
                                <span class="help-block" role="alert">{{ $errors->first('superfaktura') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.superfaktura_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nasa') ? 'has-error' : '' }}">
                            <label for="nasa_id">{{ trans('cruds.team.fields.nasa') }}</label>
                            <select class="form-control select2" name="nasa_id" id="nasa_id">
                                @foreach($nasas as $id => $entry)
                                    <option value="{{ $id }}" {{ old('nasa_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('nasa'))
                                <span class="help-block" role="alert">{{ $errors->first('nasa') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.nasa_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('id_mmc') ? 'has-error' : '' }}">
                            <label for="id_mmc">{{ trans('cruds.team.fields.id_mmc') }}</label>
                            <input class="form-control" type="number" name="id_mmc" id="id_mmc" value="{{ old('id_mmc', '') }}" step="1">
                            @if($errors->has('id_mmc'))
                                <span class="help-block" role="alert">{{ $errors->first('id_mmc') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.id_mmc_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('id_pohoda') ? 'has-error' : '' }}">
                            <label for="id_pohoda">{{ trans('cruds.team.fields.id_pohoda') }}</label>
                            <input class="form-control" type="text" name="id_pohoda" id="id_pohoda" value="{{ old('id_pohoda', '') }}">
                            @if($errors->has('id_pohoda'))
                                <span class="help-block" role="alert">{{ $errors->first('id_pohoda') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.id_pohoda_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                            <label for="date">{{ trans('cruds.team.fields.date') }}</label>
                            <input class="form-control date" type="text" name="date" id="date" value="{{ old('date') }}">
                            @if($errors->has('date'))
                                <span class="help-block" role="alert">{{ $errors->first('date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('contacts') ? 'has-error' : '' }}">
                            <label for="contacts">{{ trans('cruds.team.fields.contact') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="contacts[]" id="contacts" multiple>
                                @foreach($contacts as $id => $contact)
                                    <option value="{{ $id }}" {{ in_array($id, old('contacts', [])) ? 'selected' : '' }}>{{ $contact }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('contacts'))
                                <span class="help-block" role="alert">{{ $errors->first('contacts') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.contact_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                            <label for="address">{{ trans('cruds.team.fields.address') }}</label>
                            <input class="form-control" type="text" name="address" id="address" value="{{ old('address', '') }}">
                            @if($errors->has('address'))
                                <span class="help-block" role="alert">{{ $errors->first('address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('sidlo') ? 'has-error' : '' }}">
                            <label for="sidlo_id">{{ trans('cruds.team.fields.sidlo') }}</label>
                            <select class="form-control select2" name="sidlo_id" id="sidlo_id">
                                @foreach($sidlos as $id => $entry)
                                    <option value="{{ $id }}" {{ old('sidlo_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('sidlo'))
                                <span class="help-block" role="alert">{{ $errors->first('sidlo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.sidlo_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ico') ? 'has-error' : '' }}">
                            <label for="ico">{{ trans('cruds.team.fields.ico') }}</label>
                            <input class="form-control" type="text" name="ico" id="ico" value="{{ old('ico', '') }}">
                            @if($errors->has('ico'))
                                <span class="help-block" role="alert">{{ $errors->first('ico') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.ico_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dic') ? 'has-error' : '' }}">
                            <label for="dic">{{ trans('cruds.team.fields.dic') }}</label>
                            <input class="form-control" type="text" name="dic" id="dic" value="{{ old('dic', '') }}">
                            @if($errors->has('dic'))
                                <span class="help-block" role="alert">{{ $errors->first('dic') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.dic_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ic_dph') ? 'has-error' : '' }}">
                            <label for="ic_dph">{{ trans('cruds.team.fields.ic_dph') }}</label>
                            <input class="form-control" type="text" name="ic_dph" id="ic_dph" value="{{ old('ic_dph', '') }}">
                            @if($errors->has('ic_dph'))
                                <span class="help-block" role="alert">{{ $errors->first('ic_dph') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.ic_dph_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ic_dph_7_a') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="ic_dph_7_a" value="0">
                                <input type="checkbox" name="ic_dph_7_a" id="ic_dph_7_a" value="1" {{ old('ic_dph_7_a', 0) == 1 ? 'checked' : '' }}>
                                <label for="ic_dph_7_a" style="font-weight: 400">{{ trans('cruds.team.fields.ic_dph_7_a') }}</label>
                            </div>
                            @if($errors->has('ic_dph_7_a'))
                                <span class="help-block" role="alert">{{ $errors->first('ic_dph_7_a') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.ic_dph_7_a_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label for="phone">{{ trans('cruds.team.fields.phone') }}</label>
                            <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                            @if($errors->has('phone'))
                                <span class="help-block" role="alert">{{ $errors->first('phone') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('e_schranka') ? 'has-error' : '' }}">
                            <label for="e_schranka_id">{{ trans('cruds.team.fields.e_schranka') }}</label>
                            <select class="form-control select2" name="e_schranka_id" id="e_schranka_id">
                                @foreach($e_schrankas as $id => $entry)
                                    <option value="{{ $id }}" {{ old('e_schranka_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('e_schranka'))
                                <span class="help-block" role="alert">{{ $errors->first('e_schranka') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.e_schranka_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('spracovanie') ? 'has-error' : '' }}">
                            <label for="spracovanie_id">{{ trans('cruds.team.fields.spracovanie') }}</label>
                            <select class="form-control select2" name="spracovanie_id" id="spracovanie_id">
                                @foreach($spracovanies as $id => $entry)
                                    <option value="{{ $id }}" {{ old('spracovanie_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('spracovanie'))
                                <span class="help-block" role="alert">{{ $errors->first('spracovanie') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.spracovanie_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('send_address') ? 'has-error' : '' }}">
                            <label for="send_address">{{ trans('cruds.team.fields.send_address') }}</label>
                            <input class="form-control" type="text" name="send_address" id="send_address" value="{{ old('send_address', '') }}">
                            @if($errors->has('send_address'))
                                <span class="help-block" role="alert">{{ $errors->first('send_address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.send_address_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('acc_company') ? 'has-error' : '' }}">
                            <label for="acc_company_id">{{ trans('cruds.team.fields.acc_company') }}</label>
                            <select class="form-control select2" name="acc_company_id" id="acc_company_id">
                                @foreach($acc_companies as $id => $entry)
                                    <option value="{{ $id }}" {{ old('acc_company_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('acc_company'))
                                <span class="help-block" role="alert">{{ $errors->first('acc_company') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.acc_company_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ucto') ? 'has-error' : '' }}">
                            <label for="ucto_id">{{ trans('cruds.team.fields.ucto') }}</label>
                            <select class="form-control select2" name="ucto_id" id="ucto_id">
                                @foreach($uctos as $id => $entry)
                                    <option value="{{ $id }}" {{ old('ucto_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('ucto'))
                                <span class="help-block" role="alert">{{ $errors->first('ucto') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.ucto_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bank') ? 'has-error' : '' }}">
                            <label for="bank_id">{{ trans('cruds.team.fields.bank') }}</label>
                            <select class="form-control select2" name="bank_id" id="bank_id">
                                @foreach($banks as $id => $entry)
                                    <option value="{{ $id }}" {{ old('bank_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('bank'))
                                <span class="help-block" role="alert">{{ $errors->first('bank') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.bank_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('iban') ? 'has-error' : '' }}">
                            <label for="iban">{{ trans('cruds.team.fields.iban') }}</label>
                            <input class="form-control" type="text" name="iban" id="iban" value="{{ old('iban', '') }}">
                            @if($errors->has('iban'))
                                <span class="help-block" role="alert">{{ $errors->first('iban') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.iban_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('swift_bic') ? 'has-error' : '' }}">
                            <label for="swift_bic">{{ trans('cruds.team.fields.swift_bic') }}</label>
                            <input class="form-control" type="text" name="swift_bic" id="swift_bic" value="{{ old('swift_bic', '') }}">
                            @if($errors->has('swift_bic'))
                                <span class="help-block" role="alert">{{ $errors->first('swift_bic') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.swift_bic_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('popis') ? 'has-error' : '' }}">
                            <label for="popis">{{ trans('cruds.team.fields.popis') }}</label>
                            <textarea class="form-control ckeditor" name="popis" id="popis">{!! old('popis') !!}</textarea>
                            @if($errors->has('popis'))
                                <span class="help-block" role="alert">{{ $errors->first('popis') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.popis_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('orsr') ? 'has-error' : '' }}">
                            <label for="orsr">{{ trans('cruds.team.fields.orsr') }}</label>
                            <div class="needsclick dropzone" id="orsr-dropzone">
                            </div>
                            @if($errors->has('orsr'))
                                <span class="help-block" role="alert">{{ $errors->first('orsr') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.orsr_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('zrsr') ? 'has-error' : '' }}">
                            <label for="zrsr">{{ trans('cruds.team.fields.zrsr') }}</label>
                            <div class="needsclick dropzone" id="zrsr-dropzone">
                            </div>
                            @if($errors->has('zrsr'))
                                <span class="help-block" role="alert">{{ $errors->first('zrsr') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.zrsr_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.teams.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $team->id ?? 0 }}');
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
    url: '{{ route('admin.teams.storeMedia') }}',
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
@if(isset($team) && $team->orsr)
      var file = {!! json_encode($team->orsr) !!}
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
    url: '{{ route('admin.teams.storeMedia') }}',
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
@if(isset($team) && $team->zrsr)
      var file = {!! json_encode($team->zrsr) !!}
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