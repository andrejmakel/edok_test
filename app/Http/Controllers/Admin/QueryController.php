<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyQueryRequest;
use App\Http\Requests\StoreQueryRequest;
use App\Http\Requests\UpdateQueryRequest;
use App\Models\Query;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QueryController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('query_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $queries = Query::all();

        return view('admin.queries.index', compact('queries'));
    }

    public function create()
    {
        abort_if(Gate::denies('query_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.queries.create');
    }

    public function store(StoreQueryRequest $request)
    {
        $query = Query::create($request->all());

        return redirect()->route('admin.queries.index');
    }

    public function edit(Query $query)
    {
        abort_if(Gate::denies('query_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.queries.edit', compact('query'));
    }

    public function update(UpdateQueryRequest $request, Query $query)
    {
        $query->update($request->all());

        return redirect()->route('admin.queries.index');
    }

    public function show(Query $query)
    {
        abort_if(Gate::denies('query_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.queries.show', compact('query'));
    }

    public function destroy(Query $query)
    {
        abort_if(Gate::denies('query_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $query->delete();

        return back();
    }

    public function massDestroy(MassDestroyQueryRequest $request)
    {
        $queries = Query::find(request('ids'));

        foreach ($queries as $query) {
            $query->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
