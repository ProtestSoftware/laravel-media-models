<?php

namespace ProtestSoftware\LaravelMediaModels\Traits;

use ProtestSoftware\LaravelMediaModels\Models\Media;

trait HasMedia
{
    public function media()
    {
        return $this->morphMany(Media::class, 'media');
    }

    public function singleMedia()
    {
        return $this->morphOne(Media::class, 'media');
    }
}
