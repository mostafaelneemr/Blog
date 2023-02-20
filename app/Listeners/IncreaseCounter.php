<?php

namespace App\Listeners;

use App\Events\PageViewer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class IncreaseCounter
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
     * @param  object  $event
     * @return void
     */
    public function handle(PageViewer $event)
    {
        $this->updateViewer($event->view);
    }

    function updateViewer($view)
    {
        $view->viewers = $view->viewers +1;
        $view->save(); 
    }
}
