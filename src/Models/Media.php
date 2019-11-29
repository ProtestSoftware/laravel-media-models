<?php

namespace ProtestSoftware\LaravelMediaModels\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Media extends Model
{
    public $guarded = [];

    protected $table = 'media';

    public static function boot(): void
    {
        parent::boot();

        static::creating(function (Media $media) {
            if (!$media->mime_type) $media->mime_type = Storage::mimeType($media->path);
            if (!$media->file_size) $media->file_size = Storage::size($media->path);
        });
    }

    public function media(): MorphTo
    {
        return $this->morphTo();
    }

    public function getTemporaryUrl(int $minutes = 5, array $requestParams = [])
    {
        return Storage::temporaryUrl(
            $this->path,
            now()->addMinutes($minutes),
            $requestParams
        );
    }
}
