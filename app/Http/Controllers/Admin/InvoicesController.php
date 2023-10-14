<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyInvoiceRequest;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Invoice;
use App\Models\InvoiceTyp;
use App\Models\Nasa;
use App\Models\Team;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class InvoicesController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('invoice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoices = Invoice::with(['team', 'nasa', 'typ', 'media'])->get();

        $teams = Team::get();

        $nasas = Nasa::get();

        $invoice_typs = InvoiceTyp::get();

        return view('admin.invoices.index', compact('invoice_typs', 'invoices', 'nasas', 'teams'));
    }

    public function create()
    {
        abort_if(Gate::denies('invoice_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::pluck('nazov', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nasas = Nasa::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $typs = InvoiceTyp::pluck('shortcut', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.invoices.create', compact('nasas', 'teams', 'typs'));
    }

    public function store(StoreInvoiceRequest $request)
    {
        $invoice = Invoice::create($request->all());

        if ($request->input('file', false)) {
            $invoice->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $invoice->id]);
        }

        return redirect()->route('admin.invoices.index');
    }

    public function edit(Invoice $invoice)
    {
        abort_if(Gate::denies('invoice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::pluck('nazov', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nasas = Nasa::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $typs = InvoiceTyp::pluck('shortcut', 'id')->prepend(trans('global.pleaseSelect'), '');

        $invoice->load('team', 'nasa', 'typ');

        return view('admin.invoices.edit', compact('invoice', 'nasas', 'teams', 'typs'));
    }

    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        $invoice->update($request->all());

        if ($request->input('file', false)) {
            if (! $invoice->file || $request->input('file') !== $invoice->file->file_name) {
                if ($invoice->file) {
                    $invoice->file->delete();
                }
                $invoice->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
            }
        } elseif ($invoice->file) {
            $invoice->file->delete();
        }

        return redirect()->route('admin.invoices.index');
    }

    public function show(Invoice $invoice)
    {
        abort_if(Gate::denies('invoice_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoice->load('team', 'nasa', 'typ');

        return view('admin.invoices.show', compact('invoice'));
    }

    public function destroy(Invoice $invoice)
    {
        abort_if(Gate::denies('invoice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoice->delete();

        return back();
    }

    public function massDestroy(MassDestroyInvoiceRequest $request)
    {
        $invoices = Invoice::find(request('ids'));

        foreach ($invoices as $invoice) {
            $invoice->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('invoice_create') && Gate::denies('invoice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Invoice();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
