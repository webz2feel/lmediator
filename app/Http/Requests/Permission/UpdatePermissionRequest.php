<?php

namespace App\Http\Requests\Permission;

use App\Models\Permission\Permission;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePermissionRequest extends FormRequest
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
        $permission = Permission::findOrFail($request['id']);
        return [
            'name' => 'required|max:100',
            'slug' => ($request['slug'] != $permission->slug) ? 'required|unique:permissions,slug|max:100' : ''
        ];
    }
}
