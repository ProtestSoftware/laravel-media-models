<?php

namespace ProtestSoftware\LaravelMediaModels\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MediaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'file_size' => $this->file_size,
            'mime_type' => $this->mime_type,
            'name' => $this->name,
            'attachment_url' => $this->getAttachmentUrl(),
            'inline_url' => $this->getInlineUrl(),
        ];
    }
}
