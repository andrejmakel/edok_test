<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyOutgoingPostRequest;
use App\Http\Requests\StoreOutgoingPostRequest;
use App\Http\Requests\UpdateOutgoingPostRequest;
use App\Models\OutgoingPost;
use App\Models\Recipient;
use App\Models\Team;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class OutgoingPostController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('outgoing_post_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outgoingPosts = OutgoingPost::with(['team', 'recipient', 'media'])->get();

        $teams = Team::get();

        $recipients = Recipient::get();

        return view('frontend.outgoingPosts.index', compact('outgoingPosts', 'recipients', 'teams'));
    }

    public function create()
    {
        abort_if(Gate::denies('outgoing_post_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::pluck('nazov', 'id')->prepend(trans('global.pleaseSelect'), '');

        $recipients = Recipient::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.outgoingPosts.create', compact('recipients', 'teams'));
    }

    public function store(StoreOutgoingPostRequest $request)
    {
        $outgoingPost = OutgoingPost::create($request->all());

        if ($request->input('out_envelope', false)) {
            $outgoingPost->addMedia(storage_path('tmp/uploads/' . basename($request->input('out_envelope'))))->toMediaCollection('out_envelope');
        }

        if ($request->input('out_scan', false)) {
            $outgoingPost->addMedia(storage_path('tmp/uploads/' . basename($request->input('out_scan'))))->toMediaCollection('out_scan');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $outgoingPost->id]);
        }

        return redirect()->route('frontend.outgoing-posts.index');
    }

    public function edit(OutgoingPost $outgoingPost)
    {
        abort_if(Gate::denies('outgoing_post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::pluck('nazov', 'id')->prepend(trans('global.pleaseSelect'), '');

        $recipients = Recipient::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $outgoingPost->load('team', 'recipient');

        return view('frontend.outgoingPosts.edit', compact('outgoingPost', 'recipients', 'teams'));
    }

    public function update(UpdateOutgoingPostRequest $request, OutgoingPost $outgoingPost)
    {
        $outgoingPost->update($request->all());

        if ($request->input('out_envelope', false)) {
            if (! $outgoingPost->out_envelope || $request->input('out_envelope') !== $outgoingPost->out_envelope->file_name) {
                if ($outgoingPost->out_envelope) {
                    $outgoingPost->out_envelope->delete();
                }
                $outgoingPost->addMedia(storage_path('tmp/uploads/' . basename($request->input('out_envelope'))))->toMediaCollection('out_envelope');
            }
        } elseif ($outgoingPost->out_envelope) {
            $outgoingPost->out_envelope->delete();
        }

        if ($request->input('out_scan', false)) {
            if (! $outgoingPost->out_scan || $request->input('out_scan') !== $outgoingPost->out_scan->file_name) {
                if ($outgoingPost->out_scan) {
                    $outgoingPost->out_scan->delete();
                }
                $outgoingPost->addMedia(storage_path('tmp/uploads/' . basename($request->input('out_scan'))))->toMediaCollection('out_scan');
            }
        } elseif ($outgoingPost->out_scan) {
            $outgoingPost->out_scan->delete();
        }

        return redirect()->route('frontend.outgoing-posts.index');
    }

    public function show(OutgoingPost $outgoingPost)
    {
        abort_if(Gate::denies('outgoing_post_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outgoingPost->load('team', 'recipient');

        return view('frontend.outgoingPosts.show', compact('outgoingPost'));
    }

    public function destroy(OutgoingPost $outgoingPost)
    {
        abort_if(Gate::denies('outgoing_post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outgoingPost->delete();

        return back();
    }

    public function massDestroy(MassDestroyOutgoingPostRequest $request)
    {
        $outgoingPosts = OutgoingPost::find(request('ids'));

        foreach ($outgoingPosts as $outgoingPost) {
            $outgoingPost->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('outgoing_post_create') && Gate::denies('outgoing_post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new OutgoingPost();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
