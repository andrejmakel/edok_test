<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyInvoiceTypRequest;
use App\Http\Requests\StoreInvoiceTypRequest;
use App\Http\Requests\UpdateInvoiceTypRequest;
use App\Models\InvoiceTyp;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InvoiceTypController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('invoice_typ_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoiceTyps = InvoiceTyp::all();

        return view('admin.invoiceTyps.index', compact('invoiceTyps'));
    }

    public function create()
    {
        abort_if(Gate::denies('invoice_typ_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.invoiceTyps.create');
    }

    public function store(StoreInvoiceTypRequest $request)
    {
        $invoiceTyp = InvoiceTyp::create($request->all());

        return redirect()->route('admin.invoice-typs.index');
    }

    public function edit(InvoiceTyp $invoiceTyp)
    {
        abort_if(Gate::denies('invoice_typ_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.invoiceTyps.edit', compact('invoiceTyp'));
    }

    public function update(UpdateInvoiceTypRequest $request, InvoiceTyp $invoiceTyp)
    {
        $invoiceTyp->update($request->all());

        return redirect()->route('admin.invoice-typs.index');
    }

    public function show(InvoiceTyp $invoiceTyp)
    {
        abort_if(Gate::denies('invoice_typ_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.invoiceTyps.show', compact('invoiceTyp'));
    }

    public function destroy(InvoiceTyp $invoiceTyp)
    {
        abort_if(Gate::denies('invoice_typ_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoiceTyp->delete();

        return back();
    }

    public function massDestroy(MassDestroyInvoiceTypRequest $request)
    {
        InvoiceTyp::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
