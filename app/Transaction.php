<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $primaryKey = "bill_code";
    public $incrementing = false;

    public function reservationRef()
    {
        return $this->hasOne(Reservation::class, 'reservation_code', 'code');
    }
}
