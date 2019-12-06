<?php

namespace ProtestSoftware\LaravelMediaModels\Http\Controllers;

use Illuminate\Http\Request;
use ProtestSoftware\LaravelMediaModels\Http\Resources\MediaResource;
use ProtestSoftware\LaravelMediaModels\Models\Media;

class MediaController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'media_type' => 'required|string',
            'media_id' => 'required|int',
            'path' => 'required',
            'name' => 'required|max:200'
        ]);

        $media = Media::create($validated);

        return new MediaResource($media);
    }
}
