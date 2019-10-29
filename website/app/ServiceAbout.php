<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceAbout extends Model
{
    protected $fillable = ['title','subTitle','icon','status','link'];
}
