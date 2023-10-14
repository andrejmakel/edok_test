<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyDokKatRequest;
use App\Http\Requests\StoreDokKatRequest;
use App\Http\Requests\UpdateDokKatRequest;
use App\Models\DokKat;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DokKatController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('dok_kat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dokKats = DokKat::all();

        return view('frontend.dokKats.index', compact('dokKats'));
    }

    public function create()
    {
        abort_if(Gate::denies('dok_kat_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.dokKats.create');
    }

    public function store(StoreDokKatRequest $request)
    {
        $dokKat = DokKat::create($request->all());

        return redirect()->route('frontend.dok-kats.index');
    }

    public function edit(DokKat $dokKat)
    {
        abort_if(Gate::denies('dok_kat_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.dokKats.edit', compact('dokKat'));
    }

    public function update(UpdateDokKatRequest $request, DokKat $dokKat)
    {
        $dokKat->update($request->all());

        return redirect()->route('frontend.dok-kats.index');
    }

    public function show(DokKat $dokKat)
    {
        abort_if(Gate::denies('dok_kat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.dokKats.show', compact('dokKat'));
    }

    public function destroy(DokKat $dokKat)
    {
        abort_if(Gate::denies('dok_kat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dokKat->delete();

        return back();
    }

    public function massDestroy(MassDestroyDokKatRequest $request)
    {
        $dokKats = DokKat::find(request('ids'));

        foreach ($dokKats as $dokKat) {
            $dokKat->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
