<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyInsuranceRequest;
use App\Http\Requests\StoreInsuranceRequest;
use App\Http\Requests\UpdateInsuranceRequest;
use App\Models\Insurance;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InsuranceController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('insurance_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $insurances = Insurance::all();

        return view('frontend.insurances.index', compact('insurances'));
    }

    public function create()
    {
        abort_if(Gate::denies('insurance_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.insurances.create');
    }

    public function store(StoreInsuranceRequest $request)
    {
        $insurance = Insurance::create($request->all());

        return redirect()->route('frontend.insurances.index');
    }

    public function edit(Insurance $insurance)
    {
        abort_if(Gate::denies('insurance_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.insurances.edit', compact('insurance'));
    }

    public function update(UpdateInsuranceRequest $request, Insurance $insurance)
    {
        $insurance->update($request->all());

        return redirect()->route('frontend.insurances.index');
    }

    public function show(Insurance $insurance)
    {
        abort_if(Gate::denies('insurance_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.insurances.show', compact('insurance'));
    }

    public function destroy(Insurance $insurance)
    {
        abort_if(Gate::denies('insurance_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $insurance->delete();

        return back();
    }

    public function massDestroy(MassDestroyInsuranceRequest $request)
    {
        $insurances = Insurance::find(request('ids'));

        foreach ($insurances as $insurance) {
            $insurance->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
