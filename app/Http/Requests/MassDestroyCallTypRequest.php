<?php

namespace App\Http\Requests;

use App\Models\CallTyp;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCallTypRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('call_typ_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:call_typs,id',
        ];
    }
}
