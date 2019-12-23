<?php

namespace App\Http\Requests\Role;

use App\Models\Role\Role;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
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
        $request = $this->request->all();
        $role = Role::findOrFail($request['id']);
        return [
            'name' => 'required|max:100',
            'slug' => ($request['slug'] != $role->slug) ? 'required|unique:roles,slug|max:100' : ''
        ];
    }
}
