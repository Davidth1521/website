<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TariffDetail extends Model
{
    protected $fillable = ['attribute','tariff_id','status'];
}
