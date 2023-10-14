<?php

namespace App\Http\Requests;

use App\Models\Recipient;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRecipientRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('recipient_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:recipients,id',
        ];
    }
}
