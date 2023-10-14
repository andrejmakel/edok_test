<?php

namespace App\Http\Requests;

use App\Models\Nasa;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyNasaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('nasa_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:nasas,id',
        ];
    }
}
