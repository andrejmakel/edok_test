<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyRecipientRequest;
use App\Http\Requests\StoreRecipientRequest;
use App\Http\Requests\UpdateRecipientRequest;
use App\Models\Recipient;
use App\Models\Stat;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RecipientController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('recipient_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $recipients = Recipient::with(['stat'])->get();

        return view('frontend.recipients.index', compact('recipients'));
    }

    public function create()
    {
        abort_if(Gate::denies('recipient_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stats = Stat::pluck('stat_sk', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.recipients.create', compact('stats'));
    }

    public function store(StoreRecipientRequest $request)
    {
        $recipient = Recipient::create($request->all());

        return redirect()->route('frontend.recipients.index');
    }

    public function edit(Recipient $recipient)
    {
        abort_if(Gate::denies('recipient_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stats = Stat::pluck('stat_sk', 'id')->prepend(trans('global.pleaseSelect'), '');

        $recipient->load('stat');

        return view('frontend.recipients.edit', compact('recipient', 'stats'));
    }

    public function update(UpdateRecipientRequest $request, Recipient $recipient)
    {
        $recipient->update($request->all());

        return redirect()->route('frontend.recipients.index');
    }

    public function show(Recipient $recipient)
    {
        abort_if(Gate::denies('recipient_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $recipient->load('stat', 'recipientOutgoingPosts');

        return view('frontend.recipients.show', compact('recipient'));
    }

    public function destroy(Recipient $recipient)
    {
        abort_if(Gate::denies('recipient_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $recipient->delete();

        return back();
    }

    public function massDestroy(MassDestroyRecipientRequest $request)
    {
        $recipients = Recipient::find(request('ids'));

        foreach ($recipients as $recipient) {
            $recipient->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
