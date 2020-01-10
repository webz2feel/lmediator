<?php

namespace App\Listeners\Backend\Pages;

use App\Mail\Pages\SendPageCreatedEmail;
use App\Mail\Pages\SendPageDeletedEmail;
use App\Mail\Pages\SendPageUpdatedEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class PageEventListener
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

    public function onCreated($event)
    {
        Mail::to('imran@wtwm.com')->send(new SendPageCreatedEmail($event->page));
    }

    public function onUpdated($event)
    {
        Mail::to('imran@wtwm.com')->send(new SendPageUpdatedEmail($event->page));
    }

    public function onDeleted($event)
    {
        Mail::to('imran@wtwm.com')->send(new SendPageDeletedEmail($event->page));
    }

    public function subscribe($events)
    {
        $events->listen(
          \App\Events\Backend\Pages\PageCreated::class,
          '\App\Listeners\Backend\Pages\PageEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Pages\PageUpdated::class,
            '\App\Listeners\Backend\Pages\PageEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Pages\PageDeleted::class,
            '\App\Listeners\Backend\Pages\PageEventListener@onDeleted'
        );
    }
}
