<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $primaryKey = "ticket_code";
    public $incrementing = false;

    public function reservationRef()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id', 'id');
    }
}
