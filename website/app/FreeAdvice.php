<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FreeAdvice extends Model
{
    protected $fillable = ['id','description','status','link','btnTitle'];
}
