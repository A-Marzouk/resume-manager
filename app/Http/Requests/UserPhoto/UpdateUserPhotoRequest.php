<?php

namespace App\Http\Requests\UserPhoto;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserPhotoRequest extends FormRequest
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
            'file' => 'required|file|image|max:25600',
        ];
    }

    /**
     * Persist the request.
     *
     * @return void
     */
    public function persist()
    {
        $user = $this->route('user') ?: currentUser();

        $user->updatePhoto('file', $deleteOriginal = true);

        return $user;
    }
}
