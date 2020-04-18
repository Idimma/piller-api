<?php

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

Broadcast::channel('new-trip', function(){
    return true;
});
Broadcast::channel('private-admin-chat', function($user){
    return (int) getUser()->userrole->role_id === (int) 1;
});

Broadcast::channel('private-user-chat-{id}', function ($user, $id){
    return  getUser()->uuid === $id;
});