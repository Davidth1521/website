<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tagBlog extends Model
{
    protected $fillable = ['title','status'];

    public function blog()
    {
        return $this->belongsToMany(Blog::class);
    }
}
