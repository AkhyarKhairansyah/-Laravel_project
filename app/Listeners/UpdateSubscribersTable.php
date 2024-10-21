<?php

namespace App\Listeners;


use App\Events\UserSubscribed;
use Illuminate\Support\Facades\DB;

class UpdateSubscribersTable
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
    public function handle(object $event): void
    {
         DB::insert('insert into subscribers (email) values (?)', [$event->email]); 
    }
}
