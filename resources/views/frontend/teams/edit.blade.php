@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.team.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.teams.update", [$team->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="active" value="0">
                                <input type="checkbox" name="active" id="active" value="1" {{ $team->active || old('active', 0) === 1 ? 'checked' : '' }}>
                                <label for="active">{{ trans('cruds.team.fields.active') }}</label>
                            </div>
                            @if($errors->has('active'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('active') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.active_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="archiv" value="0">
                                <input type="checkbox" name="archiv" id="archiv" value="1" {{ $team->archiv || old('archiv', 0) === 1 ? 'checked' : '' }}>
                                <label for="archiv">{{ trans('cruds.team.fields.archiv') }}</label>
                            </div>
                            @if($errors->has('archiv'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('archiv') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.archiv_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="nazov">{{ trans('cruds.team.fields.nazov') }}</label>
                            <input class="form-control" type="text" name="nazov" id="nazov" value="{{ old('nazov', $team->nazov) }}">
                            @if($errors->has('nazov'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nazov') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.nazov_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="short_name">{{ trans('cruds.team.fields.short_name') }}</label>
                            <input class="form-control" type="text" name="short_name" id="short_name" value="{{ old('short_name', $team->short_name) }}">
                            @if($errors->has('short_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('short_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.short_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="superfaktura">{{ trans('cruds.team.fields.superfaktura') }}</label>
                            <input class="form-control" type="text" name="superfaktura" id="superfaktura" value="{{ old('superfaktura', $team->superfaktura) }}">
                            @if($errors->has('superfaktura'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('superfaktura') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.superfaktura_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="nasa_id">{{ trans('cruds.team.fields.nasa') }}</label>
                            <select class="form-control select2" name="nasa_id" id="nasa_id">
                                @foreach($nasas as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('nasa_id') ? old('nasa_id') : $team->nasa->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('nasa'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nasa') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.nasa_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="id_mmc">{{ trans('cruds.team.fields.id_mmc') }}</label>
                            <input class="form-control" type="number" name="id_mmc" id="id_mmc" value="{{ old('id_mmc', $team->id_mmc) }}" step="1">
                            @if($errors->has('id_mmc'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('id_mmc') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.id_mmc_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="id_pohoda">{{ trans('cruds.team.fields.id_pohoda') }}</label>
                            <input class="form-control" type="text" name="id_pohoda" id="id_pohoda" value="{{ old('id_pohoda', $team->id_pohoda) }}">
                            @if($errors->has('id_pohoda'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('id_pohoda') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.id_pohoda_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="date">{{ trans('cruds.team.fields.date') }}</label>
                            <input class="form-control date" type="text" name="date" id="date" value="{{ old('date', $team->date) }}">
                            @if($errors->has('date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="contacts">{{ trans('cruds.team.fields.contact') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="contacts[]" id="contacts" multiple>
                                @foreach($contacts as $id => $contact)
                                    <option value="{{ $id }}" {{ (in_array($id, old('contacts', [])) || $team->contacts->contains($id)) ? 'selected' : '' }}>{{ $contact }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('contacts'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('contacts') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.contact_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="address">{{ trans('cruds.team.fields.address') }}</label>
                            <input class="form-control" type="text" name="address" id="address" value="{{ old('address', $team->address) }}">
                            @if($errors->has('address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="sidlo_id">{{ trans('cruds.team.fields.sidlo') }}</label>
                            <select class="form-control select2" name="sidlo_id" id="sidlo_id">
                                @foreach($sidlos as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('sidlo_id') ? old('sidlo_id') : $team->sidlo->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('sidlo'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sidlo') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.sidlo_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="ico">{{ trans('cruds.team.fields.ico') }}</label>
                            <input class="form-control" type="text" name="ico" id="ico" value="{{ old('ico', $team->ico) }}">
                            @if($errors->has('ico'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('ico') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.ico_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="dic">{{ trans('cruds.team.fields.dic') }}</label>
                            <input class="form-control" type="text" name="dic" id="dic" value="{{ old('dic', $team->dic) }}">
                            @if($errors->has('dic'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('dic') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.dic_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="ic_dph">{{ trans('cruds.team.fields.ic_dph') }}</label>
                            <input class="form-control" type="text" name="ic_dph" id="ic_dph" value="{{ old('ic_dph', $team->ic_dph) }}">
                            @if($errors->has('ic_dph'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('ic_dph') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.ic_dph_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="ic_dph_7_a" value="0">
                                <input type="checkbox" name="ic_dph_7_a" id="ic_dph_7_a" value="1" {{ $team->ic_dph_7_a || old('ic_dph_7_a', 0) === 1 ? 'checked' : '' }}>
                                <label for="ic_dph_7_a">{{ trans('cruds.team.fields.ic_dph_7_a') }}</label>
                            </div>
                            @if($errors->has('ic_dph_7_a'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('ic_dph_7_a') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.ic_dph_7_a_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="phone">{{ trans('cruds.team.fields.phone') }}</label>
                            <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', $team->phone) }}">
                            @if($errors->has('phone'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="e_schranka_id">{{ trans('cruds.team.fields.e_schranka') }}</label>
                            <select class="form-control select2" name="e_schranka_id" id="e_schranka_id">
                                @foreach($e_schrankas as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('e_schranka_id') ? old('e_schranka_id') : $team->e_schranka->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('e_schranka'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('e_schranka') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.e_schranka_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="spracovanie_id">{{ trans('cruds.team.fields.spracovanie') }}</label>
                            <select class="form-control select2" name="spracovanie_id" id="spracovanie_id">
                                @foreach($spracovanies as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('spracovanie_id') ? old('spracovanie_id') : $team->spracovanie->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('spracovanie'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('spracovanie') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.spracovanie_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="send_address">{{ trans('cruds.team.fields.send_address') }}</label>
                            <input class="form-control" type="text" name="send_address" id="send_address" value="{{ old('send_address', $team->send_address) }}">
                            @if($errors->has('send_address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('send_address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.send_address_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="acc_company_id">{{ trans('cruds.team.fields.acc_company') }}</label>
                            <select class="form-control select2" name="acc_company_id" id="acc_company_id">
                                @foreach($acc_companies as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('acc_company_id') ? old('acc_company_id') : $team->acc_company->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('acc_company'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('acc_company') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.acc_company_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="ucto_id">{{ trans('cruds.team.fields.ucto') }}</label>
                            <select class="form-control select2" name="ucto_id" id="ucto_id">
                                @foreach($uctos as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('ucto_id') ? old('ucto_id') : $team->ucto->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('ucto'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('ucto') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.ucto_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="bank_id">{{ trans('cruds.team.fields.bank') }}</label>
                            <select class="form-control select2" name="bank_id" id="bank_id">
                                @foreach($banks as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('bank_id') ? old('bank_id') : $team->bank->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('bank'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('bank') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.bank_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="iban">{{ trans('cruds.team.fields.iban') }}</label>
                            <input class="form-control" type="text" name="iban" id="iban" value="{{ old('iban', $team->iban) }}">
                            @if($errors->has('iban'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('iban') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.iban_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="swift_bic">{{ trans('cruds.team.fields.swift_bic') }}</label>
                            <input class="form-control" type="text" name="swift_bic" id="swift_bic" value="{{ old('swift_bic', $team->swift_bic) }}">
                            @if($errors->has('swift_bic'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('swift_bic') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.swift_bic_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="popis">{{ trans('cruds.team.fields.popis') }}</label>
                            <textarea class="form-control ckeditor" name="popis" id="popis">{!! old('popis', $team->popis) !!}</textarea>
                            @if($errors->has('popis'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('popis') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.popis_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="orsr">{{ trans('cruds.team.fields.orsr') }}</label>
                            <div class="needsclick dropzone" id="orsr-dropzone">
                            </div>
                            @if($errors->has('orsr'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('orsr') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.orsr_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="zrsr">{{ trans('cruds.team.fields.zrsr') }}</label>
                            <div class="needsclick dropzone" id="zrsr-dropzone">
                            </div>
                            @if($errors->has('zrsr'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('zrsr') }}
                                </div>
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
                xhr.open('POST', '{{ route('frontend.teams.storeCKEditorImages') }}', true);
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
    url: '{{ route('frontend.teams.storeMedia') }}',
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
    url: '{{ route('frontend.teams.storeMedia') }}',
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