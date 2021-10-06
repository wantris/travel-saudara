<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    public function cityDepartureRef()
    {
        return $this->belongsTo(City::class, 'departure', 'id');
    }

    public function cityArrivalRef()
    {
        return $this->belongsTo(City::class, 'arrival', 'id');
    }
}
