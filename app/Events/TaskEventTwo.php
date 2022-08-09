<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TaskEventTwo implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    
    public $messageTwo;
    public function __construct($messageTwo)
    {
        $this->messageTwo = $messageTwo;
    }

    public function broadcastOn()
    {
        return new Channel('channelTwo');
    }
     public function broadcastAs()
    {
     return 'channelTwoMessage'; 
    }

}
