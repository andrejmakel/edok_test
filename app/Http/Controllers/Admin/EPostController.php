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
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class EPostController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('e_post_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ePosts = EPost::with(['team', 'sender', 'zadal', 'dok_typ', 'media'])->get();

        $teams = Team::get();

        $senders = Sender::get();

        $inputs = Input::get();

        $dok_typs = DokTyp::get();

        return view('admin.ePosts.index', compact('dok_typs', 'ePosts', 'inputs', 'senders', 'teams'));
    }

    public function create()
    {
        abort_if(Gate::denies('e_post_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::pluck('nazov', 'id')->prepend(trans('global.pleaseSelect'), '');

        $senders = Sender::pluck('sender', 'id')->prepend(trans('global.pleaseSelect'), '');

        $zadals = Input::pluck('zadal', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dok_typs = DokTyp::pluck('dok_typ_sk', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.ePosts.create', compact('dok_typs', 'senders', 'teams', 'zadals'));
    }

    public function store(StoreEPostRequest $request)
    {
        $ePost = EPost::create($request->all());

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

        $ePost->load('team', 'sender', 'zadal', 'dok_typ');

        return view('admin.ePosts.edit', compact('dok_typs', 'ePost', 'senders', 'teams', 'zadals'));
    }

    public function update(UpdateEPostRequest $request, EPost $ePost)
    {
        $ePost->update($request->all());

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

        $ePost->load('team', 'sender', 'zadal', 'dok_typ');

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
