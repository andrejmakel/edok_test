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
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('post_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Post::with(['team', 'sender', 'post_form', 'zadal', 'status', 'customer_query', 'processed', 'dok_typ', 'reads'])->select(sprintf('%s.*', (new Post)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'post_show';
                $editGate      = 'post_edit';
                $deleteGate    = 'post_delete';
                $crudRoutePart = 'posts';

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

            $table->editColumn('post_nr', function ($row) {
                return $row->post_nr ? $row->post_nr : '';
            });
            $table->addColumn('sender_sender', function ($row) {
                return $row->sender ? $row->sender->sender : '';
            });

            $table->addColumn('post_form_postform_sk', function ($row) {
                return $row->post_form ? $row->post_form->postform_sk : '';
            });

            $table->editColumn('post_form.postform_sk', function ($row) {
                return $row->post_form ? (is_string($row->post_form) ? $row->post_form : $row->post_form->postform_sk) : '';
            });
            $table->editColumn('envelope', function ($row) {
                return $row->envelope ? '<a href="' . $row->envelope->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('scan', function ($row) {
                return $row->scan ? '<a href="' . $row->scan->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('file_short_text', function ($row) {
                return $row->file_short_text ? $row->file_short_text : '';
            });
            $table->editColumn('accounting', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->accounting ? 'checked' : null) . '>';
            });
            $table->addColumn('status_status', function ($row) {
                return $row->status ? $row->status->status : '';
            });

            $table->editColumn('send_email', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->send_email ? 'checked' : null) . '>';
            });
            $table->addColumn('dok_typ_dok_typ_sk', function ($row) {
                return $row->dok_typ ? $row->dok_typ->dok_typ_sk : '';
            });

            $table->editColumn('payment_info', function ($row) {
                return $row->payment_info ? $row->payment_info : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'team', 'sender', 'post_form', 'envelope', 'scan', 'accounting', 'status', 'send_email', 'dok_typ']);

            return $table->make(true);
        }

        $teams      = Team::get();
        $senders    = Sender::get();
        $postforms  = Postform::get();
        $inputs     = Input::get();
        $statuses   = Status::get();
        $queries    = Query::get();
        $processeds = Processed::get();
        $dok_typs   = DokTyp::get();
        $users      = User::get();

        return view('admin.posts.index', compact('teams', 'senders', 'postforms', 'inputs', 'statuses', 'queries', 'processeds', 'dok_typs', 'users'));
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

        $reads = User::pluck('email', 'id');

        return view('admin.posts.create', compact('customer_queries', 'dok_typs', 'post_forms', 'processeds', 'reads', 'senders', 'statuses', 'teams', 'zadals'));
    }

    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->all());
        $post->reads()->sync($request->input('reads', []));
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

        $reads = User::pluck('email', 'id');

        $post->load('team', 'sender', 'post_form', 'zadal', 'status', 'customer_query', 'processed', 'dok_typ', 'reads');

        return view('admin.posts.edit', compact('customer_queries', 'dok_typs', 'post', 'post_forms', 'processeds', 'reads', 'senders', 'statuses', 'teams', 'zadals'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->all());
        $post->reads()->sync($request->input('reads', []));
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

        $post->load('team', 'sender', 'post_form', 'zadal', 'status', 'customer_query', 'processed', 'dok_typ', 'reads');

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
