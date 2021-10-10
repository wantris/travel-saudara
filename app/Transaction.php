<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $primaryKey = "bill_code";
    public $incrementing = false;
}
