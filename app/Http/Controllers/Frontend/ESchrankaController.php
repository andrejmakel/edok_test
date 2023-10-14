<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyESchrankaRequest;
use App\Http\Requests\StoreESchrankaRequest;
use App\Http\Requests\UpdateESchrankaRequest;
use App\Models\ESchranka;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ESchrankaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('e_schranka_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eSchrankas = ESchranka::all();

        return view('frontend.eSchrankas.index', compact('eSchrankas'));
    }

    public function create()
    {
        abort_if(Gate::denies('e_schranka_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.eSchrankas.create');
    }

    public function store(StoreESchrankaRequest $request)
    {
        $eSchranka = ESchranka::create($request->all());

        return redirect()->route('frontend.e-schrankas.index');
    }

    public function edit(ESchranka $eSchranka)
    {
        abort_if(Gate::denies('e_schranka_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.eSchrankas.edit', compact('eSchranka'));
    }

    public function update(UpdateESchrankaRequest $request, ESchranka $eSchranka)
    {
        $eSchranka->update($request->all());

        return redirect()->route('frontend.e-schrankas.index');
    }

    public function show(ESchranka $eSchranka)
    {
        abort_if(Gate::denies('e_schranka_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.eSchrankas.show', compact('eSchranka'));
    }

    public function destroy(ESchranka $eSchranka)
    {
        abort_if(Gate::denies('e_schranka_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eSchranka->delete();

        return back();
    }

    public function massDestroy(MassDestroyESchrankaRequest $request)
    {
        $eSchrankas = ESchranka::find(request('ids'));

        foreach ($eSchrankas as $eSchranka) {
            $eSchranka->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
