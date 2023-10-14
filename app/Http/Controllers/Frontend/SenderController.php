<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySenderRequest;
use App\Http\Requests\StoreSenderRequest;
use App\Http\Requests\UpdateSenderRequest;
use App\Models\Sender;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SenderController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('sender_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $senders = Sender::all();

        return view('frontend.senders.index', compact('senders'));
    }

    public function create()
    {
        abort_if(Gate::denies('sender_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.senders.create');
    }

    public function store(StoreSenderRequest $request)
    {
        $sender = Sender::create($request->all());

        return redirect()->route('frontend.senders.index');
    }

    public function edit(Sender $sender)
    {
        abort_if(Gate::denies('sender_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.senders.edit', compact('sender'));
    }

    public function update(UpdateSenderRequest $request, Sender $sender)
    {
        $sender->update($request->all());

        return redirect()->route('frontend.senders.index');
    }

    public function show(Sender $sender)
    {
        abort_if(Gate::denies('sender_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sender->load('senderPosts', 'senderEPosts');

        return view('frontend.senders.show', compact('sender'));
    }

    public function destroy(Sender $sender)
    {
        abort_if(Gate::denies('sender_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sender->delete();

        return back();
    }

    public function massDestroy(MassDestroySenderRequest $request)
    {
        $senders = Sender::find(request('ids'));

        foreach ($senders as $sender) {
            $sender->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
