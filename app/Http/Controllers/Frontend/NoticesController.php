<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyNoticeRequest;
use App\Http\Requests\StoreNoticeRequest;
use App\Http\Requests\UpdateNoticeRequest;
use App\Models\Notice;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NoticesController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('notice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notices = Notice::all();

        return view('frontend.notices.index', compact('notices'));
    }

    public function create()
    {
        abort_if(Gate::denies('notice_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.notices.create');
    }

    public function store(StoreNoticeRequest $request)
    {
        $notice = Notice::create($request->all());

        return redirect()->route('frontend.notices.index');
    }

    public function edit(Notice $notice)
    {
        abort_if(Gate::denies('notice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.notices.edit', compact('notice'));
    }

    public function update(UpdateNoticeRequest $request, Notice $notice)
    {
        $notice->update($request->all());

        return redirect()->route('frontend.notices.index');
    }

    public function show(Notice $notice)
    {
        abort_if(Gate::denies('notice_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.notices.show', compact('notice'));
    }

    public function destroy(Notice $notice)
    {
        abort_if(Gate::denies('notice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notice->delete();

        return back();
    }

    public function massDestroy(MassDestroyNoticeRequest $request)
    {
        $notices = Notice::find(request('ids'));

        foreach ($notices as $notice) {
            $notice->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
