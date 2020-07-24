<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FirstLineSupportResource extends JsonResource
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
            'id'=>$this->id,
            'name'=>$this->bugBelongsToUser->name,
            'application'=> $this->bugBelongsToApplication->name
        ];

    }
}
