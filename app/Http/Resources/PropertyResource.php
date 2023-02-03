<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
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
            // "id" => $this["id"],
            "property_title" => $this["property_title"],
            "property_description" => $this["property_description"],
            "property_type" => $this["property_type"],
            "posting_type" => $this["posting_type"],
            "advert_type" => $this["advert_type"],
            "created_at" => $this["created_at"],
            "property_info" => $this["property_info"],
            "owner" => new UserResource($this["user"]),
            "room_info" => $this["room_info"],
            "extra_info" => $this["extra_info"],
            "exixting_flatmate" => $this["exixting_flatmate"]
        ];
    }
}
