<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceTariff extends Model
{
    protected $fillable = ['title','price','unit','linkTitle','link','status','per'];
}
