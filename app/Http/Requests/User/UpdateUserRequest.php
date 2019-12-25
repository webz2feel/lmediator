<?php

namespace App\Http\Requests\User;

use App\Models\Admin\Admin;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $user = Admin::findOrFail($request['id']);
        return [
            'first_name' => 'required|min:2|max:50',
            'last_name' => 'required|min:2|max:50',
            'email' => ($request['email'] != $user->email) ? 'required|min:2|max:50|unique:admins,email' : '',
        ];
    }
}
