<?php

namespace App\Http\Requests;

use App\Models\DokTyp;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDokTypRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('dok_typ_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:dok_typs,id',
        ];
    }
}
