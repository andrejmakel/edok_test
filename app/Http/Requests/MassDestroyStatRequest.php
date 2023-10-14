<?php

namespace App\Http\Requests;

use App\Models\Stat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyStatRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('stat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:stats,id',
        ];
    }
}
