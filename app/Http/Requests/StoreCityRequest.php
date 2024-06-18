<?php

namespace App\Http\Requests;

use Flugg\Responder\Contracts\Responder;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class StoreCityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:cities,name']
        ];
    }

    // protected function failedValidation(Validator $validator)
    // {
    //     $responder = app(Responder::class);
    //     throw new HttpResponseException($responder->error(JsonResponse::HTTP_BAD_REQUEST, 'Invalid input.')->respond());
    // }
}
