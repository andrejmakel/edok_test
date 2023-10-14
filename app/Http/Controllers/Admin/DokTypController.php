<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyDokTypRequest;
use App\Http\Requests\StoreDokTypRequest;
use App\Http\Requests\UpdateDokTypRequest;
use App\Models\DokTyp;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DokTypController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('dok_typ_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dokTyps = DokTyp::all();

        return view('admin.dokTyps.index', compact('dokTyps'));
    }

    public function create()
    {
        abort_if(Gate::denies('dok_typ_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dokTyps.create');
    }

    public function store(StoreDokTypRequest $request)
    {
        $dokTyp = DokTyp::create($request->all());

        return redirect()->route('admin.dok-typs.index');
    }

    public function edit(DokTyp $dokTyp)
    {
        abort_if(Gate::denies('dok_typ_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dokTyps.edit', compact('dokTyp'));
    }

    public function update(UpdateDokTypRequest $request, DokTyp $dokTyp)
    {
        $dokTyp->update($request->all());

        return redirect()->route('admin.dok-typs.index');
    }

    public function show(DokTyp $dokTyp)
    {
        abort_if(Gate::denies('dok_typ_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dokTyps.show', compact('dokTyp'));
    }

    public function destroy(DokTyp $dokTyp)
    {
        abort_if(Gate::denies('dok_typ_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dokTyp->delete();

        return back();
    }

    public function massDestroy(MassDestroyDokTypRequest $request)
    {
        $dokTyps = DokTyp::find(request('ids'));

        foreach ($dokTyps as $dokTyp) {
            $dokTyp->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
