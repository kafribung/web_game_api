<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name'        => $this->name,
            'slug'        => $this->slug,
            'description' => $this->description,
            'duration'    => $this->duration,
            'img'         => $this->takeImg,
            'author'      => $this->user->name,
        ];
    }
}
