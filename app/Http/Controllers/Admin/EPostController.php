<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyEPostRequest;
use App\Http\Requests\StoreEPostRequest;
use App\Http\Requests\UpdateEPostRequest;
use App\Models\DokTyp;
use App\Models\EPost;
use App\Models\Input;
use App\Models\Sender;
use App\Models\Team;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class EPostController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('e_post_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = EPost::with(['team', 'sender', 'zadal', 'dok_typ', 'reads'])->select(sprintf('%s.*', (new EPost)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'e_post_show';
                $editGate      = 'e_post_edit';
                $deleteGate    = 'e_post_delete';
                $crudRoutePart = 'e-posts';

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

            $table->addColumn('sender_sender', function ($row) {
                return $row->sender ? $row->sender->sender : '';
            });

            $table->editColumn('scan', function ($row) {
                return $row->scan ? '<a href="' . $row->scan->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('annex', function ($row) {
                if (! $row->annex) {
                    return '';
                }
                $links = [];
                foreach ($row->annex as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>';
                }

                return implode(', ', $links);
            });
            $table->editColumn('file_short_text', function ($row) {
                return $row->file_short_text ? $row->file_short_text : '';
            });
            $table->addColumn('zadal_zadal', function ($row) {
                return $row->zadal ? $row->zadal->zadal : '';
            });

            $table->editColumn('accounting', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->accounting ? 'checked' : null) . '>';
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->addColumn('dok_typ_dok_typ_sk', function ($row) {
                return $row->dok_typ ? $row->dok_typ->dok_typ_sk : '';
            });

            $table->editColumn('payment_info', function ($row) {
                return $row->payment_info ? $row->payment_info : '';
            });
            $table->editColumn('amount', function ($row) {
                return $row->amount ? $row->amount : '';
            });
            $table->editColumn('for_recipient', function ($row) {
                return $row->for_recipient ? $row->for_recipient : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'team', 'sender', 'scan', 'annex', 'zadal', 'accounting', 'dok_typ']);

            return $table->make(true);
        }

        $teams    = Team::get();
        $senders  = Sender::get();
        $inputs   = Input::get();
        $dok_typs = DokTyp::get();
        $users    = User::get();

        return view('admin.ePosts.index', compact('teams', 'senders', 'inputs', 'dok_typs', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('e_post_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::pluck('nazov', 'id')->prepend(trans('global.pleaseSelect'), '');

        $senders = Sender::pluck('sender', 'id')->prepend(trans('global.pleaseSelect'), '');

        $zadals = Input::pluck('zadal', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dok_typs = DokTyp::pluck('dok_typ_sk', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reads = User::pluck('email', 'id');

        return view('admin.ePosts.create', compact('dok_typs', 'reads', 'senders', 'teams', 'zadals'));
    }

    public function store(StoreEPostRequest $request)
    {
        $ePost = EPost::create($request->all());
        $ePost->reads()->sync($request->input('reads', []));
        if ($request->input('scan', false)) {
            $ePost->addMedia(storage_path('tmp/uploads/' . basename($request->input('scan'))))->toMediaCollection('scan');
        }

        foreach ($request->input('annex', []) as $file) {
            $ePost->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('annex');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $ePost->id]);
        }

        return redirect()->route('admin.e-posts.index');
    }

    public function edit(EPost $ePost)
    {
        abort_if(Gate::denies('e_post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::pluck('nazov', 'id')->prepend(trans('global.pleaseSelect'), '');

        $senders = Sender::pluck('sender', 'id')->prepend(trans('global.pleaseSelect'), '');

        $zadals = Input::pluck('zadal', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dok_typs = DokTyp::pluck('dok_typ_sk', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reads = User::pluck('email', 'id');

        $ePost->load('team', 'sender', 'zadal', 'dok_typ', 'reads');

        return view('admin.ePosts.edit', compact('dok_typs', 'ePost', 'reads', 'senders', 'teams', 'zadals'));
    }

    public function update(UpdateEPostRequest $request, EPost $ePost)
    {
        $ePost->update($request->all());
        $ePost->reads()->sync($request->input('reads', []));
        if ($request->input('scan', false)) {
            if (! $ePost->scan || $request->input('scan') !== $ePost->scan->file_name) {
                if ($ePost->scan) {
                    $ePost->scan->delete();
                }
                $ePost->addMedia(storage_path('tmp/uploads/' . basename($request->input('scan'))))->toMediaCollection('scan');
            }
        } elseif ($ePost->scan) {
            $ePost->scan->delete();
        }

        if (count($ePost->annex) > 0) {
            foreach ($ePost->annex as $media) {
                if (! in_array($media->file_name, $request->input('annex', []))) {
                    $media->delete();
                }
            }
        }
        $media = $ePost->annex->pluck('file_name')->toArray();
        foreach ($request->input('annex', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $ePost->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('annex');
            }
        }

        return redirect()->route('admin.e-posts.index');
    }

    public function show(EPost $ePost)
    {
        abort_if(Gate::denies('e_post_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ePost->load('team', 'sender', 'zadal', 'dok_typ', 'reads');

        return view('admin.ePosts.show', compact('ePost'));
    }

    public function destroy(EPost $ePost)
    {
        abort_if(Gate::denies('e_post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ePost->delete();

        return back();
    }

    public function massDestroy(MassDestroyEPostRequest $request)
    {
        $ePosts = EPost::find(request('ids'));

        foreach ($ePosts as $ePost) {
            $ePost->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('e_post_create') && Gate::denies('e_post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new EPost();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
