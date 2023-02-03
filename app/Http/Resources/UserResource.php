<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            "id" => $this["id"],
            "firstName" => $this["firstName"],
            "lastName" => $this["lastName"],
            "profile" => $this["profile"],
            "gender" => $this["gender"],
            "dob" => $this["dob"],
            "phoneCode" => $this["phoneCode"],
            "phoneNumber" => $this["phoneNumber"],
            "email" => $this["email"],
            "referral_link" => $this["referral_link"],
        ];
    }
}
