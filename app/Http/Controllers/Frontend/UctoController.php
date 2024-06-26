<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyUctoRequest;
use App\Http\Requests\StoreUctoRequest;
use App\Http\Requests\UpdateUctoRequest;
use App\Models\AccCompany;
use App\Models\Ucto;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class UctoController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('ucto_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $uctos = Ucto::with(['acc_company'])->get();

        $acc_companies = AccCompany::get();

        return view('frontend.uctos.index', compact('acc_companies', 'uctos'));
    }

    public function create()
    {
        abort_if(Gate::denies('ucto_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $acc_companies = AccCompany::pluck('acc_company', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.uctos.create', compact('acc_companies'));
    }

    public function store(StoreUctoRequest $request)
    {
        $ucto = Ucto::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $ucto->id]);
        }

        return redirect()->route('frontend.uctos.index');
    }

    public function edit(Ucto $ucto)
    {
        abort_if(Gate::denies('ucto_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $acc_companies = AccCompany::pluck('acc_company', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ucto->load('acc_company');

        return view('frontend.uctos.edit', compact('acc_companies', 'ucto'));
    }

    public function update(UpdateUctoRequest $request, Ucto $ucto)
    {
        $ucto->update($request->all());

        return redirect()->route('frontend.uctos.index');
    }

    public function show(Ucto $ucto)
    {
        abort_if(Gate::denies('ucto_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ucto->load('acc_company');

        return view('frontend.uctos.show', compact('ucto'));
    }

    public function destroy(Ucto $ucto)
    {
        abort_if(Gate::denies('ucto_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ucto->delete();

        return back();
    }

    public function massDestroy(MassDestroyUctoRequest $request)
    {
        $uctos = Ucto::find(request('ids'));

        foreach ($uctos as $ucto) {
            $ucto->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('ucto_create') && Gate::denies('ucto_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Ucto();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
