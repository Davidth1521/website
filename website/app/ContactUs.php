<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $fillable = ['image','address','site','email','tel','mobile','telegram','instagram','twitter','linkedin','facebook','start_time','end_time','status'];
}
