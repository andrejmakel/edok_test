@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.car.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.cars.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.car.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $car->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.car.fields.team') }}
                                    </th>
                                    <td>
                                        {{ $car->team->nazov ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.car.fields.typ') }}
                                    </th>
                                    <td>
                                        {{ $car->typ->typ_sk ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.car.fields.znacka') }}
                                    </th>
                                    <td>
                                        {{ $car->znacka->znacka ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.car.fields.model') }}
                                    </th>
                                    <td>
                                        {{ $car->model }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.car.fields.ecv') }}
                                    </th>
                                    <td>
                                        {{ $car->ecv }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.car.fields.vin') }}
                                    </th>
                                    <td>
                                        {{ $car->vin }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.car.fields.sk_register') }}
                                    </th>
                                    <td>
                                        {{ $car->sk_register }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.car.fields.stk_date') }}
                                    </th>
                                    <td>
                                        {{ $car->stk_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.car.fields.pzp_date') }}
                                    </th>
                                    <td>
                                        {{ $car->pzp_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.car.fields.pzp_cislo') }}
                                    </th>
                                    <td>
                                        {{ $car->pzp_cislo }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.car.fields.pzp_documents') }}
                                    </th>
                                    <td>
                                        @foreach($car->pzp_documents as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.car.fields.kasko_date') }}
                                    </th>
                                    <td>
                                        {{ $car->kasko_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.car.fields.kasko_cislo') }}
                                    </th>
                                    <td>
                                        {{ $car->kasko_cislo }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.car.fields.kasko_dokuments') }}
                                    </th>
                                    <td>
                                        @foreach($car->kasko_dokuments as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.car.fields.poist_notice') }}
                                    </th>
                                    <td>
                                        {!! $car->poist_notice !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.car.fields.pzp_poistovna') }}
                                    </th>
                                    <td>
                                        {{ $car->pzp_poistovna->nazov ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.car.fields.kasko_poistovna') }}
                                    </th>
                                    <td>
                                        {{ $car->kasko_poistovna->nazov ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.cars.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection