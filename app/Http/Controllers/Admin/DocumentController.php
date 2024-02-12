<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDocumentRequest;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Models\Document;
use App\Models\DokKat;
use App\Models\DokTyp;
use App\Models\Team;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DocumentController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('document_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Document::with(['team', 'dok_typ', 'dok_kat', 'reads'])->select(sprintf('%s.*', (new Document)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'document_show';
                $editGate      = 'document_edit';
                $deleteGate    = 'document_delete';
                $crudRoutePart = 'documents';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });

            $table->addColumn('team_nazov', function ($row) {
                return $row->team ? $row->team->nazov : '';
            });

            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('document_code', function ($row) {
                return $row->document_code ? $row->document_code : '';
            });
            $table->addColumn('dok_typ_dok_typ_sk', function ($row) {
                return $row->dok_typ ? $row->dok_typ->dok_typ_sk : '';
            });

            $table->addColumn('dok_kat_dok_kat', function ($row) {
                return $row->dok_kat ? $row->dok_kat->dok_kat : '';
            });

            $table->editColumn('document', function ($row) {
                return $row->document ? '<a href="' . $row->document->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('file_short_text', function ($row) {
                return $row->file_short_text ? $row->file_short_text : '';
            });
            $table->editColumn('payment_info', function ($row) {
                return $row->payment_info ? $row->payment_info : '';
            });
            $table->editColumn('accounting', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->accounting ? 'checked' : null) . '>';
            });
            $table->editColumn('amount', function ($row) {
                return $row->amount ? $row->amount : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'team', 'dok_typ', 'dok_kat', 'document', 'accounting']);

            return $table->make(true);
        }

        $teams    = Team::get();
        $dok_typs = DokTyp::get();
        $dok_kats = DokKat::get();
        $users    = User::get();

        return view('admin.documents.index', compact('teams', 'dok_typs', 'dok_kats', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('document_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::pluck('nazov', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dok_typs = DokTyp::pluck('dok_typ_sk', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dok_kats = DokKat::pluck('dok_kat', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reads = User::pluck('email', 'id');

        return view('admin.documents.create', compact('dok_kats', 'dok_typs', 'reads', 'teams'));
    }

    public function store(StoreDocumentRequest $request)
    {
        $document = Document::create($request->all());
        $document->reads()->sync($request->input('reads', []));
        if ($request->input('document', false)) {
            $document->addMedia(storage_path('tmp/uploads/' . basename($request->input('document'))))->toMediaCollection('document');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $document->id]);
        }

        return redirect()->route('admin.documents.index');
    }

    public function edit(Document $document)
    {
        abort_if(Gate::denies('document_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::pluck('nazov', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dok_typs = DokTyp::pluck('dok_typ_sk', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dok_kats = DokKat::pluck('dok_kat', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reads = User::pluck('email', 'id');

        $document->load('team', 'dok_typ', 'dok_kat', 'reads');

        return view('admin.documents.edit', compact('document', 'dok_kats', 'dok_typs', 'reads', 'teams'));
    }

    public function update(UpdateDocumentRequest $request, Document $document)
    {
        $document->update($request->all());
        $document->reads()->sync($request->input('reads', []));
        if ($request->input('document', false)) {
            if (! $document->document || $request->input('document') !== $document->document->file_name) {
                if ($document->document) {
                    $document->document->delete();
                }
                $document->addMedia(storage_path('tmp/uploads/' . basename($request->input('document'))))->toMediaCollection('document');
            }
        } elseif ($document->document) {
            $document->document->delete();
        }

        return redirect()->route('admin.documents.index');
    }

    public function show(Document $document)
    {
        abort_if(Gate::denies('document_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $document->load('team', 'dok_typ', 'dok_kat', 'reads');

        return view('admin.documents.show', compact('document'));
    }

    public function destroy(Document $document)
    {
        abort_if(Gate::denies('document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $document->delete();

        return back();
    }

    public function massDestroy(MassDestroyDocumentRequest $request)
    {
        $documents = Document::find(request('ids'));

        foreach ($documents as $document) {
            $document->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('document_create') && Gate::denies('document_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Document();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
