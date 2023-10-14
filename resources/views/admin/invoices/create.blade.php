@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.invoice.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.invoices.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('team') ? 'has-error' : '' }}">
                            <label for="team_id">{{ trans('cruds.invoice.fields.team') }}</label>
                            <select class="form-control select2" name="team_id" id="team_id">
                                @foreach($teams as $id => $entry)
                                    <option value="{{ $id }}" {{ old('team_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('team'))
                                <span class="help-block" role="alert">{{ $errors->first('team') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.team_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('visible') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="visible" value="0">
                                <input type="checkbox" name="visible" id="visible" value="1" {{ old('visible', 0) == 1 || old('visible') === null ? 'checked' : '' }}>
                                <label for="visible" style="font-weight: 400">{{ trans('cruds.invoice.fields.visible') }}</label>
                            </div>
                            @if($errors->has('visible'))
                                <span class="help-block" role="alert">{{ $errors->first('visible') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.visible_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                            <label class="required" for="date">{{ trans('cruds.invoice.fields.date') }}</label>
                            <input class="form-control date" type="text" name="date" id="date" value="{{ old('date') }}" required>
                            @if($errors->has('date'))
                                <span class="help-block" role="alert">{{ $errors->first('date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nasa') ? 'has-error' : '' }}">
                            <label for="nasa_id">{{ trans('cruds.invoice.fields.nasa') }}</label>
                            <select class="form-control select2" name="nasa_id" id="nasa_id">
                                @foreach($nasas as $id => $entry)
                                    <option value="{{ $id }}" {{ old('nasa_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('nasa'))
                                <span class="help-block" role="alert">{{ $errors->first('nasa') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.nasa_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('typ') ? 'has-error' : '' }}">
                            <label for="typ_id">{{ trans('cruds.invoice.fields.typ') }}</label>
                            <select class="form-control select2" name="typ_id" id="typ_id">
                                @foreach($typs as $id => $entry)
                                    <option value="{{ $id }}" {{ old('typ_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('typ'))
                                <span class="help-block" role="alert">{{ $errors->first('typ') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.typ_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('number') ? 'has-error' : '' }}">
                            <label for="number">{{ trans('cruds.invoice.fields.number') }}</label>
                            <input class="form-control" type="text" name="number" id="number" value="{{ old('number', '') }}">
                            @if($errors->has('number'))
                                <span class="help-block" role="alert">{{ $errors->first('number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('cruds.invoice.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}">
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
                            <label for="amount">{{ trans('cruds.invoice.fields.amount') }}</label>
                            <input class="form-control" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="0.01">
                            @if($errors->has('amount'))
                                <span class="help-block" role="alert">{{ $errors->first('amount') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.amount_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('payment_term') ? 'has-error' : '' }}">
                            <label for="payment_term">{{ trans('cruds.invoice.fields.payment_term') }}</label>
                            <input class="form-control date" type="text" name="payment_term" id="payment_term" value="{{ old('payment_term') }}">
                            @if($errors->has('payment_term'))
                                <span class="help-block" role="alert">{{ $errors->first('payment_term') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.payment_term_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('file') ? 'has-error' : '' }}">
                            <label for="file">{{ trans('cruds.invoice.fields.file') }}</label>
                            <div class="needsclick dropzone" id="file-dropzone">
                            </div>
                            @if($errors->has('file'))
                                <span class="help-block" role="alert">{{ $errors->first('file') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.file_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pay_date') ? 'has-error' : '' }}">
                            <label for="pay_date">{{ trans('cruds.invoice.fields.pay_date') }}</label>
                            <input class="form-control date" type="text" name="pay_date" id="pay_date" value="{{ old('pay_date') }}">
                            @if($errors->has('pay_date'))
                                <span class="help-block" role="alert">{{ $errors->first('pay_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.pay_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('accounting_date') ? 'has-error' : '' }}">
                            <label for="accounting_date">{{ trans('cruds.invoice.fields.accounting_date') }}</label>
                            <input class="form-control date" type="text" name="accounting_date" id="accounting_date" value="{{ old('accounting_date') }}">
                            @if($errors->has('accounting_date'))
                                <span class="help-block" role="alert">{{ $errors->first('accounting_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.accounting_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('send_email') ? 'has-error' : '' }}">
                            <label for="send_email">{{ trans('cruds.invoice.fields.send_email') }}</label>
                            <input class="form-control date" type="text" name="send_email" id="send_email" value="{{ old('send_email') }}">
                            @if($errors->has('send_email'))
                                <span class="help-block" role="alert">{{ $errors->first('send_email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.send_email_helper') }}</span>
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
    Dropzone.options.fileDropzone = {
    url: '{{ route('admin.invoices.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="file"]').remove()
      $('form').append('<input type="hidden" name="file" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="file"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($invoice) && $invoice->file)
      var file = {!! json_encode($invoice->file) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="file" value="' + file.file_name + '">')
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