<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            //'category'=>$this->category,
            'id' =>$this->id,
                'name' =>$this->product_name,
                'price' =>$this->product_price,
                'images' =>ImageResource::collection($this->whenLoaded('images')),


        ];
    }
}
