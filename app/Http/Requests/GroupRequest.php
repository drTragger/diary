<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class GroupRequest extends Request
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
            'name' => 'required|min:6',
            'description' => 'required|min:6',
            'days' => 'required|array',
            'start' => 'required|date',
            'end' => 'required|date',
            'start_time' => 'required|array',
            'end_time' => 'required|array',
        ];
    }
}
