<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySidloRequest;
use App\Http\Requests\StoreSidloRequest;
use App\Http\Requests\UpdateSidloRequest;
use App\Models\Sidlo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SidloController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('sidlo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sidlos = Sidlo::all();

        return view('admin.sidlos.index', compact('sidlos'));
    }

    public function create()
    {
        abort_if(Gate::denies('sidlo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sidlos.create');
    }

    public function store(StoreSidloRequest $request)
    {
        $sidlo = Sidlo::create($request->all());

        return redirect()->route('admin.sidlos.index');
    }

    public function edit(Sidlo $sidlo)
    {
        abort_if(Gate::denies('sidlo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sidlos.edit', compact('sidlo'));
    }

    public function update(UpdateSidloRequest $request, Sidlo $sidlo)
    {
        $sidlo->update($request->all());

        return redirect()->route('admin.sidlos.index');
    }

    public function show(Sidlo $sidlo)
    {
        abort_if(Gate::denies('sidlo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sidlos.show', compact('sidlo'));
    }

    public function destroy(Sidlo $sidlo)
    {
        abort_if(Gate::denies('sidlo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sidlo->delete();

        return back();
    }

    public function massDestroy(MassDestroySidloRequest $request)
    {
        $sidlos = Sidlo::find(request('ids'));

        foreach ($sidlos as $sidlo) {
            $sidlo->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
