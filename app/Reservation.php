<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $primaryKey = "code";
    public $incrementing = false;

    public function ticketRef()
    {
        return $this->hasMany(Ticket::class, 'reservation_code', 'code');
    }

    public function scheduleRef()
    {
        return $this->belongsTo(Schedule::class, 'schedule_id', 'id');
    }
}
