<?php

namespace App\Http\Requests\Page;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePageRequest extends FormRequest
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
        $pageId = $this->route()->parameter('page');
        return [
            'title' => 'required|min:2|max:250',
            'slug'  => "required|min:2|max:250|unique:pages,slug,{$pageId}",
        ];
    }
}
