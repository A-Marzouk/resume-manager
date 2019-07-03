<?php

namespace App;

use Spatie\MediaLibrary\Media as BaseMedia;

class Media extends BaseMedia
{
    /**
     * Get the default user's profile photo.
     *
     * @return \Illuminate\Http\Response
     */
    public function defaultUserPhoto()
    {
        return response()->file(storage_path('app/files/users/user.jpg'), [
            'Cache-Control' => 'max-age='.(60 * 60 * 24 * 10),
        ]);
    }

    /**
     * Get the default photo.
     *
     * @return \Illuminate\Http\Response
     */
    public function defaultPhoto()
    {
        return response()->file(storage_path('app/files/defaults/default.jpg'), [
            'Cache-Control' => 'max-age='.(60 * 60 * 24 * 10),
        ]);
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request)
    {
        return response()->file($this->getPath(), [
            'Cache-Control' => 'max-age='.(60 * 60 * 24),
        ]);
    }
}
