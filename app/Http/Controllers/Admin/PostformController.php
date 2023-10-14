<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPostformRequest;
use App\Http\Requests\StorePostformRequest;
use App\Http\Requests\UpdatePostformRequest;
use App\Models\Postform;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PostformController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('postform_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $postforms = Postform::all();

        return view('admin.postforms.index', compact('postforms'));
    }

    public function create()
    {
        abort_if(Gate::denies('postform_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.postforms.create');
    }

    public function store(StorePostformRequest $request)
    {
        $postform = Postform::create($request->all());

        return redirect()->route('admin.postforms.index');
    }

    public function edit(Postform $postform)
    {
        abort_if(Gate::denies('postform_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.postforms.edit', compact('postform'));
    }

    public function update(UpdatePostformRequest $request, Postform $postform)
    {
        $postform->update($request->all());

        return redirect()->route('admin.postforms.index');
    }

    public function show(Postform $postform)
    {
        abort_if(Gate::denies('postform_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.postforms.show', compact('postform'));
    }

    public function destroy(Postform $postform)
    {
        abort_if(Gate::denies('postform_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $postform->delete();

        return back();
    }

    public function massDestroy(MassDestroyPostformRequest $request)
    {
        $postforms = Postform::find(request('ids'));

        foreach ($postforms as $postform) {
            $postform->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
