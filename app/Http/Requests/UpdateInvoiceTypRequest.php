<?php

namespace App\Http\Requests;

use App\Models\InvoiceTyp;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateInvoiceTypRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('invoice_typ_edit');
    }

    public function rules()
    {
        return [
            'shortcut' => [
                'string',
                'nullable',
            ],
            'name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
