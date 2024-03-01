<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyAccCompanyRequest;
use App\Http\Requests\StoreAccCompanyRequest;
use App\Http\Requests\UpdateAccCompanyRequest;
use App\Models\AccCompany;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccCompanyController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('acc_company_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accCompanies = AccCompany::all();

        return view('frontend.accCompanies.index', compact('accCompanies'));
    }

    public function create()
    {
        abort_if(Gate::denies('acc_company_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.accCompanies.create');
    }

    public function store(StoreAccCompanyRequest $request)
    {
        $accCompany = AccCompany::create($request->all());

        return redirect()->route('frontend.acc-companies.index');
    }

    public function edit(AccCompany $accCompany)
    {
        abort_if(Gate::denies('acc_company_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.accCompanies.edit', compact('accCompany'));
    }

    public function update(UpdateAccCompanyRequest $request, AccCompany $accCompany)
    {
        $accCompany->update($request->all());

        return redirect()->route('frontend.acc-companies.index');
    }

    public function show(AccCompany $accCompany)
    {
        abort_if(Gate::denies('acc_company_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.accCompanies.show', compact('accCompany'));
    }

    public function destroy(AccCompany $accCompany)
    {
        abort_if(Gate::denies('acc_company_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accCompany->delete();

        return back();
    }

    public function massDestroy(MassDestroyAccCompanyRequest $request)
    {
        $accCompanies = AccCompany::find(request('ids'));

        foreach ($accCompanies as $accCompany) {
            $accCompany->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
