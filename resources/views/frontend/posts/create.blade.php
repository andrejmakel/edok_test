@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.post.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.posts.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="date">{{ trans('cruds.post.fields.date') }}</label>
                            <input class="form-control date" type="text" name="date" id="date" value="{{ old('date') }}" required>
                            @if($errors->has('date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="team_id">{{ trans('cruds.post.fields.team') }}</label>
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
                            <span class="help-block">{{ trans('cruds.post.fields.team_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="post_nr">{{ trans('cruds.post.fields.post_nr') }}</label>
                            <input class="form-control" type="text" name="post_nr" id="post_nr" value="{{ old('post_nr', '') }}">
                            @if($errors->has('post_nr'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('post_nr') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.post_nr_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="sender_id">{{ trans('cruds.post.fields.sender') }}</label>
                            <select class="form-control select2" name="sender_id" id="sender_id">
                                @foreach($senders as $id => $entry)
                                    <option value="{{ $id }}" {{ old('sender_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('sender'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sender') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.sender_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="post_form_id">{{ trans('cruds.post.fields.post_form') }}</label>
                            <select class="form-control select2" name="post_form_id" id="post_form_id">
                                @foreach($post_forms as $id => $entry)
                                    <option value="{{ $id }}" {{ old('post_form_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('post_form'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('post_form') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.post_form_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="envelope">{{ trans('cruds.post.fields.envelope') }}</label>
                            <div class="needsclick dropzone" id="envelope-dropzone">
                            </div>
                            @if($errors->has('envelope'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('envelope') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.envelope_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="scan">{{ trans('cruds.post.fields.scan') }}</label>
                            <div class="needsclick dropzone" id="scan-dropzone">
                            </div>
                            @if($errors->has('scan'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('scan') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.scan_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="title">{{ trans('cruds.post.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', '') }}">
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="file_short_text">{{ trans('cruds.post.fields.file_short_text') }}</label>
                            <input class="form-control" type="text" name="file_short_text" id="file_short_text" value="{{ old('file_short_text', '') }}">
                            @if($errors->has('file_short_text'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('file_short_text') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.file_short_text_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="notice">{{ trans('cruds.post.fields.notice') }}</label>
                            <textarea class="form-control ckeditor" name="notice" id="notice">{!! old('notice') !!}</textarea>
                            @if($errors->has('notice'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('notice') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.notice_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="zadal_id">{{ trans('cruds.post.fields.zadal') }}</label>
                            <select class="form-control select2" name="zadal_id" id="zadal_id">
                                @foreach($zadals as $id => $entry)
                                    <option value="{{ $id }}" {{ old('zadal_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('zadal'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('zadal') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.zadal_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="accounting" value="0">
                                <input type="checkbox" name="accounting" id="accounting" value="1" {{ old('accounting', 0) == 1 || old('accounting') === null ? 'checked' : '' }}>
                                <label for="accounting">{{ trans('cruds.post.fields.accounting') }}</label>
                            </div>
                            @if($errors->has('accounting'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('accounting') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.accounting_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status_id">{{ trans('cruds.post.fields.status') }}</label>
                            <select class="form-control select2" name="status_id" id="status_id">
                                @foreach($statuses as $id => $entry)
                                    <option value="{{ $id }}" {{ old('status_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status_date">{{ trans('cruds.post.fields.status_date') }}</label>
                            <input class="form-control date" type="text" name="status_date" id="status_date" value="{{ old('status_date') }}">
                            @if($errors->has('status_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.status_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="customer_query_id">{{ trans('cruds.post.fields.customer_query') }}</label>
                            <select class="form-control select2" name="customer_query_id" id="customer_query_id">
                                @foreach($customer_queries as $id => $entry)
                                    <option value="{{ $id }}" {{ old('customer_query_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('customer_query'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('customer_query') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.customer_query_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="customer_notice">{{ trans('cruds.post.fields.customer_notice') }}</label>
                            <input class="form-control" type="text" name="customer_notice" id="customer_notice" value="{{ old('customer_notice', '') }}">
                            @if($errors->has('customer_notice'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('customer_notice') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.customer_notice_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="processed_id">{{ trans('cruds.post.fields.processed') }}</label>
                            <select class="form-control select2" name="processed_id" id="processed_id">
                                @foreach($processeds as $id => $entry)
                                    <option value="{{ $id }}" {{ old('processed_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('processed'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('processed') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.processed_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="processed_at">{{ trans('cruds.post.fields.processed_at') }}</label>
                            <input class="form-control date" type="text" name="processed_at" id="processed_at" value="{{ old('processed_at') }}">
                            @if($errors->has('processed_at'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('processed_at') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.processed_at_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="send_email" value="0">
                                <input type="checkbox" name="send_email" id="send_email" value="1" {{ old('send_email', 0) == 1 ? 'checked' : '' }}>
                                <label for="send_email">{{ trans('cruds.post.fields.send_email') }}</label>
                            </div>
                            @if($errors->has('send_email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('send_email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.send_email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="dok_typ_id">{{ trans('cruds.post.fields.dok_typ') }}</label>
                            <select class="form-control select2" name="dok_typ_id" id="dok_typ_id">
                                @foreach($dok_typs as $id => $entry)
                                    <option value="{{ $id }}" {{ old('dok_typ_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('dok_typ'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('dok_typ') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.dok_typ_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="payment_info">{{ trans('cruds.post.fields.payment_info') }}</label>
                            <input class="form-control" type="text" name="payment_info" id="payment_info" value="{{ old('payment_info', '') }}">
                            @if($errors->has('payment_info'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payment_info') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.payment_info_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="amount">{{ trans('cruds.post.fields.amount') }}</label>
                            <input class="form-control" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="0.01">
                            @if($errors->has('amount'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('amount') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.amount_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="iban">{{ trans('cruds.post.fields.iban') }}</label>
                            <input class="form-control" type="text" name="iban" id="iban" value="{{ old('iban', '') }}">
                            @if($errors->has('iban'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('iban') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.iban_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="swift">{{ trans('cruds.post.fields.swift') }}</label>
                            <input class="form-control" type="text" name="swift" id="swift" value="{{ old('swift', '') }}">
                            @if($errors->has('swift'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('swift') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.swift_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="vs">{{ trans('cruds.post.fields.vs') }}</label>
                            <input class="form-control" type="text" name="vs" id="vs" value="{{ old('vs', '') }}">
                            @if($errors->has('vs'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('vs') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.vs_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="ss">{{ trans('cruds.post.fields.ss') }}</label>
                            <input class="form-control" type="text" name="ss" id="ss" value="{{ old('ss', '') }}">
                            @if($errors->has('ss'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('ss') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.ss_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="ks">{{ trans('cruds.post.fields.ks') }}</label>
                            <input class="form-control" type="text" name="ks" id="ks" value="{{ old('ks', '') }}">
                            @if($errors->has('ks'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('ks') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.ks_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="for_recipient">{{ trans('cruds.post.fields.for_recipient') }}</label>
                            <input class="form-control" type="text" name="for_recipient" id="for_recipient" value="{{ old('for_recipient', '') }}">
                            @if($errors->has('for_recipient'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('for_recipient') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.for_recipient_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="paid">{{ trans('cruds.post.fields.paid') }}</label>
                            <input class="form-control date" type="text" name="paid" id="paid" value="{{ old('paid') }}">
                            @if($errors->has('paid'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('paid') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.paid_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="due_date">{{ trans('cruds.post.fields.due_date') }}</label>
                            <input class="form-control date" type="text" name="due_date" id="due_date" value="{{ old('due_date') }}">
                            @if($errors->has('due_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('due_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.due_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="reads">{{ trans('cruds.post.fields.read') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="reads[]" id="reads" multiple>
                                @foreach($reads as $id => $read)
                                    <option value="{{ $id }}" {{ in_array($id, old('reads', [])) ? 'selected' : '' }}>{{ $read }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('reads'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('reads') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.post.fields.read_helper') }}</span>
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
    Dropzone.options.envelopeDropzone = {
    url: '{{ route('frontend.posts.storeMedia') }}',
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
      $('form').find('input[name="envelope"]').remove()
      $('form').append('<input type="hidden" name="envelope" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="envelope"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($post) && $post->envelope)
      var file = {!! json_encode($post->envelope) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="envelope" value="' + file.file_name + '">')
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
    Dropzone.options.scanDropzone = {
    url: '{{ route('frontend.posts.storeMedia') }}',
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
@if(isset($post) && $post->scan)
      var file = {!! json_encode($post->scan) !!}
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
                xhr.open('POST', '{{ route('frontend.posts.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $post->id ?? 0 }}');
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