<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{

    protected $fillable = ['user_id', 'event_id', 'ticket_qty', 'ticket_price', 'total_price', 'status']; 

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function event() : BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}

