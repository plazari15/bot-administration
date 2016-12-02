<?php

namespace App\Events;

use App\Phrases;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Auth;

class NewPhraseEvent implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $user;
    public $phrase;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Phrases $phrases)
    {
        $this->user = Auth::user();
        $this->phrase = $phrases;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('nova-frase');
    }
}
