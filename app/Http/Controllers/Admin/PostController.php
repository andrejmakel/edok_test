<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPostRequest;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\DokTyp;
use App\Models\Input;
use App\Models\Post;
use App\Models\Postform;
use App\Models\Processed;
use App\Models\Query;
use App\Models\Sender;
use App\Models\Status;
use App\Models\Team;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('post_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $posts = Post::with(['team', 'sender', 'post_form', 'zadal', 'status', 'customer_query', 'processed', 'dok_typ', 'media'])->get();

        $teams = Team::get();

        $senders = Sender::get();

        $postforms = Postform::get();

        $inputs = Input::get();

        $statuses = Status::get();

        $queries = Query::get();

        $processeds = Processed::get();

        $dok_typs = DokTyp::get();

        return view('admin.posts.index', compact('dok_typs', 'inputs', 'postforms', 'posts', 'processeds', 'queries', 'senders', 'statuses', 'teams'));
    }

    public function create()
    {
        abort_if(Gate::denies('post_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::pluck('nazov', 'id')->prepend(trans('global.pleaseSelect'), '');

        $senders = Sender::pluck('sender', 'id')->prepend(trans('global.pleaseSelect'), '');

        $post_forms = Postform::pluck('postform_sk', 'id')->prepend(trans('global.pleaseSelect'), '');

        $zadals = Input::pluck('zadal', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = Status::pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customer_queries = Query::pluck('customer_query', 'id')->prepend(trans('global.pleaseSelect'), '');

        $processeds = Processed::pluck('processed', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dok_typs = DokTyp::pluck('dok_typ_sk', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.posts.create', compact('customer_queries', 'dok_typs', 'post_forms', 'processeds', 'senders', 'statuses', 'teams', 'zadals'));
    }

    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->all());

        if ($request->input('envelope', false)) {
            $post->addMedia(storage_path('tmp/uploads/' . basename($request->input('envelope'))))->toMediaCollection('envelope');
        }

        if ($request->input('scan', false)) {
            $post->addMedia(storage_path('tmp/uploads/' . basename($request->input('scan'))))->toMediaCollection('scan');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $post->id]);
        }

        return redirect()->route('admin.posts.index');
    }

    public function edit(Post $post)
    {
        abort_if(Gate::denies('post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::pluck('nazov', 'id')->prepend(trans('global.pleaseSelect'), '');

        $senders = Sender::pluck('sender', 'id')->prepend(trans('global.pleaseSelect'), '');

        $post_forms = Postform::pluck('postform_sk', 'id')->prepend(trans('global.pleaseSelect'), '');

        $zadals = Input::pluck('zadal', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = Status::pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customer_queries = Query::pluck('customer_query', 'id')->prepend(trans('global.pleaseSelect'), '');

        $processeds = Processed::pluck('processed', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dok_typs = DokTyp::pluck('dok_typ_sk', 'id')->prepend(trans('global.pleaseSelect'), '');

        $post->load('team', 'sender', 'post_form', 'zadal', 'status', 'customer_query', 'processed', 'dok_typ');

        return view('admin.posts.edit', compact('customer_queries', 'dok_typs', 'post', 'post_forms', 'processeds', 'senders', 'statuses', 'teams', 'zadals'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->all());

        if ($request->input('envelope', false)) {
            if (! $post->envelope || $request->input('envelope') !== $post->envelope->file_name) {
                if ($post->envelope) {
                    $post->envelope->delete();
                }
                $post->addMedia(storage_path('tmp/uploads/' . basename($request->input('envelope'))))->toMediaCollection('envelope');
            }
        } elseif ($post->envelope) {
            $post->envelope->delete();
        }

        if ($request->input('scan', false)) {
            if (! $post->scan || $request->input('scan') !== $post->scan->file_name) {
                if ($post->scan) {
                    $post->scan->delete();
                }
                $post->addMedia(storage_path('tmp/uploads/' . basename($request->input('scan'))))->toMediaCollection('scan');
            }
        } elseif ($post->scan) {
            $post->scan->delete();
        }

        return redirect()->route('admin.posts.index');
    }

    public function show(Post $post)
    {
        abort_if(Gate::denies('post_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $post->load('team', 'sender', 'post_form', 'zadal', 'status', 'customer_query', 'processed', 'dok_typ');

        return view('admin.posts.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        abort_if(Gate::denies('post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $post->delete();

        return back();
    }

    public function massDestroy(MassDestroyPostRequest $request)
    {
        $posts = Post::find(request('ids'));

        foreach ($posts as $post) {
            $post->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('post_create') && Gate::denies('post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Post();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
