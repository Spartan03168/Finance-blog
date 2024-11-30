<?php

namespace App\Listeners;

use App\Mail\LoginUpdates;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendLoginUpdate
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
    public function handle(Login $event): void
    {
        //
    }
}

class SendLoginNotification {
    public function handle(Login $event) {
        Mail::to($event->user->email)->send(new LoginUpdates());
        }
    }
