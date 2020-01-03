<?php

namespace App\Http\Requests\Email;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmailRequest extends FormRequest
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
            'purpose' => 'required|min:2|max:250',
            'subject' => 'required|min:2|max:250',
            'from_name' => 'required|min:2|max:50',
            'from_email' => "required|email|max:50",
            'contents' => "required",
        ];
    }

    /**
     * Return the fields and values to create a new email.
     *
     * @return array
     */
    public function emailFillData()
    {
        return [
            'purpose' => $this->purpose,
            'subject'  => $this->subject,
            'from_name' => $this->from_name,
            'from_email' => $this->from_email,
            'to_email' => $this->to_email,
            'cc_email' => $this->cc_email,
            'bcc_email' => $this->bcc_email,
            'reply_to_email' => $this->reply_to_email,
            'contents' => $this->contents,
            'is_promotional' => $this->has('is_promotional') ? 1 : 0,
            'email_type' => $this->email_type,
            'active' => $this->has('active') ? 1 : 0,
        ];
    }
}
