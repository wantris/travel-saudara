<?php

namespace App\models;

use App\Schedule;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public function detailRef()
    {
        return $this->hasMany(VehicleDetail::class, 'vehicle_id', 'id');
    }

    public function scheduleRef()
    {
        return $this->hasMany(Schedule::class, 'vehicle_id', 'id');
    }
}
