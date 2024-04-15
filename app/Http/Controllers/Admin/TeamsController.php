<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTeamRequest;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\AccCompany;
use App\Models\Bank;
use App\Models\ESchranka;
use App\Models\Nasa;
use App\Models\Sidlo;
use App\Models\Spracovany;
use App\Models\Team;
use App\Models\Ucto;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TeamsController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('team_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::with(['nasa', 'contacts', 'sidlo', 'e_schranka', 'spracovanie', 'acc_company', 'ucto', 'bank', 'media'])->get();

        $nasas = Nasa::get();

        $users = User::get();

        $sidlos = Sidlo::get();

        $e_schrankas = ESchranka::get();

        $spracovanies = Spracovany::get();

        $acc_companies = AccCompany::get();

        $uctos = Ucto::get();

        $banks = Bank::get();

        return view('admin.teams.index', compact('acc_companies', 'banks', 'e_schrankas', 'nasas', 'sidlos', 'spracovanies', 'teams', 'uctos', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('team_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nasas = Nasa::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contacts = User::pluck('name', 'id');

        $sidlos = Sidlo::pluck('sidlo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $e_schrankas = ESchranka::pluck('splnomocnenec', 'id')->prepend(trans('global.pleaseSelect'), '');

        $spracovanies = Spracovany::pluck('popis', 'id')->prepend(trans('global.pleaseSelect'), '');

        $acc_companies = AccCompany::pluck('acc_company', 'id')->prepend(trans('global.pleaseSelect'), '');

        $uctos = Ucto::pluck('uctuje', 'id')->prepend(trans('global.pleaseSelect'), '');

        $banks = Bank::pluck('bank', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.teams.create', compact('acc_companies', 'banks', 'contacts', 'e_schrankas', 'nasas', 'sidlos', 'spracovanies', 'uctos'));
    }

    public function store(StoreTeamRequest $request)
    {
        $team = Team::create($request->all());
        $team->contacts()->sync($request->input('contacts', []));
        if ($request->input('orsr', false)) {
            $team->addMedia(storage_path('tmp/uploads/' . basename($request->input('orsr'))))->toMediaCollection('orsr');
        }

        if ($request->input('zrsr', false)) {
            $team->addMedia(storage_path('tmp/uploads/' . basename($request->input('zrsr'))))->toMediaCollection('zrsr');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $team->id]);
        }

        return redirect()->route('admin.teams.index');
    }

    public function edit(Team $team)
    {
        abort_if(Gate::denies('team_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nasas = Nasa::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contacts = User::pluck('name', 'id');

        $sidlos = Sidlo::pluck('sidlo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $e_schrankas = ESchranka::pluck('splnomocnenec', 'id')->prepend(trans('global.pleaseSelect'), '');

        $spracovanies = Spracovany::pluck('popis', 'id')->prepend(trans('global.pleaseSelect'), '');

        $acc_companies = AccCompany::pluck('acc_company', 'id')->prepend(trans('global.pleaseSelect'), '');

        $uctos = Ucto::pluck('uctuje', 'id')->prepend(trans('global.pleaseSelect'), '');

        $banks = Bank::pluck('bank', 'id')->prepend(trans('global.pleaseSelect'), '');

        $team->load('nasa', 'contacts', 'sidlo', 'e_schranka', 'spracovanie', 'acc_company', 'ucto', 'bank');

        return view('admin.teams.edit', compact('acc_companies', 'banks', 'contacts', 'e_schrankas', 'nasas', 'sidlos', 'spracovanies', 'team', 'uctos'));
    }

    public function update(UpdateTeamRequest $request, Team $team)
    {
        $team->update($request->all());
        $team->contacts()->sync($request->input('contacts', []));
        if ($request->input('orsr', false)) {
            if (! $team->orsr || $request->input('orsr') !== $team->orsr->file_name) {
                if ($team->orsr) {
                    $team->orsr->delete();
                }
                $team->addMedia(storage_path('tmp/uploads/' . basename($request->input('orsr'))))->toMediaCollection('orsr');
            }
        } elseif ($team->orsr) {
            $team->orsr->delete();
        }

        if ($request->input('zrsr', false)) {
            if (! $team->zrsr || $request->input('zrsr') !== $team->zrsr->file_name) {
                if ($team->zrsr) {
                    $team->zrsr->delete();
                }
                $team->addMedia(storage_path('tmp/uploads/' . basename($request->input('zrsr'))))->toMediaCollection('zrsr');
            }
        } elseif ($team->zrsr) {
            $team->zrsr->delete();
        }

        return redirect()->route('admin.teams.index');
    }

    public function show(Team $team)
    {
        abort_if(Gate::denies('team_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $team->load('nasa', 'contacts', 'sidlo', 'e_schranka', 'spracovanie', 'acc_company', 'ucto', 'bank', 'teamUsers');

        return view('admin.teams.show', compact('team'));
    }

    public function destroy(Team $team)
    {
        abort_if(Gate::denies('team_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $team->delete();

        return back();
    }

    public function massDestroy(MassDestroyTeamRequest $request)
    {
        $teams = Team::find(request('ids'));

        foreach ($teams as $team) {
            $team->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('team_create') && Gate::denies('team_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Team();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
