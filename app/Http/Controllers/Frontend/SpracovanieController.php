<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySpracovanyRequest;
use App\Http\Requests\StoreSpracovanyRequest;
use App\Http\Requests\UpdateSpracovanyRequest;
use App\Models\Spracovany;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SpracovanieController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('spracovany_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $spracovanies = Spracovany::all();

        return view('frontend.spracovanies.index', compact('spracovanies'));
    }

    public function create()
    {
        abort_if(Gate::denies('spracovany_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.spracovanies.create');
    }

    public function store(StoreSpracovanyRequest $request)
    {
        $spracovany = Spracovany::create($request->all());

        return redirect()->route('frontend.spracovanies.index');
    }

    public function edit(Spracovany $spracovany)
    {
        abort_if(Gate::denies('spracovany_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.spracovanies.edit', compact('spracovany'));
    }

    public function update(UpdateSpracovanyRequest $request, Spracovany $spracovany)
    {
        $spracovany->update($request->all());

        return redirect()->route('frontend.spracovanies.index');
    }

    public function show(Spracovany $spracovany)
    {
        abort_if(Gate::denies('spracovany_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.spracovanies.show', compact('spracovany'));
    }

    public function destroy(Spracovany $spracovany)
    {
        abort_if(Gate::denies('spracovany_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $spracovany->delete();

        return back();
    }

    public function massDestroy(MassDestroySpracovanyRequest $request)
    {
        $spracovanies = Spracovany::find(request('ids'));

        foreach ($spracovanies as $spracovany) {
            $spracovany->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
