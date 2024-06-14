<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PhoneValidation;
use App\Rules\BankAccountValidation;

class StoreCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'country_code' => 'required|string|size:2', // Assuming country_code is a 2-letter ISO code
            'phone_number' => ['required', 'string', new PhoneValidation($this->country_code)],
            'email' => 'required|email|unique:customers,email',
            'bank_account_number' => ['required', 'string', new BankAccountValidation],
        ];
    }
}
