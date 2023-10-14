<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyFirmaRequest;
use App\Http\Requests\StoreFirmaRequest;
use App\Http\Requests\UpdateFirmaRequest;
use App\Models\Bank;
use App\Models\ESchranka;
use App\Models\Firma;
use App\Models\Nasa;
use App\Models\Spracovany;
use App\Models\Team;
use App\Models\Ucto;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class FirmaController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('firma_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $firmas = Firma::with(['nasa', 'team', 'kontakts', 'e_schranka', 'spracovanie', 'ucto', 'bank', 'media'])->get();

        $nasas = Nasa::get();

        $teams = Team::get();

        $users = User::get();

        $e_schrankas = ESchranka::get();

        $spracovanies = Spracovany::get();

        $uctos = Ucto::get();

        $banks = Bank::get();

        return view('frontend.firmas.index', compact('banks', 'e_schrankas', 'firmas', 'nasas', 'spracovanies', 'teams', 'uctos', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('firma_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nasas = Nasa::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $teams = Team::pluck('nazov', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kontakts = User::pluck('name', 'id');

        $e_schrankas = ESchranka::pluck('splnomocnenec', 'id')->prepend(trans('global.pleaseSelect'), '');

        $spracovanies = Spracovany::pluck('popis', 'id')->prepend(trans('global.pleaseSelect'), '');

        $uctos = Ucto::pluck('uctuje', 'id')->prepend(trans('global.pleaseSelect'), '');

        $banks = Bank::pluck('bank', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.firmas.create', compact('banks', 'e_schrankas', 'kontakts', 'nasas', 'spracovanies', 'teams', 'uctos'));
    }

    public function store(StoreFirmaRequest $request)
    {
        $firma = Firma::create($request->all());
        $firma->kontakts()->sync($request->input('kontakts', []));
        if ($request->input('orsr', false)) {
            $firma->addMedia(storage_path('tmp/uploads/' . basename($request->input('orsr'))))->toMediaCollection('orsr');
        }

        if ($request->input('zrsr', false)) {
            $firma->addMedia(storage_path('tmp/uploads/' . basename($request->input('zrsr'))))->toMediaCollection('zrsr');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $firma->id]);
        }

        return redirect()->route('frontend.firmas.index');
    }

    public function edit(Firma $firma)
    {
        abort_if(Gate::denies('firma_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nasas = Nasa::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $teams = Team::pluck('nazov', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kontakts = User::pluck('name', 'id');

        $e_schrankas = ESchranka::pluck('splnomocnenec', 'id')->prepend(trans('global.pleaseSelect'), '');

        $spracovanies = Spracovany::pluck('popis', 'id')->prepend(trans('global.pleaseSelect'), '');

        $uctos = Ucto::pluck('uctuje', 'id')->prepend(trans('global.pleaseSelect'), '');

        $banks = Bank::pluck('bank', 'id')->prepend(trans('global.pleaseSelect'), '');

        $firma->load('nasa', 'team', 'kontakts', 'e_schranka', 'spracovanie', 'ucto', 'bank');

        return view('frontend.firmas.edit', compact('banks', 'e_schrankas', 'firma', 'kontakts', 'nasas', 'spracovanies', 'teams', 'uctos'));
    }

    public function update(UpdateFirmaRequest $request, Firma $firma)
    {
        $firma->update($request->all());
        $firma->kontakts()->sync($request->input('kontakts', []));
        if ($request->input('orsr', false)) {
            if (! $firma->orsr || $request->input('orsr') !== $firma->orsr->file_name) {
                if ($firma->orsr) {
                    $firma->orsr->delete();
                }
                $firma->addMedia(storage_path('tmp/uploads/' . basename($request->input('orsr'))))->toMediaCollection('orsr');
            }
        } elseif ($firma->orsr) {
            $firma->orsr->delete();
        }

        if ($request->input('zrsr', false)) {
            if (! $firma->zrsr || $request->input('zrsr') !== $firma->zrsr->file_name) {
                if ($firma->zrsr) {
                    $firma->zrsr->delete();
                }
                $firma->addMedia(storage_path('tmp/uploads/' . basename($request->input('zrsr'))))->toMediaCollection('zrsr');
            }
        } elseif ($firma->zrsr) {
            $firma->zrsr->delete();
        }

        return redirect()->route('frontend.firmas.index');
    }

    public function show(Firma $firma)
    {
        abort_if(Gate::denies('firma_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $firma->load('nasa', 'team', 'kontakts', 'e_schranka', 'spracovanie', 'ucto', 'bank');

        return view('frontend.firmas.show', compact('firma'));
    }

    public function destroy(Firma $firma)
    {
        abort_if(Gate::denies('firma_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $firma->delete();

        return back();
    }

    public function massDestroy(MassDestroyFirmaRequest $request)
    {
        $firmas = Firma::find(request('ids'));

        foreach ($firmas as $firma) {
            $firma->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('firma_create') && Gate::denies('firma_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Firma();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
