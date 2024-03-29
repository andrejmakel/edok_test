<?php

namespace App\Http\Controllers\Frontend;

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

class CallsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('call_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $calls = Call::with(['team', 'call_typ', 'zadal', 'reads'])->get();

        $teams = Team::get();

        $call_typs = CallTyp::get();

        $inputs = Input::get();

        $users = User::get();

        return view('frontend.calls.index', compact('call_typs', 'calls', 'inputs', 'teams', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('call_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::pluck('nazov', 'id')->prepend(trans('global.pleaseSelect'), '');

        $call_typs = CallTyp::pluck('call_typ', 'id')->prepend(trans('global.pleaseSelect'), '');

        $zadals = Input::pluck('zadal', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reads = User::pluck('email', 'id');

        return view('frontend.calls.create', compact('call_typs', 'reads', 'teams', 'zadals'));
    }

    public function store(StoreCallRequest $request)
    {
        $call = Call::create($request->all());
        $call->reads()->sync($request->input('reads', []));
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $call->id]);
        }

        return redirect()->route('frontend.calls.index');
    }

    public function edit(Call $call)
    {
        abort_if(Gate::denies('call_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::pluck('nazov', 'id')->prepend(trans('global.pleaseSelect'), '');

        $call_typs = CallTyp::pluck('call_typ', 'id')->prepend(trans('global.pleaseSelect'), '');

        $zadals = Input::pluck('zadal', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reads = User::pluck('email', 'id');

        $call->load('team', 'call_typ', 'zadal', 'reads');

        return view('frontend.calls.edit', compact('call', 'call_typs', 'reads', 'teams', 'zadals'));
    }

    public function update(UpdateCallRequest $request, Call $call)
    {
        $call->update($request->all());
        $call->reads()->sync($request->input('reads', []));

        return redirect()->route('frontend.calls.index');
    }

    public function show(Call $call)
    {
        abort_if(Gate::denies('call_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $call->load('team', 'call_typ', 'zadal', 'reads');

        return view('frontend.calls.show', compact('call'));
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
