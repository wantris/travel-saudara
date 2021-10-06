<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public function detailRef()
    {
        return $this->hasMany(VehicleDetail::class, 'vehicle_id', 'id');
    }
}
