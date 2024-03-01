<?php

namespace App\Http\Requests;

use App\Models\Sidlo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySidloRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('sidlo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:sidlos,id',
        ];
    }
}
