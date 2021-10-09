<?php

namespace App;

use App\models\Route;
use App\models\Vehicle;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public function vehicleRef()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'id');
    }

    public function routeRef()
    {
        return $this->belongsTo(Route::class, 'route_id', 'id');
    }
}
