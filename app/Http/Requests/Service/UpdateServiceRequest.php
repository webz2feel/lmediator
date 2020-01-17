<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $serviceId = $this->route()->parameter('service');
        return [
            'name'        =>  "required|min:2|max:250|unique:services,name,{$serviceId}",
            'contents'    =>  'required',
        ];
    }
}
