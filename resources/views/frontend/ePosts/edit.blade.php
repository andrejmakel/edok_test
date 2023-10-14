@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.ePost.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.e-posts.update", [$ePost->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="date">{{ trans('cruds.ePost.fields.date') }}</label>
                            <input class="form-control date" type="text" name="date" id="date" value="{{ old('date', $ePost->date) }}" required>
                            @if($errors->has('date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ePost.fields.date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="team_id">{{ trans('cruds.ePost.fields.team') }}</label>
                            <select class="form-control select2" name="team_id" id="team_id">
                                @foreach($teams as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('team_id') ? old('team_id') : $ePost->team->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('team'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('team') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ePost.fields.team_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="sender_id">{{ trans('cruds.ePost.fields.sender') }}</label>
                            <select class="form-control select2" name="sender_id" id="sender_id">
                                @foreach($senders as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('sender_id') ? old('sender_id') : $ePost->sender->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('sender'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sender') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ePost.fields.sender_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="scan">{{ trans('cruds.ePost.fields.scan') }}</label>
                            <div class="needsclick dropzone" id="scan-dropzone">
                            </div>
                            @if($errors->has('scan'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('scan') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ePost.fields.scan_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="annex">{{ trans('cruds.ePost.fields.annex') }}</label>
                            <div class="needsclick dropzone" id="annex-dropzone">
                            </div>
                            @if($errors->has('annex'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('annex') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ePost.fields.annex_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="file_short_text">{{ trans('cruds.ePost.fields.file_short_text') }}</label>
                            <input class="form-control" type="text" name="file_short_text" id="file_short_text" value="{{ old('file_short_text', $ePost->file_short_text) }}">
                            @if($errors->has('file_short_text'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('file_short_text') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ePost.fields.file_short_text_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="zadal_id">{{ trans('cruds.ePost.fields.zadal') }}</label>
                            <select class="form-control select2" name="zadal_id" id="zadal_id">
                                @foreach($zadals as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('zadal_id') ? old('zadal_id') : $ePost->zadal->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('zadal'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('zadal') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ePost.fields.zadal_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="accounting" value="0">
                                <input type="checkbox" name="accounting" id="accounting" value="1" {{ $ePost->accounting || old('accounting', 0) === 1 ? 'checked' : '' }}>
                                <label for="accounting">{{ trans('cruds.ePost.fields.accounting') }}</label>
                            </div>
                            @if($errors->has('accounting'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('accounting') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ePost.fields.accounting_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="title">{{ trans('cruds.ePost.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $ePost->title) }}">
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ePost.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="notice">{{ trans('cruds.ePost.fields.notice') }}</label>
                            <textarea class="form-control ckeditor" name="notice" id="notice">{!! old('notice', $ePost->notice) !!}</textarea>
                            @if($errors->has('notice'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('notice') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ePost.fields.notice_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="dok_typ_id">{{ trans('cruds.ePost.fields.dok_typ') }}</label>
                            <select class="form-control select2" name="dok_typ_id" id="dok_typ_id">
                                @foreach($dok_typs as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('dok_typ_id') ? old('dok_typ_id') : $ePost->dok_typ->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('dok_typ'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('dok_typ') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ePost.fields.dok_typ_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="payment_info">{{ trans('cruds.ePost.fields.payment_info') }}</label>
                            <input class="form-control" type="text" name="payment_info" id="payment_info" value="{{ old('payment_info', $ePost->payment_info) }}">
                            @if($errors->has('payment_info'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payment_info') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ePost.fields.payment_info_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="amount">{{ trans('cruds.ePost.fields.amount') }}</label>
                            <input class="form-control" type="number" name="amount" id="amount" value="{{ old('amount', $ePost->amount) }}" step="0.01">
                            @if($errors->has('amount'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('amount') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ePost.fields.amount_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="iban">{{ trans('cruds.ePost.fields.iban') }}</label>
                            <input class="form-control" type="text" name="iban" id="iban" value="{{ old('iban', $ePost->iban) }}">
                            @if($errors->has('iban'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('iban') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ePost.fields.iban_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="swift">{{ trans('cruds.ePost.fields.swift') }}</label>
                            <input class="form-control" type="text" name="swift" id="swift" value="{{ old('swift', $ePost->swift) }}">
                            @if($errors->has('swift'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('swift') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ePost.fields.swift_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="vs">{{ trans('cruds.ePost.fields.vs') }}</label>
                            <input class="form-control" type="text" name="vs" id="vs" value="{{ old('vs', $ePost->vs) }}">
                            @if($errors->has('vs'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('vs') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ePost.fields.vs_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="ss">{{ trans('cruds.ePost.fields.ss') }}</label>
                            <input class="form-control" type="text" name="ss" id="ss" value="{{ old('ss', $ePost->ss) }}">
                            @if($errors->has('ss'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('ss') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ePost.fields.ss_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="ks">{{ trans('cruds.ePost.fields.ks') }}</label>
                            <input class="form-control" type="text" name="ks" id="ks" value="{{ old('ks', $ePost->ks) }}">
                            @if($errors->has('ks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('ks') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ePost.fields.ks_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="for_recipient">{{ trans('cruds.ePost.fields.for_recipient') }}</label>
                            <input class="form-control" type="text" name="for_recipient" id="for_recipient" value="{{ old('for_recipient', $ePost->for_recipient) }}">
                            @if($errors->has('for_recipient'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('for_recipient') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ePost.fields.for_recipient_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="paid">{{ trans('cruds.ePost.fields.paid') }}</label>
                            <input class="form-control date" type="text" name="paid" id="paid" value="{{ old('paid', $ePost->paid) }}">
                            @if($errors->has('paid'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('paid') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ePost.fields.paid_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="due_date">{{ trans('cruds.ePost.fields.due_date') }}</label>
                            <input class="form-control date" type="text" name="due_date" id="due_date" value="{{ old('due_date', $ePost->due_date) }}">
                            @if($errors->has('due_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('due_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ePost.fields.due_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="send_email">{{ trans('cruds.ePost.fields.send_email') }}</label>
                            <input class="form-control date" type="text" name="send_email" id="send_email" value="{{ old('send_email', $ePost->send_email) }}">
                            @if($errors->has('send_email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('send_email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.ePost.fields.send_email_helper') }}</span>
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
    Dropzone.options.scanDropzone = {
    url: '{{ route('frontend.e-posts.storeMedia') }}',
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
      $('form').find('input[name="scan"]').remove()
      $('form').append('<input type="hidden" name="scan" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="scan"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($ePost) && $ePost->scan)
      var file = {!! json_encode($ePost->scan) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="scan" value="' + file.file_name + '">')
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
    var uploadedAnnexMap = {}
Dropzone.options.annexDropzone = {
    url: '{{ route('frontend.e-posts.storeMedia') }}',
    maxFilesize: 4, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 4
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="annex[]" value="' + response.name + '">')
      uploadedAnnexMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedAnnexMap[file.name]
      }
      $('form').find('input[name="annex[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($ePost) && $ePost->annex)
          var files =
            {!! json_encode($ePost->annex) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="annex[]" value="' + file.file_name + '">')
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
                xhr.open('POST', '{{ route('frontend.e-posts.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $ePost->id ?? 0 }}');
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