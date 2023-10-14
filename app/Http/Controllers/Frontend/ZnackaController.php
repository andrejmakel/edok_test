<?php

namespace App\Http\Controllers\Frontend;

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

        return view('frontend.znackas.index', compact('znackas'));
    }

    public function create()
    {
        abort_if(Gate::denies('znacka_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.znackas.create');
    }

    public function store(StoreZnackaRequest $request)
    {
        $znacka = Znacka::create($request->all());

        return redirect()->route('frontend.znackas.index');
    }

    public function edit(Znacka $znacka)
    {
        abort_if(Gate::denies('znacka_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.znackas.edit', compact('znacka'));
    }

    public function update(UpdateZnackaRequest $request, Znacka $znacka)
    {
        $znacka->update($request->all());

        return redirect()->route('frontend.znackas.index');
    }

    public function show(Znacka $znacka)
    {
        abort_if(Gate::denies('znacka_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.znackas.show', compact('znacka'));
    }

    public function destroy(Znacka $znacka)
    {
        abort_if(Gate::denies('znacka_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $znacka->delete();

        return back();
    }

    public function massDestroy(MassDestroyZnackaRequest $request)
    {
        $znackas = Znacka::find(request('ids'));

        foreach ($znackas as $znacka) {
            $znacka->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
