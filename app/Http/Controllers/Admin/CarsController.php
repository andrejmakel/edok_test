<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCarRequest;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;
use App\Models\Insurance;
use App\Models\Team;
use App\Models\Typ;
use App\Models\Znacka;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CarsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('car_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cars = Car::with(['team', 'typ', 'znacka', 'pzp_poistovna', 'kasko_poistovna', 'media'])->get();

        $teams = Team::get();

        $typs = Typ::get();

        $znackas = Znacka::get();

        $insurances = Insurance::get();

        return view('admin.cars.index', compact('cars', 'insurances', 'teams', 'typs', 'znackas'));
    }

    public function create()
    {
        abort_if(Gate::denies('car_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::pluck('nazov', 'id')->prepend(trans('global.pleaseSelect'), '');

        $typs = Typ::pluck('typ_sk', 'id')->prepend(trans('global.pleaseSelect'), '');

        $znackas = Znacka::pluck('znacka', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pzp_poistovnas = Insurance::pluck('nazov', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kasko_poistovnas = Insurance::pluck('nazov', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.cars.create', compact('kasko_poistovnas', 'pzp_poistovnas', 'teams', 'typs', 'znackas'));
    }

    public function store(StoreCarRequest $request)
    {
        $car = Car::create($request->all());

        foreach ($request->input('pzp_documents', []) as $file) {
            $car->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('pzp_documents');
        }

        foreach ($request->input('kasko_dokuments', []) as $file) {
            $car->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('kasko_dokuments');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $car->id]);
        }

        return redirect()->route('admin.cars.index');
    }

    public function edit(Car $car)
    {
        abort_if(Gate::denies('car_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::pluck('nazov', 'id')->prepend(trans('global.pleaseSelect'), '');

        $typs = Typ::pluck('typ_sk', 'id')->prepend(trans('global.pleaseSelect'), '');

        $znackas = Znacka::pluck('znacka', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pzp_poistovnas = Insurance::pluck('nazov', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kasko_poistovnas = Insurance::pluck('nazov', 'id')->prepend(trans('global.pleaseSelect'), '');

        $car->load('team', 'typ', 'znacka', 'pzp_poistovna', 'kasko_poistovna');

        return view('admin.cars.edit', compact('car', 'kasko_poistovnas', 'pzp_poistovnas', 'teams', 'typs', 'znackas'));
    }

    public function update(UpdateCarRequest $request, Car $car)
    {
        $car->update($request->all());

        if (count($car->pzp_documents) > 0) {
            foreach ($car->pzp_documents as $media) {
                if (! in_array($media->file_name, $request->input('pzp_documents', []))) {
                    $media->delete();
                }
            }
        }
        $media = $car->pzp_documents->pluck('file_name')->toArray();
        foreach ($request->input('pzp_documents', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $car->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('pzp_documents');
            }
        }

        if (count($car->kasko_dokuments) > 0) {
            foreach ($car->kasko_dokuments as $media) {
                if (! in_array($media->file_name, $request->input('kasko_dokuments', []))) {
                    $media->delete();
                }
            }
        }
        $media = $car->kasko_dokuments->pluck('file_name')->toArray();
        foreach ($request->input('kasko_dokuments', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $car->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('kasko_dokuments');
            }
        }

        return redirect()->route('admin.cars.index');
    }

    public function show(Car $car)
    {
        abort_if(Gate::denies('car_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $car->load('team', 'typ', 'znacka', 'pzp_poistovna', 'kasko_poistovna');

        return view('admin.cars.show', compact('car'));
    }

    public function destroy(Car $car)
    {
        abort_if(Gate::denies('car_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $car->delete();

        return back();
    }

    public function massDestroy(MassDestroyCarRequest $request)
    {
        $cars = Car::find(request('ids'));

        foreach ($cars as $car) {
            $car->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('car_create') && Gate::denies('car_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Car();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
