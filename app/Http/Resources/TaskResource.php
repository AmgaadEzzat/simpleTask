<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return[
             'id' => $this->id,
             'name' => $this->category_name,
             'products' =>ProductResource::collection($this->whenLoaded('products'))
        ];
    }
}
