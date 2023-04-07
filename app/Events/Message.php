<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Message implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $id_tiket;

    public $nama;
    public $message;
    public $aksi;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($id_tiket, $nama, $message, $aksi)
    {
        $this->id_tiket = $id_tiket;
        $this->nama = $nama;
        $this->message = $message;
        $this->aksi = $aksi;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */

    public function broadcastOn()
    {
        return new Channel('my-channel');
    }

    public function broadcastAs()
    {
        return 'my-event';
    }
}
