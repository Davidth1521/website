<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerSay extends Model
{
    protected $fillable = ['title','subTitle','image','description','status'];
}
