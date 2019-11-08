<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['status','address','about_us_id'];

    public function about_us()
    {
        $this->belongsToMany(AboutUs::class);
    }
}
