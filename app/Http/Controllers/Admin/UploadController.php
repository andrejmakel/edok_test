<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyUploadRequest;
use App\Http\Requests\StoreUploadRequest;
use App\Http\Requests\UpdateUploadRequest;
use App\Models\Team;
use App\Models\Upload;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class UploadController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('upload_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Upload::with(['team'])->select(sprintf('%s.*', (new Upload)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'upload_show';
                $editGate      = 'upload_edit';
                $deleteGate    = 'upload_delete';
                $crudRoutePart = 'uploads';

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

            $table->editColumn('notice', function ($row) {
                return $row->notice ? $row->notice : '';
            });
            $table->editColumn('upload_file', function ($row) {
                if (! $row->upload_file) {
                    return '';
                }
                $links = [];
                foreach ($row->upload_file as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>';
                }

                return implode(', ', $links);
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });
            $table->editColumn('accounting', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->accounting ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'team', 'upload_file', 'accounting']);

            return $table->make(true);
        }

        $teams = Team::get();

        return view('admin.uploads.index', compact('teams'));
    }

    public function create()
    {
        abort_if(Gate::denies('upload_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::pluck('nazov', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.uploads.create', compact('teams'));
    }

    public function store(StoreUploadRequest $request)
    {
        $upload = Upload::create($request->all());

        foreach ($request->input('upload_file', []) as $file) {
            $upload->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('upload_file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $upload->id]);
        }

        return redirect()->route('admin.uploads.index');
    }

    public function edit(Upload $upload)
    {
        abort_if(Gate::denies('upload_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::pluck('nazov', 'id')->prepend(trans('global.pleaseSelect'), '');

        $upload->load('team');

        return view('admin.uploads.edit', compact('teams', 'upload'));
    }

    public function update(UpdateUploadRequest $request, Upload $upload)
    {
        $upload->update($request->all());

        if (count($upload->upload_file) > 0) {
            foreach ($upload->upload_file as $media) {
                if (! in_array($media->file_name, $request->input('upload_file', []))) {
                    $media->delete();
                }
            }
        }
        $media = $upload->upload_file->pluck('file_name')->toArray();
        foreach ($request->input('upload_file', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $upload->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('upload_file');
            }
        }

        return redirect()->route('admin.uploads.index');
    }

    public function show(Upload $upload)
    {
        abort_if(Gate::denies('upload_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $upload->load('team');

        return view('admin.uploads.show', compact('upload'));
    }

    public function destroy(Upload $upload)
    {
        abort_if(Gate::denies('upload_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $upload->delete();

        return back();
    }

    public function massDestroy(MassDestroyUploadRequest $request)
    {
        $uploads = Upload::find(request('ids'));

        foreach ($uploads as $upload) {
            $upload->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('upload_create') && Gate::denies('upload_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Upload();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
