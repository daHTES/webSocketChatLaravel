<?php

namespace App\Events;

use App\Http\Resources\Message\MessageResource;
use App\Http\Resources\Message\MessageToOthersResource;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StoreMessageStatusEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $count;
    private $chatid;
    private $userId;
    private $message;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($count, $chatid, $userId, $message)
    {
        $this->count = $count;
        $this->chatid = $chatid;
        $this->userId = $userId;
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('users.' . $this->userId);
    }

    public function broadcastAs(){
        return 'store-message-status';

    }

    public function broadcastWith(){

        return [
            'chat_id' => $this->chatid,
            'count' => $this->count,
            'message' => MessageResource::make($this->message)->resolve()
        ];

    }
}
