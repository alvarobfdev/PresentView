<?php

namespace App\Events;

use App\Events\Event;
use App\Models\Revision;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class RevisionHasChanged extends Event
{
    use SerializesModels;
    /* @var \App\Models\Revision $revision*/
    public $revision;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Revision $revision)
    {
        $this->revision = $revision->find(1);
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
