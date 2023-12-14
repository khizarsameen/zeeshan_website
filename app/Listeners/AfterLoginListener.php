<?php

namespace App\Listeners;

use App\Events\AfterLogin;
use App\Models\Cart;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AfterLoginListener
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
    public function handle(AfterLogin $event): void
    {
        Cart::where('user_id', $event->user->id)->delete();
    }
}
