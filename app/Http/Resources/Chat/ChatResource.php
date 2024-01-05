<?php

namespace App\Http\Resources\Chat;

use App\Http\Resources\Message\MessageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatResource extends JsonResource
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
            'title' => $this->title ?? 'With ' . $this->chatWith->name,
            'users' => $this->users,
            'chat_with' => $this->chatWith->name,
            'last_message' => MessageResource::make($this->lastMessage)->resolve(),
            'unreadable_count' => $this->unreadable_message_statuses_count
    ];
    }
}
