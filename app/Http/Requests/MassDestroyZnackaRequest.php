<?php

namespace App\Http\Requests;

use App\Models\Znacka;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyZnackaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('znacka_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:znackas,id',
        ];
    }
}
