<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserListResource extends JsonResource
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
            "user_id"=> $this['user_id'],
            "user"=> User::where("id",$this['user_id'])->first(['firstName', 'lastName']),
            "message"=> $this['message'],
            "created_at"=> $this['created_at'],
            "attachment"=> $this['attachment'],
        ];
    }
}
