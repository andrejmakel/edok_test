@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.notice.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.notices.update", [$notice->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('notice') ? 'has-error' : '' }}">
                            <label for="notice">{{ trans('cruds.notice.fields.notice') }}</label>
                            <input class="form-control" type="text" name="notice" id="notice" value="{{ old('notice', $notice->notice) }}">
                            @if($errors->has('notice'))
                                <span class="help-block" role="alert">{{ $errors->first('notice') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.notice.fields.notice_helper') }}</span>
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