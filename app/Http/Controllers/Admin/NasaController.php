<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyNasaRequest;
use App\Http\Requests\StoreNasaRequest;
use App\Http\Requests\UpdateNasaRequest;
use App\Models\Nasa;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NasaController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('nasa_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nasas = Nasa::all();

        return view('admin.nasas.index', compact('nasas'));
    }

    public function create()
    {
        abort_if(Gate::denies('nasa_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.nasas.create');
    }

    public function store(StoreNasaRequest $request)
    {
        $nasa = Nasa::create($request->all());

        return redirect()->route('admin.nasas.index');
    }

    public function edit(Nasa $nasa)
    {
        abort_if(Gate::denies('nasa_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.nasas.edit', compact('nasa'));
    }

    public function update(UpdateNasaRequest $request, Nasa $nasa)
    {
        $nasa->update($request->all());

        return redirect()->route('admin.nasas.index');
    }

    public function show(Nasa $nasa)
    {
        abort_if(Gate::denies('nasa_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nasa->load('nasaInvoices');

        return view('admin.nasas.show', compact('nasa'));
    }

    public function destroy(Nasa $nasa)
    {
        abort_if(Gate::denies('nasa_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nasa->delete();

        return back();
    }

    public function massDestroy(MassDestroyNasaRequest $request)
    {
        $nasas = Nasa::find(request('ids'));

        foreach ($nasas as $nasa) {
            $nasa->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
