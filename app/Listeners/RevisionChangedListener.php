<?php

namespace App\Listeners;

use App\Events\RevisionHasChanged;
use App\Models\GCMSender;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RevisionChangedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RevisionHasChanged  $event
     * @return void
     */
    public function handle(RevisionHasChanged $event)
    {
        $event->revision->revision++;
        $data = [

            "revision" => $event->revision->revision

        ];

        GCMSender::sendMessage("/topics/global", $data);
        $event->revision->gcm_last_result = GCMSender::getResult();
        $event->revision->gcm_last_error = GCMSender::getError();
        $event->revision->save();

    }
}
