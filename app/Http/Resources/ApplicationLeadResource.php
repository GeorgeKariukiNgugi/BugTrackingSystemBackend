<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationLeadResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $type = null;
        if ($this->typeOfLead == 1) {
            # code...
            $type = 'Senior Lead';
        } else {
            # code...
            $type = 'Minor Lead';
        }
        
        return [
            'id'=>$this->id,
            'name'=>$this->applicationLeadIsAUser->name,
            'application'=> $this->applicationLeadBelongsToApplication->name,
            'typeOfLead'=> $type,
        ];
    }
}
