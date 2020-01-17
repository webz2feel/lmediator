<?php

namespace App\Http\Requests\Service;

use App\Models\Service\Service;
use Illuminate\Foundation\Http\FormRequest;

class CreateServiceRequest extends FormRequest
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
        return [
            'name'        =>  'required|min:2|max:250|unique:services,name',
            'contents'    =>  'required',
        ];
    }

    public function serviceFillData()
    {
        $service = new Service();
        $service->name = $this->name;
        $service->contents = $this->contents;
        $service->excerpt = $this->excerpt;
        $service->active = $this->has('active') ? true : false;
        $service->display_on_home = $this->has('display_on_home') ? true : false;

        if($service = $service->save()){
            return $service;
        }
        return false;
    }
}
