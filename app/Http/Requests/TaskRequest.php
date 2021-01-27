<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class TaskRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'subject' => 'required|max:255',
            'task' => 'required|max:65535',
            'file' => 'mimes:doc,docx,xls,xlsx,pdf,jpeg,jpg,png|max:1024'
        ];
    }

    public function messages()
    {
        return [
            'file.mimes' => 'File must be an image of a file',
        ];
    }
}
