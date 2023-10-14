<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyInputRequest;
use App\Http\Requests\StoreInputRequest;
use App\Http\Requests\UpdateInputRequest;
use App\Models\Input;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InputController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('input_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inputs = Input::all();

        return view('frontend.inputs.index', compact('inputs'));
    }

    public function create()
    {
        abort_if(Gate::denies('input_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.inputs.create');
    }

    public function store(StoreInputRequest $request)
    {
        $input = Input::create($request->all());

        return redirect()->route('frontend.inputs.index');
    }

    public function edit(Input $input)
    {
        abort_if(Gate::denies('input_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.inputs.edit', compact('input'));
    }

    public function update(UpdateInputRequest $request, Input $input)
    {
        $input->update($request->all());

        return redirect()->route('frontend.inputs.index');
    }

    public function show(Input $input)
    {
        abort_if(Gate::denies('input_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.inputs.show', compact('input'));
    }

    public function destroy(Input $input)
    {
        abort_if(Gate::denies('input_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $input->delete();

        return back();
    }

    public function massDestroy(MassDestroyInputRequest $request)
    {
        $inputs = Input::find(request('ids'));

        foreach ($inputs as $input) {
            $input->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
