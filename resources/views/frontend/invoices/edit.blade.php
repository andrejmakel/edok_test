@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.invoice.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.invoices.update", [$invoice->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="team_id">{{ trans('cruds.invoice.fields.team') }}</label>
                            <select class="form-control select2" name="team_id" id="team_id">
                                @foreach($teams as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('team_id') ? old('team_id') : $invoice->team->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('team'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('team') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.team_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="visible" value="0">
                                <input type="checkbox" name="visible" id="visible" value="1" {{ $invoice->visible || old('visible', 0) === 1 ? 'checked' : '' }}>
                                <label for="visible">{{ trans('cruds.invoice.fields.visible') }}</label>
                            </div>
                            @if($errors->has('visible'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('visible') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.visible_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="date">{{ trans('cruds.invoice.fields.date') }}</label>
                            <input class="form-control date" type="text" name="date" id="date" value="{{ old('date', $invoice->date) }}" required>
                            @if($errors->has('date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="nasa_id">{{ trans('cruds.invoice.fields.nasa') }}</label>
                            <select class="form-control select2" name="nasa_id" id="nasa_id">
                                @foreach($nasas as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('nasa_id') ? old('nasa_id') : $invoice->nasa->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('nasa'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nasa') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.nasa_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="typ_id">{{ trans('cruds.invoice.fields.typ') }}</label>
                            <select class="form-control select2" name="typ_id" id="typ_id">
                                @foreach($typs as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('typ_id') ? old('typ_id') : $invoice->typ->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('typ'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('typ') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.typ_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="number">{{ trans('cruds.invoice.fields.number') }}</label>
                            <input class="form-control" type="text" name="number" id="number" value="{{ old('number', $invoice->number) }}">
                            @if($errors->has('number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.number_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="name">{{ trans('cruds.invoice.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $invoice->name) }}">
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="amount">{{ trans('cruds.invoice.fields.amount') }}</label>
                            <input class="form-control" type="number" name="amount" id="amount" value="{{ old('amount', $invoice->amount) }}" step="0.01">
                            @if($errors->has('amount'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('amount') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.amount_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="payment_term">{{ trans('cruds.invoice.fields.payment_term') }}</label>
                            <input class="form-control date" type="text" name="payment_term" id="payment_term" value="{{ old('payment_term', $invoice->payment_term) }}">
                            @if($errors->has('payment_term'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payment_term') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.payment_term_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="file">{{ trans('cruds.invoice.fields.file') }}</label>
                            <div class="needsclick dropzone" id="file-dropzone">
                            </div>
                            @if($errors->has('file'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('file') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.file_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="pay_date">{{ trans('cruds.invoice.fields.pay_date') }}</label>
                            <input class="form-control date" type="text" name="pay_date" id="pay_date" value="{{ old('pay_date', $invoice->pay_date) }}">
                            @if($errors->has('pay_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('pay_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.pay_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="accounting_date">{{ trans('cruds.invoice.fields.accounting_date') }}</label>
                            <input class="form-control date" type="text" name="accounting_date" id="accounting_date" value="{{ old('accounting_date', $invoice->accounting_date) }}">
                            @if($errors->has('accounting_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('accounting_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.accounting_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="send_email">{{ trans('cruds.invoice.fields.send_email') }}</label>
                            <input class="form-control date" type="text" name="send_email" id="send_email" value="{{ old('send_email', $invoice->send_email) }}">
                            @if($errors->has('send_email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('send_email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.send_email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="paid" value="0">
                                <input type="checkbox" name="paid" id="paid" value="1" {{ $invoice->paid || old('paid', 0) === 1 ? 'checked' : '' }}>
                                <label for="paid">{{ trans('cruds.invoice.fields.paid') }}</label>
                            </div>
                            @if($errors->has('paid'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('paid') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.paid_helper') }}</span>
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
    url: '{{ route('frontend.invoices.storeMedia') }}',
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