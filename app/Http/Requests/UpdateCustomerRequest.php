<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PhoneValidation;
use App\Rules\BankAccountValidation;

class UpdateCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'sometimes|required|string|max:255',
            'last_name' => 'sometimes|required|string|max:255',
            'date_of_birth' => 'sometimes|required|date',
            'country_code' => 'sometimes|required|string|size:2', // Assuming country_code is a 2-letter ISO code
            'phone_number' => ['sometimes', 'required', 'string', new PhoneValidation($this->country_code)],
            'email' => 'sometimes|required|email:rfc,dns|unique:customers,email,' . $this->customer->id,
            'bank_account_number' => ['sometimes', 'required', 'string', new BankAccountValidation],
        ];
    }
}
