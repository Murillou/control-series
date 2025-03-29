<?php

namespace App\Listeners;

use App\Mail\SeriesCreated;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailUsersAboutSeriesCreated implements ShouldQueue
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
    public function handle(\App\Events\SeriesCreated $event): void
    {
        $userList = User::all();

        foreach ($userList as $index => $user) {
            $email = new SeriesCreated(
                    $event->seriesName,
                    $event->seriesId,
                    $event->seriesSeasons,
                    $event->seriesEpisodes
            );
            $when = now()->addSeconds($index * 3);
            Mail::to($user)->later($when, $email);
        }
    }
}
