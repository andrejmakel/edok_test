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
use Yajra\DataTables\Facades\DataTables;

class InvoicesController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('invoice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Invoice::with(['team', 'nasa', 'typ'])->select(sprintf('%s.*', (new Invoice)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'invoice_show';
                $editGate      = 'invoice_edit';
                $deleteGate    = 'invoice_delete';
                $crudRoutePart = 'invoices';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->addColumn('team_nazov', function ($row) {
                return $row->team ? $row->team->nazov : '';
            });

            $table->editColumn('visible', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->visible ? 'checked' : null) . '>';
            });

            $table->addColumn('nasa_name', function ($row) {
                return $row->nasa ? $row->nasa->name : '';
            });

            $table->editColumn('nasa.konto', function ($row) {
                return $row->nasa ? (is_string($row->nasa) ? $row->nasa : $row->nasa->konto) : '';
            });
            $table->editColumn('nasa.iban', function ($row) {
                return $row->nasa ? (is_string($row->nasa) ? $row->nasa : $row->nasa->iban) : '';
            });
            $table->editColumn('nasa.swift', function ($row) {
                return $row->nasa ? (is_string($row->nasa) ? $row->nasa : $row->nasa->swift) : '';
            });
            $table->addColumn('typ_shortcut', function ($row) {
                return $row->typ ? $row->typ->shortcut : '';
            });

            $table->editColumn('number', function ($row) {
                return $row->number ? $row->number : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('amount', function ($row) {
                return $row->amount ? $row->amount : '';
            });

            $table->editColumn('file', function ($row) {
                return $row->file ? '<a href="' . $row->file->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'team', 'visible', 'nasa', 'typ', 'file']);

            return $table->make(true);
        }

        $teams        = Team::get();
        $nasas        = Nasa::get();
        $invoice_typs = InvoiceTyp::get();

        return view('admin.invoices.index', compact('teams', 'nasas', 'invoice_typs'));
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
