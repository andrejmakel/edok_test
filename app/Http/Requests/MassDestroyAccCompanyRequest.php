<?php

namespace App\Http\Requests;

use App\Models\AccCompany;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAccCompanyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('acc_company_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:acc_companies,id',
        ];
    }
}
