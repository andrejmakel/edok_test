<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCallTypRequest;
use App\Http\Requests\StoreCallTypRequest;
use App\Http\Requests\UpdateCallTypRequest;
use App\Models\CallTyp;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CallTypController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('call_typ_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $callTyps = CallTyp::all();

        return view('frontend.callTyps.index', compact('callTyps'));
    }

    public function create()
    {
        abort_if(Gate::denies('call_typ_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.callTyps.create');
    }

    public function store(StoreCallTypRequest $request)
    {
        $callTyp = CallTyp::create($request->all());

        return redirect()->route('frontend.call-typs.index');
    }

    public function edit(CallTyp $callTyp)
    {
        abort_if(Gate::denies('call_typ_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.callTyps.edit', compact('callTyp'));
    }

    public function update(UpdateCallTypRequest $request, CallTyp $callTyp)
    {
        $callTyp->update($request->all());

        return redirect()->route('frontend.call-typs.index');
    }

    public function show(CallTyp $callTyp)
    {
        abort_if(Gate::denies('call_typ_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.callTyps.show', compact('callTyp'));
    }

    public function destroy(CallTyp $callTyp)
    {
        abort_if(Gate::denies('call_typ_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $callTyp->delete();

        return back();
    }

    public function massDestroy(MassDestroyCallTypRequest $request)
    {
        $callTyps = CallTyp::find(request('ids'));

        foreach ($callTyps as $callTyp) {
            $callTyp->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
