<?php

namespace App\Models\Concerns;

trait HasPhoto
{
    /**
     * Get the resource's photo.
     *
     * @param  string  $value
     * @return \Illuminate\Http\Response
     */
    public function getPhotoAttribute()
    {
        return $this->photo();
    }

    public function getUncachedPhotoAttribute()
    {
        return $this->photo($cache = false);
    }

    protected function photo($cache = true)
    {
        return $this->getMedia($this->photoCollectionName())->first()
        ? response()->file($this->getMedia($this->photoCollectionName())->first()->getPath('thumb'), $cache
            ? [
                'Cache-Control' => 'max-age='.(60 * 60 * 24),
            ]
            : [
                'Cache-Control' => 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0, max-age=0',
            ])
        : $this->defaultResourcePhoto();
    }

    /**
     * Specifies if the resource has a photo.
     *
     * @return bool
     */
    public function getHasPhotoAttribute()
    {
        return !is_null($this->getMedia($this->photoCollectionName())->first());
    }

    /**
     * Updates the resource photo.
     *
     * @return bool
     */
    public function updatePhoto($key = 'file', $deleteOriginal = false)
    {
        if ($this->has_photo) {
            $this->clearMediaCollection($this->photoCollectionName());
        }

        $media = $this->addMediaFromRequest($key)
            ->toMediaCollection($this->photoCollectionName());

        // It's convenient to delete the original uploaded media
        // when We are using conversions to save disk space.
        if ($deleteOriginal) {
            unlink($media->getPath());
        }

        return $this;
    }

    /**
     * Deletes the resource photo.
     *
     * @return bool
     */
    public function deletePhoto()
    {
        $this->clearMediaCollection($this->photoCollectionName());

        return $this;
    }

    protected function photoCollectionName()
    {
        return 'photo';
    }
}
