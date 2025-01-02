<?php

namespace App\Events;

use App\Models\Antrian;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AntrianRegisStored
{
    use Dispatchable, SerializesModels;
    public $antrian;

    /**
     * Create a new event instance.
     * @param \App\Models\Antrian
     * @return void
     */
    public function __construct(Antrian $antrian)
    {
        $this->antrian = $antrian;
    }

}
