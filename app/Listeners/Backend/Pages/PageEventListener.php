<?php

namespace App\Listeners\Backend\Pages;

use App\Mail\Pages\SendPageCreatedEmail;
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
        dump('i am created');
    }

    public function onUpdated($event)
    {
        Mail::to('imran@wtwm.com')->send(new SendPageCreatedEmail($event));
    }

    public function onDeleted($event)
    {
        dump('i am deleted');
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

//        $events->listen(
//            \App\Events\Backend\Pages\PageCreated::class,
//            '\App\Listeners\Backend\Pages\PageEventListener@onCreated'
//        );
    }
}
