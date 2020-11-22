<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('wfp.notify.user.{id}', function ($user, $id) {
    return true;
});

Broadcast::channel('system.events.logs', function ($user) {
    $a = Auth::user()->role->roles != "PROGRAM COORDINATOR" ? true : false;
    return $a;
});
