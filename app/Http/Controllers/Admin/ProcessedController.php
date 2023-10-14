<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyProcessedRequest;
use App\Http\Requests\StoreProcessedRequest;
use App\Http\Requests\UpdateProcessedRequest;
use App\Models\Processed;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProcessedController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('processed_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $processeds = Processed::all();

        return view('admin.processeds.index', compact('processeds'));
    }

    public function create()
    {
        abort_if(Gate::denies('processed_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.processeds.create');
    }

    public function store(StoreProcessedRequest $request)
    {
        $processed = Processed::create($request->all());

        return redirect()->route('admin.processeds.index');
    }

    public function edit(Processed $processed)
    {
        abort_if(Gate::denies('processed_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.processeds.edit', compact('processed'));
    }

    public function update(UpdateProcessedRequest $request, Processed $processed)
    {
        $processed->update($request->all());

        return redirect()->route('admin.processeds.index');
    }

    public function show(Processed $processed)
    {
        abort_if(Gate::denies('processed_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.processeds.show', compact('processed'));
    }

    public function destroy(Processed $processed)
    {
        abort_if(Gate::denies('processed_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $processed->delete();

        return back();
    }

    public function massDestroy(MassDestroyProcessedRequest $request)
    {
        $processeds = Processed::find(request('ids'));

        foreach ($processeds as $processed) {
            $processed->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
