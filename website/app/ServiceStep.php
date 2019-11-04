<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceStep extends Model
{
    protected $fillable = ['title','icon','link','status'];
}
