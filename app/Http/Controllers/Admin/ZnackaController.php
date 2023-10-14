<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyZnackaRequest;
use App\Http\Requests\StoreZnackaRequest;
use App\Http\Requests\UpdateZnackaRequest;
use App\Models\Znacka;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ZnackaController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('znacka_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $znackas = Znacka::all();

        return view('admin.znackas.index', compact('znackas'));
    }

    public function create()
    {
        abort_if(Gate::denies('znacka_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.znackas.create');
    }

    public function store(StoreZnackaRequest $request)
    {
        $znacka = Znacka::create($request->all());

        return redirect()->route('admin.znackas.index');
    }

    public function edit(Znacka $znacka)
    {
        abort_if(Gate::denies('znacka_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.znackas.edit', compact('znacka'));
    }

    public function update(UpdateZnackaRequest $request, Znacka $znacka)
    {
        $znacka->update($request->all());

        return redirect()->route('admin.znackas.index');
    }

    public function show(Znacka $znacka)
    {
        abort_if(Gate::denies('znacka_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.znackas.show', compact('znacka'));
    }

    public function destroy(Znacka $znacka)
    {
        abort_if(Gate::denies('znacka_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $znacka->delete();

        return back();
    }

    public function massDestroy(MassDestroyZnackaRequest $request)
    {
        Znacka::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
