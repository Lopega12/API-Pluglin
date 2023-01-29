<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'category' =>$this->category->name,
            'body'=> ($this->hasTranslation($request->get('language'))) ? $this->getTranslation($request->get('language'))->body : null,
            "language" => $this->getTranslation($request->get('language'))->locale ?? null
        ];
    }
}
