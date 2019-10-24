<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FreeAdvice extends Model
{
    protected $fillable = ['description','status','link','btnTitle'];
}
