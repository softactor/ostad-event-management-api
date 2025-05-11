<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('booking-channel.{userId}', function ($user, $userId) {
    return (int) $user->id === (int) $userId;
});
