<?php

namespace App\Http\Requests\UserPhoto;

use Illuminate\Foundation\Http\FormRequest;

class DestroyUserPhotoRequest extends FormRequest
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
        return [];
    }

    /**
     * Persist the request.
     *
     * @return void
     */
    public function persist()
    {
        $user = $this->route('user') ?: currentUser();

        $user->deletePhoto();

        return $user;
    }
}
