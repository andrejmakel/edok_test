<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTypRequest;
use App\Http\Requests\StoreTypRequest;
use App\Http\Requests\UpdateTypRequest;
use App\Models\Typ;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TypController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('typ_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typs = Typ::all();

        return view('frontend.typs.index', compact('typs'));
    }

    public function create()
    {
        abort_if(Gate::denies('typ_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.typs.create');
    }

    public function store(StoreTypRequest $request)
    {
        $typ = Typ::create($request->all());

        return redirect()->route('frontend.typs.index');
    }

    public function edit(Typ $typ)
    {
        abort_if(Gate::denies('typ_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.typs.edit', compact('typ'));
    }

    public function update(UpdateTypRequest $request, Typ $typ)
    {
        $typ->update($request->all());

        return redirect()->route('frontend.typs.index');
    }

    public function show(Typ $typ)
    {
        abort_if(Gate::denies('typ_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.typs.show', compact('typ'));
    }

    public function destroy(Typ $typ)
    {
        abort_if(Gate::denies('typ_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typ->delete();

        return back();
    }

    public function massDestroy(MassDestroyTypRequest $request)
    {
        $typs = Typ::find(request('ids'));

        foreach ($typs as $typ) {
            $typ->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
