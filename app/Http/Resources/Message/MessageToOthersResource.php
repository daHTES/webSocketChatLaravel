<?php

namespace App\Http\Resources\Message;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageToOthersResource extends JsonResource
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
            'id' => $this->id,
            'chat_id' => $this->chat_id,
            'user_name' => $this->user->name,
            'body' => $this->body,
            'time' => $this->time,
            'is_owner' => false
    ];
    }
}
