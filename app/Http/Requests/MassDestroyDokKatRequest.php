<?php

namespace App\Http\Requests;

use App\Models\DokKat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDokKatRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('dok_kat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:dok_kats,id',
        ];
    }
}
