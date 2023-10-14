<?php

namespace App\Http\Requests;

use App\Models\Spracovany;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySpracovanyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('spracovany_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:spracovanies,id',
        ];
    }
}
