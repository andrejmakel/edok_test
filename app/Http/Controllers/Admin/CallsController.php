<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCallRequest;
use App\Http\Requests\StoreCallRequest;
use App\Http\Requests\UpdateCallRequest;
use App\Models\Call;
use App\Models\CallTyp;
use App\Models\Input;
use App\Models\Team;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CallsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('call_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Call::with(['team', 'call_typ', 'zadal', 'reads'])->select(sprintf('%s.*', (new Call)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'call_show';
                $editGate      = 'call_edit';
                $deleteGate    = 'call_delete';
                $crudRoutePart = 'calls';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('duration', function ($row) {
                return $row->duration ? $row->duration : '';
            });
            $table->addColumn('team_nazov', function ($row) {
                return $row->team ? $row->team->nazov : '';
            });

            $table->addColumn('call_typ_call_typ', function ($row) {
                return $row->call_typ ? $row->call_typ->call_typ : '';
            });

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('company', function ($row) {
                return $row->company ? $row->company : '';
            });
            $table->editColumn('call_nr', function ($row) {
                return $row->call_nr ? $row->call_nr : '';
            });
            $table->editColumn('short_notice', function ($row) {
                return $row->short_notice ? $row->short_notice : '';
            });
            $table->addColumn('zadal_zadal', function ($row) {
                return $row->zadal ? $row->zadal->zadal : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'team', 'call_typ', 'zadal']);

            return $table->make(true);
        }

        $teams     = Team::get();
        $call_typs = CallTyp::get();
        $inputs    = Input::get();
        $users     = User::get();

        return view('admin.calls.index', compact('teams', 'call_typs', 'inputs', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('call_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::pluck('nazov', 'id')->prepend(trans('global.pleaseSelect'), '');

        $call_typs = CallTyp::pluck('call_typ', 'id')->prepend(trans('global.pleaseSelect'), '');

        $zadals = Input::pluck('zadal', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reads = User::pluck('email', 'id');

        return view('admin.calls.create', compact('call_typs', 'reads', 'teams', 'zadals'));
    }

    public function store(StoreCallRequest $request)
    {
        $call = Call::create($request->all());
        $call->reads()->sync($request->input('reads', []));
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $call->id]);
        }

        return redirect()->route('admin.calls.index');
    }

    public function edit(Call $call)
    {
        abort_if(Gate::denies('call_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::pluck('nazov', 'id')->prepend(trans('global.pleaseSelect'), '');

        $call_typs = CallTyp::pluck('call_typ', 'id')->prepend(trans('global.pleaseSelect'), '');

        $zadals = Input::pluck('zadal', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reads = User::pluck('email', 'id');

        $call->load('team', 'call_typ', 'zadal', 'reads');

        return view('admin.calls.edit', compact('call', 'call_typs', 'reads', 'teams', 'zadals'));
    }

    public function update(UpdateCallRequest $request, Call $call)
    {
        $call->update($request->all());
        $call->reads()->sync($request->input('reads', []));

        return redirect()->route('admin.calls.index');
    }

    public function show(Call $call)
    {
        abort_if(Gate::denies('call_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $call->load('team', 'call_typ', 'zadal', 'reads');

        return view('admin.calls.show', compact('call'));
    }

    public function destroy(Call $call)
    {
        abort_if(Gate::denies('call_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $call->delete();

        return back();
    }

    public function massDestroy(MassDestroyCallRequest $request)
    {
        $calls = Call::find(request('ids'));

        foreach ($calls as $call) {
            $call->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('call_create') && Gate::denies('call_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Call();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
