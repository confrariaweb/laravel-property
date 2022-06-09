<?php
namespace ConfrariaWeb\Property\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'type_id' => 'required',
            'code' => 'required|unique:App\Models\User,email',
        ];
    }

    public function messages()
    {
        return [
            'type_id.required' => 'O tipo de imóvel é obrigatório',
            'code.required' => 'O código é obrigatório',
        ];
    }

}
