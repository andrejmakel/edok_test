<?php

namespace App\Http\Requests;

use App\Models\Invoice;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('invoice_create');
    }

    public function rules()
    {
        return [
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'number' => [
                'string',
                'nullable',
            ],
            'name' => [
                'string',
                'nullable',
            ],
            'payment_term' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'pay_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'accounting_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'send_email' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
