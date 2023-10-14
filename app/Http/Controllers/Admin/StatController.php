<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyStatRequest;
use App\Http\Requests\StoreStatRequest;
use App\Http\Requests\UpdateStatRequest;
use App\Models\Stat;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StatController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('stat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stats = Stat::all();

        return view('admin.stats.index', compact('stats'));
    }

    public function create()
    {
        abort_if(Gate::denies('stat_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stats.create');
    }

    public function store(StoreStatRequest $request)
    {
        $stat = Stat::create($request->all());

        return redirect()->route('admin.stats.index');
    }

    public function edit(Stat $stat)
    {
        abort_if(Gate::denies('stat_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stats.edit', compact('stat'));
    }

    public function update(UpdateStatRequest $request, Stat $stat)
    {
        $stat->update($request->all());

        return redirect()->route('admin.stats.index');
    }

    public function show(Stat $stat)
    {
        abort_if(Gate::denies('stat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stats.show', compact('stat'));
    }

    public function destroy(Stat $stat)
    {
        abort_if(Gate::denies('stat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stat->delete();

        return back();
    }

    public function massDestroy(MassDestroyStatRequest $request)
    {
        $stats = Stat::find(request('ids'));

        foreach ($stats as $stat) {
            $stat->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
