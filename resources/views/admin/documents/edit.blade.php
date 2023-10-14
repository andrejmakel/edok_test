@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.document.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.documents.update", [$document->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                            <label for="date">{{ trans('cruds.document.fields.date') }}</label>
                            <input class="form-control date" type="text" name="date" id="date" value="{{ old('date', $document->date) }}">
                            @if($errors->has('date'))
                                <span class="help-block" role="alert">{{ $errors->first('date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.document.fields.date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('team') ? 'has-error' : '' }}">
                            <label for="team_id">{{ trans('cruds.document.fields.team') }}</label>
                            <select class="form-control select2" name="team_id" id="team_id">
                                @foreach($teams as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('team_id') ? old('team_id') : $document->team->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('team'))
                                <span class="help-block" role="alert">{{ $errors->first('team') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.document.fields.team_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="title">{{ trans('cruds.document.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $document->title) }}">
                            @if($errors->has('title'))
                                <span class="help-block" role="alert">{{ $errors->first('title') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.document.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('document_code') ? 'has-error' : '' }}">
                            <label for="document_code">{{ trans('cruds.document.fields.document_code') }}</label>
                            <input class="form-control" type="text" name="document_code" id="document_code" value="{{ old('document_code', $document->document_code) }}">
                            @if($errors->has('document_code'))
                                <span class="help-block" role="alert">{{ $errors->first('document_code') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.document.fields.document_code_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('notice') ? 'has-error' : '' }}">
                            <label for="notice">{{ trans('cruds.document.fields.notice') }}</label>
                            <textarea class="form-control ckeditor" name="notice" id="notice">{!! old('notice', $document->notice) !!}</textarea>
                            @if($errors->has('notice'))
                                <span class="help-block" role="alert">{{ $errors->first('notice') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.document.fields.notice_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dok_typ') ? 'has-error' : '' }}">
                            <label for="dok_typ_id">{{ trans('cruds.document.fields.dok_typ') }}</label>
                            <select class="form-control select2" name="dok_typ_id" id="dok_typ_id">
                                @foreach($dok_typs as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('dok_typ_id') ? old('dok_typ_id') : $document->dok_typ->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('dok_typ'))
                                <span class="help-block" role="alert">{{ $errors->first('dok_typ') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.document.fields.dok_typ_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dok_kat') ? 'has-error' : '' }}">
                            <label for="dok_kat_id">{{ trans('cruds.document.fields.dok_kat') }}</label>
                            <select class="form-control select2" name="dok_kat_id" id="dok_kat_id">
                                @foreach($dok_kats as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('dok_kat_id') ? old('dok_kat_id') : $document->dok_kat->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('dok_kat'))
                                <span class="help-block" role="alert">{{ $errors->first('dok_kat') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.document.fields.dok_kat_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('document') ? 'has-error' : '' }}">
                            <label for="document">{{ trans('cruds.document.fields.document') }}</label>
                            <div class="needsclick dropzone" id="document-dropzone">
                            </div>
                            @if($errors->has('document'))
                                <span class="help-block" role="alert">{{ $errors->first('document') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.document.fields.document_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('file_short_text') ? 'has-error' : '' }}">
                            <label for="file_short_text">{{ trans('cruds.document.fields.file_short_text') }}</label>
                            <input class="form-control" type="text" name="file_short_text" id="file_short_text" value="{{ old('file_short_text', $document->file_short_text) }}">
                            @if($errors->has('file_short_text'))
                                <span class="help-block" role="alert">{{ $errors->first('file_short_text') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.document.fields.file_short_text_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('payment_info') ? 'has-error' : '' }}">
                            <label for="payment_info">{{ trans('cruds.document.fields.payment_info') }}</label>
                            <input class="form-control" type="text" name="payment_info" id="payment_info" value="{{ old('payment_info', $document->payment_info) }}">
                            @if($errors->has('payment_info'))
                                <span class="help-block" role="alert">{{ $errors->first('payment_info') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.document.fields.payment_info_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('accounting') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="accounting" value="0">
                                <input type="checkbox" name="accounting" id="accounting" value="1" {{ $document->accounting || old('accounting', 0) === 1 ? 'checked' : '' }}>
                                <label for="accounting" style="font-weight: 400">{{ trans('cruds.document.fields.accounting') }}</label>
                            </div>
                            @if($errors->has('accounting'))
                                <span class="help-block" role="alert">{{ $errors->first('accounting') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.document.fields.accounting_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
                            <label for="amount">{{ trans('cruds.document.fields.amount') }}</label>
                            <input class="form-control" type="number" name="amount" id="amount" value="{{ old('amount', $document->amount) }}" step="0.01">
                            @if($errors->has('amount'))
                                <span class="help-block" role="alert">{{ $errors->first('amount') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.document.fields.amount_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('iban') ? 'has-error' : '' }}">
                            <label for="iban">{{ trans('cruds.document.fields.iban') }}</label>
                            <input class="form-control" type="text" name="iban" id="iban" value="{{ old('iban', $document->iban) }}">
                            @if($errors->has('iban'))
                                <span class="help-block" role="alert">{{ $errors->first('iban') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.document.fields.iban_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('swift') ? 'has-error' : '' }}">
                            <label for="swift">{{ trans('cruds.document.fields.swift') }}</label>
                            <input class="form-control" type="text" name="swift" id="swift" value="{{ old('swift', $document->swift) }}">
                            @if($errors->has('swift'))
                                <span class="help-block" role="alert">{{ $errors->first('swift') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.document.fields.swift_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('vs') ? 'has-error' : '' }}">
                            <label for="vs">{{ trans('cruds.document.fields.vs') }}</label>
                            <input class="form-control" type="text" name="vs" id="vs" value="{{ old('vs', $document->vs) }}">
                            @if($errors->has('vs'))
                                <span class="help-block" role="alert">{{ $errors->first('vs') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.document.fields.vs_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ss') ? 'has-error' : '' }}">
                            <label for="ss">{{ trans('cruds.document.fields.ss') }}</label>
                            <input class="form-control" type="text" name="ss" id="ss" value="{{ old('ss', $document->ss) }}">
                            @if($errors->has('ss'))
                                <span class="help-block" role="alert">{{ $errors->first('ss') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.document.fields.ss_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ks') ? 'has-error' : '' }}">
                            <label for="ks">{{ trans('cruds.document.fields.ks') }}</label>
                            <input class="form-control" type="text" name="ks" id="ks" value="{{ old('ks', $document->ks) }}">
                            @if($errors->has('ks'))
                                <span class="help-block" role="alert">{{ $errors->first('ks') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.document.fields.ks_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('paid') ? 'has-error' : '' }}">
                            <label for="paid">{{ trans('cruds.document.fields.paid') }}</label>
                            <input class="form-control date" type="text" name="paid" id="paid" value="{{ old('paid', $document->paid) }}">
                            @if($errors->has('paid'))
                                <span class="help-block" role="alert">{{ $errors->first('paid') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.document.fields.paid_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('due_date') ? 'has-error' : '' }}">
                            <label for="due_date">{{ trans('cruds.document.fields.due_date') }}</label>
                            <input class="form-control date" type="text" name="due_date" id="due_date" value="{{ old('due_date', $document->due_date) }}">
                            @if($errors->has('due_date'))
                                <span class="help-block" role="alert">{{ $errors->first('due_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.document.fields.due_date_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.documents.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $document->id ?? 0 }}');
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
    Dropzone.options.documentDropzone = {
    url: '{{ route('admin.documents.storeMedia') }}',
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
      $('form').find('input[name="document"]').remove()
      $('form').append('<input type="hidden" name="document" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="document"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($document) && $document->document)
      var file = {!! json_encode($document->document) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="document" value="' + file.file_name + '">')
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