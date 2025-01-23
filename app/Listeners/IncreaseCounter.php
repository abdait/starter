<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\VideoViewer;

class IncreaseCounter
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(VideoViewer $event): void
    {
       $this->updateViewer($event ->video);
    }

    function updateViewer($video){

        $video ->viewers = $video ->viewers +1;
        $video ->save();
    }
}
