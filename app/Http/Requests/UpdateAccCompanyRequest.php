<?php

namespace App\Http\Requests;

use App\Models\AccCompany;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAccCompanyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('acc_company_edit');
    }

    public function rules()
    {
        return [
            'acc_company' => [
                'string',
                'nullable',
            ],
        ];
    }
}
